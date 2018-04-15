@extends('Backend.Main.Main')
@section('content')
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-file-text-o"></i> TÀI SẢN</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="{{ route('adminHome') }}">Home</a></li>
          <li><i class="icon_document_alt"></i>Tài sản</li>
          <li><i class="fa fa-file-text-o"></i>Thêm tài sản</li>
        </ol>
      </div>
    </div>
@if(\Session::get('taisan.themtaisan') == 2)
<div class="row">
    <div class="panel-body">
        <div class="alert alert-success fade in">
          <button data-dismiss="alert" class="close close-sm" type="button"><i class="icon-remove"></i></button>
          <strong>Well done!</strong> Cơ sở vật chất đã được thêm mới đã được thêm mới !
        </div>
    </div>
</div>
@endif
@if(\Session::get('taisan.themtaisan') == 1)
<div class="row">
    <div class="panel-body">
        <div class="alert alert-block alert-danger fade in">
            <button data-dismiss="alert" class="close close-sm" type="button"><i class="icon-remove"></i></button>
            <strong>Oh snap!</strong> Có vấn đề xảy ra trong việc tạo mới, xin vui lòng thử lại!
        </div>
    </div>
</div>
@endif
    <form method="post">
    {!! csrf_field() !!}
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
                      <input id="danhmuc" name="danhmuc" type="text" class="form-control">
                      <label id="error_dm" for="cname" class="error" style="display: none;"></label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Loại</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="loai">
                          <option selected="" value="1">Cở sở vật chất chung</option>
                          <option value="2">Cơ sở vật chất phòng</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Số lượng</label>
                    <div class="col-sm-10">
                      <input id="soluong" name="soluong" type="number" class="form-control">
                      <label id="error_sl" for="cname" class="error" style="display: none;"></label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Đơn vị</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="donvi">
                          <option selected="" value="1">Chiếc</option>
                          <option value="2">Bộ</option>
                      </select>
                    </div>
                  </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10"><button id="submit" type="submit" class="btn btn-primary">Thêm danh mục</button></div>
                </div>
              </div>
            </div>
            </section>
          </div>
    </div>
</form>
<div class="modal fade" id="modal-success" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tài Khoản</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div>
                <img class="modal-img-custom" src="{{ asset('img/success.png') }}">
                <span class="modal-content-custom">Thêm tài khoản thành công</span>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-error" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tài Khoản</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div>
                <img class="modal-img-custom" src="{{ asset('img/error.png') }}">
                <span class="modal-content-custom">Tài khoản đã tồn tại</span>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
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
