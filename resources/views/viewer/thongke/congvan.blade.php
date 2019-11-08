@extends('viewer.layout.index')
@section('title')
<title>Thống kê</title>
@endsection
@section('content')
<section class="thongke">
    <div class="main-body">
    
        <div class="sub-header">
            <div class="row">
                <div class="col-lg-3">
                    <div class="title">Thống kê</div>
                </div>
                <div class="col-lg-9">
                    <form action="{{route('get-tkcv')}}" method="get"> 
                    <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Thời gian bắt đầu</label>
                            <input type="date" name="thoigianbatdau" id="" class="form-control" style="width:200px">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Thời gian kết thúc</label>
                            <input type="date" name="thoigianketthuc" id="" class="form-control" style="width:200px">
                        </div>
                    </div>    
                    </div>    
                        <button type="submit" class="btn btn-info mt-2 btn-search-advance" style="width:200px; margin-left:200px">Tìm kiếm</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row mt-5 pl-5 pr-5">
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c1">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="fa fa-reply"></i>
                            </div>
                            
                            <div class="text">
                                <h2>{{count($congvandens)}}</h2>
                                <span>Công văn đến</span>
                            </div>
                            
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart1"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c2">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="fas fa-paper-plane"></i>
                            </div>
                            <div class="text">
                                <h2>{{count($congvandis)}}</h2>
                                <span>Công văn đi</span>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c3">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="fas fa-book-reader"></i>
                            </div>
                            <div class="text">
                                <h2>{{count($congvandendadocs)}}</h2>
                                <span>Công văn đã đọc</span>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart3"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c4">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="fas fa-book"></i>
                            </div>
                            <div class="text">
                                <h2>{{count($congvandens)-count($congvandendadocs)}}</h2>
                                <span>Công văn chưa đọc</span>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart4"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
