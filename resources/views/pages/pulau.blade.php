@extends('layouts.app')

@section('content')
    <div class="container">

        <!-- TITLE -->
        <h1 class="title-page">
            Alat Musik - {{ $pulau->nama }}
        </h1>

        <!-- SKELETON LOADER -->
        <div id="pageLoader" class="mt-4">
            <div class="row g-4">
                @for ($i = 0; $i < 6; $i++)
                    <div class="col-12 col-sm-6 col-md-4">
                        <x-skeleton-card />
                    </div>
                @endfor
            </div>
        </div>

        <!-- REAL CONTENT -->
        <div id="realContent" class="mt-4" style="display:none;">
            <div class="row g-4">

                <!-- EMPTY STATE -->
                @if ($alat->isEmpty())
                    <div class="text-center mt-4">
                        <p>Tidak ada data alat musik di pulau ini</p>
                    </div>
                @endif

                <!-- LIST DATA -->
                @foreach ($alat as $index => $item)
                    <div class="col-12 col-sm-6 col-md-4" data-aos="fade-up" data-aos-delay="{{ ($index % 6) * 100 }}">

                        <x-card :item="$item" />

                    </div>
                @endforeach

            </div>
        </div>

    </div>
@endsection
