@extends('Backend.Main.Main')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header"><i class="fa fa-file-text-o"></i> BÀI VIẾT</h3>
    <ol class="breadcrumb">
      <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
      <li><i class="icon_document_alt"></i>Bài viết</li>
      <li><i class="fa fa-file-text-o"></i>Sửa bài viết</li>
    </ol>
  </div>
</div>
@if(\Session::get('post.suaBaiViet') == 2)
<div class="row">
    <div class="panel-body">
        <div class="alert alert-success fade in">
          <button data-dismiss="alert" class="close close-sm" type="button"><i class="icon-remove"></i></button>
          <strong>Well done!</strong> Bài viết đã được chỉnh sửa !
        </div>
    </div>
</div>
@endif
@if(\Session::get('post.suaBaiViet') == 1)
<div class="row">
    <div class="panel-body">
        <div class="alert alert-block alert-danger fade in">
            <button data-dismiss="alert" class="close close-sm" type="button"><i class="icon-remove"></i></button>
            <strong>Oh snap!</strong> Có vấn đề xảy ra trong việc thay đổi bài viết, xin vui lòng thử lại!
        </div>
    </div>
</div>
@endif
<form enctype="multipart/form-data" role="form" method="POST" id="upload_form" action="{{ route('postSuaBaiViet') }}">
    <input type="hidden" name="_token" value="{{ csrf_token()}}">
    <input type="hidden" name="id" value="{{ $data->id }}">
    <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Form Elements
              </header>
              <div class="panel-body">
                <div class="form-horizontal ">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Tiêu đề</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="tieude" value="{{ $data->tieude }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Thứ tự hiển thị</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="tthienthi">
                        @for($i = 1; $i < 10; $i++)
                          @php
                            if ($i == $data->tthienthi) {
                              $selected = "selected";
                            } else {
                              $selected = "";
                            }
                          @endphp
                          <option {{$selected}} value="{{$i}}">{{$i}}</option>
                        @endfor
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Ảnh đại diện</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" id="anhdaidien" name="anhdaidien">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Loại tin</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="loaitin">
                          <option  @if ($data->loaitin == 1)selected @endif value="1">Thông báo</option>
                          <option  @if ($data->loaitin == 2)selected @endif value="2">Tin sinh viên</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Thời gian đăng</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control datetimepicker" value="{{ $data->created_at }}" name="created_at">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Hiển thị trang chủ</label>
                    <div class="col-sm-10">
                      <input @if($data->hienthitrangchu == 1)checked @endif type="checkbox" value="1" name="hienthinoidung">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Tin nổi bật</label>
                    <div class="col-sm-10">
                      <input @if($data->noibat == 1)checked @endif type="checkbox" value="1" class="" name="noibat">
                    </div>
                  </div>
              </div>
            </div>
            </section>
          </div>
    </div>
    <div class="row">
      <!-- CKEditor -->
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Nội dung
          </header>
          <div class="panel-body">
            <div class="form">
                <div class="form-group">
                  <label class="control-label col-sm-2">Nội dung</label>
                  <div class="col-sm-10">
                    <textarea class="form-control ckeditor" name="noidung" rows="6">{{$data->noidung}}</textarea>
                  </div>
                </div>
            </div>
          </div>
        </section>
      </div>
    </div>
    <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
              </header>
              <div class="panel-body">
                <div class="form-horizontal ">
                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Sửa</button>
                    </div>
                  </div>
              </div>
            </div>
            </section>
          </div>
    </div>
</form>
@endsection
@section('script')
@endsection
