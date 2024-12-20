@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>Daftar Kerusakan</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ url('/admin/kerusakan') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="kode_kerusakan" class="form-label">Kode Kerusakan</label>
                    <input type="text" class="form-control" id="kode_kerusakan" name="kode_kerusakan" required>
                </div>
                <div class="mb-3">
                    <label for="nama_kerusakan" class="form-label">Nama Kerusakan</label>
                    <input type="text" class="form-control" id="nama_kerusakan" name="nama_kerusakan" required>
                </div>
                <div class="mb-3">
                    <label for="gejala" class="form-label">Gejala Terkait</label>
                    <div class="form-group">
                        @foreach($gejalas as $gejala)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="gejala_{{ $gejala->id }}" name="gejala[]" value="{{ $gejala->id }}">
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
                <button type="submit" class="btn btn-primary">Tambah Kerusakan</button>
            </form>
            <hr>
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Kerusakan</th>
                        <th>Nama Kerusakan</th>
                        <th>Gejala Terkait</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kerusakans as $index => $kerusakan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $kerusakan->kode_kerusakan }}</td>
                        <td>{{ $kerusakan->nama_kerusakan }}</td>
                        <td>
                            @foreach($kerusakan->gejalas as $gejala)
                                <span class="badge bg-info">
                                    {{ $gejala->kode_gejala }} : {{ $gejala->nama_gejala }}
                                    @if($gejala->solusi)
                                        (Solusi: {{ $gejala->solusi->solusi }})
                                    @endif
                                </span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('admin.kerusakan.edit', $kerusakan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.kerusakan.destroy', $kerusakan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kerusakan ini?');" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
