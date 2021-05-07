<?php

namespace App;
use App\Kecamatan;
use App\Kelurahan;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $table = 'wilayah';
    protected $fillable = ['nama'];

    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class, 'id', 'id');
    }

    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class, 'id', 'id');
    }

    public function laykes()
    {
        return $this->hasMany(Laykes::class, 'id', 'id');
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
