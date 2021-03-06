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
                    <form action="{{route('get-timcvden')}}" method="get">
                        <input type="text" placeholder="Nhập tên văn bản" name="timcongvanden" class="input-search"
                            autocomplete="off">
                        <button type="submit" class="btn-search btn-info">
                            <i class="fa fa-search"></i>
                        </button>
                        <div class="clear"></div>
                        <div class="advance d-none">
                            <div class="title position-relative">
                                <span class="text-uppercase">Bộ lọc nâng cao</span>
                            </div>
                            <div class="form-group">
                                <label for="">Loại công văn</label>
                                <select name="loaicongvan" id="" class="form-control">
                                    <option value="" selected>Tất cả</option>
                                    @foreach($loaicongvans as $loaicongvan)
                                    <option value="{{$loaicongvan->id}}">{{$loaicongvan->name}}</option>
                                    @endforeach
                                </select>
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
        @if(count($congvantimkiems) ==0)
            <p style="text-align:center; font-size:22px;">Không có dữ liệu phù hợp</p>
        @endif
        <div class="row pl-3 pr-3">
            @foreach($congvantimkiems as $congvantimkiem)
            <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="news-item">
                    <div class="news-item--img position-relative">
                        
                        <?php
                            $name = explode(".",$congvantimkiem->documentary_send->file_code);
                        ?>

                        <a href="{{route('get-xemcvden',[$congvantimkiem->id_send, $congvantimkiem->id])}}">
                            @if($name[1] == "jpg" || $name[1] == "png" || $name[1] == "PNG")
                            <img class="img-fluid" src="pmhdv/images/{{$congvantimkiem->documentary_send->file_code}}"
                                alt="">
                            @else
                            @if($name[1] == "docx" || $name[1] == "pdf")
                            <img class="img-fluid" src="pmhdv/images/{{$congvantimkiem->documentary_send->file_jpg}}"
                                alt="">
                            @else
                            @if($name[1] == "zip"||$name[1] == "jar")
                            <img class="img-fluid" src="pmhdv/images/winrar.jpg" alt="">
                            @endif
                            @endif
                            @endif
                        </a>

                        <div class="news-icon d-none">
                            <div class="news-caret">
                                <div class="dropdown">
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fas fa-angle-down"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-left">
                                        <div class="news-icon-item">
                                            <a href="{{route('get-xoacvden',$congvantimkiem->id)}}" title="Xóa">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                        <div class="news-icon-item">
                                            <a href="pmhdv/images/{{$congvantimkiem->documentary_send->file_code}}"
                                                title="Tải xuống"
                                                download="{{$congvantimkiem->documentary_send->file_code}}">
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
                    @if($congvantimkiem->check_read==1)
                        <div class="news-item-text bg-white" >
                            <div class="news-type">
                                <div class="row pl-0 mb-2">
                                    <div class="col-lg-7 text-left">
                                        <div class="tag">
                                            <i class="fas fa-tags"></i>
                                            <span>{{$congvantimkiem->documentary_send->type_documentary->name}}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 pl-0">
                                        <div class="news-info d-flex justify-content-end">
                                            <?php
                                            $check_file = explode(".",trim($congvantimkiem->documentary_send->file_code));
                                            ?>
                                            @if($check_file[1] == "pdf")

                                            <div class="pdf file-fix">
                                                <i class="far fa-file-pdf"></i>
                                            </div>
                                            @else
                                            @if($check_file[1] == "doc" || $check_file[1] == "docx")
                                            <div class="word file-fix">
                                                <i class="fas fa-file-word"></i>
                                            </div>
                                            @else
                                            @if($check_file[1] == "xlsx" || $check_file[1] == "xlsm")
                                            <div class="excel file-fix">
                                                <i class="fas fa-file-excel"></i>
                                            </div>
                                            @else($check_file[1] =="jpg" || $check_file[1] =="png")
                                            <span class="jpg file-fix">
                                                <i class="fas fa-file-image"></i>
                                            </span>
                                            @if($check_file[1] =="zip")
                                            <span>Zip</span>
                                            @endif
                                            @endif
                                            @endif

                                            @endif
                                            <div class="storage">
                                                {{number_format($congvantimkiem->documentary_send->storage/1048576,2)}}MB
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="news-avatar">
                                <div class="dropdown">
                                    <div class="author-figure dropdown-toggle float-left mb-0 mr-3" data-toggle="dropdown">
                                        <a href="">
                                            <img src="pmhdv/images/{{$congvantimkiem->documentary_send->User->avatar_code}}">
                                        </a>
                                    </div>
                                    <div class="box-user-info mt-1 dropdown-menu">
                                        <div class="box-user-info--name">
                                            <p>{{$congvantimkiem->documentary_send->User->name}}</p>
                                            <p class="m-0">
                                                <span>{{$congvantimkiem->documentary_send->User->email}}</span>
                                                <span> · </span>
                                                <span>{{$congvantimkiem->documentary_send->User->role->name}}</span>
                                                @if($congvantimkiem->documentary_send->User->id_major!=0)
                                                <span>{{$congvantimkiem->documentary_send->User->major->name}}</span>
                                                @endif
                                            </p>
                                        </div>

                                    </div>
                                </div>
                                <div class="c-light">
                                    <span>{{ $congvantimkiem->documentary_send['created_at']->format('H:i') }} </span>
                                    <span> - </span>
                                    <span>{{ $congvantimkiem->documentary_send['created_at']->format('d/m/Y') }}</span>

                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="news-name" >
                                <a href="{{route('get-xemcvden',[$congvantimkiem->id_send, $congvantimkiem->id])}}" >
                                    <h4 id="{{$congvantimkiem->id}}">{{$congvantimkiem->documentary_send->name}}
                                    </h4>
                                </a>
                            </div>
                            
                        </div>
                    @else
                    <div class="news-item-text" >
                        <div class="news-type">
                            <div class="row pl-0 mb-2">
                                <div class="col-lg-7 text-left">
                                    <div class="tag">
                                        <i class="fas fa-tags"></i>
                                        <span>{{$congvantimkiem->documentary_send->type_documentary->name}}</span>
                                    </div>
                                </div>
                                <div class="col-lg-5 pl-0">
                                    <div class="news-info d-flex justify-content-end">
                                        <?php
                                        $check_file = explode(".",trim($congvantimkiem->documentary_send->file_code));
                                        ?>
                                        @if($check_file[1] == "pdf")

                                        <div class="pdf file-fix">
                                            <i class="far fa-file-pdf"></i>
                                        </div>
                                        @else
                                        @if($check_file[1] == "doc" || $check_file[1] == "docx")
                                        <div class="word file-fix">
                                            <i class="fas fa-file-word"></i>
                                        </div>
                                        @else
                                        @if($check_file[1] == "xlsx" || $check_file[1] == "xlsm")
                                        <div class="excel file-fix">
                                            <i class="fas fa-file-excel"></i>
                                        </div>
                                        @else($check_file[1] =="jpg" || $check_file[1] =="png")
                                        <span class="jpg file-fix">
                                            <i class="fas fa-file-image"></i>
                                        </span>
                                        @if($check_file[1] =="zip")
                                        <span>Zip</span>
                                        @endif
                                        @endif
                                        @endif

                                        @endif
                                        <div class="storage">
                                            {{number_format($congvantimkiem->documentary_send->storage/1048576,2)}}MB
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="news-avatar">
                            <div class="dropdown">
                                <div class="author-figure dropdown-toggle float-left mb-0 mr-3" data-toggle="dropdown">
                                    <a href="">
                                        <img src="pmhdv/images/{{$congvantimkiem->documentary_send->User->avatar_code}}">
                                    </a>
                                </div>
                                <div class="box-user-info mt-1 dropdown-menu">
                                    <div class="box-user-info--name">
                                        <p>{{$congvantimkiem->documentary_send->User->name}}</p>
                                        <p class="m-0">
                                            <span>{{$congvantimkiem->documentary_send->User->email}}</span>
                                            <span> · </span>
                                            <span>{{$congvantimkiem->documentary_send->User->role->name}}</span>
                                            @if($congvantimkiem->documentary_send->User->id_major!=0)
                                            <span>{{$congvantimkiem->documentary_send->User->major->name}}</span>
                                            @endif
                                        </p>
                                    </div>

                                </div>
                            </div>
                            <div class="c-light">
                                <span>{{ $congvantimkiem->documentary_send['created_at']->format('H:i') }} </span>
                                <span> - </span>
                                <span>{{ $congvantimkiem->documentary_send['created_at']->format('d/m/Y') }}</span>

                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="news-name" >
                            <a href="{{route('get-xemcvden',[$congvantimkiem->id_send, $congvantimkiem->id])}}" >
                                <h4>{{$congvantimkiem->documentary_send->name}}
                                </h4>
                            </a>
                        </div>
                            
                    </div>
                    @endif
                </div>
            </div>
            @endforeach

        </div>
        <div class="pag-link">{{$congvantimkiems->links()}}</div>
    </div>
</div>
@endsection
@section('script')


@endsection
