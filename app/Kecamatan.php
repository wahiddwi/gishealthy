<?php

namespace App;

use App\Wilayah;
use App\Kelurahan;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';

    protected $fillable = ['nama, id_wilayah'];

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class, 'id_wilayah', 'id');
    }

    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class, 'id', 'id');
    }


    public function laykes()
    {
        return $this->hasMany(Laykes::class, 'id_kecamatan', 'id');
    }

    public function tenaga_medis()
    {
        return $this->hasMany(TenagaMedis::class, 'id', 'id');
    }

    public function pasien()
    {
        return $this->hasMany(Pasien::class, 'id', 'id');
    }
}
