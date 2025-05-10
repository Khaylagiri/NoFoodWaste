@extends('layouts.admin.master')

@section('title', 'Dashboard - No Food Waste')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="{{ asset('assets/css/nofoodwaste.css') }}">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
<style>
    :root {
        --primary: #2C6B2F;
        --primary-light: #3d8a41;
        --primary-dark: #225524;
        --accent: #F7941D;
        --accent-light: #f9a948;
        --accent-dark: #e07c08;
        --neutral-100: #f8f9fa;
        --neutral-200: #e9ecef;
        --neutral-300: #dee2e6;
        --neutral-600: #6c757d;
        --neutral-700: #495057;
        --neutral-800: #343a40;
        --success: #28a745;
        --danger: #dc3545;
        --radius-sm: 4px;
        --radius-md: 8px;
        --radius-lg: 12px;
        --radius-full: 50%;
        --spacing-xs: 4px;
        --spacing-sm: 8px;
        --spacing-md: 16px;
        --spacing-lg: 24px;
        --spacing-xl: 32px;
        --font-size-sm: 0.875rem;
        --font-size-base: 1rem;
        --font-size-lg: 1.125rem;
        --font-size-xl: 1.25rem;
        --font-size-2xl: 1.5rem;
        --font-size-3xl: 1.75rem;
        --shadow-sm: 0 1px 2px rgba(0,0,0,0.05);
        --shadow-md: 0 4px 6px rgba(0,0,0,0.1);
        --shadow-lg: 0 10px 15px rgba(0,0,0,0.1);
        --transition-fast: all 0.2s ease;
        --transition-normal: all 0.3s ease;
    }

    .page-header {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        border-radius: var(--radius-lg);
        padding: var(--spacing-lg) var(--spacing-xl);
        box-shadow: var(--shadow-md);
        margin-bottom: var(--spacing-xl);
    }

    .page-header h3 {
        color: white;
        font-weight: 700;
        margin-bottom: var(--spacing-sm);
    }

    .breadcrumb {
        background: transparent;
        padding: 0;
        margin-bottom: 0;
    }

    .breadcrumb-item a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
    }

    .breadcrumb-item.active {
        color: white;
    }

    .dropdown-menu {
        border-radius: var(--radius-md);
        box-shadow: var(--shadow-md);
        padding: var(--spacing-sm) 0;
        border: none;
        min-width: 200px;
    }

    .dropdown-item {
        padding: var(--spacing-sm) var(--spacing-md);
        color: var(--neutral-700);
        transition: var(--transition-fast);
    }

    .dropdown-item:hover {
        background-color: rgba(44, 107, 47, 0.1);
        color: var(--primary);
    }

    .dashboard-welcome-banner {
        background: linear-gradient(to right, var(--primary-light), var(--primary));
        border-radius: var(--radius-lg);
        padding: var(--spacing-xl);
        margin-bottom: var(--spacing-xl);
        position: relative;
        overflow: hidden;
        color: white;
        box-shadow: var(--shadow-md);
    }

    .dashboard-welcome-banner::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 100%;
        height: 200%;
        background: url('https://www.transparenttextures.com/patterns/cubes.png') repeat;
        opacity: 0.1;
        transform: rotate(30deg);
    }

    .dashboard-welcome-content {
        position: relative;
        z-index: 1;
    }

    .dashboard-welcome-title {
        font-size: var(--font-size-2xl);
        font-weight: 700;
        margin-bottom: var(--spacing-sm);
    }

    .dashboard-welcome-text {
        font-size: var(--font-size-base);
        opacity: 0.9;
        margin-bottom: var(--spacing-lg);
        max-width: 600px;
    }

    .btn-light {
        background-color: white;
        color: var(--primary);
        border: none;
        font-weight: 500;
        transition: var(--transition-fast);
    }

    .btn-light:hover {
        background-color: rgba(255, 255, 255, 0.9);
        transform: translateY(-2px);
    }

    .btn-outline-light {
        background-color: transparent;
        color: white;
        border: 1px solid white;
        font-weight: 500;
        transition: var(--transition-fast);
    }

    .btn-outline-light:hover {
        background-color: rgba(255, 255, 255, 0.1);
        transform: translateY(-2px);
    }

    .gap-2 {
        gap: 0.5rem;
    }
</style>
@endpush

@section('content')
<div class="container">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h3>Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <div class="col-lg-6">
                <div class="d-flex justify-content-end">
                    <!-- User Profile Dropdown -->
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-2"></i>{{ Auth::user()->name ?? 'User' }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profil</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Pengaturan</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Welcome Banner -->
    <div class="dashboard-welcome-banner">
        <div class="dashboard-welcome-content">
            <h2 class="dashboard-welcome-title">Selamat Datang, {{ Auth::user()->name ?? 'User' }}!</h2>
            <p class="dashboard-welcome-text">
                Hari ini adalah hari yang tepat untuk berbagi kebaikan. Mari kita perkuat komitmen untuk mengurangi pemborosan makanan dan membantu mereka yang membutuhkan.
            </p>
            <div class="d-flex gap-2">
                <a href="#" class="btn btn-light">
                    <i class="fas fa-hand-holding-heart me-2"></i>Donasi Makanan
                </a>
                <a href="#" class="btn btn-outline-light">
                    <i class="fas fa-search me-2"></i>Cari Donasi
                </a>
            </div>
        </div>
    </div>

    <!-- Donasi Terdekat -->
<div class="card mb-4 shadow-sm">
    <div class="card-header bg-white d-flex align-items-center justify-content-between">
        <h5 class="mb-0 text-primary"><i class="fas fa-map-marker-alt me-2"></i>Donasi Terdekat</h5>
        <a href="#" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
    </div>
    <div class="card-body">
        @php
            $donasiTerdekat = [
                ['nama' => 'Warung Berkah', 'alamat' => 'Jl. Soekarno Hatta No.21', 'jarak' => '2.5 km'],
                ['nama' => 'Toko Makanan Sehat', 'alamat' => 'Jl. Cibaduyut No.10', 'jarak' => '3.1 km'],
                ['nama' => 'Restoran Peduli', 'alamat' => 'Jl. Riau No.5', 'jarak' => '4.0 km']
            ];
        @endphp

        <ul class="list-group list-group-flush">
            @foreach ($donasiTerdekat as $donasi)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $donasi['nama'] }}</strong><br>
                        <small class="text-muted">{{ $donasi['alamat'] }}</small>
                    </div>
                    <span class="badge bg-success rounded-pill">{{ $donasi['jarak'] }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<!-- Sistem Klaim Donasi -->
<div class="card shadow-sm">
    <div class="card-header bg-white d-flex align-items-center justify-content-between">
        <h5 class="mb-0 text-primary"><i class="fas fa-hand-holding-usd me-2"></i>Sistem Klaim Donasi</h5>
    </div>
    <div class="card-body">
        <p class="text-muted mb-3">
            Berikut adalah jadwal pengambilan donasi yang telah Anda klaim.
        </p>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Nama Donasi</th>
                        <th>Lokasi</th>
                        <th>Waktu</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($claims as $claim)
                        <tr>
                            <td>{{ $claim->donation?->name ?? '-' }}</td>
                            <td>{{ $claim->donation?->location ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($claim->claim_time)->format('H:i d/m/Y') }}</td>
                            <td>
                                @php
                                    $statusClass = [
                                        'pending' => 'badge bg-warning text-dark',
                                        'approved' => 'badge bg-primary',
                                        'rejected' => 'badge bg-danger',
                                        'completed' => 'badge bg-success',
                                    ];
                                @endphp
                                <span class="{{ $statusClass[$claim->status] ?? 'badge bg-secondary' }}">
                                    {{ ucfirst($claim->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada klaim donasi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            <small class="text-muted">
                * Jadwal dapat berubah sesuai konfirmasi dari pihak pendonor. Jika terdapat lebih dari satu klaim, sistem akan mengatur antrian secara otomatis.
            </small>
        </div>
    </div>
</div>

</div>
@endsection
