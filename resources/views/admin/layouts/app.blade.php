<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('images/favicon.png') }}" />

    <title>@yield('Title') ~ {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('admin.layouts.navigation')

        <!-- Page Content -->
        <main>
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{ route('admin.dashboard') }}" class="brand-link">
                    <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar Menu -->
                    <nav class="mt-3">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <li class="nav-item">
                                <a href="{{ route('admin.dashboard') }}"
                                    class="nav-link @if (request()->routeIs('admin.dashboard')) active @endif">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>{{ __('Dashboard') }}</p>
                                </a>
                            </li>

                            <div class="post"></div>

                            <!-- Manager menu start -->
                            @php
                                $managerLinkActive = '';
                            @endphp

                            @if (request()->routeIs('admin.managers.index') || request()->is('admin.managers/*'))
                                @php
                                    $managerLinkActive = 'active';
                                @endphp
                            @endif
                            <li class="nav-item">
                                <a href="{{ route('admin.managers.index') }}"
                                    class="nav-link {{ $managerLinkActive }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>{{ __('Managers') }}</p>
                                </a>
                            </li>
                            <!-- Manager menu end -->

                            <div class="post"></div>

                            <!-- User menu start -->
                            @php
                                $userMenuOpen = '';
                                $userMenuActive = '';
                                
                                $userLinkActive = '';
                                $approvUserActive = '';
                            @endphp

                            @if (request()->routeIs('admin.users.index') ||
                                request()->is('admin.users/*') ||
                                request()->routeIs('admin.users.waiting.approval'))
                                @php
                                    $userMenuOpen = 'menu-open';
                                    $userMenuActive = 'active';
                                @endphp
                            @endif

                            @if (request()->routeIs('admin.users.index') || request()->is('admin.users/*'))
                                @php
                                    $userLinkActive = 'active';
                                @endphp
                            @endif

                            @if (request()->routeIs('admin.users.waiting.approval') || request()->is('admin.users.waiting.approval/*'))
                                @php
                                    $approvUserActive = 'active';
                                @endphp
                            @endif
                            <li class="nav-item {{ $userMenuOpen }}">
                                <a href="javarscript:;" class="nav-link {{ $userMenuActive }}">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        {{ __('Users') }}
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.users.index') }}"
                                            class="nav-link {{ $userLinkActive }}">
                                            <i class="far fa-copy nav-icon"></i>
                                            <p>{{ __('Users') }}</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.users.waiting.approval') }}"
                                            class="nav-link {{ $approvUserActive }}">
                                            <i class="fas fa-th nav-icon"></i>
                                            <p>{{ __('Waiting Approval') }}</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- User menu end -->

                            <div class="post"></div>

                            <!-- Visitor menu start -->
                            @php
                                $visitorLinkActive = '';
                            @endphp

                            @if (request()->routeIs('admin.visitors.index') || request()->is('admin.managers/*'))
                                @php
                                    $visitorLinkActive = 'active';
                                @endphp
                            @endif
                            <li class="nav-item">
                                <a href="{{ route('admin.visitors.index') }}"
                                    class="nav-link {{ $visitorLinkActive }}">
                                    <i class="nav-icon fas fa-user-plus"></i>
                                    <p>{{ __('Visitor History') }}</p>
                                </a>
                            </li>
                            <!-- Visitor menu end -->

                            <div class="post"></div>

                            <!-- Announcement menu start -->
                            @php
                                $announcementLinkActive = '';
                            @endphp

                            @if (request()->routeIs('admin.announcements.index') || request()->is('admin.announcements/*'))
                                @php
                                    $announcementLinkActive = 'active';
                                @endphp
                            @endif
                            <li class="nav-item">
                                <a href="{{ route('admin.announcements.index') }}"
                                    class="nav-link {{ $announcementLinkActive }}">
                                    <i class="nav-icon fas fa-newspaper"></i>
                                    <p>{{ __('Announcement') }}</p>
                                </a>
                            </li>
                            <!-- Announcement menu end -->

                            <div class="post"></div>

                            <!-- Gallery menu start -->
                            @php
                                $galleryLinkActive = '';
                            @endphp

                            @if (request()->routeIs('admin.galleries.index') || request()->is('admin.galleries/*'))
                                @php
                                    $galleryLinkActive = 'active';
                                @endphp
                            @endif
                            <li class="nav-item">
                                <a href="{{ route('admin.galleries.index') }}"
                                    class="nav-link {{ $galleryLinkActive }}">
                                    <i class="nav-icon fas fa-images"></i>
                                    <p>{{ __('Gallery') }}</p>
                                </a>
                            </li>
                            <!-- Gallery menu end -->

                            <div class="post"></div>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                    <i class="nav-icon far fa-circle text-danger"></i>
                                    <p>{{ __('Logout') }}</p>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                            <div class="post"></div>

                            <li class="nav-item">&nbsp;</li>
                            <div class="post"></div>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">@yield('Title')</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
                                    <li class="breadcrumb-item active">@yield('Title')</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- /.content-wrapper -->
            <footer class="main-footer text-center">
                <strong>Copyright &copy; @php echo date('Y'); @endphp <a href="{{ route('front.home') }}"
                        target="_blank">{{ config('app.name', 'Laravel') }}</a>.</strong> All rights
                reserved.
            </footer>
        </main>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Select2 -->
    <script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

    <!-- bs-custom-file-input -->
    <script src="{{ asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <!-- Sparkline -->
    <script src="{{ asset('admin/plugins/sparklines/sparkline.js') }}"></script>

    <!-- jQuery Knob Chart -->
    <script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/js/adminlte.js') }}"></script>

    <!-- Summernote -->
    <script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
    @yield('js')
</body>

</html>
