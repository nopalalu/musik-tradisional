<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuizResult;

class QuizController extends Controller
{
    public function submit(Request $request)
    {
        $isCorrect = $request->is_correct;

        // Cek apakah sudah pernah BENAR sebelumnya
        $alreadyCorrect = QuizResult::where('session_id', session()->getId())
            ->where('alat_musik_id', $request->alat_musik_id)
            ->where('tipe_soal', $request->tipe_soal)
            ->where('is_correct', 1)
            ->exists();

        // Simpan semua percobaan (untuk analisis)
        QuizResult::create([
            'session_id' => session()->getId(),
            'alat_musik_id' => $request->alat_musik_id,
            'tipe_soal' => $request->tipe_soal,
            'is_correct' => $isCorrect
        ]);

        // Tambah skor hanya jika:
        // - Jawaban benar
        // - Belum pernah benar sebelumnya
        if ($isCorrect && !$alreadyCorrect) {
            session()->increment('score', 10);
        }

        return response()->json([
            'score' => session('score', 0)
        ]);
    }
}
