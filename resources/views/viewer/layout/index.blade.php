<!DOCTYPE html>
<html lang="en">


<head>
    <base href="{{asset('')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="pmhdv/css/bootstrap.min.css">
    <link rel="stylesheet" href="pmhdv/css/owl.carousel.min.css">
    <link rel="stylesheet" href="pmhdv/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="pmhdv/css/themify-icons.css">
    <link rel="stylesheet" href="pmhdv/css/style.css">
    <script src="pmhdv/js/jquery.min.js"></script>
    <script src="pmhdv/js/popper.min.js"></script>
    <script src="pmhdv/js/bootstrap.min.js"></script>
    <script src="pmhdv/js/owl.carousel.js"></script>
    <script src="pmhdv/js/ckeditor.js"></script>
    <script src="pmhdv/js/Chart.bundle.min.js"></script>
    <script src="pmhdv/js/script.js"></script>
    @yield('title')
</head>


<body>
    @include('viewer.layout.header')

    <section class="master pr-3">
        <div class="row">
            <div class="col-lg-2 fix-col text-left">
                @include('viewer.layout.menu')
            </div>
            <div class="col-lg-10">
                @yield('content')
            </div>
        </div>
        @yield('script')
    </section>
    @include('viewer.layout.footer')
</body>

</html>