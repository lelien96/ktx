<?php

namespace App\Http\Controllers\BackEnd\TrangChu;

use App\Http\Controllers\Controller;

class TrangChuController extends Controller
{
    public function getHome()
    {
        return view('Backend.TrangChu.TrangChu');
    }
}
