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

    $no = str_pad($item->id, 3, '0', STR_PAD_LEFT);
    $origin = optional($item->pulau)->nama;
    $delay = ($item->id % 6) * 70;
@endphp

<a href="{{ url($url) }}" class="arsip-card" data-reveal style="transition-delay: {{ $delay }}ms">
    <span class="arsip-frame"></span>

    <span class="arsip-media">
        <img src="{{ $item->gambar ? gambar_alat($item->gambar) : asset('assets/img/default.png') }}"
            alt="{{ $item->nama }}" loading="lazy">
        <span class="arsip-shine"></span>
        <span class="arsip-tick t1"></span>
        <span class="arsip-tick t2"></span>
        <span class="arsip-tick t3"></span>
        <span class="arsip-tick t4"></span>
        <span class="arsip-no">№ {{ $no }}</span>
    </span>

    <span class="arsip-body">
        @if ($origin)
            <span class="arsip-origin">{{ strtoupper($origin) }}</span>
        @endif

        <span class="arsip-title">{{ $item->nama }}<i>&rarr;</i></span>

        <span class="arsip-desc">{{ Str::limit($item->deskripsi, 60) }}</span>
    </span>
</a>
