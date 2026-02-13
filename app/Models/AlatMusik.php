<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlatMusik extends Model
{
protected $table = 'alat_musik';
public $timestamps = false;

protected $fillable = [
    'nama',
    'pulau_id',
    'kategori',
    'sumber_bunyi',
    'deskripsi',
    'gambar',
    'audio'
];

public function pulau()
{
    return $this->belongsTo(Pulau::class, 'pulau_id');
}

}
