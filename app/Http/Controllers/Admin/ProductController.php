<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);

        return view('pages.products.index', [
            'products' => $products,
        ]);
    }
    public function create()
    {
        $categories = Category::all();
        return view('pages.products.create', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'nullable',
            'sku' => 'required',
            'category_id' => 'required',
        ], [
            'name.required' => 'Nama produk/barang harus diisi',
            'name.min' => 'Nama produk/barang minimal 3 karakter',
            'price.required' => 'Harga produk/barang harus diisi',
            'stock.required' => 'Stok produk/barang harus diisi',
            'sku.required' => 'SKU produk/barang harus diisi',
            'category_id.required' => 'Kategori produk harus dipilih',
        ]);

        Product::create($validated);

        return redirect('/products')->with('success', 'Berhasil menambahkan Produk/Barang');
    }

    public function delete($id)
    {
        $product = Product::where('id', $id);
        $product->delete();

        return redirect('/products')->with('success', 'Berhasil menghapus Produk/Barang');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('pages.products.edit', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'nullable',
            'sku' => 'required',
            'category_id' => 'required',
        ],[
            'name.required' => 'Nama produk/barang harus diisi',
            'name.min' => 'Nama produk/barang minimal 3 karakter',
            'price.required' => 'Harga produk/barang harus diisi',
            'stock.required' => 'Stok produk/barang harus diisi',
            'sku.required' => 'SKU produk/barang harus diisi',
            'category_id.required' => 'Kategori produk harus dipilih',
        ]);

        Product::where('id', $id)->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'description' => $request->input('description'),
            'sku' => $request->input('sku'),
            'category_id' => $request->input('category_id'),
        ]);

        return redirect('/products')->with('success', 'Berhasil mengubah Produk/Barang');
    }
}
