@extends('viewer.layout.index')
@section('title')
<title>Lưu trữ</title>
@endsection
@section('content')

<section class="main-body fix-height">
    <div class="luutru-head sub-header">
        <h3>Thư mục</h3>
    </div>
    <div class="luutru-body news">
        <div class="row pl-3 pr-3">
        @foreach($types as $type)
            <div class="col-lg-3">
                <a href="viewer/congvan/luutru/{{$type->id}}">
                    <div class="save-box d-flex">
                        <div class="save-box--icon">
                            <i class="fas fa-folder"></i>
                        </div>
                        <div class="save-box--text">
                            {{$type->name}}
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
        </div>
    </div>
</section>

@endsection
