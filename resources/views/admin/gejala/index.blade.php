@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>Daftar Gejala</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ url('/admin/gejala') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="kode_gejala" class="form-label">Kode Gejala</label>
                    <input type="text" class="form-control" id="kode_gejala" name="kode_gejala" required>
                </div>
                <div class="mb-3">
                    <label for="nama_gejala" class="form-label">Nama Gejala</label>
                    <input type="text" class="form-control" id="nama_gejala" name="nama_gejala" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Gejala</button>
            </form>
            <hr>
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Gejala</th>
                        <th>Nama Gejala</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gejalas as $index => $gejala)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $gejala->kode_gejala }}</td>
                        <td>{{ $gejala->nama_gejala }}</td>
                        <td>
                            <a href="{{ route('admin.gejala.edit', $gejala->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.gejala.destroy', $gejala->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus gejala ini?');" style="display:inline;">
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
