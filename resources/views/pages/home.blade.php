@extends('layouts.app')

@section('content')
    {{-- ============ HERO: manifesto editorial ============ --}}
    <header class="hero hero--editorial">
        <div class="hero-inner">
            <p class="hero-eyebrow">Arsip Bunyi Nusantara</p>
            <h1 class="hero-title">
                Dengar Indonesia,<br>
                <em>dari bilah perunggu hingga dawai bambu.</em>
            </h1>
            <p class="hero-manifesto">
                MuSantara mendokumentasikan alat musik tradisional Indonesia &mdash;
                bunyinya, asalnya, ceritanya. Ketuk gamelannya, telusuri per pulau,
                atau buka arsipnya satu per satu.
            </p>
            <a href="#ruang-bunyi" class="hero-scroll">
                <span>Gulir untuk mendengar</span><i></i>
            </a>
        </div>
    </header>

    {{-- ============ RUANG BUNYI: ensemble gamelan ============ --}}
    <section class="gamelan-section" id="ruang-bunyi">
        <div class="container">
            <p class="section-eyebrow" data-reveal>Ruang Bunyi</p>
            <h2 class="section-title" data-reveal>Satu set gamelan mini</h2>
            <p class="section-sub" data-reveal>Lima alat sungguhan, lima bunyi berbeda &mdash; dari gong ageng yang dalam sampai bonang yang nyaring. Ketuk sesukamu.</p>

            <div class="gamelan-pads" data-reveal>
                <button type="button" class="gamelan-pad pad-gong" data-instrument="gong" data-freq="65.41" aria-label="Gong Ageng">
                    <span class="pad-disc"><span class="pad-boss"></span></span>
                    <span class="pad-name">Gong Ageng</span>
                </button>
                <button type="button" class="gamelan-pad pad-kempul" data-instrument="kempul" data-freq="98.00" aria-label="Kempul">
                    <span class="pad-disc"><span class="pad-boss"></span></span>
                    <span class="pad-name">Kempul</span>
                </button>
                <button type="button" class="gamelan-pad pad-kenong" data-instrument="kenong" data-freq="130.81" aria-label="Kenong">
                    <span class="pad-disc"><span class="pad-boss"></span></span>
                    <span class="pad-name">Kenong</span>
                </button>
                <button type="button" class="gamelan-pad pad-saron" data-instrument="saron" data-freq="164.81" aria-label="Saron">
                    <span class="pad-disc"><span class="pad-boss"></span></span>
                    <span class="pad-name">Saron</span>
                </button>
                <button type="button" class="gamelan-pad pad-bonang" data-instrument="bonang" data-freq="196.00" aria-label="Bonang">
                    <span class="pad-disc"><span class="pad-boss"></span></span>
                    <span class="pad-name">Bonang</span>
                </button>
            </div>

            <p class="gamelan-hint" data-reveal>Nyalakan suara perangkatmu</p>
        </div>
    </section>

    {{-- ============ TELUSURI ============ --}}
    <section class="browse-section">
        <div class="container">
            <div class="search-section">
                <p class="section-eyebrow" data-reveal>Telusuri Arsip</p>
                <h2 class="section-title" data-reveal>Cari alatnya</h2>
                <div class="search-wrapper" data-reveal>
                    <x-search-box />
                </div>

                {{-- RESULT SEARCH (JANGAN DIHAPUS) --}}
                <div id="searchResults" class="row g-4 mt-4"></div>
            </div>
        </div>
    </section>

    {{-- ============ PULAU ============ --}}
    <section class="islands-section">
        <div class="container">
            <p class="section-eyebrow" data-reveal>Jelajah Wilayah</p>
            <h2 class="section-title" data-reveal>Pilih Pulau</h2>
            <div data-reveal>
                @include('partials.map')
            </div>
        </div>
    </section>

    {{-- ============ KOLEKSI ============ --}}
    <section class="collection-section">
        <div class="container">
            <p class="section-eyebrow" data-reveal>Koleksi Pilihan</p>
            <h2 class="section-title" data-reveal>Buka arsipnya</h2>
            <div class="collection-grid">
                @foreach ($featured as $item)
                    <x-card :item="$item" />
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============ QUIZ ============ --}}
    <section class="quiz-invite">
        <div class="container container-narrow">
            <p class="section-eyebrow" data-reveal>Uji Telinga</p>
            <h2 class="section-title" data-reveal>Seberapa kenal kamu dengan bunyinya?</h2>
            <p class="section-sub" data-reveal>Buka tiga arsip alat musik, dan kunci kuisnya akan terbuka.</p>

            <div class="quiz-cta" data-reveal>
                @php
                    $raw = session('explored_count', 0);
                    $count = min($raw, 3);
                @endphp

                <div class="quiz-info">
                    @if ($raw >= 3)
                        Target tercapai
                    @else
                        {{ $count }}/3 eksplor
                    @endif
                </div>

                <div class="quiz-progress-bar">
                    <div class="quiz-progress-fill" style="width: {{ ($count / 3) * 100 }}%"></div>
                </div>

                @if (session('explored_count', 0) < 3)
                    <button id="quizLocked" class="btn-quiz-hero locked">
                        Mulai Kuis
                    </button>

                    <p class="quiz-note">
                        Eksplor minimal 3 alat musik dulu
                    </p>
                @else
                    <a href="/quiz-global" class="btn-quiz-hero">
                        Mulai Kuis
                    </a>
                @endif
            </div>
        </div>
    </section>
@endsection
