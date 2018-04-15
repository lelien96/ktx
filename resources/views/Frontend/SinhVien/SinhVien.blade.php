@extends('Frontend.Main.Main')
@section('title')
Sinh Viên
@endsection
@section('content')
@if(Session::has('user.id'))
<div class="col-xs-12 content-1">
    <div class="col-xs-12 gioithieu-1">Sinh viên</div>
    <div><a href="{{ route('traCuuSinhVien') }}">Tra cứu đơn đăng ký</div>
    <div><a href="">Đăng ký phòng</div>
</div>
@else
<div class="col-xs-12 content-1">
    <div class="col-xs-12 gioithieu-1">Sinh viên</div>
    <div class="col-xs-12 content-1">
        Bạn phải <a href="{{ route('dangNhap') }}">đăng nhập</a> để xem được mục này!
    </div>
</div>
@endif
@endsection
