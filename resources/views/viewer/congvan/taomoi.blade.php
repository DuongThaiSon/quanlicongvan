@extends('viewer.layout.master')
@section('title')
<title>Thêm công văn</title>
@endsection
@section('content')

<section class="bg-white main-content">
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
    <div class="container-fluid">

        <div class="main-form">
            <h5 class="form-create-title pt-4 mb-4">
                <ul class="breadcrumb">

                    <li class="breadcrumb-item"><a href="viewer/congvan/luutru">Lưu trữ</a></li>

                    @foreach($types as $tp)
                    @if($tp == $type)

                    <li class="breadcrumb-item"><a href="viewer/congvan/luutru/{{$type->id}}">{{$tp->name}}</a></li>
                    @endif
                    @endforeach
                    <li class="breadcrumb-item"><a href="{{route('get-taocv',$type)}}">Tải lên</a></li>
                </ul>
            </h5>
            <form action="{{route('post-taocv',$type)}}" method="POST" enctype="multipart/form-data">
                @CSRF
                <!-- <div class="row">
                    <div class="col-lg-6"> -->
                <div class="box-create-left create-section">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Tiêu đề<sup>*</sup></label>
                                <input type="text" placeholder="Tiêu đề" name="tieude">
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Tệp đính kèm<sup>*</sup></label>
                                <input type="file" name="teptin">
                            </div>

                        </div>
                    </div>

                    <!-- </div>
                    </div> -->

                </div>
                <button type="submit" class="btn-add continue">Lưu trữ</button>
            </form>
        </div>
    </div>
</section>
@endsection
