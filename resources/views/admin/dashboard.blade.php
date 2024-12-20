@extends('layouts.admin')
@section('content')
<div class="container">
    <h1 class="mt-4">Dashboard</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Gejala</h5>
                    <p class="card-text">{{ $gejalasCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Kerusakan</h5>
                    <p class="card-text">{{ $kerusakansCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Solusi</h5>
                    <p class="card-text">{{ $solusisCount }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection