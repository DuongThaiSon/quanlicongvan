@extends('viewer.layout.index')
@section('title')
<title>Trang chủ</title>
@endsection
@section('content')


<div class="main-body">
    <div class="sub-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="title">Trường đại học công nghiệp Hà Nội</div>
            </div>
            <div class="col-lg-6">
                <div class="search text-right position-relative">
                    <form action="{{route('get-timcvden')}}" method="get">
                        <input type="text" placeholder="Tìm kiếm" name="timcongvanden">
                        <button type="submit" class="btn-search btn-info">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="news">
        <div class="row pb-4 pl-3 pr-3">
            @foreach($congvandens as $congvanden)
            <div class="col-lg-2 col-md-3">
                <div class="news-item">
                    <div class="news-item--img position-relative">
                        @if($congvanden->check_read==1)
                        <div class="check-seen">
                            <i class="fas fa-check"></i>
                        </div>
                        @endif
                        <a href="">
                            <img class="img-fluid" src="pmhdv/images/thongbao.png" alt="">
                        </a>
                        <div class="news-icon d-none">
                            <div class="news-caret">
                                <div class="dropdown">
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fas fa-angle-down"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-left">
                                        <div class="news-icon-item">
                                            <a href="" title="Xóa">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                        <div class="news-icon-item">
                                            <a href="download/{{$congvanden->documentary_send->file}}" title="Tải xuống"
                                                download="{{$congvanden->documentary_send->file}}">
                                                <i class="fas fa-file-download"></i>
                                            </a>
                                        </div>
                                        <div class="news-icon-item">
                                            <a href="" title="Lưu trữ">
                                                <i class="fas fa-bookmark"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="news-item-text">
                        <div class="news-type">
                            <div class="row pl-0 mb-3">
                            <div class="col-lg-8">
                                <div class="ban-hanh loai-congvan">
                                    {{$congvanden->documentary_send->type_documentary->name}}
                                </div>
                            </div>
                            <div class="col-lg-4 text-right">
                                <div class="news-info">
                                    <?php
                                        $check_file = explode(".",trim($congvanden->documentary_send->file));
                                    ?>
                                    @if($check_file[1] == "pdf")

                                    <span class="pdf">
                                        <i class="far fa-file-pdf"></i>
                                    </span>
                                    @else
                                    @if($check_file[1] == "doc" || $check_file[1] == "docx")
                                    <span class="word">
                                        <i class="fas fa-file-word"></i>
                                    </span>
                                    @else
                                    @if($check_file[1] == "xlsx" || $check_file[1] == "xlsm")
                                    <span class="excel">
                                        <i class="fas fa-file-excel"></i>
                                    </span>
                                    @endif
                                    @endif

                                    @endif
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="news-avatar">
                            <div class="dropdown">
                                <div class="author-figure dropdown-toggle float-left mb-0 mr-3" data-toggle="dropdown">
                                    <a href="">
                                        <img src="pmhdv/images/4.jpg">
                                    </a>
                                </div>
                                <div class="box-user-info mt-1 dropdown-menu">
                                    <div class="box-user-info--name">
                                        <p>{{$congvanden->documentary_send->User->name}}</p>
                                        <p class="m-0">
                                            <span>{{$congvanden->documentary_send->User->email}}</span>
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
                                <span>{{ $congvanden->documentary_send['updated_at']->format('H:i') }} </span>
                                <span> - </span>
                                <span>{{ $congvanden->documentary_send['updated_at']->format('d/m/Y') }}</span>
                                <span style="margin-left: 8px">
                                    <i class="fas fa-eye"></i>
                                </span>
                                <span>{{$congvanden->documentary_send->number_read}}</span>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="news-name">
                            <a href="viewer/congvanden/chitiet/{{$congvanden->id}}">
                                <h4>{{$congvanden->documentary_send->name}}
                                </h4>
                            </a>
                        </div>
                        <!-- <div class="news-info">
                            <p>Thể loại:
                                <?php
                                        $check_file = explode(".",trim($congvanden->documentary_send->file));
                                        ?>
                                @if($check_file[1] == "pdf")

                                <span class="pdf">
                                    <i class="far fa-file-pdf"></i>
                                </span>
                                @else
                                @if($check_file[1] == "doc" || $check_file[1] == "docx")
                                <span class="word">
                                    <i class="fas fa-file-word"></i>
                                </span>
                                @else
                                @if($check_file[1] == "xlsx" || $check_file[1] == "xlsm")
                                <span class="excel">
                                    <i class="fas fa-file-excel"></i>
                                </span>
                                @endif
                                @endif

                                @endif
                            </p>
                        </div> -->
                        <div class="text-center mt-4">
                            <a href="chitiet.html" class="chitiet">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
