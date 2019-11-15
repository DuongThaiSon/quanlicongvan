@extends('viewer.layout.index')
@section('title')
<title>Trang chủ</title>
@endsection
@section('content')

<div class="bg-white main-content">
    <div class="sub-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="title">Trường đại học công nghiệp Hà Nội</div>
            </div>
            <div class="col-lg-6">
                <div class="search text-right position-relative">
                    <form action="{{route('get-timcv')}}" method="get">
                            <input type="text" placeholder="Nhập tên văn bản" name="timcongvan" class="input-search" autocomplete="off">
                            <button type="submit" class="btn-search btn-info">
                                <i class="fa fa-search"></i>
                            </button>
                            <div class="clear"></div>
                            <div class="advance d-none">
                                <div class="title position-relative">
                                    <span class="text-uppercase">Bộ lọc nâng cao</span>
                                </div>
                                <div class="form-group">
                                    <label for="">Thời gian</label>
                                    <input type="date" name="thoigian" id="" class="form-control">
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-info mt-2 btn-search-advance">Tìm kiếm</button>
                                    <button type="button" class="btn btn-discard mt-2">Hủy bỏ</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="news">
        <div class="row pb-4 pl-3 pr-3">
            @foreach($congvans as $congvan)
            <div class="col-lg-2">
                <div class="news-item">
                    <div class="news-item--img position-relative">
                    <?php
                                            $name = explode(".",$congvan->file);
                                            ?>
                        @if($name[1] == "jpg" || $name[1] == "png")
                            <a href="viewer/congvan/xem/{{$congvan->id}}">
                                <img class="img-fluid" src="pmhdv/images/{{$congvan->file_code}}" alt="">
                            </a>
                        @else   
                            @if($name[1] == "docx"  || $name[1] == "pdf")
                            <a href="viewer/congvan/xem/{{$congvan->id}}">
                                <img class="img-fluid" src="pmhdv/images/{{$congvan->file_jpg}}" alt="">
                            </a>
                            @else
                                @if($name[1] == "zip"||$name[1] == "jar")
                                <a href="viewer/congvan/xem/{{$congvan->id}}">
                                    <img class="img-fluid" src="pmhdv/images/winrar.jpg" alt="">
                                </a>
                                @endif
                            @endif
                        @endif
                        <div class="news-icon d-none">
                            <div class="news-caret">
                                <div class="dropdown">
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fas fa-angle-down"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-left">
                                        <div class="news-icon-item">
                                            <a href="{{route('get-xoacv',$congvan->id)}}" title="Xóa">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                        <div class="news-icon-item">
                                            <a href="pmhdv/images/{{$congvan->file_code}}" title="Tải xuống"
                                                download="{{$congvan->file_code}}">
                                                <i class="fas fa-file-download"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="news-item-text">
                        <div class="news-avatar">
                            <div class="dropdown">
                                <div class="author-figure dropdown-toggle float-left mb-0 mr-3" data-toggle="dropdown">
                                    <a href="">
                                        <img src="pmhdv/images/{{$congvan->User->avatar_code}}">
                                    </a>
                                </div>
                                <div class="box-user-info mt-1 dropdown-menu">
                                    <div class="box-user-info--name">
                                        <p>{{$congvan->User->name}}</p>
                                        <p class="m-0">
                                            <span>{{$congvan->User->email}}</span>
                                            <span> · </span>
                                            <span>Hiệu trưởng</span>
                                        </p>
                                    </div>
                                    <div class="line"></div>
                                    <div class="item">
                                        <a href="">
                                            <span>
                                                <i class="fas fa-share"></i>
                                            </span>
                                            <span>Xem profile</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="c-light">
                                <span>{{ $congvan['created_at']->format('H:i') }} </span>
                                <span> - </span>
                                <span>{{ $congvan['created_at']->format('d/m/Y') }}</span>
                            </div>
                            <div class="clear"></div>
                            <div class="news-info">
                                <p>Loại công văn:
                                    <?php
                                            $check_file = explode(".",trim($congvan->file));
                                            ?>
                                    @if($check_file[1] == "pdf")

                                    <span class="pdf">
                                        <i class="far fa-file-pdf"></i>
                                    </span>
                                    @else
                                        @if($check_file[1] == "docx")
                                        <span class="word">
                                            <i class="fas fa-file-word"></i>
                                        </span>
                                        @else
                                            @if($check_file[1] == "xlsx" || $check_file[1] == "xlsm")
                                            <span class="excel">
                                                <i class="fas fa-file-excel"></i>
                                            </span>
                                            @else($check_file[1] =="jpg" || $check_file[1] =="png")
                                                <span class="jpg">
                                                    <i class="fas fa-file-image"></i>
                                                </span>
                                                @if($check_file[1] =="zip")
                                                    <span>Zip</span>
                                                @endif
                                            @endif
                                    @endif

                                    @endif
                                    <span>{{number_format($congvan->storage/1048576,2)}}MB</span>
                                </p>
                            </div>
                        </div>
                        <div class="news-name">
                            <a href="viewer/congvan/xem/{{$congvan->id}}">
                                <h4>{{$congvan->name}}
                                </h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="row" style="margin-left:500px;">{{$congvans->links()}}</div>
        </div>
    </div>
</div>
@endsection
