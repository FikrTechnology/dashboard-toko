<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Laptop',
            'description' => 'A high-performance laptop for all your computing needs.',
            'sku' => 'LAP12345',
            'price' => 999.99,
            'stock' => 50,
            'category_id' => 1, // Assuming category with ID 1 exists
        ]);
    }
}
