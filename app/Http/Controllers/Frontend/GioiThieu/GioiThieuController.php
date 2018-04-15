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
}
