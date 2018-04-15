@extends('Frontend.Main.Main')
@section('title')
Tra cứu sinh viên
@endsection
@section('content')
<div class="col-xs-12 content-1">
    <div class="col-xs-12 gioithieu-1">Tra cứu sinh viên</div>
    <div class="col-xs-12 tracuu1">Nhập thông tin</div>
    <div class="col-xs-12 tracuu2">Họ và tên :</div>
    <div class="col-xs-12 tracuu2"><input id="name" type="text" class="form-control" name=""></div>
    <div class="col-xs-12 tracuu2">Mã sinh viên :</div>
    <div class="col-xs-12 tracuu2"><input id="masv" type="text" class="form-control" name=""></div>
    <div class="col-xs-12 tracuu2" id="messErr"></div>
    <div class="col-xs-12 tracuu2"><button id="timkiem" class="btn btn-primary">Tìm kiếm</button></div>
    <div class="col-xs-12" style="padding-right: 0px; margin-top: 20px;border: 1px solid; display: none;" id="tableSearch">
        <table class="table table-striped">
            <thead>
              <tr>
                <th>Tên</th>
                <th>Mã sinh viên</th>
                <th>Lớp khoa</th>
                <th>Mã phòng</th>
                <th>Ngày sinh</th>
                <th>Quê quán</th>
                <th>Số điện thoại</th>
              </tr>
            </thead>
            <tbody id="content">
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
$('body').prepend('<div id="wait" class="wait"><img class="loadding" src="{{ asset('img/Spinner.gif') }}"" width="120" height="120" /></div>');
var messErr = '';
$('#timkiem').click(function(){
    var name = $('#name').val();
    var masv = $('#masv').val();
    if (masv == '') {
        messErr = 'Mã sinh viên không được để trống';
        $('#messErr').html('<div style="color:red;">'+messErr+'</div>');
        return false;
    } else {
        $('#messErr').html('');
    }
    $.ajax({
        url: '{{ route("ajaxSinhVien") }}',
        type: 'GET',
        data: {
            name: name,
            masv: masv,
            action: 'search',
            "_token": "{{ csrf_token() }}",
        } ,
        success: function (results) {
            $('#tableSearch').css('display','block');
            if (results.success == 1) {
                var data = results.obj;
                var html = '';
                $.each(data,function(value,item){
                    var name = item.name || '';
                    var masv = item.masv || '';
                    var lopkhoa = item.lopkhoa || '';
                    var maphong = item.maphong || '';
                    var ngaysinh = item.ngaysinh || '';
                    var quequan = item.quequan || '';
                    var sodienthoai = item.sodienthoai || '';
                    html+='<tr>';
                    html+='<td>'+name+'</td>';
                    html+='<td>'+masv+'</td>';
                    html+='<td>'+lopkhoa+'</td>';
                    html+='<td>'+maphong+'</td>';
                    html+='<td>'+ngaysinh+'</td>';
                    html+='<td>'+quequan+'</td>';
                    html+='<td>'+sodienthoai+'</td>';
                    html+='</tr>';
                });
                $('#content').html(html);
            } else {
                $('#content').html('<div style="color:red">Không tim thấy thông tin</div>');
            }
        },
    });
})
</script>
@endsection
