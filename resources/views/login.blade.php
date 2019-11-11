<!DOCTYPE html>
<html lang="en">

<head>
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
    <script src="pmhdv/js/script.js"></script>
    <title>Đăng nhập</title>
</head>

<body id="login-bg">
    <div class="card">

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
        <form action="{{route('post-login')}}" class="login-form" method="post">
            @CSRF
            <img src="pmhdv/images/logo-haui.png" class="logo-haui" alt="">
            <h1 class="title-login">Đăng nhập</h1>
            <div class="login-fields">
                <div class="login-user d-flex">
                    <div class="login-user_icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <input type="text" placeholder="Email" name="username" class="form-control">
                </div>
                <div class="login-password d-flex">
                    <div class="login-user_icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <input type="password" placeholder="Mật khẩu" name="pass" class="form-control">
                </div>
                <div class="login-submit">
                    <button type="submit" class="btn-login btn btn-info">
                        Đăng nhập
                    </button>
                </div>

            </div>
        </form>

    </div>
</body>

</html>
