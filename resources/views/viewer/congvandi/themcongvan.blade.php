@extends('viewer.layout.master')
@section('title')
<title>Gửi công văn</title>
@endsection
@section('content')
<style type="text/css">
    .select2-results__option[aria-selected=true] {
        display: none;
    }

</style>


<section class="bg-white main-content">
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $err)
        {{ $err }}<br>
        @endforeach
    </div>
    @endif

    @if(session('thongbao'))
    <div class="alert alert-success">
        {{ session('thongbao') }}
    </div>
    @endif
    <div class="container-fluid">
        <div class="back back-js d-none">
            <i class="fas fa-chevron-left"></i>
            <span>Quay lại</span>
        </div>
        <div class="main-form">
            <h3 class="form-create-title pt-4 mb-4">
                Gửi công văn
            </h3>
            <form action="{{route('them-cv')}}" method="POST" enctype="multipart/form-data">
                @CSRF
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box-create-left create-section">
                            <div class="form-group">
                                <label for="">Tiêu đề công văn<sup>*</sup></label>
                                <input type="text" placeholder="Tiêu đề" name="tieude" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="">Loại công văn<sup>*</sup></label>
                                        <select name="loaicongvan" id="" class="form-control">
                                            @foreach($type_documentarys as $type_documentary)
                                            <option value="{{$type_documentary->id}}">{{$type_documentary->name}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="">Bộ phận nhận<sup>*</sup></label>
                                        <select name="bophannhan" id="bophannhan" class="form-control">
                                            @foreach($majors as $major)
                                            <option value="{{$major->id}}">{{$major->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Người nhận<sup>*</sup></label>
                                <select name="nguoinhan[]" id="nguoinhan" multiple class="form-control">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box-create-left create-section">
                            <div class="form-group">
                                <label for="">Nội dung văn bản<sup>*</sup></label>
                                <textarea cols="30" rows="10" name="noidung" id="editor" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Tệp đính kèm<sup>*</sup></label>
                                <input type="file" name="teptin" style="padding: 3px 10px" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn-add continue">Gửi</button>
            </form>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    $(document).ready(function () {
        var idbophannhan = $("#bophannhan").val();
        var $j = jQuery.noConflict();
        $.get("viewer/ajax/user/" + idbophannhan, function (data) {
            var optSelected = "";
            $.each(data,function(i,item){
                    optSelected += "<option value="+item.id+"> "+item.name+" </option>"
                    
                });
                $("#nguoinhan").html(optSelected);
        });
        $("#bophannhan").change(function () {
            var idbophannhan = $(this).val();
            var $j = jQuery.noConflict();
            $.get("viewer/ajax/user/" + idbophannhan, function (data) {
                var optSelected = "";
                $("#nguoinhan :selected").map(function(i,item){
                    optSelected += "<option selected value="+item.value+"> "+item.text+"</option>";
                });
                var currentData = $('#nguoinhan').val();
                $.each(data,function(i,item){
                    optSelected += "<option value="+item.id+"> "+item.name+" </option>"
                    
                });
                $("#nguoinhan").html(optSelected);
                console.log(data);
            });
            
        });
        
    });

    $("#nguoinhan").select2({
        placeholder: 'Người nhận',
        allowClear: true
    });

</script>
@endsection
