@extends('layouts.app')

@section('content')
    <div class="container search-page d-flex flex-column">

        <h2 class="mb-3">Hasil Pencarian</h2>

        <p class="text-muted">
            {{ $data->total() }} hasil ditemukan
            @if ($q)
                | Kata kunci: <strong>{{ $q }}</strong>
            @endif
            @if (!empty($kategori))
                | Kategori: <strong>{{ $kategori }}</strong>
            @endif
        </p>

        <div class="row g-4 mt-4">

            @forelse($data as $item)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <x-card :item="$item" />
                </div>
            @empty
                <div class="empty-wrapper">
                    <p class="text-muted empty-state">
                        Data tidak ditemukan
                    </p>
                </div>
            @endforelse

        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $data->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
