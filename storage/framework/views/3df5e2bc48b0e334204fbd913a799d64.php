<div class="wrapper">
    <!--sidebar wrapper -->
    <div class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            <div>
                <img src="<?php echo e(asset('public/images/resources/Printer(2).webp')); ?>" style="width:175px" alt="logo icon">
            </div>
            <div>
                <!-- <h4 class="logo-text"><?php echo e($siteName ?? 'AllPrinterSite'); ?></h4> -->
            </div>
            <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i></div>
        </div>

        <!--navigation-->
        <ul class="metismenu" id="menu">
            <li>
                <a href="<?php echo e(route('dashboard')); ?>"> <i class='bx bx-home'></i>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>

            <li>
                <a href="<?php echo e(route('inquiry.list')); ?>">
                    <div class="parent-icon"><i class='bx bx-message-dots'></i>


                    </div>
                    <div class="menu-title">Customer Inquery</div>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-news'></i>
                    </div>
                    <div class="menu-title">Blogs</div>
                </a>
                <ul>
                    <li>
                        <a href="<?php echo e(route('admin.blog')); ?>"> <i class='bx bx-file'></i>Blog List
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('blog.category')); ?>"> <i class='bx bx-category'></i>Category</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-cog'></i></div>
                    <div class="menu-title">Settings</div>
                </a>
                <ul>
                    <li>
                        <a href="<?php echo e(route('metaPage')); ?>">
                            <i class='bx bx-sliders'></i>Meta Setting
                        </a>
                    </li>
                </ul>
            </li>

            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div class="parent-icon"><i class='bx bx-log-out'></i></div>
                <div class="menu-title">Logout</div>
            </a>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo csrf_field(); ?>
            </form>
            </li>
        </ul>
        <!--end navigation-->
    </div>
    <!--end sidebar wrapper -->
    <!--start header -->
    <header>
        <div class="topbar d-flex align-items-center">
            <nav class="navbar navbar-expand gap-3">
                <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                </div>

                <div class="search-bar d-lg-block d-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
                    <a href="avascript:;" class="btn d-flex align-items-center"><i class="bx bx-search"></i>Search</a>
                </div>

                <div class="top-menu ms-auto">
                    <ul class="navbar-nav align-items-center gap-1">
                        <li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal"
                            data-bs-target="#SearchModal">
                            <a class="nav-link" href="avascript:;"><i class='bx bx-search'></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown dropdown-laungauge d-none d-sm-flex">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:void(0);"
                                data-bs-toggle="dropdown"><img src="public/assets/images/county/02.png" width="22"
                                    alt="">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:void(0);">
                                        <img src="<?php echo e(asset('public/admin/assets/images/county/01.png')); ?>"
                                            width="20" alt="">
                                        <span class="ms-2">English</span></a>
                                </li>

                                <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:void(0);">
                                        <img src="<?php echo e(asset('public/admin/assets/images/county/03.png')); ?>"
                                            width="20" alt="">
                                        <span class="ms-2">French</span></a>
                                </li>

                            </ul>

                        </li>
                        <li class="nav-item dark-mode d-none d-sm-flex">
                            <a class="nav-link dark-mode-icon" href="javascript:void(0);"><i class='bx bx-moon'></i>
                            </a>
                        </li>

                        <li class="nav-item dropdown dropdown-app">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"
                                href="javascript:void(0);"><i class='bx bx-grid-alt'></i></a>

                        </li>

                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                                data-bs-toggle="dropdown">
                                <i class='bx bx-bell'></i>
                            </a>

                        </li>

                    </ul>
                </div>
                <div class="user-box dropdown px-3">
                    <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret"
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?php echo e(asset('public/admin/assets/images/avatars/avatar-2.png')); ?>" class="user-img"
                            alt="user avatar">

                        <div class="user-info">
                            <p class="user-name mb-0">Admin</p>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item d-flex align-items-center" href="javascript:void(0);"><i
                                    class="bx bx-user fs-5"></i><span>Profile</span></a>
                        </li>
                        <li><a class="dropdown-item d-flex align-items-center" href="javascript:void(0);"><i
                                    class="bx bx-cog fs-5"></i><span>Settings</span></a>
                        </li>
                        <li><a class="dropdown-item d-flex align-items-center" href="javascript:void(0);"><i
                                    class="bx bx-home-circle fs-5"></i><span>Dashboard</span></a>
                        </li>

                        <li>
                            <div class="dropdown-divider mb-0"></div>
                        </li>
                        <li><a class="dropdown-item d-flex align-items-center" href="javascript:void(0);"><i
                                    class="bx bx-log-out-circle"></i><span>Logout</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!--end header -->
    <!--start page wrapper -->
</div>
</div>
<!--end page wrapper -->
<!--start overlay-->
<div class="overlay toggle-icon"></div>
<!--end overlay-->
<!--Start Back To Top Button-->
<a href="javascript:void(0);" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->
<footer class="page-footer">
    <p class="mb-0">Copyright © 2024. All right reserved.</p>
</footer>
</div>
<?php /**PATH C:\xampp\htdocs\project\DigitalMarketingCommonBackend\resources\views/admin/includes/sidebar.blade.php ENDPATH**/ ?>