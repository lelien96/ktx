<?php

namespace App\Http\Controllers\Backend\DangXuat;

use App\Http\Controllers\Controller;
use Session;

class DangXuatControler extends Controller
{
    public function dangXuat()
    {
        Session::flush();
        return redirect(route('dangNhap'));
    }
}
