@extends('Frontend.Main.Main')
@section('title')
Đăng nhập
@endsection
@section('content')
<div class="col-xs-12 content-1">
    <div class="col-xs-12 dangnhap-1">Đăng Nhập</div>
    <div class="col-xs-12">
        <div class="form-group">
            <label for="email">Tài Khoản</label>
            <input id="email" type="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="pwd">Mật khẩu:</label>
            <input id="password" type="password" class="form-control">
        </div>
        <button id="dangnhap" type="submit" class="btn btn-success">Đăng nhập</button>
        <div class="form-group"><a href="">Bạn quên mật khẩu của mình</a></div>
    </div>
</div>
<div class="modal fade" id="modal-error" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Đăng nhập</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div>
                <img class="modal-img-custom" src="{{ asset('img/error.png') }}">
                <span class="modal-content-custom">Đăng nhập thất bại</span>
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
    dangnhap();
})
function dangnhap(){
    $('body').prepend('<div id="wait" class="wait"><img class="loadding" src="{{ asset('img/Spinner.gif') }}"" width="120" height="120" /></div>');
    $('#dangnhap').click(function(){
        var email = $('#email').val();
        var password = $('#password').val();
        $.ajax({
            url: '{{ route("dangNhap") }}',
            type: 'POST',
            data: {
                email: email,
                password: password,
                action: 'register',
                "_token": "{{ csrf_token() }}",
            } ,
            success: function (results) {
                if(results.success == 1){
                    window.location.href = "{{ route('adminHome') }}";
                } else {
                    $('#modal-error').modal();
                }
            },
        });
    });
}
</script>
@endsection
