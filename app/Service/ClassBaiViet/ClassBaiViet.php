<?php
namespace App\Service\ClassBaiViet;

use DB;
use Illuminate\Support\ServiceProvider;

class ClassBaiViet extends ServiceProvider
{
    public static function themBaiViet($request)
    {
        $img = $request->anhdaidien;
        if (empty($img)) {
            $imgName = 'img/no-image.jpg';
        } else {
            $imgName = 'img/' . time() . '_' . $img->getClientOriginalName();
            $img->move(public_path('img'), $imgName);
        }
        $tieude = $request->tieude;
        $tthienthi = $request->tthienthi;
        $loaitin = $request->loaitin;
        $created_at = $request->created_at;
        if (empty($created_at)) {
            $created_at = date('Y-m-d H:i:s');
        }
        $hienthinoidung = $request->hienthinoidung;
        $noibat = $request->noibat;
        if (empty($hienthinoidung)) {
            $hienthinoidung = 0;
        }
        if (empty($noibat)) {
            $noibat = 0;
        }
        $noidung = $request->noidung;
        try {
            DB::beginTransaction();
            DB::table('posts')
                ->insert([
                    'tieude' => $tieude,
                    'tthienthi' => $tthienthi,
                    'anhdaidien' => $imgName,
                    'loaitin' => $loaitin,
                    'hienthitrangchu' => $hienthinoidung,
                    'noibat' => $noibat,
                    'noidung' => $noidung,
                    'trangthai' => 0,
                    'created_at' => $created_at,
                ]);
            $result = true;
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $result = false;
        }
        return $result;
    }

    public static function baiVietTrangChu()
    {
        $firstTinThongBao = DB::table('posts')
            ->where('loaitin', 1)
            ->where('hienthitrangchu', 1)
            ->where('tthienthi', 1)
            ->where('trangthai', 0)
            ->orderBy('created_at', 'desc')
            ->first();
        $fourTinThongBao = DB::table('posts')
            ->where('loaitin', 1)
            ->where('tthienthi', 2)
            ->where('trangthai', 0)
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();
        $firstTinSinhVien = DB::table('posts')
            ->where('loaitin', 2)
            ->where('hienthitrangchu', 1)
            ->where('tthienthi', 1)
            ->where('trangthai', 0)
            ->orderBy('created_at', 'desc')
            ->first();
        $fourTinSinhVien = DB::table('posts')
            ->where('loaitin', 2)
            ->where('tthienthi', 2)
            ->where('trangthai', 0)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
        $data['firstTinThongBao'] = $firstTinThongBao;
        $data['fourTinThongBao'] = $fourTinThongBao;
        $data['firstTinSinhVien'] = $firstTinSinhVien;
        $data['fourTinSinhVien'] = $fourTinSinhVien;
        return $data;
    }

    public static function noiDungBaiViet($id)
    {
        $result = [
            'success' => 0,
            'obj' => '',
            'message' => '',
        ];
        $checkId = DB::table('posts')
            ->where('id', $id)
            ->first();
        if (empty($checkId)) {
            return $result;
        } else {
            $result['success'] = 1;
            $result['obj'] = $checkId;
            return $result;
        }
    }

    public static function search($request)
    {
        $result = [
            'success' => 0,
            'obj' => '',
            'message' => '',
        ];
        $textSearch = $request->textSearch;
        $typeSearch = $request->typeSearch;
        if ('' == $textSearch) {
            return $result;
        }
        $data = DB::table('posts')
            ->where($typeSearch, 'like', '%' . $textSearch . '%')
            ->orderBy('created_at')
            ->select(
                'posts.*',
                DB::raw('(CASE WHEN loaitin = "1" THEN "Tin tức" WHEN loaitin = "2" THEN "Tin sinh viên" END) as loaitin')
            )
            ->get();
        if (count($data) == 0) {
            return $result;
        }
        $result['success'] = 1;
        $result['obj'] = $data;
        return $result;
    }

    public static function delPost($request)
    {
        $result = [
            'success' => 0,
            'obj' => '',
            'message' => '',
        ];
        $id = $request->id;
        try {
            DB::beginTransaction();
            DB::table('posts')
                ->where('id', $id)
                ->delete();
            DB::commit();
            $result['success'] = 1;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        return $result;
    }

    public static function editPost($id)
    {
        $result = [
            'success' => 0,
            'obj' => '',
            'message' => '',
        ];
        $checkId = DB::table('posts')
            ->where('id', $id)
            ->first();
        if (empty($checkId)) {
            return $result;
        }
        $result['success'] = 1;
        $result['obj'] = $checkId;
        return $result;
    }

    public static function postSuaBaiViet($request)
    {
        $img = $request->anhdaidien;
        if (empty($img)) {
            $imgName = 'img/no-image.jpg';
        } else {
            $imgName = 'img/' . time() . '_' . $img->getClientOriginalName();
            $img->move(public_path('img'), $imgName);
        }
        $tieude = $request->tieude;
        $tthienthi = $request->tthienthi;
        $loaitin = $request->loaitin;
        $created_at = $request->created_at;
        if (empty($created_at)) {
            $created_at = date('Y-m-d H:i:s');
        }
        $hienthinoidung = $request->hienthinoidung;
        $noibat = $request->noibat;
        if (empty($hienthinoidung)) {
            $hienthinoidung = 0;
        }
        if (empty($noibat)) {
            $noibat = 0;
        }
        $noidung = $request->noidung;
        $id = $request->id;
        try {
            DB::beginTransaction();
            DB::table('posts')
                ->where('id', $id)
                ->update([
                    'tieude' => $tieude,
                    'tthienthi' => $tthienthi,
                    'anhdaidien' => $imgName,
                    'loaitin' => $loaitin,
                    'hienthitrangchu' => $hienthinoidung,
                    'noibat' => $noibat,
                    'noidung' => $noidung,
                    'trangthai' => 0,
                    'created_at' => $created_at,
                ]);
            $result = true;
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $result = false;
        }
        return $result;
    }

    public static function tinGioiThieu()
    {
        $tinGioiThieu = DB::table('posts')
            ->where('loaitin', 3)
            ->orderBy('created_at', 'desc')
            ->first();
        return $tinGioiThieu;
    }

    public static function tinSoDo()
    {
        $tinSoDo = DB::table('posts')
            ->where('loaitin', 4)
            ->orderBy('created_at', 'desc')
            ->first();
        return $tinSoDo;
    }

    public static function tinLienHe()
    {
        $tinLienHe = DB::table('posts')
            ->where('loaitin', 5)
            ->orderBy('created_at', 'desc')
            ->first();
        return $tinLienHe;
    }

    public static function loaiTin($loaiTin)
    {
        $tin = DB::table('posts')
            ->where('loaitin', $loaiTin)
            ->orderBy('created_at', 'desc')
            ->first();
        return $tin;
    }
}
