<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', 'Frontend\TrangChu\TrangChuController@getHome')->name('trangchu');
Route::get('/tim-kiem', 'Frontend\TrangChu\TrangChuController@timKiem')->name('timKiem');
Route::get('/tin-tuc/{id}', 'Frontend\TrangChu\TrangChuController@noiDungBaiViet')->name('tintuc');
Route::get('/gioi-thieu', 'Frontend\GioiThieu\GioiThieuController@getHome')->name('gioiThieu');
Route::get('/huong-dan', 'Frontend\GioiThieu\GioiThieuController@huongDan')->name('huongDan');
Route::get('/dich-vu', 'Frontend\GioiThieu\GioiThieuController@dichVu')->name('dichVu');
Route::get('/noi-quy', 'Frontend\GioiThieu\GioiThieuController@noiQuy')->name('noiQuy');
Route::get('/video', 'Frontend\GioiThieu\GioiThieuController@video')->name('video');
Route::get('/co-so-vat-chat', 'Frontend\GioiThieu\GioiThieuController@coSoVatChat')->name('coSoVatChat');
Route::get('/so-do', 'Frontend\GioiThieu\GioiThieuController@soDo')->name('soDo');
Route::get('/lien-he', 'Frontend\GioiThieu\GioiThieuController@lienHe')->name('lienHe');
Route::get('/dang-ky', 'Frontend\DangKy\DangKyController@getHome')->name('dangky');
Route::get('/dang-ky-ajax', 'Frontend\DangKy\DangKyController@ajax')->name('ajaxDangky');
Route::get('/dang-nhap', 'Frontend\DangNhap\DangNhapController@getHome');
Route::post('/dang-nhap', 'Frontend\DangNhap\DangNhapController@dangNhap')->name("dangNhap");
Route::get('/sinh-vien', 'Frontend\SinhVien\SinhVienController@getHome')->name('sinhVien');
Route::get('/tra-cuu-sinh-vien', 'Frontend\SinhVien\SinhVienController@traCuu')->name('traCuuSinhVien')->middleware('CheckDangKySinhVien');
Route::get('/sinh-vien-ajax', 'Frontend\SinhVien\SinhVienController@ajaxSinhVien')->name('ajaxSinhVien');
Route::get('dang-ky-phong', 'Frontend\SinhVien\SinhVienController@dangKyPhong')->name('dangKyPhong');
Route::group(['middleware' => 'checklogin'], function () {
    Route::get('admin/home', 'BackEnd\TrangChu\TrangChuController@getHome')->name('adminHome');
    Route::get('admin/them-tai-khoan', 'BackEnd\TaiKhoan\ThemTaiKhoancontroller@getHome')->name('adminAddUser');
    Route::post('admiun/qly-tk-ajax', 'BackEnd\TaiKhoan\ThemTaiKhoancontroller@ajax')->name('ajaxUser');
    Route::get('admin/quan-ly-tai-khoan', 'Backend\TaiKhoan\QuanLyTaiKhoanController@getHome')->name('adminControlUser');
    Route::post('admin/quan-ly-tai-khoan-ajax', 'Backend\TaiKhoan\QuanLyTaiKhoanController@ajax')->name('ajaxControlUser');
    Route::get('admin/sua-tai-khoan/{id}', 'Backend\TaiKhoan\QuanLyTaiKhoanController@suaTaiKhoan')->name('changeInforUser');
    //Logout
    Route::get('admin/dang-xuat', 'BackEnd\DangXuat\DangXuatControler@dangXuat')->name('logout');
    //Page
    Route::get('admin/them-bai-viet', 'Backend\BaiViet\BaiVietController@getHome')->name('themBaiViet');
    Route::post('admin/them-bai-viet', 'Backend\BaiViet\BaiVietController@themBaiViet');
    Route::get('admin/quan-ly-bai-viet', 'Backend\BaiViet\BaiVietController@quanLyBaiViet')->name('quanLyBaiViet');
    Route::get('admin/sua-bai-viet/{id}', 'Backend\BaiViet\BaiVietController@suaBaiViet')->name('suaBaiViet');
    Route::post('admin/sua-bai-viet', 'Backend\BaiViet\BaiVietController@postSuaBaiViet')->name('postSuaBaiViet');
    Route::post('admin/bai-viet-ajax', 'Backend\BaiViet\BaiVietController@ajax')->name('ajaxBaiviet');
    //Tai san
    Route::get('admin/them-tai-san', 'Backend\TaiSan\TaiSanController@getHome')->name('themTaiSan');
    Route::post('admin/them-tai-san', 'Backend\TaiSan\TaiSanController@themTaisan');
    Route::get('admin/quan-ly-tai-san', 'Backend\TaiSan\TaiSanController@quanLyTaiSan')->name('quanLyTaiSan');
    Route::get('admin/tai-san-ajax', 'Backend\TaiSan\TaiSanController@ajax')->name('ajaxQuanLyTaiSan');
    Route::get('admin/tai-san/{id}', 'Backend\TaiSan\TaiSanController@suaTaiSan')->name('suaTaiSan');
    Route::post('admin/sua-tai-san', 'Backend\TaiSan\TaiSanController@suaTaiSanDB')->name('suaTaiSanDB');
    Route::get('admin/them-sinh-vien', 'Backend\SinhVien\SinhVienController@themSinhVien')->name('themSinhVien');
    Route::post('admin/sinh-vien-ajax', 'Backend\SinhVien\SinhVienController@ajaxSinhVien')->name('sinhVienAjax');
    Route::get('admin/don-dang-ky', 'Backend\SinhVien\SinhVienController@donDangKy')->name('donDangKy');
    Route::get('admin/danh-sach-sinh-vien-ktx', 'Backend\SinhVien\SinhVienController@danhSach')->name('danhSachKTX');
    Route::get('admin/quan-ly-phong', 'Backend\SinhVien\SinhVienController@quanLyPhong')->name('quanLyPhong');
});
