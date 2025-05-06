@extends('layouts.admin.master')

@section('title', 'Dashboard - No Food Waste')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush

@section('content')
<div class="container-fluid page-header">
    <div class="row">
        <div class="col-lg-6">
            <h3>Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Relawan</li>
                <li class="breadcrumb-item">Donatur</li>
            </ol>
        </div>
    </div>
</div>

  
  <div class="container-fluid">
    <div class="row starter-main">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Selamat Datang di No Food Waste</h5>
                    <div class="setting-list">
                        <ul class="list-unstyled setting-option">
                            <li>
                                <div class="setting-primary"><i class="icon-settings"></i></div>
                            </li>
                            <li><i class="view-html fa fa-code font-primary"></i></li>
                            <li><i class="icofont icofont-maximize full-card font-primary"></i></li>
                            <li><i class="icofont icofont-minus minimize-card font-primary"></i></li>
                            <li><i class="icofont icofont-refresh reload-card font-primary"></i></li>
                            <li><i class="icofont icofont-error close-card font-primary"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Hero Section -->
                    <section class="hero-section">
                        <div class="hero-image">
                            <img src="{{ asset('assets/images/healthy-food.jpg') }}" alt="Healthy Food">
                        </div>
                        <div class="hero-content">
                            <h1>One Portion, One Change</h1>
                            <p>Help reduce food waste and make a difference today!</p>
                            <a href="{{ route('donate') }}" class="cta-btn">Donasikan Makanan Sekarang</a>
                            <a href="{{ route('find-donations') }}" class="cta-btn">Cari Makanan Donasi</a>
                        </div>
                    </section>

                    <!-- About Us Section -->
                    <section class="about-us">
                        <h2>Tentang Kami</h2>
                        <p>Misi kami adalah untuk mengurangi pemborosan makanan dan membantu mereka yang membutuhkan. Dengan kolaborasi para donatur dan relawan, kita dapat mengubah dunia!</p>
                    </section>

                    <!-- Real-time Stats Section -->
                    <section class="stats-section">
                        <div class="stats">
                            <div class="stat">
                                <h3>{{ $saved_food }} Kg</h3>
                                <p>Makanan Terselamatkan</p>
                            </div>
                            <div class="stat">
                                <h3>{{ $active_donors }}</h3>
                                <p>Donatur Aktif</p>
                            </div>
                            <div class="stat">
                                <h3>{{ $helped_communities }}</h3>
                                <p>Komunitas Terbantu</p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection

@push('styles')
    <style>
        /* Hero Section */
        .hero-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 40px;
            background-color: #2C6B2F;
            color: white;
            margin-bottom: 20px;
        }

        .hero-image img {
            max-width: 100%;
            height: auto;
        }

        .hero-content {
            max-width: 50%;
        }

        .hero-content h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .cta-btn {
            background-color: #FAF3E0;
            color: #2C6B2F;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .cta-btn:hover {
            background-color: #D9D9D9;
        }

        /* About Us Section */
        .about-us {
            padding: 40px;
            background-color: #f9f9f9;
            text-align: center;
        }

        .about-us h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .about-us p {
            font-size: 1.1rem;
            line-height: 1.6;
        }

        /* Stats Section */
        .stats-section {
            display: flex;
            justify-content: space-around;
            padding: 40px;
        }

        .stat {
            text-align: center;
        }

        .stat h3 {
            font-size: 2rem;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .stat p {
            font-size: 1.1rem;
        }
    </style>
@endpush
