<?php
namespace App\Service\PhongKTX;

use DB;
use Illuminate\Support\ServiceProvider;

class ClassPhongKTX extends ServiceProvider
{
    public static function taoPhongKtx()
    {
        for ($i = 1; $i <= 30; $i++) {
            if ($i < 10) {
                $i = '0' . $i;
            }
            $maphong = 'KTX' . $i;
            $phongKtx = [
                'maphong' => $maphong,
                'chotrong' => '6',
                'soluongdat' => '0',
                'chotrong2' => '6',
                'soluongdat2' => '0',
                'created_at' => date('Y-m-d'),
            ];
            DB::table('phongktx')
                ->insert($phongKtx);
        }
    }

    public static function danhSachPhong()
    {
        $danhSach = DB::table('phongktx')->orderBy('maphong')->get();
        return $danhSach;
    }

    public static function dangKyPhong($request)
    {
        $result = [
            'success' => 0,
            'obj' => '',
            'message' => '',
        ];
        if ('' == $request->ngaydangky) {
            $ngaydangky = date('Y-m-d');
        } else {
            $ngaydangky = $request->ngaydangky;
        }
        if ('' == $request->ngaysinh) {
            $ngaysinh = '1994-05-24';
        } else {
            $ngaysinh = $request->ngaysinh;
        }
        if (1 == $request->kydangky) {
            $kickhoat = 1;
            $kickhoat2 = '';
            $check = DB::table('sinhvien')
                ->where('masv', $request->masv)
                ->where('kickhoat', '<>', 2)
                ->first();
            if (empty($check)) {
                $data = [
                    'name' => $request->name,
                    'masv' => $request->masv,
                    'lopkhoa' => $request->lopkhoa,
                    'dienuutien' => $request->dienuutien,
                    'maphong' => $request->maphong,
                    'ngaysinh' => $ngaysinh,
                    'quequan' => '',
                    'email' => '',
                    'sodienthoai' => $request->name,
                    'ghichu' => $request->name,
                    'created_at' => $ngaydangky,
                    'cmnd' => $request->cmnd,
                    'kickhoat' => $kickhoat,
                    'kickhoat2' => $kickhoat2,
                ];
                DB::table('sinhvien')->insert($data);
                $result['success'] = 1;
                return $result;
            } else {
                if (1 == $check->kickhoat) {
                    return $result;
                } else {
                }
                $update = DB::table('sinhvien')->where('masv', $request->masv)
                    ->update(['kickhoat' => 1]);
                $result['success'] = 1;
                return $result;
            }
        } else {
            $kickhoat2 = 1;
            $check = DB::table('sinhvien')
                ->where('masv', $request->masv)
                ->where('kickhoat2', '<>', 2)
                ->first();
            if (empty($check)) {
                $data = [
                    'name' => $request->name,
                    'masv' => $request->masv,
                    'lopkhoa' => $request->lopkhoa,
                    'dienuutien' => $request->dienuutien,
                    'maphong' => $request->maphong,
                    'ngaysinh' => $ngaysinh,
                    'quequan' => '',
                    'email' => '',
                    'sodienthoai' => $request->name,
                    'ghichu' => $request->name,
                    'created_at' => $ngaydangky,
                    'cmnd' => $request->cmnd,
                    'kickhoat' => '',
                    'kickhoat2' => $kickhoat2,
                ];
                DB::table('sinhvien')->insert($data);
                $result['success'] = 1;
                return $result;
            } else {
                if (1 == $check->kickhoat2) {
                    return $result;
                } else {
                }
                $update = DB::table('sinhvien')->where('masv', $request->masv)
                    ->update(['kickhoat2' => 1]);
                $result['success'] = 1;
                return $result;
            }
        }
    }

    public static function donDangKy()
    {
        $donDangKy = DB::table('sinhvien')->where('kickhoat', '1')->orWhere('kickhoat2', '1')->get();
        return $donDangKy;
    }

    public static function xetDuyet($request)
    {
        $result = [
            'success' => 0,
            'obj' => '',
            'message' => '',
        ];
        $masv = $request->masv;
        $check = DB::table('sinhvien')->where('masv', $request->masv)->first();
        $maphong = $check->maphong;
        $phongKTX = DB::table('phongktx')->where('maphong', $maphong)->first();
        $updatePhong = $phongKTX->soluongdat;
        $updatePhong2 = $phongKTX->soluongdat2;
        $updateChoTrong = $phongKTX->chotrong;
        $updateChoTrong2 = $phongKTX->chotrong2;
        $kickhoat = $check->kickhoat;
        $kickhoat2 = $check->kickhoat2;
        if (1 == $kickhoat) {
            $update['kickhoat'] = 2;
            $choTrong = 1;
            $updatePhong = $updatePhong + 1;
            $updateChoTrong = $updateChoTrong - 1;
        }
        if (1 == $kickhoat2) {
            $update['kickhoat2'] = 2;
            $choTrong2 = 1;
            $updatePhong2 = $updatePhong2 + 1;
            $updateChoTrong2 = $updateChoTrong2 - 1;
        }
        $dataUpDatePhongKTx = [
            'chotrong' => $updateChoTrong,
            'soluongdat' => $updatePhong,
            'chotrong2' => $updateChoTrong2,
            'soluongdat2' => $updatePhong2,
        ];
        DB::table('phongktx')->where('maphong', $maphong)->update($dataUpDatePhongKTx);
        DB::table('sinhvien')->where('masv', $request->masv)->update($update);
        $result['success'] = 1;
        return $result;
    }

    public static function xetHuy($request)
    {
        $result = [
            'success' => 0,
            'obj' => '',
            'message' => '',
        ];
        $masv = $request->masv;
        $check = DB::table('sinhvien')->where('masv', $request->masv)->first();
        $kickhoat = $check->kickhoat;
        $kickhoat2 = $check->kickhoat2;
        if (1 == $kickhoat) {
            $update['kickhoat'] = '';
        }
        if (1 == $kickhoat2) {
            $update['kickhoat2'] = '';
        }
        DB::table('sinhvien')->where('masv', $request->masv)->update($update);
        $result['success'] = 1;
        return $result;
    }

    public static function danhSach()
    {
        $danhsach = DB::table('sinhvien')
            ->where('kickhoat', '2')
            ->orWhere('kickhoat2', '2')
            ->get();
        return $danhsach;
    }
}
