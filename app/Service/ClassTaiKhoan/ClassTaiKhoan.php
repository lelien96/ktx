<?php
namespace App\Service\ClassTaiKhoan;

use DB;
use Illuminate\Support\ServiceProvider;

class ClassTaiKhoan extends ServiceProvider
{
    public static function themTaiKhoan($request)
    {
        $result = [
            'success' => 0,
            'obj' => '',
            'message' => '',
        ];
        $name = $request->name;
        $masv = $request->masv;
        $lopkhoa = $request->lopkhoa;
        $chucvu = $request->chucvu;
        $email = $request->email;
        $password = $request->password;
        $password = md5($password);
        $check = DB::table('users')->where('email', $email)->first();
        if (!empty($check)) {
            return $result;
        }
        try {
            DB::beginTransaction();
            DB::table('users')
                ->insert([
                    'name' => $name,
                    'masv' => $masv,
                    'lopkhoa' => $lopkhoa,
                    'chucvu' => $chucvu,
                    'email' => $email,
                    'password' => $password,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
            DB::commit();
            $result['success'] = 1;
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return $result;
    }

    public static function timKiemTaiKhoan($request)
    {
        $result = [
            'success' => 0,
            'obj' => '',
            'message' => '',
        ];
        $textSearch = $request->textSearch;
        $typeSearch = $request->typeSearch;
        $data = DB::table('users')
            ->where($typeSearch, 'like', '%' . $textSearch . '%')
            ->select(
                'users.*',
                DB::raw('CASE WHEN chucvu = "1" THEN "User" WHEN chucvu = "2" THEN "Quản trị viên" WHEN chucvu = "3" THEN "Super Admin" ELSE "Chưa Thiết định" END  as chucvu')
            )
            ->get();
        if (count($data) > 0) {
            $result['success'] = 1;
            $result['obj'] = $data;
        }
        return $result;
    }

    public static function suaTaiKhoan($request)
    {
        $id = $request->id;
        $data = DB::table('users')->where('id', $id)->first();
        return $data;
    }

    public static function suaThongTin($request)
    {
        $result = [
            'success' => 0,
            'obj' => '',
            'message' => '',
        ];
        $name = $request->name;
        $masv = $request->masv;
        $lopkhoa = $request->lopkhoa;
        $chucvu = $request->chucvu;
        $email = $request->email;
        $password = $request->password;
        $password = md5($password);
        $check = DB::table('users')->where('email', $email)->first();
        if (empty($check) || ('3' == $check->chucvu)) {
            return $result;
        }
        try {
            DB::beginTransaction();
            DB::table('users')
                ->where('email', $email)
                ->update([
                    'name' => $name,
                    'masv' => $masv,
                    'lopkhoa' => $lopkhoa,
                    'chucvu' => $chucvu,
                    'password' => $password,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
            DB::commit();
            $result['success'] = 1;
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return $result;
    }

    public static function xoaTaiKhoan($request)
    {
        $result = [
            'success' => 0,
            'obj' => '',
            'message' => '',
        ];
        $email = $request->email;
        $data = DB::table('users')
            ->where('email', $email)
            ->first();
        if (empty($data)) {
            return $result;
        } else {
            if (3 == $data->chucvu) {
                return $result;
            } else {
                DB::table('users')
                    ->where('email', $email)
                    ->delete();
                $result['success'] = 1;
                return $result;
            }
        }
    }
}
