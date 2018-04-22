@extends('Backend.Main.Main')
@section('content')
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-file-text-o"></i> PHÒNG KTX</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="{{ route('adminHome') }}">Home</a></li>
          <li><i class="icon_document_alt"></i>Phòng ký túc xá</li>
          <li><i class="fa fa-file-text-o"></i>Danh sách ký túc xá</li>
        </ol>
      </div>
    </div>
    <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Tổng số: {{ count($danhSachPhong) }} phòng
              </header>
              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th><i class="icon_profile"></i> Mã phòng</th>
                    <th><i class="icon_calendar"></i> Số lượng đặt kỳ I</th>
                    <th><i class="icon_mail_alt"></i> Chỗ trống kỳ I</th>
                    <th><i class="icon_calendar"></i> Số lượng đặt kỳ II</th>
                    <th><i class="icon_mail_alt"></i> Chỗ trống kỳ II</th>
                  </tr>
                  @foreach($danhSachPhong as $value)
                    <tr>
                        <td>{{ $value->maphong }}</td>
                        <td>{{ $value->soluongdat }}</td>
                        <td>{{ $value->chotrong }}</td>
                        <td>{{ $value->soluongdat2 }}</td>
                        <td>{{ $value->chotrong2 }}</td>
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
@endsection
