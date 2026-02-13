<?php

use Illuminate\Support\Facades\Route;
use App\Models\AlatMusik;
use App\Http\Controllers\Admin\AlatMusikController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\StatistikController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/test', function () {
    return AlatMusik::all();
});

Route::get('/', [HomeController::class, 'index']);

Route::get('/search', [HomeController::class, 'search'])
    ->name('search');;

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/admin/alat', [AlatMusikController::class, 'index']);

Route::post('/admin/alat', [AlatMusikController::class, 'store']);

Route::get('/admin/alat/{id}/edit', [AlatMusikController::class, 'edit']);

Route::put('/admin/alat/{id}', [AlatMusikController::class, 'update']);

Route::delete('/admin/alat/{id}', [AlatMusikController::class, 'destroy']);

Route::get('/admin/statistik', [StatistikController::class, 'index']);

Route::get('/pulau/{nama}', function ($nama) {
    $pulau = \App\Models\Pulau::where('nama', $nama)->firstOrFail();
    $alat = \App\Models\AlatMusik::where('pulau_id', $pulau->id)->get();

    return view('pulau', compact('pulau', 'alat'));
});

Route::get('/alat/{id}', [AlatController::class, 'show']);

Route::post('/quiz/submit', [QuizController::class, 'submit']);
