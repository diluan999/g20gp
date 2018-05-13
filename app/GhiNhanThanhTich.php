<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GhiNhanThanhTich extends Model
{
    protected $table='ghinhanthanhtich';
    public $timestamps = false;

    function HoSoThanhVien(){
        return $this->belongsTo(
            'App\HoSoThanhVien',
            'id_hoso', // Id của hồ sơ thành viên
            'id' // id hồ sơ trong bảng ghi nhận thành tich
        );
    }
}
