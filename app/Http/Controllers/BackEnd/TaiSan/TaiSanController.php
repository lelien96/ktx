<?php

namespace App\Http\Controllers\BackEnd\TaiSan;

use App\Http\Controllers\Controller;
use App\Service\ClassTaiSan\ClassTaiSan;
use Illuminate\Http\Request;
use Session;

class TaiSanController extends Controller
{
    public function getHome()
    {
        Session::forget('taisan.themtaisan');
        return view('Backend.TaiSan.ThemTaiSan');
    }

    public function themTaisan(Request $request)
    {
        $result = ClassTaiSan::themTaiSan($request);
        if (true == $result) {
            Session::flash('taisan.themtaisan', 2);
        } else {
            Session::flash('taisan.themtaisan', 1);
        }
        return back();
    }

    public function quanLyTaiSan()
    {
        return view('Backend.TaiSan.QuanLyTaiSan');
    }

    public function ajax(Request $request)
    {
        $action = $request->action;
        switch ($action) {
            case 'search':
                $result = ClassTaiSan::search($request);
                break;
            case 'delTaiSan':
                $result = ClassTaiSan::delTaiSan($request);
                break;
            default:
                # code...
                break;
        }
        return response()->json($result);
    }

    public function suaTaiSan(Request $request)
    {
        $result = ClassTaiSan::suaTaiSan($request);
        if (0 == $result['success']) {
            return redirect()->route('adminHome');
        } else {
            $data = $result['obj'];
            return view('Backend.TaiSan.SuaTaiSan', ['data' => $data]);
        }
    }

    public function suaTaiSanDB(Request $request)
    {
        $result = ClassTaiSan::updateInforTaiSan($request);
        if (1 == $result['success']) {
            Session::flash('taisan.suaTaiSan', 2);
        } else {
            Session::flash('taisan.suaTaiSan', 1);
        }
        return back();
    }
}
