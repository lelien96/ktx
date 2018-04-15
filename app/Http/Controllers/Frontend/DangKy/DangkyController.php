<?php

namespace App\Http\Controllers\Frontend\DangKy;

use App\Http\Controllers\Controller;
use App\Service\ClassDangKy\ClassDangKy;
use Illuminate\Http\Request;

class DangkyController extends Controller
{
    public function getHome()
    {
        return view('Frontend.DangKy.Dangky');
    }

    public function ajax(Request $request)
    {
        $action = $request->action;
        switch ($action) {
            case 'register':
                $register = ClassDangKy::Register($request);
                $results = $register;
                break;
            default:
                # code...
                break;
        }
        return response()->json($results);
    }
}
