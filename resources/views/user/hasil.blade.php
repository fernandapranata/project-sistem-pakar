@extends('layouts.app')

@section('title', 'Hasil Diagnosa')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-custom p-4">
            <h3 class="text-center mb-4">Hasil Diagnosa</h3>

            @if($kerusakans->isNotEmpty())  <!-- Check if there are any kerusakans -->
                @foreach($kerusakans as $kerusakan)  <!-- Loop through multiple kerusakans -->
                    <div class="alert alert-success">
                        <h4>Kerusakan : <strong>{{ $kerusakan->nama_kerusakan }}</strong></h4>
                        <p>{{ $kerusakan->deskripsi }}</p>
                    </div>
                    
                    <h7>Ciri Kerusakan/Gejala :</h7>
                    <ul>
                        @foreach($kerusakan->gejalas as $gejala)
                            <li>{{ $gejala->nama_gejala }}</li>
                        @endforeach
                    </ul>

                    <h7>Solusi :</h7>
                    <ul>
                        @foreach($kerusakan->solusis as $solusi)
                            <li>{{ $solusi->solusi }}</li>
                        @endforeach
                    </ul>
                    <hr>
                @endforeach
            @else
                <div class="alert alert-warning">
                    <p>Tidak ada kerusakan yang ditemukan berdasarkan gejala yang dipilih.</p>
                </div>
            @endif

            <a href="{{ route('diagnosa.form') }}" class="btn btn-secondary mt-3 w-100">Kembali</a>
        </div>
    </div>
</div>
@endsection
