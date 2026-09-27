<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Jalankan Seeder Kategori
        $this->call(CategorySeeder::class);

        // 2. Jalankan Factory Produk untuk membuat 50 data
        \App\Models\Product::factory(50)->create();

        // 3. Jalankan Seeder Supplier
        $this->call(SupplierSeeder::class);
    }
}