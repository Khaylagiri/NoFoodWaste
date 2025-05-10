<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonationController extends Controller
{/**
     * Tampilkan daftar klaim donasi untuk user yang sedang login.
     */
    public function showClaims()
    {

        $claims = DonationClaim::with('donation')
            ->where('user_id', auth()->user()->user_id) // atau auth()->id() jika pakai default id
            ->orderBy('claim_time')
            ->get();

        return view('donation.claims', compact('claims'));
    }
}

