<?php

namespace App\Http\Controllers\BackEnd\SinhVien;

use App\Http\Controllers\Controller;
use App\Service\ClassSinhVien\ClassSinhVien;
use App\Service\PhongKTX\ClassPhongKTX;
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
            case 'xetDuyet':
                $result = ClassPhongKTX::xetDuyet($request);
                break;
            case 'xetHuy':
                $result = ClassPhongKTX::xetHuy($request);
                break;
            default:
                # code...
                break;
        }
        return response()->json($result);
    }

    public function donDangKy()
    {
        $donDangKy = ClassPhongKTX::donDangKy();
        return view('Backend.PhongKTX.DonDangKy', ['donDangKy' => $donDangKy]);
    }

    public function danhSach()
    {
        $danhsach = ClassPhongKTX::danhSach();
        return view('Backend.PhongKTX.DanhSachKTX', ['danhsach' => $danhsach]);
    }

    public function quanLyPhong()
    {
        $danhSachPhong = ClassPhongKTX::danhSachPhong();
        return view('Backend.PhongKTX.QuanLyPhong', ['danhSachPhong' => $danhSachPhong]);
    }
}
