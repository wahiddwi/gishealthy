<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenagaMedis extends Model
{
    protected $table = 'tenaga_medis';
    protected $fillable = ['id_rumahsakit, id_kelurahan, id_kecamatan, id_wilayah, jumlah_tenaga_medis'];

    public function laykes()
    {
        return $this->belongsTo(Laykes::class, 'id_rumahsakit', 'id');
    }

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
}
