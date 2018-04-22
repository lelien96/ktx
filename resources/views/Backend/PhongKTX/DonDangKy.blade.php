@extends('Backend.Main.Main')
@section('content')
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-file-text-o"></i> PHÒNG KTX</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="{{ route('adminHome') }}">Home</a></li>
          <li><i class="icon_document_alt"></i>Phòng ký túc xá</li>
          <li><i class="fa fa-file-text-o"></i>Đơn đăng ký</li>
        </ol>
      </div>
    </div>
    <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Form Elements
              </header>
              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th><i class="icon_profile"></i> Tên</th>
                    <th><i class="icon_calendar"></i> Mã sinh viên</th>
                    <th><i class="icon_mail_alt"></i> Lớp khoa</th>
                    <th><i class="icon_pin_alt"></i> Mã phòng</th>
                    <th><i class="icon_mobile"></i> CMND</th>
                    <th><i class="icon_cogs"></i> Kỳ I</th>
                    <th><i class="icon_cogs"></i> Kỳ II</th>
                    <th><i class="icon_cogs"></i> Xử lý</th>
                  </tr>
                  @foreach($donDangKy as $key => $value)
                  <tr id="{{ $value->masv }}">
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->masv }}</td>
                    <td>{{ $value->lopkhoa }}</td>
                    <td>{{ $value->cmnd }}</td>
                    <td>{{ $value->maphong }}</td>
                    <td>@if($value->kickhoat == 1)Có @else Không @endif</td>
                    <td>@if($value->kickhoat2 == 1)Có @else Không @endif</td>
                    <td>
                      <div class="btn-group">
                        <a onClick=xetDuyet('{{$value->masv}}') class="btn btn-success"><i class="icon_check_alt2"></i></a>
                        <a onClick=xetHuy('{{$value->masv}}') class="btn btn-danger"><i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
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
                <span class="modal-content-custom" id="textSuccess"></span>
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
                <span class="modal-content-custom">Có lỗi trong quá trình xử lý</span>
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
function xetDuyet(masv){
      $.ajax({
      url: '{{ route("sinhVienAjax") }}',
      type: 'POST',
      data: {
          masv: masv,
          action: 'xetDuyet',
          "_token": "{{ csrf_token() }}",
      } ,
      success: function (results) {
          if (results.success == 1) {
                $('#'+masv).remove();
                $('#textSuccess').html('Thêm đơn đăng ký thành công');
              $('#modal-success').modal();
          } else {
              $('#modal-error').modal();
          }
      },
      });
}
function xetHuy(masv){
    $.ajax({
      url: '{{ route("sinhVienAjax") }}',
      type: 'POST',
      data: {
          masv: masv,
          action: 'xetHuy',
          "_token": "{{ csrf_token() }}",
      } ,
      success: function (results) {
            if (results.success == 1) {
                $('#'+masv).remove();
                $('#textSuccess').html('Đã hủy đơn đăng ký');
                $('#modal-success').modal();
            } else {
                $('#modal-error').modal();
            }
      },
      });
}
</script>
@endsection
