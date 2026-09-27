<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('suppliers')->insert([
            [
                'name' => 'PT. Indofood Sukses Makmur Tbk',
                'phone' => '02157958822',
                'address' => 'Jl. Jenderal Sudirman Kav. 76-78, Jakarta Selatan'
            ],
            [
                'name' => 'PT. Unilever Indonesia Tbk',
                'phone' => '02180827000',
                'address' => 'Jl. BSD Boulevard Barat, BSD City, Tangerang'
            ],
            [
                'name' => 'PT. Mayora Indah Tbk',
                'phone' => '02180637777',
                'address' => 'Jl. Tomang Raya No. 21-23, Jakarta Barat'
            ],
        ]);
    }
}