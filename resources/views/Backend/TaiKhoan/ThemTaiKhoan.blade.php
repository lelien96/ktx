@extends('Backend.Main.Main')
@section('content')
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-file-text-o"></i> TÀI KHOẢN</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
          <li><i class="icon_document_alt"></i>Tài khoản</li>
          <li><i class="fa fa-file-text-o"></i>Thêm tài khoản</li>
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
                    <label class="col-sm-2 control-label">Họ và tên</label>
                    <div class="col-sm-10">
                      <input id="name" type="text" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Quyền</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="chucvu">
                          <option selected="" value="1">Thành viên</option>
                          <option value="2">Quản trị viên</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Giới tính</label>
                    <div class="col-sm-10">
                      <select class="form-control">
                          <option selected="" value="1">Nam</option>
                          <option value="2">Nữ</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Ngày sinh</label>
                    <div class="col-sm-10">
                      <input class="form-control datetimepicker" type="" name="">
                    </div>
                  </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Mã sinh viên</label>
                    <div class="col-sm-10">
                      <input id="masv" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Lớp Khoa</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="lopkhoa">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Email/ Số điện thoại*</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="email">
                      <label id="error_email" for="cname" class="error" style="display: none;"></label>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-2 control-label">Mật khẩu*</label>
                    <div class="col-sm-10">
                      <input id="password" type="password" class="form-control">
                      <label id="error_password" for="cname" class="error" style="display: none;"></label>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-2 control-label">Nhập lại mật khẩu*</label>
                    <div class="col-sm-10">
                      <input id="repassword" type="password" class="form-control">
                      <label id="error_repassword" for="cname" class="error" style="display: none;"></label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10"><button id="submit" type="button" class="btn btn-primary">Thêm tài khoản</button></div>
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
    $('body').prepend('<div id="wait" class="wait"><img class="loadding" src="{{ asset('img/Spinner.gif') }}"" width="120" height="120" /></div>');
    var error_email = '';
    var error_repassword = '';
    var error_password = '';
    var password = '';
    var repassword = '';
    $('#email').focusout(function(){
        checkemail();
    })
    $('#password').focusout(function(){
        checkPassword();
    })
    $('#repassword').focusout(function(){
        checkRepassword();
    })
    $('#submit').click(function(){
        checkemail();
        checkPassword();
        checkRepassword();
        if (error_email == '' && error_password == '' && error_repassword == '') {
            var name = $('#name').val();
            var masv = $('#masv').val();
            var lopkhoa = $('#lopkhoa').val();
            var chucvu = $('#chucvu').val();
            var email = $('#email').val();
            var password = $('#password').val();
            $.ajax({
                url: '{{ route("ajaxUser") }}',
                type: 'POST',
                data: {
                    name: name,
                    masv: masv,
                    lopkhoa: lopkhoa,
                    chucvu: chucvu,
                    email: email,
                    password: password,
                    action: 'themTaiKhoan',
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
    })
    function checkemail(){
        var email = $('#email').val();
        if (email.length == 0) {
            error_email = 'Email không được để trống';
            $('#error_email').html(error_email);
            $('#error_email').css('display','block');
        } else {
            error_email = ''
            $('#error_email').css('display','none');
        }
    }
    function checkPassword(){
        password = $('#password').val();
        if (password.length == 0) {
            error_password = 'Mật khẩu không được để trống';
            $('#error_password').html(error_password);
            $('#error_password').css('display','block');
        } else {
            error_password = ''
            $('#error_password').css('display','none');
        }
    }
    function checkRepassword(){
        repassword = $('#repassword').val();
        if (repassword.length == 0) {
            error_repassword = 'Mật khẩu không được để trống';
            $('#error_repassword').html(error_repassword);
            $('#error_repassword').css('display','block');
        } else {
            error_repassword = '';
            if (repassword != password) {
                error_repassword = 'Mật khẩu xác nhận không đúng';
                $('#error_repassword').html(error_repassword);
                $('#error_repassword').css('display','block');
            } else {
                error_repassword = '';
                $('#error_repassword').css('display','none');
            }
        }
    }
</script>
@endsection
