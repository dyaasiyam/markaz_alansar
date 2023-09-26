<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">

            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <li class="mt-2 mb-2 text-muted pl-4 font-medium menu-title">لوحة تحكم الطالب </li>

                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('student.home') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">الرئيسية</span>
                            </div>
                        </a>
                    </li>
                    <!-- menu title -->
                    <!-- menu item Elements-->
                    <li class="mt-4 mb-2 text-muted pl-4 font-medium menu-title ">دورات الطالب </li>

                    <li>

                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">الدورات</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('student.courses') }}">عرض الدورات</a></li>
                        </ul>
                    </li>
                    <!-- menu item calendar-->
                    <li class="mt-2 mb-2 text-muted pl-4 font-medium menu-title">الحضور والغباب </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">الحضور والغياب</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('student.student.attendance') }}">عرض الحضور والغياب </a> </li>
                        </ul>
                    </li>
                    <!-- menu item todo-->
                    <!-- menu item Charts-->
                    <li class="mt-2 mb-2 text-muted pl-4 font-medium menu-title">بيانات  الطالب </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                            <div class="pull-left"><i class="ti-pie-chart"></i><span
                                    class="right-nav-text">معلومات الطالب</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="chart" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('student.about') }}">عرض معلومات الطالب</a> </li>
                        </ul>
                    </li>
                    <!-- menu font icon-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#font-icon">
                            <div class="pull-left"><i class="ti-user"></i><span class="right-nav-text">معلومات الوالد</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="font-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('student.parent.index') }}">عرض بيانات الوالد</a> </li>

                        </ul>
                    </li>
                    <!-- menu title -->
                    <li class="mt-2 mb-2 text-muted pl-4 font-medium menu-title">العلامات </li>
                    <!-- menu item Widgets-->
                    <!-- menu item Form-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
                            <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">درجات الطالب</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Form" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('student.student.showeams') }}">عرض درجات الطالب</a> </li>
                        </ul>
                    </li>
                    <li class="mt-2 mb-2 text-muted pl-4 font-medium menu-title">الخطة الشهرية/التقارير </li>

                    <!-- menu item table -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#table">
                            <div class="pull-left"><i class="ti-layout-tab-window"></i><span class="right-nav-text">الخطة الشهرية</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="table" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('student.student.showplans') }}">عرض الخطة الشهرية للطالب</a> </li>
                        </ul>
                    </li>
                    {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#table">
                            <div class="pull-left"><i class="ti-layout-tab-window"></i><span class="right-nav-text">data
                                    table</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="table" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="data-html-table.html">Data html table</a> </li>
                            <li> <a href="data-local.html">Data local</a> </li>
                            <li> <a href="data-table.html">Data table</a> </li>
                        </ul>
                    </li>
                    <li class="mt-2 mb-2 text-muted pl-4 font-medium menu-title">More Pages</li>
                    <!-- menu item Custom pages-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#custom-page">
                            <div class="pull-left"><i class="ti-file"></i><span class="right-nav-text">Custom
                                    pages</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="custom-page" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="projects.html">projects</a> </li>
                            <li> <a href="project-summary.html">Projects summary</a> </li>
                            <li> <a href="profile.html">profile</a> </li>
                            <li> <a href="app-contacts.html">App contacts</a> </li>
                            <li> <a href="contacts.html">Contacts</a> </li>
                            <li> <a href="file-manager.html">file manager</a> </li>
                            <li> <a href="invoice.html">Invoice</a> </li>
                            <li> <a href="blank.html">Blank page</a> </li>
                            <li> <a href="layout-container.html">layout container</a> </li>
                            <li> <a href="error.html">Error</a> </li>
                            <li> <a href="faqs.html">faqs</a> </li>
                        </ul>
                    </li>
                    <!-- menu item Authentication-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#authentication">
                            <div class="pull-left"><i class="ti-id-badge"></i><span
                                    class="right-nav-text">Authentication</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="authentication" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="login.html">login</a> </li>
                            <li> <a href="register.html">register</a> </li>
                            <li> <a href="lockscreen.html">Lock screen</a> </li>
                        </ul>
                    </li>
                    <!-- menu item maps-->
                    <li>
                        <a href="maps.html"><i class="ti-location-pin"></i><span class="right-nav-text">maps</span>
                            <span class="badge badge-pill badge-success float-right mt-1">06</span></a>
                    </li>
                    <!-- menu item timeline-->
                    <li>
                        <a href="timeline.html"><i class="ti-panel"></i><span class="right-nav-text">timeline</span>
                        </a>
                    </li>
                    <!-- menu item Multi level-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#multi-level">
                            <div class="pull-left"><i class="ti-layers"></i><span class="right-nav-text">Multi
                                    level Menu</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="multi-level" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#auth">Level
                                    item 1<div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="auth" class="collapse">
                                    <li>
                                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#login">Level
                                            item 1.1<div class="pull-right"><i class="ti-plus"></i></div>
                                            <div class="clearfix"></div>
                                        </a>
                                        <ul id="login" class="collapse">
                                            <li>
                                                <a href="javascript:void(0);" data-toggle="collapse"
                                                    data-target="#invoice">level item 1.1.1<div class="pull-right"><i
                                                            class="ti-plus"></i></div>
                                                    <div class="clearfix"></div>
                                                </a>
                                                <ul id="invoice" class="collapse">
                                                    <li> <a href="#">level item 1.1.1.1</a> </li>
                                                    <li> <a href="#">level item 1.1.1.2</a> </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li> <a href="#">level item 1.2</a> </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#error">level
                                    item 2<div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="error" class="collapse">
                                    <li> <a href="#">level item 2.1</a> </li>
                                    <li> <a href="#">level item 2.2</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
