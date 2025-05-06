<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        return view('donate.index'); // Menampilkan halaman donasi
    }

    public function findDonations()
    {
        // Menampilkan halaman untuk menemukan donasi
        return view('donate.find');
    }
}

