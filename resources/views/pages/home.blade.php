@extends('layouts.app')

@section('content')
    <div class="hero">
        <div class="hero-content">

            {{-- ===== TITLE ===== --}}
            <h1 class="hero-title">
                Alat Musik Tradisional Indonesia
            </h1>

            {{-- ===== SUBTITLE (DIPERSINGKAT) ===== --}}
            <p class="hero-subtitle">
                Jelajahi budaya Nusantara secara interaktif
            </p>

            {{-- ===== CTA RINGKAS ===== --}}
            <div class="quiz-cta">

                {{-- TEXT --}}
                @php
                    $raw = session('explored_count', 0);
                    $count = min($raw, 3);
                @endphp

                <div class="quiz-info">
                    @if ($raw >= 3)
                        ✅ Target tercapai
                    @else
                        🎯 {{ $count }}/3 eksplor
                    @endif
                </div>

                <div class="quiz-progress-bar">
                    <div class="quiz-progress-fill" style="width: {{ ($count / 3) * 100 }}%">
                    </div>
                </div>

                {{-- BUTTON --}}
                @if (session('explored_count', 0) < 3)
                    <button id="quizLocked" class="btn-quiz-hero locked">
                        🎮 Mulai Kuis
                    </button>

                    <p class="quiz-note">
                        🔒 Eksplor minimal 3 alat musik dulu
                    </p>
                @else
                    <a href="/quiz-global" class="btn-quiz-hero">
                        🎮 Mulai Kuis
                    </a>
                @endif

            </div>

            {{-- ===== SEARCH ===== --}}
            <div class="search-section">
                <div class="search-wrapper">
                    <x-search-box />
                </div>
            </div>

        </div>

        {{-- RESULT SEARCH (JANGAN DIHAPUS) --}}
        <div id="searchResults" class="row g-4 mt-4"></div>
    </div>


    <div class="container container-custom">

        {{-- ===== MAP ===== --}}
        <h2 class="section-title reveal">Pilih Pulau</h2>

        <div class="reveal">
            @include('partials.map')
        </div>

        {{-- ===== REKOMENDASI ===== --}}
        <h2 class="section-title reveal">Rekomendasi Alat Musik</h2>

        <div class="row g-4">
            @foreach ($featured as $item)
                <div class="col-md-4 reveal">
                    <x-card :item="$item" />
                </div>
            @endforeach
        </div>

    </div>
@endsection
