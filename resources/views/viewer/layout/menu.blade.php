<div class="menu pt-3">
    <div class="menu-content mt-4">
        <nav class="sidebar-nav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="viewer/congvandi/themmoi" class="btn-them">
                        <span class="icon-holder">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="sidebar-text">Tạo mới</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('viewer/congvanden/danhsach') ? 'active' : '' }}">
                    <a href="viewer/congvanden/danhsach" class="nav-link">
                        <span class="icon-holder c-blue">
                            <i class="fa fa-reply"></i>
                        </span>
                        <span class="sidebar-text">Công văn đến</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a href="" class="nav-link">
                        <span class="icon-holder c-brown">
                            <i class="fas fa-paper-plane"></i>
                        </span>
                        <span class="sidebar-text">Công văn đi</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('luutru') ? 'active' : '' }}">
                    <a href="luutru" class="nav-link">
                        <span class="icon-holder c-yellow">
                            <i class="fas fa-bookmark"></i>
                        </span>
                        <span class="sidebar-text">Lưu trữ</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('thongke') ? 'active' : '' }}">
                    <a href="thongke" class="nav-link">
                        <span class="icon-holder c-indigo">
                            <i class="fas fa-chart-line"></i>
                        </span>
                        <span class="sidebar-text">Thống kê</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
