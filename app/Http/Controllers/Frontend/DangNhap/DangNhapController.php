<?php

namespace App\Http\Controllers\Frontend\DangNhap;

use App\Http\Controllers\Controller;
use App\Service\ClassDangNhap\ClassDangNhap;
use Illuminate\Http\Request;

class DangNhapController extends Controller
{
    public function getHome()
    {
        return view('Frontend/DangNhap.DangNhap');
    }

    public function dangNhap(Request $request)
    {
        $results = ClassDangNhap::Login($request);
        return response()->json($results);
    }
}
