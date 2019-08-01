<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
    <!--left-fixed -navigation-->
    <aside class="sidebar-left">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h1><a class="navbar-brand" href="{{ route('home') }}"><span class="fa fa-area-chart"></span> Manage<span class="dashboard_text">Quản lý bán hàng</span></a></h1>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="sidebar-menu">
                    <li class="header">MAIN MANAGE</li>
                    <li class="treeview">
                        <a>
                            <i class="fa fa-book"></i>
                            <span>Quản lý danh mục</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('admin.category')}}"><i class="fa fa-angle-right"></i> Danh sách danh mục</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a>
                            <i class="fa fa-laptop"></i>
                            <span>Quản lý sản phẩm</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('admin.product')}}"><i class="fa fa-angle-right"></i> Danh sách sản phẩm</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a>
                            <i class="fa fa-book"></i>
                            <span>Quản lý đơn hàng</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('admin.order')}}"><i class="fa fa-angle-right"></i> Danh sách đơn hàng</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a>
                            <i class="fa fa-users"></i>
                            <span>Quản lý người dùng</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.user') }}"><i class="fa fa-angle-right"></i> Danh sách người dùng</a></li>
                        </ul>
                    </li>


                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-book" aria-hidden="true"></i>
                            <span>Administrator</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('admin.profile')}}"><i class="fa fa-angle-right"></i>Thông tin cá nhân </a></li>
                            <li><a href="{{route('admin.password')}}"><i class="fa fa-angle-right"></i>Đổi mật khẩu </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>
</div>
