@extends('layouts.admin')

@section('content')
    <h1>Data Alat Musik</h1>
    <h2>Tambah Alat Musik</h2>

    <form action="/admin/alat" method="POST" enctype="multipart/form-data">

        @csrf

        <input type="text" name="nama" placeholder="Nama"><br><br>

        <select name="pulau_id">
            @foreach ($alat->unique('pulau_id') as $item)
                <option value="{{ $item->pulau_id }}">
                    {{ $item->pulau->nama ?? '-' }}
                </option>
            @endforeach
        </select><br><br>

        <select name="kategori">
            <option>Pukul</option>
            <option>Petik</option>
            <option>Tiup</option>
            <option>Gesek</option>
            <option>Ansambel</option>
        </select><br><br>

        <select name="sumber_bunyi">
            <option>Idiofon</option>
            <option>Aerofon</option>
            <option>Kordofon</option>
            <option>Membranofon</option>
        </select>
        <br><br>

        <label>Gambar</label>
        <input type="file" name="gambar"><br><br>

        <label>Audio</label>
        <input type="file" name="audio"><br><br>


        <textarea name="deskripsi" placeholder="Deskripsi"></textarea><br><br>

        <button type="submit">Tambah</button>
    </form>

    <hr>

    <table border="1" cellpadding="10">
        <tr>
            <th>Nama</th>
            <th>Pulau</th>
            <th>Kategori</th>
            <th>Sumber Bunyi</th>
            <th>Gambar</th>
            <th>Audio</th>
            <th>Aksi</th>
        </tr>

        @foreach ($alat as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->pulau->nama ?? '-' }}</td>
                <td>{{ $item->kategori }}</td>
                <td>{{ $item->sumber_bunyi }}</td>

                <td>
                    @if ($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" width="80" loading="lazy">
                    @else
                        -
                    @endif
                </td>

                <td>
                    @if ($item->audio)
                        <audio controls width="150">
                            <source src="{{ asset('storage/' . $item->audio) }}" type="audio/mpeg">
                        </audio>
                    @endif
                </td>

                <td>
                    <form action="/admin/alat/{{ $item->id }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-center mt-4">
        {{ $alat->links('pagination::bootstrap-5') }}
    </div>
@endsection
