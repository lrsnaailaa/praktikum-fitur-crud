<?php

namespace App\Http\Controllers;

use App\Models\Buku;

class HomeController extends Controller
{
    public function index()
    {
        $jumlah_buku = Buku::count();

        $total_harga = Buku::sum('harga');

        $buku_terbaru = Buku::orderBy('id', 'desc')
            ->take(5)
            ->get();

        return view('home', compact(
            'jumlah_buku',
            'total_harga',
            'buku_terbaru'
        ));
    }
}
