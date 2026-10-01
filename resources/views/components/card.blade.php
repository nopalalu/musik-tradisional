@php
    use Illuminate\Support\Str;

    $url = '/alat/' . $item->id;

    if (request()->routeIs('pulau.*') || request()->segment(1) === 'pulau') {
        $url .= '?from=pulau&slug=' . request()->segment(2);
    }

    if (request()->has('q') && request()->segment(1) === 'search') {
        $query = request('q');
        $url .= '?from=search&q=' . urlencode($query);
    }
@endphp

<div class="card-custom">
    <div class="card-img-wrapper">

        <img src="{{ $item->gambar ? gambar_alat($item->gambar) : asset('assets/img/default.png') }}"
            alt="{{ $item->nama }}" loading="lazy">

    </div>

    <div class="card-body">
        <h5>{{ $item->nama }}</h5>

        <p class="card-desc">
            {{Str::limit($item->deskripsi, 40) }}
        </p>

        <a href="{{ url($url) }}" class="btn-detail">
            Lihat Detail →
        </a>
    </div>
</div>
