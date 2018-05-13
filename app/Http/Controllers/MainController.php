<?php

namespace App\Http\Controllers;
use App\HoSoThanhVien;
use App\GhiNhanThanhTich;
use App\GhiNhanKetThuc;
use App\TangGiamThanhVien;

use Illuminate\Http\Request;

class MainController extends Controller
{
    function getTest(){
        //$ttich = HoSoThanhVien::with('hovaten')->get();
        //$tich = GhiNhanThanhTich::with('HoSoThanhVien')->where('id')->get();
        $tich = GhiNhanThanhTich::all();;
        //dd($data);
        foreach($tich as $d){
            echo $d->hoten;
            echo "<br>";
            dd($tich);
        }
    }
}
