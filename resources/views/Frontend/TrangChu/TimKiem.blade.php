@extends('Frontend.Main.Main')
@section('title')
TimKiem
@endsection
@section('content')
<div class="col-xs-12 content-1">
    <div class="col-xs-12 gioithieu-1">Tìm Kiếm: {{ $noidung }}</div>
    <div class="col-xs-12 content-1">
        @foreach($baiviet as $value)
            <div class="col-xs-3 pdl-0"><img class="img-rounded trangchu-1" src="{{ $value->anhdaidien }}"></div>
            <div class="col-xs-9 pdr-0"><a href="{{ route('tintuc',['id'=>$value->id]) }}">{{ $value->tieude }}</a></div>
        @endforeach
    </div>
    {!! $baiviet->appends(request()->query())->links() !!}
</div>
@endsection
