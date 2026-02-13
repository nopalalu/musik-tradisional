@extends('layouts.app')

@section('content')
    <div class="hero">
        <h1 class="hero-title">Alat Musik Tradisional Indonesia</h1>
        <p class="hero-subtitle">
            Jelajahi kekayaan budaya Nusantara secara interaktif.
        </p>

        <div class="search-wrapper">
            <form action="{{ route('search') }}" method="GET" class="search-box">
                <input type="text" name="q" placeholder="Cari alat musik...">
                <select name="kategori">
                    <option value="">Semua Kategori</option>
                    <option>Petik</option>
                    <option>Pukul</option>
                    <option>Tiup</option>
                    <option>Gesek</option>
                    <option>Goyang</option>
                </select>
                <button type="submit">Cari</button>
            </form>
        </div>
    </div>


    <div class="container">

        <h2 class="section-title reveal">Pilih Pulau</h2>

        <div class="reveal">
            @include('partials.map')
        </div>

        <h2 class="section-title reveal">Rekomendasi Alat Musik</h2>

        <div class="row g-4">
            @foreach ($featured as $item)
                <div class="col-md-4 reveal">
                    <div class="card p-3">
                        <h5>{{ $item->nama }}</h5>

                        @if ($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="img-fluid mb-3">
                        @endif

                        <p class="text-muted small">
                            {{ \Illuminate\Support\Str::limit($item->deskripsi, 80) }}
                        </p>

                        <a href="/alat/{{ $item->id }}" class="btn btn-primary btn-sm">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
