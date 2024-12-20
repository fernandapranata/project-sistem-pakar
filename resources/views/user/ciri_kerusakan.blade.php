@extends('layouts.app')

@section('title', 'Ciri-Ciri Kerusakan')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Ciri-Ciri Kerusakan</h1>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kerusakan</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kerusakans as $index => $kerusakan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $kerusakan->nama_kerusakan }}</td>
                    <td>
                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#kerusakanModal{{ $kerusakan->id }}">Detail</button>
                    </td>
                </tr>

                <div class="modal fade" id="kerusakanModal{{ $kerusakan->id }}" tabindex="-1" aria-labelledby="kerusakanModalLabel{{ $kerusakan->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="fw-bold" id="kerusakanModalLabel{{ $kerusakan->id }}">{{ $kerusakan->nama_kerusakan }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h7 class="fw-bold">Ciri Kerusakan/Gejala :</h7>
                                <ul>
                                    @foreach($kerusakan->gejalas as $gejala)
                                        <li>{{ $gejala->nama_gejala }}</li>
                                    @endforeach
                                </ul>
                                <h7 class="fw-bold">Solusi :</h7>
                                <div></div>
                                    @foreach($kerusakan->solusis as $solusi)
                                        {{ $solusi->solusi }}
                                    @endforeach
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
