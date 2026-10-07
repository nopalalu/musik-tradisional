@extends('layouts.app')

@section('content')
    <div class="hero">
        <div class="hero-content">

            {{-- ===== EYEBROW ===== --}}
            <p class="hero-eyebrow">Arsip Bunyi Nusantara</p>

            {{-- ===== TITLE ===== --}}
            <h1 class="hero-title">
                Alat Musik Tradisional Indonesia
            </h1>

            <div class="hero-rule"></div>

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


        {{-- ===== RUANG BUNYI ===== --}}
    <section class="gamelan-section" data-reveal>
        <p class="gamelan-eyebrow">Ruang Bunyi</p>
        <h2 class="gamelan-title">Sentuh &amp; Dengarkan</h2>
        <p class="gamelan-sub">Lima bilah perunggu bernada pentatonik &mdash; ketuk bilahnya untuk membunyikan.</p>
        <div class="gamelan-pads" id="gamelanPads">
            <button type="button" class="gamelan-pad" data-freq="261.63" aria-label="Nada 1"><span class="pad-boss"></span><span class="pad-num">1</span></button>
            <button type="button" class="gamelan-pad" data-freq="293.66" aria-label="Nada 2"><span class="pad-boss"></span><span class="pad-num">2</span></button>
            <button type="button" class="gamelan-pad" data-freq="329.63" aria-label="Nada 3"><span class="pad-boss"></span><span class="pad-num">3</span></button>
            <button type="button" class="gamelan-pad" data-freq="392.00" aria-label="Nada 5"><span class="pad-boss"></span><span class="pad-num">5</span></button>
            <button type="button" class="gamelan-pad" data-freq="440.00" aria-label="Nada 6"><span class="pad-boss"></span><span class="pad-num">6</span></button>
        </div>
        <p class="gamelan-hint">&#128266; Nyalakan suara perangkatmu</p>
    </section>

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
                <div class="col-md-4">
                    <x-card :item="$item" />
                </div>
            @endforeach
        </div>

    </div>
@endsection
