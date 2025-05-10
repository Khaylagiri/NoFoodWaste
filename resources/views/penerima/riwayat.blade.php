@extends('layouts.admin.master')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Riwayat Makanan yang Diterima</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>Tanggal</th>
                <th>Nama Makanan</th>
                <th>Donatur</th>
                <th>Estimasi Penghematan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($riwayat as $item)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}</td>
                    <td>{{ 'Nama Makanan' }}</td> <!-- Ganti dengan nama makanan jika ada -->
                    <td>{{ 'Donatur' }}</td> <!-- Ganti dengan nama donatur jika ada -->
                    <td>Rp{{ number_format($item->total_food_saved, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        <h4>Total Penghematan: Rp{{ number_format($totalHemat, 0, ',', '.') }}</h4>
        <p class="mt-2">Dampak Lingkungan Positif:</p>
        <ul>
            <li>{{ $dampakLingkungan['co2_saved'] }} kg emisi CO₂ diselamatkan</li>
            <li>{{ $dampakLingkungan['water_saved'] }} liter air diselamatkan</li>
        </ul>
    </div>
</div>
@endsection
