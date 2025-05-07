@extends('layouts.admin.master')

@section('title', 'Dashboard Penerima - No Food Waste')

@section('content')
<div class="container-fluid page-header">
    <div class="row">
        <div class="col-lg-6">
            <h3>Dashboard Penerima</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.penerima') }}">Home</a></li>
                <li class="breadcrumb-item">Penerima</li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row starter-main">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5>Selamat Datang Penerima!</h5>
                </div>
                <div class="card-body">
                    <p>Anda dapat melihat dan mengklaim makanan donasi di sini.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 