<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisKamar extends Model
{
    protected $table = 'jenis_kamar';

    protected $fillable = ['jenis_kamar'];

    public function kamar()
    {
        return $this->hasMany(Kamar::class, 'id', 'id');
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id');
    }
}
