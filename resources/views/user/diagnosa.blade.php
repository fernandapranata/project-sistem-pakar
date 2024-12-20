@extends('layouts.app')

@section('title', 'Form Diagnosa')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-custom p-4">
            <h3 class="text-center mb-4">Diagnosa Kerusakan</h3>
            <form action="{{ route('diagnosa.process') }}" method="POST">
                @csrf
                <h5>Ciri Kerusakan:</h5>
                <div class="form-check">
                    @foreach($gejalas as $gejala)
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="gejala[]" value="{{ $gejala->id }}" id="gejala_{{ $gejala->id }}">
                            <label class="form-check-label" for="gejala_{{ $gejala->id }}">
                                {{ $gejala->nama_gejala }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary mt-3 w-100">Proses Diagnosa</button>
            </form>
        </div>
    </div>
</div>
@endsection
