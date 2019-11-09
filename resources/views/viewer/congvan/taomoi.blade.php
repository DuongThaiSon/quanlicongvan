@extends('viewer.layout.master')
@section('title')
<title>Thêm công văn</title>
@endsection
@section('content')


    
    <section class="main-body">
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{ $err }}<br>
            @endforeach
        </div>
    @endif

    @if(session('thongbao'))
        <div class="alert alert-success">
            {{ session('thongbao') }}
        </div>
    @endif
    @if(session('saifile'))
    <div class="alert alert-danger">
        {{session('saifile')}}
    </div>
    @endif
        <div class="container-fluid">
            <div class="back back-js d-none">
                <i class="fas fa-chevron-left"></i>
                <span>Quay lại</span>
            </div>
            <div class="main-form">
                <h3 class="form-create-title pt-4 mb-4">
                    Tạo mới công văn
                </h3>
                <form action="{{route('post-taocv')}}" method="POST" enctype="multipart/form-data">
                @CSRF
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="box-create-left create-section">
                                <div class="form-group">
                                    <label for="">Tiêu đề<sup>*</sup></label>
                                    <input type="text" placeholder="Tiêu đề" name="tieude">
                                </div>
                                <div class="form-group">
                                    <label for="" style="display:block;">Loại công văn<sup>*</sup></label>
                                    <select name="loaicongvan" id="" style="width:40%;">
                                        @foreach($type_documentarys as $type_documentary)
                                        <option value="{{$type_documentary->id}}">{{$type_documentary->name}}</option>
                                        @endforeach
                                    </select>                                   
                                </div>  
                                <div class="form-group">
                                    <label for="">Tệp đính kèm</label>
                                    <input type="file" name="teptin">
                                </div>                             
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box-create-left create-section">
                                <div class="form-group">
                                    <label for="">Nội dung</label>
                                    <textarea cols="30" rows="10" name="noidung"></textarea>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn-add continue">Tạo mới</button>
                </form>
            </div>
        </div>
    </section>
@endsection
