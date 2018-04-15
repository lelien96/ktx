<?php

namespace App\Http\Controllers\BackEnd\SinhVien;

use App\Http\Controllers\Controller;
use App\Service\ClassSinhVien\ClassSinhVien;
use Illuminate\Http\Request;

class SinhVienController extends Controller
{
    public function themSinhVien()
    {
        return view('Backend.SinhVien.ThemSinhVien');
    }

    public function ajaxSinhVien(Request $request)
    {
        $action = $request->action;
        switch ($action) {
            case 'themSinhVien':
                $result = ClassSinhVien::themSinhVien($request);
                break;

            default:
                # code...
                break;
        }
        return response()->json($result);
    }
}
