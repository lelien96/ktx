<?php

namespace App\Http\Controllers\Frontend\GioiThieu;

use App\Http\Controllers\Controller;
use App\Service\ClassBaiViet\ClassBaiViet;

class GioiThieuController extends Controller
{
    public function getHome()
    {
        $data = ClassBaiViet::tinGioiThieu();
        return view('Frontend.GioiThieu.GioiThieu', ['data' => $data]);
    }

    public function soDo()
    {
        $data = ClassBaiViet::tinSoDo();
        return view('Frontend.SoDo.SoDo', ['data' => $data]);
    }

    public function lienHe()
    {
        $data = ClassBaiViet::tinLienHe();
        return view('Frontend.LienHe.LienHe', ['data' => $data]);
    }

    public function huongDan()
    {
        $data = ClassBaiViet::loaiTin(6);
        return view('Frontend.GioiThieu.HuongDan', ['data' => $data]);
    }

    public function dichVu()
    {
        $data = ClassBaiViet::loaiTin(7);
        return view('Frontend.GioiThieu.DichVu', ['data' => $data]);
    }

    public function noiQuy()
    {
        $data = ClassBaiViet::loaiTin(8);
        return view('Frontend.GioiThieu.NoiQuy', ['data' => $data]);
    }

    public function video()
    {
        $data = ClassBaiViet::loaiTin(9);
        return view('Frontend.GioiThieu.Video', ['data' => $data]);
    }

    public function coSoVatChat()
    {
        $data = ClassBaiViet::loaiTin(10);
        return view('Frontend.GioiThieu.CoSoVatChat', ['data' => $data]);
    }
}
