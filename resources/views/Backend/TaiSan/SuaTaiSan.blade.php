@extends('Backend.Main.Main')
@section('content')
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-file-text-o"></i> TÀI SẢN</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="{{ route('adminHome') }}">Home</a></li>
          <li><i class="icon_document_alt"></i>Tài sản</li>
          <li><i class="fa fa-file-text-o"></i>Sửa thông tin tài sản</li>
        </ol>
      </div>
    </div>
@if(\Session::get('taisan.suaTaiSan') == 2)
<div class="row">
    <div class="panel-body">
        <div class="alert alert-success fade in">
          <button data-dismiss="alert" class="close close-sm" type="button"><i class="icon-remove"></i></button>
          <strong>Well done!</strong> Cơ sở vật chất đã được thay đổi !
        </div>
    </div>
</div>
@endif
@if(\Session::get('taisan.suaTaiSan') == 1)
<div class="row">
    <div class="panel-body">
        <div class="alert alert-block alert-danger fade in">
            <button data-dismiss="alert" class="close close-sm" type="button"><i class="icon-remove"></i></button>
            <strong>Oh snap!</strong> Có vấn đề xảy ra trong thay đổi, xin vui lòng thử lại!
        </div>
    </div>
</div>
@endif
    <form method="post" action="{{ route('suaTaiSanDB') }}">
    {!! csrf_field() !!}
    <input name="id" type="hidden"  value="{{ $data->id }}">
    <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Form Elements
              </header>
              <div class="panel-body">
                <div class="form-horizontal ">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Danh Mục</label>
                    <div class="col-sm-10">
                      <input id="danhmuc" name="danhmuc" type="text" class="form-control" value="{{ $data->danhmuc }}">
                      <label id="error_dm" for="cname" class="error" style="display: none;"></label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Loại</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="loai">
                          <option @if($data->loai == 1)selected @endif value="1">Cở sở vật chất chung</option>
                          <option @if($data->loai == 2)selected @endif value="2">Cơ sở vật chất phòng</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Số lượng</label>
                    <div class="col-sm-10">
                      <input id="soluong" name="soluong" type="number" class="form-control" value="{{ $data->soluong }}" >
                      <label id="error_sl" for="cname" class="error" style="display: none;"></label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Đơn vị</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="donvi">
                          <option @if($data->donvi == 1)selected @endif value="1">Chiếc</option>
                          <option @if($data->donvi == 2)selected @endif value="2">Bộ</option>
                      </select>
                    </div>
                  </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10"><button id="submit" type="submit" class="btn btn-primary">Sửa danh mục</button></div>
                </div>
              </div>
            </div>
            </section>
          </div>
    </div>
</form>
@endsection
@section('script')
<script src="{{asset('js/main.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        submit();
    });
    danhmuc = ''
    soluong = '';
    function checkDM(){
        danhmuc = $('#danhmuc').val();
        if (danhmuc == '') {
            danhmuc = 'Danh mục không được để trống';
            $('#error_dm').html(danhmuc);
            $('#error_dm').css('display','block');
        } else {
            danhmuc = '';
            $('#error_dm').html(danhmuc);
            $('#error_dm').css('display','none');
        }
    }
    function checkSL(){
        soluong = $('#soluong').val();
        if (soluong == '') {
            soluong = 'Danh mục không được để trống';
            $('#error_sl').html(soluong);
            $('#error_sl').css('display','block');
        } else {
            soluong = '';
            $('#error_sl').html(soluong);
            $('#error_sl').css('display','none');
        }
    }
    function submit(){
        $('#submit').click(function(){
            checkDM();
            checkSL();
            if (danhmuc != '' || soluong != '') {
                return false;
            } else {
                return true;
            }
        });
    }
</script>
@endsection
