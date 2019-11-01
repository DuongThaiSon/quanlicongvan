@extends('viewer.layout.index')
@section('title')
<title>Thông tin cá nhân</title>
@endsection
@section('content')
<div class="main-body">
    <form action="{{route('post-tt')}}" method="post" enctype="multipart/form-data">
        @CSRF
        <div id="profile" class="col-lg-8 m0-auto pt-5">
            <div class="row">
                <div class="col-lg-3">
                    <div class="avatar-wrapper">
                        <div class="choose-avatar">
                            <img class="avatar-pic" src="{{ asset('pmhdv') }}/images/{{$user->avatar}}" alt="">
                            <p class="text-center">Chọn ảnh avatar</p>
                        </div>
                        <img class="profile-pic" src="" />
                        <div class="upload-button"></div>
                        <input class="file-upload" type="file" accept="image/*"  name="hinhanh">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="ava-text">
                        <div class="title">
                        {{$user->name}}
                        </div>  
                        <div class="sub-title">
                            {{$user->role->name}}
                        </div>  
                        <div class="info">
                            <b>Email</b>
                        {{$user->email}}
                        </div>
                        <div class="info">
                            <b>Số đt</b>
                            {{$user->phone}}
                        </div>
                        <div class="info">
                            <b>Địa chỉ</b>
                            {{$user->address}}
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
                                <input type="text" name="hoten" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="text" name="sdt"  class="form-control">
                            </div>
                            
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Địa chỉ</label>
                                <input type="text" name="diachi"  class="form-control">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Lưu</button>
                
            </div>
        </div>
    </form>
</div>

@endsection
