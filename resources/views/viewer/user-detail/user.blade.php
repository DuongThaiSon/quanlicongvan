@extends('viewer.layout.index')
@section('title')
<title>Thông tin cá nhân</title>
@endsection
@section('content')
<div class="main-body">
    <div id="profile" class="col-lg-8 m0-auto pt-5">
        <div class="row">
            <div class="col-lg-3">
                <div class="avatar-wrapper">
                    <div class="choose-avatar">
                        <img class="avatar-pic" src="{{ asset('pmhdv') }}/images/user.png" alt="">
                        <p class="text-center">Chọn ảnh avatar</p>
                    </div>
                    <img class="profile-pic" src="" />
                    <div class="upload-button"></div>
                    <input class="file-upload" type="file" accept="image/*" />
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ava-text">
                    <div class="title">
                        Dương Thái Sơn
                    </div>  
                    <div class="sub-title">
                        Giáo viên/CNTT
                    </div>  
                    <div class="info">
                        <b>Email</b>
                        duongthaison98@gmail.com
                    </div>
                    <div class="info">
                        <b>Số đt</b>
                        03332214203
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <button type="button" class="btn btn-primary btn-fix-info mt-5">Chỉnh sửa</button>
            </div>
        </div>
        <div class="list d-none">
            <div class="title form-group">
                <h2>Thông tin chi tiết</h2>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Họ và tên</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Chức vụ</label>
                        <select name="" id="" class="form-control">
                            <option value="">Giáo viên</option>
                            <option value="">Trưởng khoa</option>
                            <option value="">Hiệu trưởng</option>
                            <option value="">Thư kí</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Khoa</label>
                        <select name="" id="" class="form-control">
                            <option value="">CNTT</option>
                            <option value="">Điện</option>
                            <option value="">Cơ khí</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Lưu</button>
        </div>
    </div>
</div>

@endsection
