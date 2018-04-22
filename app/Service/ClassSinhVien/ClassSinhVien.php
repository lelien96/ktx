<?php
namespace App\Service\ClassSinhVien;

use DB;
use Illuminate\Support\ServiceProvider;

class ClassSinhVien extends ServiceProvider
{
    public static function themSinhVien($request)
    {
        $result = [
            'success' => 0,
            'obj' => '',
            'message' => '',
        ];
        $data = [
            'name' => $request->name,
            'masv' => $request->masv,
            'lopkhoa' => $request->lopkhoa,
            'dienuutien' => $request->dienuutien,
            'maphong' => $request->maphong,
            'ngaysinh' => $request->ngaysinh,
            'quequan' => $request->quequan,
            'email' => $request->email,
            'sodienthoai' => $request->sodt,
            'ghichu' => $request->ghichu,
            'created_at' => date('Y-m-d'),
        ];
        try {
            $check = DB::table('sinhvien')->where('masv', $request->masv)->first();
            if (empty($check)) {
                DB::beginTransaction();
                DB::table('sinhvien')->insert($data);
                DB::commit();
                $result['success'] = 1;
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
        }
        return $result;
    }

    public static function searchSinhVien($request)
    {
        $result = [
            'success' => 0,
            'obj' => '',
            'message' => '',
        ];
        $name = $request->name;
        $masv = $request->masv;
        $check = DB::table('sinhvien');
        if (!empty($name)) {
            $check = $check
                ->where('name', 'like', '%' . $name . '%');
        }
        if (!empty($masv)) {
            $check = $check
                ->orWhere('masv', $masv);
        }
        $check = $check->get();
        if (count($check) == 0) {
            return $result;
        }
        $result['success'] = 1;
        $result['obj'] = $check;
        return $result;
    }
}
