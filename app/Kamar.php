<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamar';

    protected $fillable = ['id_rumahsakit', 'id_jeniskamar', 'no_kamar', 'status'];

    public function rumah_sakit()
    {
        return $this->belongsTo(Laykes::class, 'id_rumahsakit', 'id');
    }

    public function jenis_kamar()
    {
        return $this->belongsTo(JenisKamar::class, 'id_jeniskamar', 'id');
    }

    public function info_kamar()
    {
        return $this->hasMany(InfoKamar::class, 'id', 'id');
    }

    public function pasien()
    {
        return $this->hasMany(Pasien::class, 'id', 'id');
    }
}
