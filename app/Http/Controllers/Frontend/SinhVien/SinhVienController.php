<?php

namespace App\Http\Controllers\Frontend\SinhVien;

use App\Http\Controllers\Controller;
use App\Service\ClassSinhVien\ClassSinhVien;
use Illuminate\Http\Request;

class SinhVienController extends Controller
{
    public function getHome()
    {
        return view('Frontend.SinhVien.SinhVien');
    }

    public function traCuu()
    {
        return view('Frontend.SinhVien.TraCuu');
    }

    public function ajaxSinhVien(Request $request)
    {
        $action = $request->action;
        switch ($action) {
            case 'search':
                $result = ClassSinhVien::searchSinhVien($request);
                break;
            default:
                # code...
                break;
        }
        return response()->json($result);
    }
}
