@extends('Frontend.Main.Main')
@section('title')
Đăng ký
@endsection
@section('content')
<div class="col-xs-12 content-1">
    <div class="col-xs-12 gioithieu-1">Đăng ký phòng</div>
    <div>Họ và tên</div>
    <div><input disabled="disabled" id="name" class="form-control" type="text" name="" value="{{ Session::get('user.name') }}"></div>
    <div>Mã sinh viên:*</div>
    <div><input disabled="disabled" id="masv" class="form-control" type="text" name="" value="{{ Session::get('user.masv') }}"></div>
    <div>Lớp/ Khoa</div>
    <div><input disabled="disabled" id="lopkhoa" class="form-control" type="text" name="" value="{{ Session::get('user.lopkhoa') }}"></div>
    <div>Diện ưu tiên</div>
    <div>
        <select id="dienuutien" class="form-control">
            <option value="1">Không ưu tiên</option>
            <option value="2">Ưu tiên</option>
        </select>
    </div>
    <div>Ngày sinh</div>
    <div><input id="ngaysinh" class="form-control datetimepicker" type="text" name="" value=""></div>
    <div>Ngày đăng ký</div>
    <div><input id="ngaydangky" class="form-control datetimepicker" type="text" name="" value=""></div>
    <div>Số CMND *</div>
    <div><input id="cmnd" class="form-control" type="text" name=""></div>
    <div>Kỳ đăng ký</div>
    <div>
        <select id="kydangky" class="form-control">
            <option value="1">Kỳ I</option>
            <option value="2">Kỳ II</option>
        </select>
    </div>
    <div>Chọn phòng</div>
    <div>
        <select id="maphong" class="form-control">
            <option value="none">Chưa chọn</option>
            @foreach($danhSachPhong as $value)
            <option value="{{ $value->maphong }}">{{ $value->maphong }}</option>
            @endforeach
        </select>
    </div>
    <div class="giaphong">Giá phòng</div>
    <div class="giaphong"><input disabled="disabled" class="form-control" type="" name="" value="{{number_format(1500000)}}"></div>
    <div class="giaphong">Chỗ trống</div>
    <div class="giaphong"><input id="chotrong" disabled="disabled" class="form-control" type="" name="" value=""></div>
    <div class="error" id="error"></div>
    <div class="dangky-1"><button id="dangky" type="button" class="btn btn-success">Đăng ký</button></div>
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
                <span class="modal-content-custom">Đăng ký phòng thành công</span>
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
                <span class="modal-content-custom">Mã sinh viên đã được đăng ký</span>
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
$('body').prepend('<div id="wait" class="wait"><img class="loadding" src="{{ asset('img/Spinner.gif') }}"" width="120" height="120" /></div>');
var error = '';
var choTrong = <?php echo json_encode($choTrong); ?>;
var choTrong2 = <?php echo json_encode($choTrong2); ?>;
$('#maphong').change(function(){
    var maphong = $('#maphong').val();
    var choTrongNew = choTrong[maphong];
    var choTrongNew2 =choTrong2[maphong];
    var kydangky = $('#kydangky').val();
    if (kydangky == 1) {
        choTrongCon = choTrongNew;
    } else {
        choTrongCon = choTrongNew2;
    }
    $('#chotrong').val(choTrongCon);
    if (maphong == 'none') {
        $('.giaphong').hide();
    } else {
        $('.giaphong').show();
    }

})
$('#dangky').click(function(){
    var name = $('#name').val();
    var masv = $('#masv').val();
    var lopkhoa = $('#lopkhoa').val();
    var dienuutien = $('#dienuutien').val();
    var maphong = $('#maphong').val();
    var ngaydangky = $('#ngaydangky').val();
    var cmnd = $('#cmnd').val();
    var giaphong = '1500000';
    var ngaysinh = $('#ngaysinh').val();
    var kydangky = $('#kydangky').val();
    var choTrong = $('#chotrong').val();
    if (cmnd == '') {
        error = 'Bạn chưa nhập chứng minh thư nhân dân';
    } else {
        error = '';
        if (maphong == 'none') {
        error = 'Bạn chưa chọn phòng';
        } else {
            error = '';
        }
    }
    $('#error').html(error);
    if (error != '' || choTrong == 0) {
        if (choTrong == 0) {
            error = 'Phòng dã hết số lượng dặt';
            $('#error').html(error);
        }
        return false;
    } else {
        $.ajax({
        url: '{{ route("ajaxSinhVien") }}',
        type: 'GET',
        data: {
            name: name,
            masv: masv,
            lopkhoa: lopkhoa,
            dienuutien: dienuutien,
            maphong: maphong,
            ngaydangky: ngaydangky,
            cmnd: cmnd,
            giaphong: giaphong,
            ngaysinh: ngaysinh,
            kydangky: kydangky,
            action: 'dangKyPhong',
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
    }
})
</script>
@endsection
