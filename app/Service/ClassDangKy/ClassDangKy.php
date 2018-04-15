<?php
namespace App\Service\ClassDangKy;

use DB;
use Illuminate\Support\ServiceProvider;

class ClassDangKy extends ServiceProvider
{
    public static function Register($request)
    {
        $result = [
            'success' => 0,
            'obj' => '',
            'message' => '',
        ];
        $name = $request->name;
        $lop = $request->lop;
        $masv = $request->masv;
        $email = $request->email;
        $usename = $request->usename;
        $password = $request->password;
        $password = md5($password);
        $checkEmail = DB::table('users')
            ->where('email', $email)->first();
        if (empty($checkEmail)) {
            DB::table('users')
                ->insert([
                    'name' => $name,
                    'masv' => $masv,
                    'lopkhoa' => $lop,
                    'email' => $email,
                    'password' => $password,
                    'created_at' => date('Y-m-d H:s:i'),
                ]);
            $result['success'] = 1;
        }
        return $result;
    }
}
