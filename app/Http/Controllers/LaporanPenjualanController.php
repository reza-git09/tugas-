<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanPenjualanController extends Controller
{
    public function __invoke()
    {
        $laporan = [
            'total_transaksi' => 125,
            'total_produk_terjual' => 350,
            'total_pendapatan' => 27500000,
            'produk_terlaris' => 'Laptop ThinkPad',
        ];

        return view('laporan', compact('laporan'));
    }
}