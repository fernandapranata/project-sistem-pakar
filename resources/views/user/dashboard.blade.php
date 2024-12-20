@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-5">
    <div class="row align-items-center hero">
        <!-- Content -->
        <div class="col-lg-6 col-md-12 text-center text-lg-start mb-4 mb-lg-0">
            <h1 class="fw-bold">Selamat Datang di Sistem Diagnosa Smartphone</h1>
            <p class="text-muted">Sistem ini membantu Anda mendiagnosa kerusakan pada smartphone Anda dengan cepat dan akurat.</p>
            <a href="{{ route('diagnosa.form') }}" class="btn btn-primary btn-lg mt-3">Mulai Diagnosa</a>
        </div>
        <!-- Image -->
        <div class="col-lg-6 col-md-12 text-center">
            <img src="dashboard.jpg" alt="Diagnosa Smartphone" class="img-fluid rounded shadow" style="max-width: 100%; height: auto;">
        </div>
    </div>
</div>

<style>
    @media (max-width: 768px) {
        .hero img {
            margin-top: 20px;
        }
    }
</style>
@endsection
