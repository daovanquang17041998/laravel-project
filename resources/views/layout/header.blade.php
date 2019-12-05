<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="">Quản lý</a>
    </div>
    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li>
                    <a href=""><i class="fa fa-user fa-fw"></i>
                    </a>
                </li>
                <li class="divider"></li>
                <li><a href="/login-admin"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <div class="space20">&nbsp;</div>
                <br>
                <li>
                    <a href="/login"><i class="fa fa-dashboard fa-fw"></i> Trang tổng quan</a>
                </li>
                <li>
                    <a href="javascript:void(0)"><i class="fa fa-cube fa-fw"></i> Danh mục<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="category/list">Danh sách</a>
                        </li>
                        <li>
                            <a href="category/add">Thêm</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)"><i class="fa fa-cube fa-fw"></i> Sản phẩm<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="product/list">Danh sách</a>
                        </li>
                        <li>
                            <a href="product/add">Thêm</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)"><i class="fa fa-bar-chart-o fa-fw"></i>Hóa Đơn<span
                            class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="bill/list">Danh sách</a>
                        </li>
                        <li>
                            <a href="bill/add">Thêm</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)"><i class="fa fa-users fa-fw"></i> Tài khoản<span
                            class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="user/list">Danh sách</a>
                        </li>
                        <li>
                            <a href="user/add">Thêm</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
