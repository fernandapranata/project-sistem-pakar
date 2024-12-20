@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>Daftar Solusi</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ url('/admin/solusi') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="kode_solusi" class="form-label">Kode Solusi</label>
                    <input type="text" class="form-control" id="kode_solusi" name="kode_solusi" required>
                </div>
                <div class="mb-3">
                    <label for="kerusakan_id" class="form-label">Kerusakan</label>
                    <select class="form-control" id="kerusakan_id" name="kerusakan_id" required>
                        @foreach($kerusakans as $kerusakan)
                            <option value="{{ $kerusakan->id }}">
                                {{ $kerusakan->kode_kerusakan }}: {{ $kerusakan->nama_kerusakan }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="solusi" class="form-label">Solusi</label>
                    <textarea class="form-control" id="solusi" name="solusi" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Solusi</button>
            </form>
            <hr>
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Solusi</th>
                        <th>Kerusakan</th>
                        <th>Solusi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($solusis as $index => $solusi)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $solusi->kode_solusi }}</td>
                        <td>{{ $solusi->kerusakan->nama_kerusakan }}</td> <!-- Removed Kode Kerusakan from here -->
                        <td>{{ $solusi->solusi }}</td>
                        <td>
                            <a href="{{ route('admin.solusi.edit', $solusi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ url('/admin/solusi/' . $solusi->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus solusi ini?');" style="display:inline;">
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
