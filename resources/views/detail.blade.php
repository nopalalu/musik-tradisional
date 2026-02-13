@extends('layouts.app')

@section('content')

<div class="breadcrumb">
    <a href="{{ url('/') }}">Home</a> /
    <a href="{{ url('/pulau/'.$alat->pulau->nama) }}">
        {{ $alat->pulau->nama }}
    </a> /
    {{ $alat->nama }}
</div>

<div class="detail-container">

    <div class="detail-image">
        @if($alat->gambar)
        <img src="{{ asset('storage/'.$alat->gambar) }}">
        @endif
    </div>

    <div class="detail-content">

        <h1>{{ $alat->nama }}</h1>

        <div class="meta">
            Pulau: {{ $alat->pulau->nama }}<br>
            Sumber bunyi: {{ $alat->sumber_bunyi }}<br>
            Kategori: {{ $alat->kategori }}
        </div>

        <p class="description">
            {!! nl2br(e($alat->deskripsi)) !!}
        </p>

        @if($alat->audio)
        <div class="audio-box">
            <h3>Dengarkan Suara</h3>
            <audio controls>
                <source src="{{ asset('storage/'.$alat->audio) }}" type="audio/mpeg">
            </audio>
        </div>
        @endif

        <!-- ===== MODAL KUIS ===== -->
        <button id="btnQuiz" class="btn-primary quiz-trigger">
            Coba Kuis 🎯
        </button>

        <div id="quizModal" class="quiz-modal">
            <div class="quiz-card">

                <h3>Kuis Cepat</h3>

                <p>
                    <strong>{{ $alat->nama }}</strong><br>
                    {{ $pertanyaan }}
                </p>

                <div class="quiz-options"
                    data-correct="{{ $jawabanBenar }}"
                    data-id="{{ $alat->id }}"
                    data-tipe="{{ $tipeSoal }}">

                    @foreach($opsi as $o)
                    <button class="quiz-choice"
                        type="button"
                        data-value="{{ $o }}">
                        {{ $o }}
                    </button>
                    @endforeach

                </div>

                <p id="quiz-feedback"></p>
                
                <p id="scoreBox">Skor: {{ session('score', 0) }}</p>

                <div class="quiz-actions">
                    <button class="quiz-retry" type="button">
                        Coba Lagi 🔁
                    </button>
                    <button class="quiz-close" type="button">
                        Tutup
                    </button>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection