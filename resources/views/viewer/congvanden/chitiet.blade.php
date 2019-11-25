@extends('viewer.layout.index')
@section('title')
<title>Chi Tiết</title>
@endsection
@section('content')

<body>
    <div class="bg-white main-content">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="viewer/congvanden/danhsach">Trang chủ</a></li>
            
        </ul>
        <div class="doc-main">
            <div class="row">
                <div class="col-lg-9">
                    <div class="doc-main_content">
                        <div class="top-content">
                            <div class="row">
                                <div class="col-lg-12">
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
                            </div>
                        </div>
                        <div class="document-content">
                            {!! $chitiet->documentary_send->content !!}
                        </div>
                        <div class="files">
                            <div class="subheader">
                                Tài liệu {{$chitiet->documentary_send->file_code}}
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
                                            <a class="btn-download" href="download/{{$chitiet->documentary_send->file_code}}"
                                                title="Tải xuống" download="{{$chitiet->documentary_send->file_code}}">
                                                <i class="fas fa-file-download"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $name = explode(".",$chitiet->documentary_send->file_code);
                                ?>
                                <div class="file-display">
                                @if($name[1] == "pdf")
                                    <embed src="pmhdv/images/{{$chitiet->documentary_send->file_code}}" width="100%" height="600px"/>
                                    
                                    
                                @else
                                    <embed src="pmhdv/images/{{$chitiet->documentary_send->file_pdf}}" width="100%" height="600px" />
                                    
                                    
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="doc-side">
                        @if(Auth::user()->id_role == 11)
                        <div class="comment">
                            <div class="box-post">
                                <div class="user">
                                    <div class="avatar float-left">
                                        <img src="pmhdv/images/{{$chitiet->User->avatar_code}}" alt="" class="img-circle" width="50">
                                    </div>
                                    <div class="name float-left ml-3">
                                        <em>{{$chitiet->User->name}}</em>
                                        
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="form-post mt-4">
                                    <form action="{{route('binh-luan',$chitiet->id)}}" style="text-align:center" method="post">
                                        @CSRF
                                        <textarea name="binhluan" id="" placeholder="Viết bình luận của bạn"></textarea>
                                        <button type="submit">Bình luận</button>
                                    </form>
                                </div>
                            </div>
                            <div class="box-comment">
                                <!-- <div class="box-cmt_header">
                                    <span>4</span> Thảo luận
                                </div> -->
                                <div class="list-cmt mt-4">
                                    <div class="post">
                                    @foreach($comment as $cm)
                                        <div class="mb-4">
                                            <div class="user">
                                                <div class="avatar float-left">
                                                    <img src="pmhdv/images/{{$cm->User->avatar_code}}" alt="" class="img-circle" width="50">
                                                </div>
                                                <div class="name float-left ml-3">
                                                    <em>{{$cm->User->name}}</em>
                                                    <div class="info">
                                                       
                                                        <span>{{ $cm->created_at->format('H:i') }} </span>
                                                        <span> - </span>
                                                        <span>{{ $cm->created_at->format('d/m/Y') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                            <div class="cmt-text mt-4">
                                                <em>{{$cm->content}}</em>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
