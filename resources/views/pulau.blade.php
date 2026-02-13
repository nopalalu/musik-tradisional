@php use Illuminate\Support\Str; @endphp

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="text-align:center; margin-bottom:40px;">
            Alat Musik - {{ $pulau->nama }}
        </h1>

        <div class="row g-4 mt-4">

            @forelse($alat as $item)
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

    </div>
@endsection
