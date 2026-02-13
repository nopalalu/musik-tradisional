@extends('layouts.app')

@section('content')
    <div class="container">

        <h2 class="mb-3">Hasil Pencarian</h2>

        <p class="text-muted">
            {{ $totalHasil }} hasil ditemukan
            @if ($q)
                | Kata kunci: <strong>{{ $q }}</strong>
            @endif
            @if ($kategori)
                | Kategori: <strong>{{ $kategori }}</strong>
            @endif
        </p>

        <div class="row g-4 mt-4">

            @forelse($results as $item)
                <div class="col-md-4">
                    <div class="card-custom">
                        <h5>{{ $item->nama }}</h5>

                        @if ($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="img-fluid my-3">
                        @endif

                        <p class="text-muted small">
                            {{ \Illuminate\Support\Str::limit($item->deskripsi, 90) }}
                        </p>

                        <a href="/alat/{{ $item->id }}" class="btn btn-primary btn-sm mt-2">
                            Detail
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-muted text-center mt-4">
                    Data tidak ditemukan
                </p>
            @endforelse

        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $results->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
