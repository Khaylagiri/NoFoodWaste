@extends('layouts.admin.master')

@section('title', 'Temukan Donasi - No Food Waste')

@section('content')
    <section class="find-donations-section">
        <div class="find-donations-content">
            <h1>Temukan Donasi Makanan Terdekat</h1>
            <p>Gunakan peta untuk menemukan makanan yang dapat Anda ambil dan donasikan kepada yang membutuhkan.</p>

            <!-- Tambahkan fitur pencarian atau peta di sini -->
            <div id="map"></div> <!-- Misalnya menggunakan peta interaktif -->
        </div>
    </section>
@endsection
