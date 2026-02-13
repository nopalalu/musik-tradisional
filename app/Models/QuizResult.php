<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    protected $table = 'quiz_results';

    public $timestamps = false;

    protected $fillable = [
        'session_id',
        'alat_musik_id',
        'tipe_soal',
        'is_correct'
    ];
}
