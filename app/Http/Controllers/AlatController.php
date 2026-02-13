<?php

namespace App\Http\Controllers;

use App\Models\AlatMusik;
use Illuminate\Support\Arr;

class AlatController extends Controller
{
    public function show($id)
    {
        $alat = AlatMusik::with('pulau')->findOrFail($id);

        // ===== LOGIKA KUIS =====
        $tipeSoalList = ['sumber_bunyi', 'kategori'];
        $tipeSoal = Arr::random($tipeSoalList);

        $pertanyaan = '';
        $jawabanBenar = '';
        $opsi = [];

        if ($tipeSoal === 'sumber_bunyi') {
            $pertanyaan = "Alat musik ini termasuk sumber bunyi apa?";
            $jawabanBenar = $alat->sumber_bunyi;
            $opsi = ['Idiofon', 'Aerofon', 'Kordofon', 'Membranofon'];
        } else {
            $pertanyaan = "Alat musik ini dimainkan dengan cara apa?";
            $jawabanBenar = $alat->kategori;

            $semuaKategori = ['Petik', 'Pukul', 'Tiup', 'Gesek', 'Goyang'];
            $opsi = array_diff($semuaKategori, [$jawabanBenar]);
            shuffle($opsi);
            $opsi = array_slice($opsi, 0, 3);
            $opsi[] = $jawabanBenar;
        }

        shuffle($opsi);

        return view('detail', compact(
            'alat',
            'pertanyaan',
            'jawabanBenar',
            'opsi',
            'tipeSoal'
        ));
    }
}
