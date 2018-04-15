<?php

namespace App\Http\Controllers\Backend\TaiKhoan;

use App\Http\Controllers\Controller;
use App\Service\ClassTaiKhoan\ClassTaiKhoan;
use DB;
use Illuminate\Http\Request;

class QuanLyTaiKhoanController extends Controller
{
    public function getHome()
    {
        return view('Backend.TaiKhoan.QuanLyTaiKhoan');
    }

    public function suaTaiKhoan(Request $request)
    {
        $id = $request->id;
        $check = DB::table('users')->where('id', $id)->first();
        if (empty($check)) {
            return redirect()->route('adminAddUser');
        }
        $data = ClassTaiKhoan::suaTaiKhoan($request);
        return view('Backend.TaiKhoan.SuaTaiKhoan', ['data' => $data]);
    }

    public function ajax(Request $request)
    {
        $action = $request->action;
        switch ($action) {
            case 'search':
                $result = ClassTaiKhoan::timKiemTaiKhoan($request);
                break;
            case 'delUser':
                $result = ClassTaiKhoan::xoaTaiKhoan($request);
                break;
            case 'changinfor':
                $result = ClassTaiKhoan::suaThongTin($request);
                break;
            default:
                # code...
                break;
        }
        return response()->json($result);
    }
}
