@extends('viewer.layout.index')
@section('title')
    <title>Chi Tiết</title>
@endsection
@section('content')

<body>
  


<div class="main-body">
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
                                    <div class="col-lg-9">
                                        <div class="title">
                                            {{$chitiet->documentary_send->name}}
                                        </div>
                                        <div class="subtitle">
                                            <span>{{$chitiet->documentary_send->User->name}} - </span>
                                            <span>{{$chitiet->documentary_send->User->email}} - </span>
                                            <span>lúc </span>
                                            <span>{{ $chitiet->documentary_send['updated_at']->format('H:i') }} - </span>
                                            <span>{{ $chitiet->documentary_send['updated_at']->format('d/m/Y') }}</span>
                                        </div>
                                       
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="seal">
                                            <img src="pmhdv/images/effective.png" alt="" class="float-left">
                                            <div class="text">
                                                <p class="mb-0">Đã ban hành</p>
                                                <p class="range">30/9/2019</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="document-content">
                                {{$chitiet->documentary_send->content}}

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
                                                {{$chitiet->documentary_send->file}}
                                                </div>
                                                <div class="file-info">                                                
                                                    {{number_format($chitiet->documentary_send->storage/1048576,2)}}KB
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                            <a href="download/{{$chitiet->documentary_send->file}}" title="Tải xuống" download="{{$chitiet->documentary_send->file}}">
                                                        <i class="fas fa-file-download"></i>
                                                    </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="file-display">
                                        <object data="BROCHURE OFFICE.pdf" type="application/pdf">
                                            <iframe src=""></iframe>
                                        </object>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment">
                            <div class="box-post">
                                <div class="user">
                                    <div class="avatar float-left">
                                        <img src="pmhdv/images/4.jpg" alt="" class="img-circle" width="50">
                                    </div>
                                    <div class="name float-left ml-3">
                                        <em>Nguyễn Quỳnh</em>
                                        <div class="info">
                                            <span>BC</span>
                                            <span>@quynhnt</span>
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
                                        <div class="reply mt-4">
                                            <span class="tra-loi" id="tra-loi1">Trả lời</span>
                                            <div class="hidden reply-input" id="rep1">
                                                <input type="text" placeholder="Comment và nhấn Enter để gửi">
                                            </div>
                                        </div>
                                        <div class="box-reply">
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
                                            <div class="reply mt-4">
                                                <span class="tra-loi" id="tra-loi2">Trả lời</span>
                                                <div class="hidden reply-input" id="rep2">
                                                    <input type="text" placeholder="Comment và nhấn Enter để gửi">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="doc-side">
                            <div class="box-info">
                                
                                
                                <div class="form-group">
                                    <label for="">Loại công văn</label>
                                    <div class="type">
                                        <span>{{$chitiet->documentary_send->type_documentary->name}} Nội bộ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="box-seen">
                                <div class="title">
                                    <span>33</span>
                                    <span> người đã xem.</span>
                                </div>
                                <div class="avatars">
                                    <div class="image">
                                        <img src="pmhdv/images/1.jpg" alt="">
                                    </div>
                                    <div class="image">
                                        <img src="pmhdv/images/2.jpg" alt="">
                                    </div>
                                    <div class="image">
                                        <img src="pmhdv/images/3.jpg" alt="">
                                    </div>
                                    <div class="image">
                                        <img src="pmhdv/images/4.jpg" alt="">
                                    </div>
                                    <div class="image">
                                        <img src="pmhdv/images/5.jpg" alt="">
                                    </div>
                                    <div class="image">
                                        <img src="pmhdv/images/6.jpg" alt="">
                                    </div>
                                    <div class="image">
                                        <img src="pmhdv/images/7.jpg" alt="">
                                    </div>
                                    <div class="image">
                                        <img src="pmhdv/images/1.jpg" alt="">
                                    </div>
                                    <div class="image">
                                        <img src="pmhdv/images/2.jpg" alt="">
                                    </div>
                                    <div class="image">
                                        <img src="pmhdv/images/3.jpg" alt="">
                                    </div>
                                    <div class="image">
                                        <img src="pmhdv/images/4.jpg" alt="">
                                    </div>
                                    <div class="image">
                                        <img src="pmhdv/images/5.jpg" alt="">
                                    </div>
                                    <div class="image">
                                        <img src="pmhdv/images/6.jpg" alt="">
                                    </div>
                                    <div class="image">
                                        <img src="pmhdv/images/7.jpg" alt="">
                                    </div>
                                    <div class="image">
                                        <img src="pmhdv/images/1.jpg" alt="">
                                    </div>
                                    <div class="image">
                                        <img src="pmhdv/images/2.jpg" alt="">
                                    </div>
                                    <div class="image">
                                        <img src="pmhdv/images/3.jpg" alt="">
                                    </div>
                                    <div class="image">
                                        <img src="pmhdv/images/4.jpg" alt="">
                                    </div>
                                    <div class="image">
                                        <img src="pmhdv/images/5.jpg" alt="">
                                    </div>
                                    <div class="image">
                                        <img src="pmhdv/images/6.jpg" alt="">
                                    </div>
                                    <div class="image">
                                        <img src="pmhdv/images/7.jpg" alt="">
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            
                        </div>
                        <div class="box-info">
                            <div class="title">Thông tin thêm</div>
                            <div class="form-group">
                                <label for="">Ngày ban hành</label>
                                <div class="box-more-info">19/9/2019</div>
                            </div>
                            <div class="form-group">
                                <label for="">Ngày hiệu lực</label>
                                <div class="box-more-info">19/9/2019</div>
                            </div>
                            <div class="form-group">
                                <label for="">Ngày hết hạn</label>
                                <div class="box-more-info">31/9/2020</div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

</body>
@endsection