@extends('Frontend.Main.Main')
@section('title')
Đăng ký
@endsection
@section('content')
<div class="col-xs-12 content-1">
    <div>Họ và tên:*</div>
    <div><input id="name" class="form-control" type="text" name=""></div>
    <div>Lớp/ Khoa:*</div>
    <div><input id="lop" class="form-control" type="text" name=""></div>
    <div>Mã sinh viên:*</div>
    <div><input id="masv" class="form-control" type="text" name=""></div>
    <div>Email/ Số điện thoại:*</div>
    <div><input id="email" class="form-control" type="text" name=""></div>
    <div>Tên người dùng:*</div>
    <div><input id="usename" class="form-control" type="text" name=""></div>
    <div>Mật khẩu:*</div>
    <div><input id="password" class="form-control" type="password" name=""></div>
    <div>Nhập lại mật khẩu:*</div>
    <div><input id="repassword" class="form-control" type="password" name=""></div>
    <div class="error" id="error"></div>
    <div class="error" id="error2"></div>
    <div class="dangky-1"><button id="dangky" type="button" class="btn btn-success">Đăng ký</button><a href="">   Nếu bạn đã có tài khoản mời đăng nhập vào hệ thông</a></div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal-success" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Đăng ký</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div>
                <img class="modal-img-custom" src="{{ asset('img/success.png') }}">
                <span class="modal-content-custom">Đăng ký tài khoản thành công</span>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Đăng ký</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div>
                <img class="modal-img-custom" src="{{ asset('img/error.png') }}">
                <span class="modal-content-custom">Tài khoản đã tòn tại</span>
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
<script type="text/javascript">
    $(document).ready(function(){
        dangKy();
        forcusOut();
    });
    var error = '';
    var error2 = '';
    function dangKy(){
        $('#dangky').click(function(){
            var name = $('#name').val();
            var lop = $('#lop').val();
            var masv = $('#masv').val();
            var email = $('#email').val();
            var usename = $('#usename').val();
            var password = $('#password').val();
            var repassword = $('#repassword').val();
            checkVaidate();
            checkEmail();
            if (error != '' || error2 != '') {
                return false;
            }
            $('body').prepend('<div id="wait" class="wait"><img class="loadding" src="{{ asset('img/Spinner.gif') }}"" width="120" height="120" /></div>');
            $.ajax({
                url: '{{ route("ajaxDangky") }}',
                type: 'GET',
                data: {
                    name: name,
                    lop: lop,
                    masv: masv,
                    email: email,
                    usename: usename,
                    password: password,
                    action: 'register',
                    "_token": "{{ csrf_token() }}",
                } ,
                success: function (results) {
                    if(results.success == 1){
                        $('#modal-success').modal();
                    } else {
                        $('#modal-error').modal();
                    }
                },
            });
        })
    }
    function checkVaidate(){
        var password = $('#password').val();
        var repassword = $('#repassword').val();
        if (password.length  == 0) {
            error = "Mật khẩu không được để trống";
        } else {
            error = '';
            if (repassword != password) {
            error = "Mật khẩu xác nhận không đúng";
            } else {
                error = '';
            }
        }
        $('#error').html(error);
    }
    function checkEmail(){
        var email = $('#email').val();
        if (email == '') {
            error2 = 'Email không được để trống';
        } else {
            error2 = '';
        }
        $('#error2').html(error2);
    }
    function forcusOut () {
        $('#repassword').focusout(function(){
            checkVaidate();
        })
        $('#email').focusout(function(){
            checkEmail();
        })
    }
</script>
@endsection
