@extends('layouts.main')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Tambah Produk/Barang</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                <li class="breadcrumb-item active">Produk/Barang</li>
            </ol>
        </div>
    </div>
@endsection


@section('content')
    <div class="row">
        <div class="col">
            {{-- @if ($errors->any())
                @foreach ($collection as )

                @endforeach

            @endif --}}
            <form action="/products/store" method="POST">
                @csrf
                @method('POST')
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama Produk" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">Deskripsi</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror" placeholder="Deskripsi Produk">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sku" class="form-label">Kode Produk</label>
                            <input type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" name="sku" placeholder="Nama Produk" value="{{ old('sku') }}">
                            @error('sku')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price" class="form-label">Harga</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" inputmode="numeric" placeholder="Nama Produk" value="{{ old('price') }}">
                            @error('price')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" placeholder="Nama Produk" value="{{ old('stock') }}">
                            @error('stock')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_id" class="form-label">Kategori</label>
                            <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }} ">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <a href="/products" class="btn btn-sm btn-outline-secondary mr-2">Batal</a>
                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
