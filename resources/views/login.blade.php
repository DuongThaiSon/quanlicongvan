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
    <div class="login">
        <div class="login-title">
            <img src="pmhdv/images/logo-icon.png" alt="">
            <span>Trường đại học công nghiệp Hà Nội</span>
        </div>
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
        <div class="form">
            <form action="{{route('post-login')}}" class="login-form" method="post">
                @CSRF
                <div class="login-fields">
                    <div class="login-user">
                        <div class="login-user_icon">
                            <img src="pmhdv/images/user-icon.png" alt="">
                        </div>
                        <input type="text" placeholder="Email" name="username">
                    </div>
                    <div class="login-password">
                        <div class="login-user_icon">
                            <img src="pmhdv/images/lock_icon.png" alt="">
                        </div>
                        <input type="password" placeholder="Mật khẩu" name="pass">
                    </div>
                    <div class="login-submit">
                        <button type="submit" class="btn-login">
                            Đăng nhập
                        </button>
                    </div>
                    
                </div>
            </form>
            
        </div>
    </div>
</body>

</html>