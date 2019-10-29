@extends('viewer.layout.index')
@section('title')
<title>Lưu trữ</title>
@endsection
@section('content')

<section class="main-body">
    <div class="luutru-head sub-header">
        <h3>Thư mục</h3>
    </div>
    <div class="luutru-body news">
        <div class="row pl-3 pr-3">
            <div class="col-lg-2">
                <a href="luutru-detail">
                    <div class="save-box d-flex">
                        <div class="save-box--icon">
                            <i class="fas fa-folder"></i>
                        </div>
                        <div class="save-box--text">
                            Thông báo
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-2">
                <a href="luutru-detail">
                    <div class="save-box d-flex">
                        <div class="save-box--icon">
                            <i class="fas fa-folder"></i>
                        </div>
                        <div class="save-box--text">
                            Thông báo
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
