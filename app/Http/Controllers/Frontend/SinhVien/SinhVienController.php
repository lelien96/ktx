<?php

namespace App\Http\Controllers\Frontend\SinhVien;

use App\Http\Controllers\Controller;
use App\Service\ClassSinhVien\ClassSinhVien;
use App\Service\PhongKTX\ClassPhongKTX;
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
            case 'dangKyPhong':
                $result = ClassPhongKTX::dangKyPhong($request);
                break;
            default:
                # code...
                break;
        }
        return response()->json($result);
    }

    public function dangKyPhong()
    {
        $danhSachPhong = ClassPhongKTX::danhSachPhong();
        foreach ($danhSachPhong as $value) {
            $choTrong[$value->maphong] = $value->chotrong;
            $choTrong2[$value->maphong] = $value->chotrong2;
        }
        $choTrong['none'] = '';
        $choTrong2['none'] = '';
        return view('Frontend.SinhVien.DangKyPhong', [
            'danhSachPhong' => $danhSachPhong,
            'choTrong' => $choTrong,
            'choTrong2' => $choTrong2,
        ]);
    }
}
