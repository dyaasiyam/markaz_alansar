<!DOCTYPE html>
<html lang="{{ app()->currentLocale() }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title', 'Admin Portal')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('panel/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="{{ asset('panel/css/sb-admin-2.min.css') }}" rel="stylesheet">
    @if (app()->currentLocale() == 'ar')
        <style>
            body {
                direction: rtl;
                text-align: right;
            }

            .sidebar {
                padding: 0
            }

            .ml-auto,
            .mx-auto {
                margin-left: unset !important;
                margin-right: auto !important;
            }

            .sidebar .nav-item .nav-link {
                text-align: right
            }

            .sidebar .nav-item .nav-link[data-toggle=collapse]::after {
                float: left;
                transform: rotate(180deg)
            }
        </style>
    @endif
    <style>
        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        /* ستايل لمحتوى القائمة المنسدلة */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        /* ستايل لروابط القائمة المنسدلة */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* ستايل لروابط القائمة المنسدلة عندما تتم المؤشرة عليها */
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        /* ستايل لعرض القائمة المنسدلة عندما يتم النقر على الزر */
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .sidebar.toggled{
            overflow: visible;
          width: 100%!important;
        }
        .sidebar {
    width: 0%;
    min-height: 100vh;
}

    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion te" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.home') }}">

                <div class="sidebar-brand-text mx-3">لوحة تحكم الإدارة</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>لوحة التحكم</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStage"
                    aria-expanded="true" aria-controls="collapseStage">
                    <i class="fas fa-fw fa-user-tie"></i>
                    <span>المراحل </span>
                </a>
                <div id="collapseStage" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" dir="rtl">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.stage.index') }}">قائمة المراحل</a>
                        <a class="collapse-item" href="{{ route('admin.circle.index') }}">قائمة الحلقات</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCourse"
                    aria-expanded="true" aria-controls="collapseCourse">
                    <i class="fas fa-fw fa-laptop"></i>
                    <span>الدورات</span>
                </a>
                <div id="collapseCourse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.course.index') }}">قائمة الدورات </a>
                        {{-- <a class="collapse-item" href="">Add New Course</a> --}}
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseActive"
                    aria-expanded="true" aria-controls="collapseActive">
                    <i class="fas fa-fw fa-laptop"></i>
                    <span>الأنشطة</span>
                </a>
                <div id="collapseActive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.active.index') }}">قائمة الأنشطة</a>
                        {{-- <a class="collapse-item" href="">Add New Course</a> --}}
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTeacher"
                    aria-expanded="true" aria-controls="collapseTeacher">
                    <i class="fas fa-fw fa-users"></i>
                    <span>المحفظين</span>
                </a>
                <div id="collapseTeacher" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.teacher.create') }}"> إضافة محفظ </a>
                        <a class="collapse-item" href="{{ route('admin.teacher.index') }}">قائمة المحفظين </a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStudent"
                    aria-expanded="true" aria-controls="collapseStudent">
                    <i class="fas fa-fw fa-users"></i>
                    <span>الطلاب</span>
                </a>
                <div id="collapseStudent" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.parent.create') }}"> إضافة ولي أمر طالب </a>
                        <a class="collapse-item" href="{{ route('admin.student.create') }}"> إضافة طالب </a>
                        <a class="collapse-item" href="{{ route('admin.student.index') }}">قائمة الطلاب </a>

                    </div>
                </div>
            </li>





            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        {{-- <ul>
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>ال
                            @endforeach
                        </ul> --}}


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                {{-- <img class="img-profile rounded-circle" src="{{ asset('panel/img/undraw_profile.svg') }}"> --}}
                                @if (Auth::user()->image)
                                <img src="{{asset('images/'.Auth::user()->image )}}" alt="user-img" width="36"
                                    class="img-profile rounded-circle">
                                    @else
                                    <img src=" https://ui-avatars.com/api/?background=random&name={{ Auth::user()->name }}" alt="user-img" width="36"
                                    class="img-profile rounded-circle">
                                @endif
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('admin.admin.profile.profile') }}">
                                    <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                                   الاعدادات
                                </a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                       تسجيل الخروج
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </li>


                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('panel/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('panel/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('panel/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('panel/js/sb-admin-2.min.js') }}"></script>
    @yield('js')
</body>
<script>
    function setSelectedLanguage(language) {
        document.getElementById('selectedLanguage').innerText = language;
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</html>
