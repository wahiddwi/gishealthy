<?php

namespace App;
use App\User;
use App\Wilayah;
use App\Kecamatan;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table ='kelurahan';
    protected $fillable = ['nama, id_wilayah, id_kecamatan'];

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class, 'id_wilayah', 'id');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }

    public function laykes()
    {
        return $this->hasMany(Laykes::class, 'id', 'id');
    }

    public function tenaga_medis()
    {
        return $this->hasMany(TenagaMedis::class, 'id', 'id');
    }

}
