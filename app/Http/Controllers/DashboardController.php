<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Data yang ingin ditampilkan pada dashboard, seperti statistik
        $saved_food = 5000; // contoh data makanan terselamatkan
        $active_donors = 150; // contoh data donatur aktif
        $helped_communities = 30; // contoh data komunitas yang terbantu

        // Mengirim data ke view dashboard.index
        return view('dashboard.index', compact('saved_food', 'active_donors', 'helped_communities'));
    }
}

