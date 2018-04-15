@extends('Backend.Main.Main')
@section('content')
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-file-text-o"></i> SINH VIÊN</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="{{ route('adminHome') }}">Home</a></li>
          <li><i class="icon_document_alt"></i>Sinh viên</li>
          <li><i class="fa fa-file-text-o"></i>Thêm sinh viên</li>
        </ol>
      </div>
    </div>
    <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Form Elements
              </header>
              <div class="panel-body">
                <div class="form-horizontal ">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Họ và tên sinh viên</label>
                    <div class="col-sm-10">
                      <input id="name" type="text" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Mã sinh viên ( * )</label>
                    <div class="col-sm-10">
                      <input id="masv" type="text" class="form-control">
                      <label id="error_masv" for="cname" class="error" style="display: none;"></label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Lớp Khoa</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="lopkhoa">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Diện ưu tiên</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="dienuutien">
                        <option value="1">Không ưu tiên</option>
                        <option value="2">Ưu tiên</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Mã phòng</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="maphong">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Ngày sinh</label>
                    <div class="col-sm-10">
                      <input id="ngaysinh" class="form-control datetimepicker" type="" name="">
                    </div>
                  </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Quê quán</label>
                    <div class="col-sm-10">
                      <input id="quequan" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="email">
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-2 control-label">Số điện thoại</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="sodt">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ghi chú</label>
                    <div class="col-sm-10">
                      <textarea id="ghichu" style="width: 100%; height: 100px;"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10"><button id="submit" type="button" class="btn btn-primary">Thêm sinh viên</button></div>
                </div>
              </div>
            </div>
            </section>
          </div>
    </div>
<div class="modal fade" id="modal-success" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Sinh viên</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div>
                <img class="modal-img-custom" src="{{ asset('img/success.png') }}">
                <span class="modal-content-custom">Thêm sinh viên thành công</span>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Sinh viên</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div>
                <img class="modal-img-custom" src="{{ asset('img/error.png') }}">
                <span class="modal-content-custom">Mã sinh viên đã tồn tại</span>
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
    $('body').prepend('<div id="wait" class="wait"><img class="loadding" src="{{ asset('img/Spinner.gif') }}"" width="120" height="120" /></div>');
    var error_masv = '';
    $('#masv').focusout(function(){
        checkemail();
    })
    $('#submit').click(function(){
        checkemail();
        if (error_masv == '') {
            var name = $('#name').val();
            var masv = $('#masv').val();
            var lopkhoa = $('#lopkhoa').val();
            var dienuutien = $('#dienuutien').val();
            var maphong = $('#maphong').val();
            var ngaysinh = $('#ngaysinh').val();
            var quequan = $('#quequan').val();
            var email = $('#email').val();
            var sodt = $('#sodt').val();
            var ghichu = $('#ghichu').val();
            $.ajax({
                url: '{{ route("sinhVienAjax") }}',
                type: 'POST',
                data: {
                    name: name,
                    masv: masv,
                    lopkhoa: lopkhoa,
                    dienuutien: dienuutien,
                    maphong: maphong,
                    ngaysinh: ngaysinh,
                    quequan: quequan,
                    email: email,
                    sodt: sodt,
                    ghichu: ghichu,
                    action: 'themSinhVien',
                    "_token": "{{ csrf_token() }}",
                } ,
                success: function (results) {
                    if (results.success == 1) {
                        $('#modal-success').modal();
                    } else {
                        $('#modal-error').modal();
                    }
                },
            });
        } else {
            return false;
        }
    });
    function checkemail(){
        var masv = $('#masv').val();
        if (masv.length == 0) {
            error_email = 'Mã sinh viên không được để trống';
            $('#error_masv').html(error_email);
            $('#error_masv').css('display','block');
        } else {
            error_email = ''
            $('#error_masv').css('display','none');
        }
    }
</script>
@endsection
