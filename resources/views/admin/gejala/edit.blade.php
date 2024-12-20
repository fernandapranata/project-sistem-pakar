@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>Edit Gejala</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.gejala.update', $gejala->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="kode_gejala" class="form-label">Kode Gejala</label>
                    <input type="text" class="form-control" id="kode_gejala" name="kode_gejala" value="{{ $gejala->kode_gejala }}" required>
                </div>
                <div class="mb-3">
                    <label for="nama_gejala" class="form-label">Nama Gejala</label>
                    <input type="text" class="form-control" id="nama_gejala" name="nama_gejala" value="{{ $gejala->nama_gejala }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Perbarui Gejala</button>
            </form>
        </div>
    </div>
</div>
@endsection
