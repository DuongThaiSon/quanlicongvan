@extends('viewer.layout.index')
@section('title')
<title>Chi Tiết</title>
@endsection
@section('content')

<body>
    <div class="bg-white main-content">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="viewer/congvandi/danhsach">Công văn gửi đi</a></li>
            
        </ul>
        <div class="doc-main">
            <div class="row">
                <div class="col-lg-9">
                    <div class="doc-main_content">
                        <div class="top-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="title">
                                        {{$congvandi->name}}
                                    </div>
                                    <div class="subtitle">
                                        <span>{{$congvandi->User->name}} - </span>
                                        <span>{{$congvandi->User->email}} - </span>
                                        <span>lúc </span>
                                        <span>{{ $congvandi['updated_at']->format('H:i') }} - </span>
                                        <span>{{ $congvandi['updated_at']->format('d/m/Y') }}</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="document-content">
                            {!! $congvandi->content !!}
                        </div>
                        <div class="files">
                            <div class="subheader">
                                Tài liệu {{$congvandi->file_code}}
                            </div>
                            <div class="file">
                                <div class="file-header">
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <div class="file-name">
                                                {{$congvandi->file}}
                                            </div>
                                            <div class="file-info">
                                                {{number_format($congvandi->storage/1048576,2)}}KB
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <a class="btn-download" href="download/{{$congvandi->file_code}}"
                                                title="Tải xuống" download="{{$congvandi->file_code}}">
                                                <i class="fas fa-file-download"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $name = explode(".",$congvandi->file_code);
                                ?>
                                <div class="file-display">
                                @if($name[1] == "pdf")
                                    <embed src="pmhdv/images/{{$congvandi->file_code}}" width="100%" height="600px"/>
                                    
                                    
                                @else
                                    <embed src="pmhdv/images/{{$congvandi->file_pdf}}" width="100%" height="600px" />
                                    
                                    
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
                                <span>{{$snx}}</span>
                                <span> người đã xem.</span>
                            </div>
                            <div class="avatars">  
                                 @foreach($congvandenxem as $cvdx)                            
                                <div class="image">
                                    <img src="pmhdv/images/{{$cvdx->User->avatar_code}}" alt="">
                                </div>                           
                                @endforeach  
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="box-seen">
                            <div class="title">
                                <span>{{$snbl}}</span>
                                <span> người đã bình luận</span>
                            </div>
                            <div class="avatars">  
                                @foreach($congvanden as $cvd)                          
                                    <a href="{{route('get-xemblcvdi',[$cvd->id,$congvandi->id])}}" class="image" title="Xem bình luận">
                                        <img src="pmhdv/images/{{$cvd->User->avatar_code}}" alt="">
                                    </a>
                                @endforeach                            
                            </div>
                            <div class="clear"></div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
