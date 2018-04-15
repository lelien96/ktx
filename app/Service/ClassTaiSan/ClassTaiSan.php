<?php
namespace App\Service\ClassTaiSan;

use DB;
use Illuminate\Support\ServiceProvider;

class ClassTaiSan extends ServiceProvider
{
    public static function themTaiSan($request)
    {
        $data['danhmuc'] = $request->danhmuc;
        $data['loai'] = $request->loai;
        $data['soluong'] = $request->soluong;
        $data['donvi'] = $request->donvi;
        $data['created_at'] = date('Y-m-d');
        try {
            DB::table('csvc')->insert($data);
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    public static function search($request)
    {
        $result = [
            'success' => 0,
            'obj' => '',
            'message' => '',
        ];
        $typeSearch = $request->typeSearch;
        $textSearch = $request->textSearch;
        $data = DB::table('csvc')
            ->where($typeSearch, 'like', '%' . $textSearch . '%')
            ->select(
                'csvc.*',
                DB::raw('(CASE WHEN loai = 1 THEN "Cơ sở vật chất chung" WHEN loai = 2 THEN "Cơ sở vật chất phòng" END) as loai'),
                DB::raw('(CASE WHEN donvi = 1 THEN "Chiếc" WHEN donvi = 2 THEN "Bộ" END) as donvi')
            )
            ->get();
        if (count($data) > 0) {
            $result['success'] = 1;
            $result['obj'] = $data;
        }
        return $result;
    }

    public static function delTaiSan($request)
    {
        $result = [
            'success' => 0,
            'obj' => '',
            'message' => '',
        ];
        $id = $request->id;
        try {
            DB::table('csvc')
                ->where('id', $id)
                ->delete();
            $result['success'] = 1;
        } catch (\Exception $e) {
        }
        return $result;
    }

    public static function suaTaiSan($request)
    {
        $result = [
            'success' => 0,
            'obj' => '',
            'message' => '',
        ];
        $id = $request->id;
        $data = DB::table('csvc')->where('id', $id)->first();
        if (!empty($data)) {
            $result['success'] = 1;
            $result['obj'] = $data;
        }
        return $result;
    }

    public static function updateInforTaiSan($request)
    {
        $result = [
            'success' => 0,
            'obj' => '',
            'message' => '',
        ];
        $data = [
            'danhmuc' => $request->danhmuc,
            'loai' => $request->loai,
            'soluong' => $request->soluong,
            'donvi' => $request->donvi,
        ];
        try {
            DB::beginTransaction();
            DB::table('csvc')
                ->where('id', $request->id)
                ->update($data);
            DB::commit();
            $result['success'] = 1;
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return $result;
    }
}
