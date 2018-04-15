@extends('Backend.Main.Main')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header"><i class="fa fa-file-text-o"></i> Bài Viết</h3>
    <ol class="breadcrumb">
      <li><i class="fa fa-home"></i><a href="{{ route('adminHome') }}">Home</a></li>
      <li><i class="icon_document_alt"></i>Bài viết</li>
      <li><i class="fa fa-file-text-o"></i>Quản lý bài viết</li>
    </ol>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading" style="min-height: 40px;">
        <div class="col-lg-1">Tìm Kiếm</div>
        <div class="navbar-form col-lg-2" id="borderTimKiem"><input id="textSearch" placeholder="Tìm Kiếm" class="form-control" type="" name=""></div>
        <div class="navbar-form col-lg-2">
            <select class="form-control" id="typeSearch">
                <option value="danhmuc">Danh Mục</option>
                <option value="loai">Loại cơ sở vật chất</option>
            </select>
        </div>
        <div class="col-lg-1"><button class="btn btn-primary" id="submit">Tìm Kiếm</button></div>
      </header>

      <table class="table table-striped table-advance table-hover">
        <tbody id="content">

        </tbody>
      </table>
    </section>
  </div>
</div>
<div class="modal fade" id="modal-error" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tài sản</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div>
                <img class="modal-img-custom" src="{{ asset('img/error.png') }}">
                <span class="modal-content-custom">Không tìm được thông tin danh mục nào!</span>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-error-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tài sản</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div>
                <img class="modal-img-custom" src="{{ asset('img/error.png') }}">
                <span class="modal-content-custom">Thao tác không thể xóa danh mục này!</span>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-success-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tài sản</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div>
                <img class="modal-img-custom" src="{{ asset('img/success.png') }}">
                <span class="modal-content-custom">Danh mục được xóa khỏi hệ thống</span>
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
        // changTypeSeach();
        $('[data-toggle="editPost"]').tooltip();
        $('[data-toggle="delPost"]').tooltip();
    });
    $('body').prepend('<div id="wait" class="wait"><img class="loadding" src="{{ asset('img/Spinner.gif') }}"" width="120" height="120" /></div>');
    $('#submit').click(function(){
        var textSearch = $('#textSearch').val();
        var typeSearch = $('#typeSearch').val();
        $.ajax({
            url: '{{ route("ajaxQuanLyTaiSan") }}',
            type: 'GET',
            data: {
                typeSearch: typeSearch,
                textSearch: textSearch,
                action: 'search',
                "_token": "{{ csrf_token() }}",
            } ,
            success: function (results) {
                if (results.success == 1) {
                    var listData = results.obj;
                    var html = '';
                    html+='<tr>';
                    html+='<th><i class="icon_pens"></i> Danh mục</th>';
                    html+='<th><i class=" icon_search-2"></i> Loại cơ sở vật chất</th>';
                    html+='<th><i class="icon_clock_alt"></i> Số lượng</th>';
                    html+='<th><i class="icon_clock_alt"></i> Đơn vị</th>';
                    html+='<th><i class="icon_cogs"></i> Action</th>';
                    html+='</tr>';
                    $.each(listData,function(value,item){
                        var danhmuc = item.danhmuc || '';
                        var loai = item.loai || '';
                        var soluong = item.soluong || '';
                        var donvi = item.donvi || '';
                        var id = item.id || '';
                        html+='<tr data-id="'+id+'">';
                        html+='<td>'+danhmuc+'</td>';
                        html+='<td>'+loai+'</td>';
                        html+='<td>'+soluong+'</td>';
                        html+='<td>'+donvi+'</td>';
                        html+='<td>';
                        html+='<div class="btn-group">';
                        html+='<a data-toggle="editPost" title="Sửa bài danh mục!" data-id="'+id+'" onClick="editPost('+id+')" class="btn btn-success editPost"><i class="icon_check_alt2"></i></a>';
                        html+='<a data-toggle="editPost" title="Xóa danh mục!" id="'+id+'" onClick="delPost(this.id)" class="btn btn-danger delUser"><i class="icon_close_alt2"></i></a>';
                        html+='</div>';
                        html+='</td>';
                        html+='</tr>';
                    });
                    $('#content').html(html);
                } else {
                    $('#modal-error').modal();
                }
            },
        });
    });
    function delPost(id){
        $.ajax({
            url: '{{ route("ajaxQuanLyTaiSan") }}',
            type: 'GET',
            data: {
                id: id,
                action: 'delTaiSan',
                "_token": "{{ csrf_token() }}",
            } ,
            success: function (results) {
                if (results.success == 1) {
                    $('#modal-success-2').modal();
                } else {

                }
            },
        });
    }
    function editPost(id){
        var url = "{{ route('suaTaiSan', ['id'=>'customId']) }}";
        url = url.replace('customId', id);
        window.location.href = url;
    }
</script>
@endsection
