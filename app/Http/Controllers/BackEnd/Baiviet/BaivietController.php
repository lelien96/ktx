<?php

namespace App\Http\Controllers\Backend\Baiviet;

use App\Http\Controllers\Controller;
use App\Service\ClassBaiViet\ClassBaiViet;
use Illuminate\Http\Request;
use Session;

class BaivietController extends Controller
{
    public function getHome(Request $request)
    {
        return view('Backend.BaiViet.ThemBaiViet');
    }

    public function themBaiViet(Request $request)
    {
        $result = ClassBaiViet::themBaiViet($request);
        if (true == $result) {
            Session::flash('post.themBaiViet', 2);
        } else {
            Session::flash('post.themBaiViet', 1);
        }
        return back()->withInput();
    }

    public function ajax(Request $request)
    {
        $action = $request->action;
        switch ($action) {
            case 'search':
                $result = ClassBaiViet::search($request);
                break;
            case 'delPost':
                $result = ClassBaiViet::delPost($request);
                break;
            default:
                # code...
                break;
        }
        return response()->json($result);
    }

    public function quanLyBaiViet()
    {
        return view('Backend.BaiViet.QuanLyBaiViet');
    }

    public function suaBaiViet($id)
    {
        $result = ClassBaiViet::editPost($id);
        if (0 == $result['success']) {
            return redirect()->route('adminHome');
        } else {
            $data = $result['obj'];
            return view('Backend.BaiViet.SuaBaiViet', ['data' => $data]);
        }
    }

    public function postSuaBaiViet(Request $request)
    {
        $id = $request->id;
        $result = ClassBaiViet::postSuaBaiViet($request);
        if (true == $result) {
            Session::flash('post.suaBaiViet', 2);
        } else {
            Session::flash('post.suaBaiViet', 1);
        }
        return redirect()->route('suaBaiViet', ['id' => $id]);
    }
}
