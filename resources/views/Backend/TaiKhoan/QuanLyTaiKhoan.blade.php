@extends('Backend.Main.Main')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header"><i class="fa fa-file-text-o"></i> TÀI KHOẢN</h3>
    <ol class="breadcrumb">
      <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
      <li><i class="icon_document_alt"></i>Tài khoản</li>
      <li><i class="fa fa-file-text-o"></i>Quản lý tài khoản</li>
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
                <option value="name">Họ Tên</option>
                <option value="masv">Mã Sinh viên</option>
                <option value="lopkhoa">Lớp/Khoa</option>
                <option value="email">Email/Phone</option>
                <option value="chucvu">Quyền hạn</option>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Tài Khoản</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div>
                <img class="modal-img-custom" src="{{ asset('img/error.png') }}">
                <span class="modal-content-custom">Không tìm được thông tin tài khoản nào!</span>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Tài Khoản</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div>
                <img class="modal-img-custom" src="{{ asset('img/error.png') }}">
                <span class="modal-content-custom">Thao tác không thể xóa tài khoản này!</span>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Tài Khoản</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div>
                <img class="modal-img-custom" src="{{ asset('img/success.png') }}">
                <span class="modal-content-custom">Tài khoản được xóa khỏi hệ thống</span>
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
        changTypeSeach();
    });
    $('body').prepend('<div id="wait" class="wait"><img class="loadding" src="{{ asset('img/Spinner.gif') }}"" width="120" height="120" /></div>');
    $('#submit').click(function(){
        var typeSearch = $('#typeSearch').val();
        var textSearch = $('#textSearch').val();
        $.ajax({
            url: '{{ route("ajaxControlUser") }}',
            type: 'POST',
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
                    html+='<th><i class="icon_profile"></i> Họ tên</th>';
                    html+='<th><i class="icon_toolbox"></i> Mã sinh viên</th>';
                    html+='<th><i class="icon_contacts"></i> Lớp/Khoa</th>';
                    html+='<th><i class="icon_mail_alt"></i> Email/Phone</th>';
                    html+='<th><i class="icon_rook"></i> Quyền hạn</th>';
                    html+='<th><i class="icon_cogs"></i> Action</th>';
                    html+='</tr>'
                    $.each(listData,function(value,item){
                        var name = item.name || '';
                        var masv = item.masv || '';
                        var lopkhoa = item.lopkhoa || '';
                        var email = item.email || '';
                        var chucvu = item.chucvu || '';
                        var sott = item.id || '';
                        html+='<tr data-id="'+email+'" data-sott="'+sott+'">';
                        html+='<td>'+name+'</td>';
                        html+='<td>'+masv+'</td>';
                        html+='<td>'+lopkhoa+'</td>';
                        html+='<td>'+email+'</td>';
                        html+='<td>'+chucvu+'</td>';
                        html+='<td>';
                        html+='<div class="btn-group">';
                        html+='<a data-id="'+email+'" class="btn btn-success editUser"><i class="icon_check_alt2"></i></a>';
                        html+='<a id="'+email+'" onClick="delUser(this.id)" class="btn btn-danger delUser"><i class="icon_close_alt2"></i></a>';
                        html+='</div>';
                        html+='</td>';
                        html+='</tr>';
                    });
                    $('#content').html(html);
                } else {
                    $('#modal-error').modal();
                }
                editUser();
            },
        });
    });
    function delUser(id){
        var element = $('tr[data-id="'+id+'"]');
        $.ajax({
            url: '{{ route("ajaxControlUser") }}',
            type: 'POST',
            data: {
                email: id,
                action: 'delUser',
                "_token": "{{ csrf_token() }}",
            } ,
            success: function (results){
                if (results.success == 1) {
                    element.remove();
                    $('#modal-success-2').modal();
                } else {
                    $('#modal-error-2').modal();
                }
            },
        });
    }
    function editUser(){
        // console.log(e.getAttribute("data-id"));
        $('.editUser').click(function(){
            var id = $(this).parents('tr');
            id = id[0].getAttribute("data-sott");
            var url = "{{ route('changeInforUser', ['id'=>'customId']) }}";
            url = url.replace('customId', id);
            window.location.href = url;
        });
    }
    function changTypeSeach(){
        $('#typeSearch').change(function(){
            var val = $('#typeSearch').val();
            if (val == 'chucvu') {
                var html1 = '<select id="textSearch" class="form-control">';
                html1+='<option value="1">User</option>';
                html1+='<option value="2">Quản trị viên</option>';
                html1+='</select>';
                $('#borderTimKiem').html(html1);
            } else {
                var html2 = '<input id="textSearch" placeholder="Tìm Kiếm" class="form-control" type="" name="">';
                $('#borderTimKiem').html(html2);
            }
        });
    }
</script>
@endsection
