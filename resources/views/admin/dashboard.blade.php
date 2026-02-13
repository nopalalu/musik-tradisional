@extends('layouts.admin')

@section('content')
    <h1>Dashboard Admin</h1>

    <div style="display:flex; gap:20px; margin:30px 0;">

        <div style="flex:1; background:#1e293b; padding:20px; border-radius:10px;">
            <h3>Total Alat Musik</h3>
            <p style="font-size:28px;">{{ $totalAlat }}</p>
        </div>

        <div style="flex:1; background:#1e293b; padding:20px; border-radius:10px;">
            <h3>Total Percobaan Kuis</h3>
            <p style="font-size:28px;">{{ $totalQuiz }}</p>
        </div>

        <div style="flex:1; background:#1e293b; padding:20px; border-radius:10px;">
            <h3>Jawaban Benar</h3>
            <p style="font-size:28px;">{{ $totalBenar }}</p>
        </div>

    </div>

    <hr>

    <h2>Menu Admin</h2>

    <div style="display:flex; gap:20px; margin-top:20px;">

        <a href="/admin/alat"
            style="background:#2563eb; padding:15px 25px; border-radius:8px; text-decoration:none; color:white;">
            Kelola Alat Musik
        </a>

        <a href="/admin/statistik"
            style="background:#16a34a; padding:15px 25px; border-radius:8px; text-decoration:none; color:white;">
            Statistik Kuis
        </a>

    </div>
@endsection
