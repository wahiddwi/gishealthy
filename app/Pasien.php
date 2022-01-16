<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';

    protected $fillable = ['id_kelurahan', 'id_kecamatan', 'id_wilayah','id_rumahsakit', 'id_kamar', 'usia', 'jenis_kelamin', 'status', 'alamat', 'no_telpon', 'nik'];

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'id_kelurahan', 'id');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id');
    }

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class, 'id_wilayah', 'id');
    }

    public function rumah_sakit()
    {
        return $this->belongsTo(Rumahsakit::class, 'id_rumahsakit', 'id');
    }

    public function laykes()
    {
        return $this->belongsTo(Laykes::class, 'id_rumahsakit', 'id');
    }

    public function jenis_kamar()
    {
        return $this->hasMany(JenisKamar::class, 'id', 'id');
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'id_kamar', 'id');
    }

    public function info_kamar()
    {
        //
    }
}
