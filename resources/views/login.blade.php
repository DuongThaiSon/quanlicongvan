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
                    <p class="login-signup text-center mt-4">
                        Don't have an account ?
                        <a href="#" class="login-message">Sign up</a>
                    </p>
                </div>
            </form>
            <form action="" class="register-form">
                <div class="form-group">
                    <input type="text" placeholder="Full name">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="User name">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Type your password again">
                </div>
                <div class="form-group">
                    <input type="email" placeholder="Email">
                </div>
                <div class="login-submit">
                    <button type="submit" class="btn-login">
                        <a href="index.html">Sign up</a>
                    </button>
                </div>
                <p class="login-signup text-center mt-4">
                    Already have an account ?
                    <a href="#" class="login-message">Sign in</a>
                </p>
            </form>
        </div>
    </div>
</body>

</html>