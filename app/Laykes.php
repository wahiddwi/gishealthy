<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Laykes extends Model
{
    protected $table = 'rumah_sakit';
    protected $fillable = ['nama_rumahsakit, latitude, longitude, alamat, no_telpon, id_wilayah, id_kecamatan, id_kelurahan'];

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class, 'id_wilayah', 'id');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'id_kelurahan', 'id');
    }

    // public function tenaga_medis()
    // {
    //     return $this->hasMany(TenagaMedis::class, 'id', 'id');
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id', 'id');
    // }

    public function pasien()
    {
        return $this->hasMany(Pasien::class, 'id', 'id');
    }

    public function kamar()
    {
        return $this->hasMany(Kamar::class, 'id_rumahsakit', 'id');
    }

    public function info_kamar()
    {
        return $this->hasMany(InfoKamar::class, 'id', 'id');
    }
}
