<!-- loder -->
<div class="loader-wrapper">
    <div class="loader"></div>
    <div class="loder-section left-section"></div>
    <div class="loder-section right-section"></div>
</div>




<!--==================================================-->
<!-- Start solutek Main Menu Area -->
<!--==================================================-->
<div id="sticky-header" class="solutek_nav_manu">
    <div class="container-fluid">
        <div class="row d-flex align-items-center">
            <div class="col-lg-2">
                <div class="logo">
                    <a class="logo_img" href="<?php echo e(route('home')); ?>" title="solutek">
                        <img src="<?php echo e(asset('public/frontend/assets/images/Artboard 1It care digital.png')); ?>" alt="logo">
                    </a>
                    <a class="main_sticky" href="<?php echo e(route("home")); ?>" title="solutek">
                        <img src="<?php echo e(asset('public/frontend/assets/images/Artboard 1It care digital.png')); ?>" alt="astute">
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <nav class="solutek_menu">
                    <ul class="nav_scroll">
                        <li><a href="<?php echo e(route('home')); ?>">Home </a>

                        </li>
                        <li><a href="<?php echo e(route('about-us')); ?>">About Us </a>

                        </li>

                        <li><a href="#">Web Services <i class="bi bi-chevron-down"></i></a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo e(route('web-design')); ?>">Web Design</a></li>
                                <li><a href="<?php echo e(route('web-development')); ?>">Web Development</a></li>


                            </ul>
                        </li>
                        <li><a href="#">Digital Marketing<i class="bi bi-chevron-down"></i></a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo e(route('search-engine-optimization')); ?>">Search Engine Optimization</a>
                                </li>
                                <li><a href="<?php echo e(route('ppc-services')); ?>">PPC Management</a></li>
                                <li><a href="<?php echo e(route('social-media-marketing')); ?>">Social media Marketing</a></li>
                                <li><a href="<?php echo e(route('digital-content-marketing')); ?>">Digital Content Marketing</a>
                                </li>
                                <li><a href="<?php echo e(route('local-seo')); ?>">Local Seo </a></li>
                                <li><a href="<?php echo e(route('ecommerce-seo')); ?>">Ecommerce Seo</a></li>


                            </ul>
                        </li>
                        <li><a href="<?php echo e(route('contact')); ?>">Contact Us </a>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-2">
                <div class="header-btn">
                    <a href="<?php echo e(route('contact')); ?>">Get A Quote NOW <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- solutek Mobile Menu Area -->
<div class="mobile-menu-area sticky d-sm-block d-md-block d-lg-none ">
    <div class="mobile-menu">
        <nav class="solutek_menu">
            <ul class="nav_scroll">
                <li><a href="<?php echo e(route('home')); ?>">Home</a>
                    
                </li>
                <li><a href="#">Company <i class="bi bi-chevron-down"></i></a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo e(route('about-us')); ?>">About Us</a></li>
                        
                        
                        
                        
                        
                        <li><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
                    </ul>
                </li>
                
                
                <li><a href="#">Service</a></li>
                 <li><a href="<?php echo e(route('blog')); ?>">Blog</a></li>
                
                <li><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
            </ul>
        </nav>
    </div>
</div>
<!--==================================================-->
<!-- End solutek Main Menu Area -->
<!--==================================================-->


<!--==================================================-->
<!-- Start Curser Section Here -->
<!--==================================================-->
<div class="curser"></div>
<div class="curser2"></div>
<!--==================================================-->
<!-- Ends Curser Section Here -->
<!--==================================================-->
<?php /**PATH C:\xampp\htdocs\itcaredigitalforadmin_backend\resources\views/frontend/layouts/header.blade.php ENDPATH**/ ?>