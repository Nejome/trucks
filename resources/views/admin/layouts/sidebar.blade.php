<nav class="navbar navbar-vertical fixed-right navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand hide_in_phone" style="color: #2dce89 !important;" href="{{url('/admin')}}">
            <i class="fas fa-tachometer-alt fa-3x"></i>
        </a>

        <ul class="nav align-items-center d-md-none">

            <li class="nav-item dropdown">

                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #2dce89 !important;">
                    <i class="fas fa-user-tie fa-2x"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right text-right">

                    <a href="#" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>ملفي الشخصي</span>
                    </a>


                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-user-run"></i>
                        <span>تسجيل الخروج</span>
                    </a>
                </div>

            </li>
        </ul>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">

                    <div class="col-6 collapse-brand">
                        <a href="#">

                        </a>
                    </div>

                    <div class="col-6 collapse-close text-left">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>

                </div>
            </div>


            <!-- Navigation -->
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin')}}">
                        <i class="ni ni-tv-2 text-primary"></i> لوحة التحكم
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/settings')}}">
                        <i class="fas fa-cog"></i> الإعدادات
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/categories')}}">
                        <i class="fas fa-table text-success"></i>التصنيفات
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/trucks')}}">
                        <i class="fas fa-truck text-yellow"></i> الشاحنات
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{url('admin/drivers')}}">
                        <i class="fas fa-id-badge text-cyan"></i>السائقين
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/customers')}}">
                        <i class="fas fa-users text-info"></i> العملاء
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/orders')}}">
                        <i class="fas fa-map-marked-alt text-blue"></i> الطلبيات
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/logout')}}">
                        <i class="fas fa-sign-out-alt text-danger"></i> تسجيل الخروج
                    </a>
                </li>

            </ul>

        </div>
    </div>
</nav>
