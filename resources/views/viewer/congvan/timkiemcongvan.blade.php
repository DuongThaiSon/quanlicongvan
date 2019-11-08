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
                            <form action="{{route('get-timcv')}}" method="get">
                                <input type="text" placeholder="Nhập tên văn bản" name="timcongvantimkiem" class="input-search" autocomplete="off">
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
            <!-- <div class="board">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th style="width: 66px"></th>
                                                <th>Công văn</th>
                                                <th style="width: 155px;">Trạng thái</th>
                                                <th style="width: 200px;">Loại công văn</th>
                                                <th style="width: 135px;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="notseen">
                                                <td>
                                                    <div class="icons float-right">
                                                        <div class="icon-status">
                                                            <div class="square"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="name">
                                                        <span class="url group-name text-alt text-uppercase" data-url="a">
                                                            [01-2019-00010] </span>
                                                        <span class="url text-uppercase">Thông báo thay đổi mức đóng bảo hiểm ý
                                                            tế</span>
                                                    </div>
                                                    <div class="info">
                                                        <span style="margin-right: 10px;">
                                                            <i class="ti-folder"></i>
                                                            <span>Nhóm công văn: </span>
                                                            <span>Không xác định</span>
                                                        </span>
                                                        <span>
                                                            <i class="ti-user"></i>
                                                            <span>Ban hành bởi: </span>
                                                            <span class="url">Vân Anh</span> / <span class="url">Ban giám
                                                                đốc</span>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="status status-1">
                                                        Đã ban hành
                                                    </div>
                                                    <div class="info">
                                                        <span>Tgian: </span>
                                                        <span>13:35 19/08/2019</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="url">Thông báo</span>
                                                    <div class="info">Nội bộ</div>
                                                    <div class="info">33 người đã xem</div>
                                                </td>
                                                <td>
                                                    <div class="action">
                                                        <a href="chitiet.html" class="action-text">Chi tiết</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="seen">
                                                <td>
                                                    <div class="icons float-right">
                                                        <div class="icon-status">
                                                            <div class="square"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="name">
                                                        <span class="url group-name text-uppercase" data-url="a">
                                                            [01-2019-00010] </span>
                                                        <span class="url text-uppercase">Thông báo thay đổi mức đóng bảo hiểm ý
                                                            tế</span>
                                                    </div>
                                                    <div class="info">
                                                        <span style="margin-right: 10px;">
                                                            <i class="ti-folder"></i>
                                                            <span>Nhóm công văn: </span>
                                                            <span>Không xác định</span>
                                                        </span>
                                                        <span>
                                                            <i class="ti-user"></i>
                                                            <span>Ban hành bởi: </span>
                                                            <span class="url">Vân Anh</span> / <span class="url">Ban giám
                                                                đốc</span>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="status status-1">
                                                        Đã ban hành
                                                    </div>
                                                    <div class="info">
                                                        <span>Tgian: </span>
                                                        <span>13:35 19/08/2019</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="url">Thông báo</span>
                                                    <div class="info">Nội bộ</div>
                                                    <div class="info">33 người đã xem</div>
                                                </td>
                                                <td>
                                                    <div class="action">
                                                        <a href="chitiet.html" class="action-text">Chi tiết</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="seen">
                                                <td>
                                                    <div class="icons float-right">
                                                        <div class="icon-status">
                                                            <div class="square"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="name">
                                                        <span class="url group-name text-uppercase" data-url="a">
                                                            [01-2019-00010] </span>
                                                        <span class="url text-uppercase">Thông báo thay đổi mức đóng bảo hiểm ý
                                                            tế</span>
                                                    </div>
                                                    <div class="info">
                                                        <span style="margin-right: 10px;">
                                                            <i class="ti-folder"></i>
                                                            <span>Nhóm công văn: </span>
                                                            <span>Không xác định</span>
                                                        </span>
                                                        <span>
                                                            <i class="ti-user"></i>
                                                            <span>Ban hành bởi: </span>
                                                            <span class="url">Vân Anh</span> / <span class="url">Ban giám
                                                                đốc</span>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="status status-1">
                                                        Đã ban hành
                                                    </div>
                                                    <div class="info">
                                                        <span>Tgian: </span>
                                                        <span>13:35 19/08/2019</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="url">Thông báo</span>
                                                    <div class="info">Nội bộ</div>
                                                    <div class="info">33 người đã xem</div>
                                                </td>
                                                <td>
                                                    <div class="action">
                                                        <a href="chitiet.html" class="action-text">Chi tiết</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="seen">
                                                <td>
                                                    <div class="icons float-right">
                                                        <div class="icon-status">
                                                            <div class="square"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="name">
                                                        <span class="url group-name text-uppercase" data-url="a">
                                                            [01-2019-00010] </span>
                                                        <span class="url text-uppercase">Thông báo thay đổi mức đóng bảo hiểm ý
                                                            tế</span>
                                                    </div>
                                                    <div class="info">
                                                        <span style="margin-right: 10px;">
                                                            <i class="ti-folder"></i>
                                                            <span>Nhóm công văn: </span>
                                                            <span>Không xác định</span>
                                                        </span>
                                                        <span>
                                                            <i class="ti-user"></i>
                                                            <span>Ban hành bởi: </span>
                                                            <span class="url">Vân Anh</span> / <span class="url">Ban giám
                                                                đốc</span>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="status status-1">
                                                        Đã ban hành
                                                    </div>
                                                    <div class="info">
                                                        <span>Tgian: </span>
                                                        <span>13:35 19/08/2019</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="url">Thông báo</span>
                                                    <div class="info">Nội bộ</div>
                                                    <div class="info">33 người đã xem</div>
                                                </td>
                                                <td>
                                                    <div class="action">
                                                        <a href="chitiet.html" class="action-text">Chi tiết</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="seen">
                                                <td>
                                                    <div class="icons float-right">
                                                        <div class="icon-status">
                                                            <div class="square"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="name">
                                                        <span class="url group-name text-uppercase" data-url="a">
                                                            [01-2019-00010] </span>
                                                        <span class="url text-uppercase">Thông báo thay đổi mức đóng bảo hiểm ý
                                                            tế</span>
                                                    </div>
                                                    <div class="info">
                                                        <span style="margin-right: 10px;">
                                                            <i class="ti-folder"></i>
                                                            <span>Nhóm công văn: </span>
                                                            <span>Không xác định</span>
                                                        </span>
                                                        <span>
                                                            <i class="ti-user"></i>
                                                            <span>Ban hành bởi: </span>
                                                            <span class="url">Vân Anh</span> / <span class="url">Ban giám
                                                                đốc</span>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="status status--1">
                                                        Không thông qua
                                                    </div>
                                                    <div class="info">
                                                        <span>Tgian: </span>
                                                        <span>13:35 19/08/2019</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="url">Thông báo</span>
                                                    <div class="info">Nội bộ</div>
                                                    <div class="info">33 người đã xem</div>
                                                </td>
                                                <td>
                                                    <div class="action">
                                                        <a href="chitiet.html" class="action-text">Chi tiết</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> -->
            <div class="news">
                @if(count($congvantimkiems) ==0)
                    <p style="text-align:center; font-size:22px;">Không có dữ liệu phù hợp</p>
                @endif
                <div class="row pb-4 pl-3 pr-3">
                    @foreach($congvantimkiems as $congvantimkiem)
                    <div class="col-lg-2">
                        <div class="news-item">
                            <div class="news-item--img position-relative">
                            <?php
                                                    $name = explode(".",$congvantimkiem->file);
                                                    ?>
                                @if($name[1] == "jpg" || $name[1] == "png")
                                    <a href="viewer/congvantimkiem/xem/{{$congvantimkiem->id}}">
                                        <img class="img-fluid" src="pmhdv/images/{{$congvantimkiem->file_code}}" alt="">
                                    </a>
                                @else   
                                    @if($name[1] == "docx"  || $name[1] == "pdf")
                                    <a href="viewer/congvantimkiem/xem/{{$congvantimkiem->id}}">
                                        <img class="img-fluid" src="pmhdv/images/{{$congvantimkiem->file_jpg}}" alt="">
                                    </a>
                                    @else
                                        @if($name[1] == "zip"||$name[1] == "jar")
                                        <a href="viewer/congvantimkiem/xem/{{$congvantimkiem->id}}">
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
                                                    <a href="{{route('get-xoacv',$congvantimkiem->id)}}" title="Xóa">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                                <div class="news-icon-item">
                                                    <a href="pmhdv/images/{{$congvantimkiem->file_code}}" title="Tải xuống"
                                                        download="{{$congvantimkiem->file_code}}">
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
                                                <img src="pmhdv/images/{{$congvantimkiem->User->avatar_code}}">
                                            </a>
                                        </div>
                                        <div class="box-user-info mt-1 dropdown-menu">
                                            <div class="box-user-info--name">
                                                <p>{{$congvantimkiem->User->name}}</p>
                                                <p class="m-0">
                                                    <span>{{$congvantimkiem->User->email}}</span>
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
                                        <span>{{ $congvantimkiem['created_at']->format('H:i') }} </span>
                                        <span> - </span>
                                        <span>{{ $congvantimkiem['created_at']->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="news-info">
                                        <p>Loại công văn:
                                            <?php
                                                    $check_file = explode(".",trim($congvantimkiem->file));
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
                                            <span>{{number_format($congvantimkiem->storage/1048576,2)}}MB</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="news-name">
                                    <a href="viewer/congvantimkiem/xem/{{$congvantimkiem->id}}">
                                        <h4>{{$congvantimkiem->name}}
                                        </h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="row" style="margin-left:500px;">{{$congvantimkiems->links()}}</div>
                </div>
            </div>
        </div>
@endsection
