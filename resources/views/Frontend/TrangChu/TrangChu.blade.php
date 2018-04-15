@extends('Frontend.Main.Main')
@section('title')
Trang chủ
@endsection
@section('content')
<div class="col-xs-12 content-1">
    <div class="col-xs-12 dangnhap-1">Tin tức</div>
    <div class="col-xs-12 dangky-1 pdl-0 pdr-0">
        @if(!empty($data['firstTinThongBao']))
            <div class="col-xs-3 pdl-0"><a href="{{route('tintuc',['id'=>$data['firstTinThongBao']->id])}}"><img class="img-rounded trangchu-1" src="{{ asset($data['firstTinThongBao']->anhdaidien) }}"></a></div>
            <div class="col-xs-9 pdr-0"><a href="{{route('tintuc',['id'=>$data['firstTinThongBao']->id])}}">{{ $data['firstTinThongBao']->tieude }}</a></div>
        @endif
    </div>
    <div class="col-xs-12 pdl-0 pdr-0"><hr/></div>
    <div class="col-xs-12 pdl-0 pdr-0">
        @foreach($data['fourTinThongBao'] as $value)
            <div class="col-xs-3 pdl-0 pdr-0">
                <a href="{{route('tintuc',['id'=>$value->id])}}"><img class="img-rounded trangchu-2" src="{{ asset($value->anhdaidien) }}"></a>
                <div class="trangchu-3"><a href="{{route('tintuc',['id'=>$value->id])}}">{{ $value->tieude }}</a></div>
            </div>
        @endforeach
    </div>
    <div class="col-xs-12 dangnhap-1 trangchu-4">Hoạt động sinh viên</div>
    <div class="col-xs-12 dangky-1 pdl-0 pdr-0">
        @if(!empty($data['firstTinSinhVien']))
            <div class="col-xs-3 pdl-0"><a  href="{{route('tintuc',['id'=>$data['firstTinSinhVien']->id])}}"><img class="img-rounded trangchu-1" src="{{ asset($data['firstTinSinhVien']->anhdaidien) }}"></a></div>
            <div class="col-xs-9 pdr-0"><a href="{{route('tintuc',['id'=>$data['firstTinSinhVien']->id])}}">{{ $data['firstTinSinhVien']->tieude }}</a></div>
        @endif
    </div>
    <div class="col-xs-12 pdl-0 pdr-0"><hr/></div>
    <div class="col-xs-12 pdl-0 pdr-0">
        @foreach($data['fourTinSinhVien'] as $value)
            <div class="col-xs-3 pdl-0 pdr-0">
                <a href="{{route('tintuc',['id'=>$value->id])}}"><img class="img-rounded trangchu-2" src="{{ asset($value->anhdaidien) }}"></a>
                <div class="trangchu-3"><a href="{{route('tintuc',['id'=>$value->id])}}">{{ $value->tieude }}</a></div>
            </div>
        @endforeach
    </div>
</div>
@endsection
