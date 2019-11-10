@extends('viewer.layout.index')
@section('title')
<title>Chi Tiết</title>
@endsection
@section('content')

<body>
    <div class="main-body" style="height: auto">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="viewer/congvanden/danhsach">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Thông báo</a></li>
        </ul>
        <div class="doc-main">
            <div class="row">
                <div class="col-lg-9">
                    <div class="doc-main_content">
                        <div class="top-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="title">
                                        {{$chitiet->name}}
                                    </div>
                                    <div class="subtitle">
                                        <span>{{$chitiet->User->name}} - </span>
                                        <span>{{$chitiet->User->email}} - </span>
                                        <span>lúc </span>
                                        <span>{{ $chitiet['updated_at']->format('H:i') }} - </span>
                                        <span>{{ $chitiet['updated_at']->format('d/m/Y') }}</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="document-content">
                            {{$chitiet->content}}
                        </div>
                        <div class="files">
                            <div class="subheader">
                                Tài liệu
                            </div>
                            <div class="file">
                                <div class="file-header">
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <div class="file-name">
                                                {{$chitiet->file}}
                                            </div>
                                            <div class="file-info">
                                                {{number_format($chitiet->storage/1048576,2)}}KB
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <a class="btn-download" href="pmhdv/images/{{$chitiet->file_code}}" title="Tải xuống"
                                                download="{{$chitiet->file_code}}">
                                                <i class="fas fa-file-download"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="file-display">
                                <?php
                                        $check_file = explode(".",trim($chitiet->file));
                                    ?>
                                @if($check_file[1] == "pdf")
                                    <object data="pmhdv/images/{{$chitiet->file_code}}" type="application/pdf">                                   
                                        <iframe src="pmhdv/images/{{$chitiet->file_code}}"></iframe>
                                    </object>
                                    @else
                                        @if($check_file[1] == "jpg" || $check_file == "PNG")
                                            <object data="pmhdv/images/{{$chitiet->file_pdf}}" type="application/pdf">                                   
                                                <iframe src="pmhdv/images/{{$chitiet->file_pdf}}"></iframe>
                                            </object>
                                            @else
                                                @if($check_file[1] == "docx" )
                                                    <object data="{{ storage_path($chitiet->file_pdf) }}" type="application/pdf">                                   
                                                        <iframe src="{{ storage_path($chitiet->file_pdf) }}"></iframe>
                                                    </object>
                                                    
                                                @endif
                                        @endif
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="doc-side">
                       
                        <div class="box-seen">
                            <div class="title">
                                <span>{{$chitiet->number_read}}</span>
                                <span> người đã xem.</span>
                            </div>
                            <div class="avatars">
                            @foreach($chitiet->documentary_receive as $i)
                                <div class="image">
                                    <img src="pmhdv/images/{{$i->User->avatar_code}}" alt="">
                                </div>
                            @endforeach
                                
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="comment">
                            <div class="box-post">
                                <div class="user">
                                    <div class="avatar float-left">
                                        <img src="pmhdv/images/{{$chitiet->User->avatar_code}}" alt="" class="img-circle" width="50">
                                    </div>
                                    <div class="name float-left ml-3">
                                        <em>{{$chitiet->User->name}}</em>
                                        <div class="info">
                                            
                                            <span>{{$chitiet->User->email}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="form-post mt-4">
                                    <form action="">
                                        <textarea name="" id="" placeholder="Viết bình luận của bạn"></textarea>
                                    </form>
                                </div>
                            </div>
                            <div class="box-comment">
                                <div class="box-cmt_header">
                                    <span>4</span> Thảo luận
                                </div>
                                <div class="list-cmt mt-4">
                                    <div class="post">
                                        <div class="mb-4">
                                            <div class="user">
                                                <div class="avatar float-left">
                                                    <img src="pmhdv/images/{{$chitiet->User->avatar_code}}" alt="" class="img-circle" width="50">
                                                </div>
                                                <div class="name float-left ml-3">
                                                    <em>Nguyễn Quỳnh</em>
                                                    <div class="info">
                                                        <span>10:26</span>
                                                        <span>21/6/2019</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                            <div class="cmt-text mt-4">
                                                <em>Đọc quyết định mới nhé</em>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <div class="user">
                                                <div class="avatar float-left">
                                                    <img src="pmhdv/images/4.jpg" alt="" class="img-circle" width="50">
                                                </div>
                                                <div class="name float-left ml-3">
                                                    <em>Nguyễn Quỳnh</em>
                                                    <div class="info">
                                                        <span>10:26</span>
                                                        <span>21/6/2019</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                            <div class="cmt-text mt-4">
                                                <em>Đọc quyết định mới nhé</em>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
