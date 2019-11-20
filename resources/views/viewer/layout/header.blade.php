<section class="header position-relative">
    <div class="d-flex">
        <div class="col-6">
            <div class="d-flex align-items-center">
                <button type="button" class="btn-toggle">
                    <span class="hamburger-box">
                        <span class="hamburger"></span>
                    </span>
                </button>
                <a href="javascript:void(0)" class="btn-mobile-toggle d-none">
                    <span class="hamburger-box">
                        <span class="hamburger"></span>
                    </span>
                </a>
                <div class="logo">
                    <a href="viewer/congvanden/danhsach">
                        <img src="pmhdv/images/logo-haui.png" alt="">
                        <span class="logo-text">
                            <b>HAUI</b>
                            <em>Office</em>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-6 pr-lg-4">
            <ul class="navbar-nav">
                <li class="nav-item dropdown text-right">
                    <a href="" class="nav-link dropdown-toggle text-muted waves-effect waves-dark"
                        data-toggle="dropdown">
                        <img src="pmhdv/images/{{Auth::user()->avatar_code}}" class="img-circle" width="30" alt="">
                        <span>
                            <i class="fas fa-caret-down"></i>
                        </span>
                    </a>
                    @if(Auth::check())
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="viewer/user/thongtincanhan" class="dropdown-item">Thông tin cá nhân</a>
                        <div class="line"></div>
                        <a href="logout" class="dropdown-item">Đăng xuất</a>
                    </div>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</section>
