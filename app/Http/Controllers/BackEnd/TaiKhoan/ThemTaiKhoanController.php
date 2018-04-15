<?php

namespace App\Http\Controllers\BackEnd\TaiKhoan;

use App\Http\Controllers\Controller;
use App\Service\ClassTaiKhoan\ClassTaiKhoan;
use Illuminate\Http\Request;

class ThemTaiKhoanController extends Controller
{
    public function getHome()
    {
        return view('Backend.TaiKhoan.ThemTaiKhoan');
    }

    public function suaTaiKhoan(Request $request)
    {
        dd('sua');
    }

    public function ajax(Request $request)
    {
        $action = $request->action;
        switch ($action) {
            case 'themTaiKhoan':
                $result = ClassTaiKhoan::themTaiKhoan($request);
                break;
            default:
                # code...
                break;
        }
        return response()->json($result);
    }
}
