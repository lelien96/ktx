<div class="head">
    <div class="col-xs-2"><a href="{{ route('trangchu') }}"><img src="{{ asset('img/logo.jpg') }}" height="160" width="160"></a></div>
    <div class="col-xs-6 head-1">
        <div class="col-xs-12">TRƯỜNG ĐẠI HỌC SƯ PHẠM HÀ NỘI</div>
        <div class="col-xs-12">TRUNG TAM QUẢN LÝ KÝ TÚC XÁ</div>
    </div>
    <div class="col-xs-4 head-2">
        <div class="col-xs-12"><i class="fas fa-map-marker-alt"></i><span class="head-3">136 Xuân THủy - Cầu giấy - Hà nội</span></div>
        <div class="col-xs-12 head-4"><i class="fas fa-phone"></i><span class="head-3">024-37547823</span></div>
        <form class="navbar-form navbar-left" action="{{ route('timKiem') }}">
                <div class="form-group">
                  <input id="noidungtimkiem" name="noidung" type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" id="timmkiem" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="col-xs-12 head-4">
        <nav class="navbar navbar-inverse" style="background-color: #007bff !important;">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="{{ route('trangchu') }}" style="color: #fff"><i class="fas fa-home"></i><span class="menu-2">TRANG CHỦ</span></a>
            </div>
            <div class="navbar-header">
              <a class="navbar-brand" href="{{ route('gioiThieu') }}" style="color: #fff">GIỚI THIỆU</a>
            </div>
            <div class="navbar-header">
              <a class="navbar-brand" href="{{ route('sinhVien') }}" style="color: #fff">SINH VIÊN</a>
            </div>
            <div class="navbar-header">
              <a class="navbar-brand" href="{{ route('huongDan') }}" style="color: #fff">HƯỚNG DẪN</a>
            </div>
            <div class="navbar-header">
              <a class="navbar-brand" href="{{ route('soDo') }}" style="color: #fff">SƠ ĐỒ</a>
            </div>
            <div class="navbar-header">
              <a class="navbar-brand" href="{{ route('lienHe') }}" style="color: #fff">LIÊN HỆ</a>
            </div>
            <div class="navbar-header">
              <a class="navbar-brand" href="{{ route('dangNhap') }}" style="color: #fff">ĐĂNG NHẬP</a>
            </div>
            <div class="navbar-header">
              <a class="navbar-brand" href="{{ route('dangky') }}" style="color: #fff">ĐĂNG KÝ</a>
            </div>
          </div>
        </nav>
    </div>
    <div class="col-xs-12">
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="{{asset('img/dhsp1.jpg')}}" alt="Los Angeles" style="height: 400px; width: 100%">
                  </div>

                  <div class="item">
                    <img src="{{asset('img/dhsp2.jpg')}}" alt="Chicago" style="height: 400px; width: 100%">
                  </div>

                  <div class="item">
                    <img src="{{asset('img/dhsp3.jpg')}}" alt="New york" style="height: 400px; width: 100%">
                  </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
    </div>
</div>
