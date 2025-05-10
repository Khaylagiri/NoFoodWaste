<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\DonationClaim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DonationClaimController extends Controller
{
    
    public function index()
{
    // Ambil klaim donasi untuk pengguna yang sedang login
    $claims = DonationClaim::where('user_id', auth()->id())->get();

    // Kirim data klaim ke view
    return view('penerima.index', compact('claims'));
}

    // Untuk penerima melihat klaim mereka sendiri
    public function penerimaIndex()
    {
        $claims = DonationClaim::with('donation')
            ->where('user_id', Auth::id())
            ->orderBy('claim_time', 'desc')
            ->get();

        return view('penerima.index', compact('claims'));
    }

    // Untuk mengklaim donasi
    public function store(Request $request, $donation_id)
    {
        $existingClaim = DonationClaim::where('donation_id', $donation_id)
            ->where('user_id', Auth::id())
            ->whereIn('status', ['pending', 'approved'])
            ->first();

        if ($existingClaim) {
            return back()->with('warning', 'Anda sudah mengklaim donasi ini.');
        }

        DonationClaim::create([
            'donation_id' => $donation_id,
            'user_id' => Auth::id(),
            'claim_time' => Carbon::now(),
            'status' => 'pending',
        ]);

        return back()->with('success', 'Donasi berhasil diklaim! Tunggu konfirmasi.');
    }

    // Admin menyetujui klaim
    public function approve($claim_id)
    {
        $claim = DonationClaim::findOrFail($claim_id);
        $claim->update(['status' => 'approved']);
        return back()->with('success', 'Klaim disetujui.');
    }

    // Admin menolak klaim
    public function reject($claim_id)
    {
        $claim = DonationClaim::findOrFail($claim_id);
        $claim->update(['status' => 'rejected']);
        return back()->with('danger', 'Klaim ditolak.');
    }
}
