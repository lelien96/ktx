@extends('Frontend.Main.Main')
@section('title')
Liên hệ
@endsection
@section('content')
<div class="col-xs-12 content-1">
    <div class="col-xs-12 gioithieu-1">Liên hệ</div>
    <div class="col-xs-12 content-1">
        @if(!empty($data))
            {!! $data->noidung !!}
        @endif
    </div>
</div>
@endsection
