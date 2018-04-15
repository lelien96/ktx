<?php

namespace App\Http\Controllers\Frontend\TrangChu;

use App\Http\Controllers\Controller;
use App\Service\ClassBaiViet\ClassBaiViet;
use DB;
use Illuminate\Http\Request;

class TrangChuController extends Controller
{
    public function getHome()
    {
        $data = ClassBaiViet::baiVietTrangChu();
        return view('Frontend.TrangChu.TrangChu', ['data' => $data]);
    }

    public function noiDungBaiViet(Request $request)
    {
        $id = $request->id;
        $result = ClassBaiViet::noiDungBaiViet($id);
        if (0 == $result['success']) {
            return redirect()->route('trangchu');
        } else {
            $data = $result['obj'];
            return view('Frontend.TinTuc.Tintuc', ['data' => $data]);
        }
    }

    public function timKiem(Request $request)
    {
        $noidung = $request->noidung;
        $data = [];
        if (!empty($noidung)) {
            $data = DB::table('posts')
                ->where('tieude', 'like', '%' . $noidung . '%')
                ->paginate(5);
        }
        return view('Frontend.TrangChu.TimKiem', [
            'baiviet' => $data,
            'noidung' => $noidung,
        ]);
    }
}
