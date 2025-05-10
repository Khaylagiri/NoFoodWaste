@extends('layouts.admin.master')

@section('title', 'Donasi - No Food Waste')

@section('content')
    <section class="donate-section">
        <div class="donate-content">
            <h1>Donasikan Makanan Anda</h1>
            <p>Anda dapat membantu mengurangi pemborosan makanan dengan mendonasikan makanan kepada mereka yang membutuhkan.</p>

            <form action="{{ route('donate') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="food_name">Nama Makanan</label>
                    <input type="text" id="food_name" name="food_name" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="quantity">Jumlah</label>
                    <input type="number" id="quantity" name="quantity" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="expiry_date">Tanggal Kadaluarsa</label>
                    <input type="date" id="expiry_date" name="expiry_date" required class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Donasikan</button>
            </form>
        </div>
    </section>
@endsection
