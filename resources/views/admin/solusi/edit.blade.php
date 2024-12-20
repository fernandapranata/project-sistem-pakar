@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>Edit Solusi</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.solusi.update', $solusi->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="kode_solusi" class="form-label">Kode Solusi</label>
                    <input type="text" class="form-control" id="kode_solusi" name="kode_solusi" value="{{ $solusi->kode_solusi }}" required>
                </div>
                <div class="mb-3">
                    <label for="kerusakan_id" class="form-label">Kerusakan</label>
                    <select class="form-control" id="kerusakan_id" name="kerusakan_id" required>
                        @foreach($kerusakans as $kerusakan)
                            <option value="{{ $kerusakan->id }}" {{ $solusi->kerusakan_id == $kerusakan->id ? 'selected' : '' }}>
                                {{ $kerusakan->kode_kerusakan }}: {{ $kerusakan->nama_kerusakan }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="solusi" class="form-label">Solusi</label>
                    <textarea class="form-control" id="solusi" name="solusi" rows="3" required>{{ $solusi->solusi }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Perbarui Solusi</button>
            </form>
        </div>
    </div>
</div>
@endsection
