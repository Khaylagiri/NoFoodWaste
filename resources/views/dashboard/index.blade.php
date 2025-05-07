@extends('layouts.admin.master')

@section('title', 'Dashboard - No Food Waste')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@endpush

@section('content')
<div class="container-fluid page-header">
    <div class="row align-items-center">
        <div class="col-lg-6">
            <div class="page-header-left">
                <h3>Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Relawan</li>
                    <li class="breadcrumb-item">Donatur</li>
                </ol>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="d-flex justify-content-end">
                <!-- Logout Button -->
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row starter-main">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Selamat Datang di No Food Waste</h5>
                    <div class="setting-list">
                        <ul class="list-unstyled setting-option">
                            <li><i class="icofont icofont-maximize full-card font-primary"></i></li>
                            <li><i class="icofont icofont-minus minimize-card font-primary"></i></li>
                            <li><i class="icofont icofont-refresh reload-card font-primary"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <!-- User Welcome Banner -->
                    <div class="welcome-banner mb-4">
                        <h4>Halo, {{ Auth::user()->username ?? 'Pengguna' }}!</h4>
                        <p class="text-muted">Selamat datang kembali di platform No Food Waste</p>
                    </div>

                    <!-- Hero Section -->
                    <section class="hero-section">
                        <div class="row align-items-center">
                            <div class="col-md-6 hero-content">
                                <h1>One Portion, One Change</h1>
                                <p>Help reduce food waste and make a difference today!</p>
                                <div class="mt-4">
                                    <a href="{{ route('donate') }}" class="cta-btn"><i class="fas fa-hand-holding-heart"></i> Donasikan Makanan</a>
                                    <a href="{{ route('find-donations') }}" class="cta-btn"><i class="fas fa-search"></i> Cari Donasi</a>
                                </div>
                            </div>
                            <div class="col-md-6 hero-image">
                                <img src="{{ asset('assets/images/healthy-food.jpg') }}" alt="Healthy Food" class="img-fluid rounded shadow">
                            </div>
                        </div>
                    </section>

                    <!-- About Us Section -->
                    <section class="about-us mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="text-center mb-4"><i class="fas fa-info-circle"></i> Tentang Kami</h2>
                                <p class="lead text-center">Misi kami adalah untuk mengurangi pemborosan makanan dan membantu mereka yang membutuhkan. Dengan kolaborasi para donatur dan relawan, kita dapat mengubah dunia!</p>
                            </div>
                        </div>
                    </section>

                    <!-- Real-time Stats Section -->
                    <section class="stats-section mt-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card stat-card bg-primary text-white">
                                    <div class="card-body text-center">
                                        <i class="fas fa-utensils fa-3x mb-3"></i>
                                        <h3>500 Kg</h3>
                                        <p>Makanan Terselamatkan</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card stat-card bg-success text-white">
                                    <div class="card-body text-center">
                                        <i class="fas fa-users fa-3x mb-3"></i>
                                        <h3>125</h3>
                                        <p>Donatur Aktif</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card stat-card bg-warning text-white">
                                    <div class="card-body text-center">
                                        <i class="fas fa-hands-helping fa-3x mb-3"></i>
                                        <h3>35</h3>
                                        <p>Komunitas Terbantu</p>
                                    </div>
                                </div>
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
        padding: 40px;
        background-color: #2C6B2F;
        color: white;
        margin-bottom: 20px;
        border-radius: 10px;
    }

    .hero-image img {
        max-width: 100%;
        height: auto;
    }

    .hero-content h1 {
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 1rem;
    }
    
    .hero-content p {
        font-size: 1.2rem;
        margin-bottom: 1.5rem;
    }

    .cta-btn {
        background-color: #FAF3E0;
        color: #2C6B2F;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        margin-right: 10px;
        font-weight: bold;
        transition: all 0.3s ease;
        display: inline-block;
    }

    .cta-btn:hover {
        background-color: #D9D9D9;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    /* About Us Section */
    .about-us {
        background-color: #f9f9f9;
    }
    
    .about-us h2 {
        font-size: 2rem;
        color: #2C6B2F;
    }
    
    .about-us p {
        font-size: 1.1rem;
        line-height: 1.6;
    }

    /* Stats Section */
    .stat-card {
        transition: all 0.3s ease;
        border: none;
        border-radius: 10px;
    }
    
    .stat-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }
    
    .stat-card h3 {
        font-size: 2.5rem;
        font-weight: bold;
        margin: 10px 0;
    }
    
    .stat-card p {
        font-size: 1.1rem;
        opacity: 0.9;
    }
    
    /* Welcome Banner */
    .welcome-banner {
        padding: 15px;
        background-color: #f0f7ff;
        border-left: 5px solid #2C6B2F;
        border-radius: 5px;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .hero-section {
            padding: 20px;
        }
        
        .hero-content {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .hero-content h1 {
            font-size: 2rem;
        }
        
        .cta-btn {
            display: block;
            margin-bottom: 10px;
            margin-right: 0;
            text-align: center;
        }
        
        .stat-card {
            margin-bottom: 20px;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Add any JavaScript functionality here
        
        // Example: Add animation to stats numbers
        $('.stat-card h3').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 2000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    });
</script>
@endpush
