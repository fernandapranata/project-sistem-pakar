@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>Edit Kerusakan</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.kerusakan.update', $kerusakan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="kode_kerusakan" class="form-label">Kode Kerusakan</label>
                    <input type="text" class="form-control" id="kode_kerusakan" name="kode_kerusakan" value="{{ $kerusakan->kode_kerusakan }}" required>
                </div>
                <div class="mb-3">
                    <label for="nama_kerusakan" class="form-label">Nama Kerusakan</label>
                    <input type="text" class="form-control" id="nama_kerusakan" name="nama_kerusakan" value="{{ $kerusakan->nama_kerusakan }}" required>
                </div>
                <div class="mb-3">
                    <label for="gejala" class="form-label">Gejala Terkait</label>
                    <div class="form-group">
                        @foreach($gejalas as $gejala)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="gejala_{{ $gejala->id }}" name="gejala[]" value="{{ $gejala->id }}" 
                                @if(in_array($gejala->id, $kerusakan->gejalas->pluck('id')->toArray())) checked @endif>
                                <label class="form-check-label" for="gejala_{{ $gejala->id }}">
                                    {{ $gejala->kode_gejala }} : {{ $gejala->nama_gejala }}
                                    @if($gejala->solusi)
                                        (Solusi: {{ $gejala->solusi->solusi }})
                                    @endif
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Perbarui Kerusakan</button>
            </form>
        </div>
    </div>
</div>
@endsection
