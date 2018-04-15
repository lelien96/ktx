@extends('Frontend.Main.Main')
@section('title')
GioiThieu
@endsection
@section('content')
<div class="col-xs-12 content-1">
    <div class="col-xs-12 gioithieu-1">Tin Tức</div>
    <div class="col-xs-12 content-1">{!! $data->noidung !!}</div>
</div>
@endsection
