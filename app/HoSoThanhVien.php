<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoSoThanhVien extends Model
{
    protected $table='hosothanhvien';
    public $timestamps = false;

    function GhiNhanThanhTich(){
        return $this->hasMany(
            'App\GhiNhanThanhTich',
            'id',
            'id_hoso'
        );
    }
}
