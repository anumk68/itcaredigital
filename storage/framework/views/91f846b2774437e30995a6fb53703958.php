<?php $__env->startSection('content'); ?>
<style>
    
        .breadcumb-area {

            background: url("<?php echo e(asset('public/frontend/assets/images/inner/breadcumb-bg.png')); ?>");
            padding: 230px 0 170px;
            background-repeat: no-repeat;
            background-size: contain;
            position: relative;
            margin: -77px 0px 0 -16px;
        }
    
/*inner page */
.breadcumb-area {
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
}

</style>
    <!--==================================================-->
    <!-- Start solutek breadcumb Area -->
    <!--==================================================-->
    <div class="breadcumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcumb-content">
                        <h1>Blog Details</h1>
                        <ul class="breadcumb-list">
                            <li><a href="#">Home</a></li>
                            <li class="list-arrow">&lt;</li>
                            <li>Blog Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================================================-->
    <!-- end solutek breadcumb Area -->
    <!--==================================================-->







    <!--==================================================-->
    <!-- Start solutek blog details-->
    <!--==================================================-->

    <div class="blog-details-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="blog-details-thumb">
                                <img src="<?php echo e(asset('public/' . $blog->banner)); ?>" alt="thumb">
                            </div>
                            <div class="blog-details-content">
                                <div class="meta-blog">
                                    <span class="mate-text">By Author</span>
                                    <span><i class="fas fa-calendar-alt"></i>05 January, 2024</span>
                                    <span><img src="<?php echo e(asset('public/frontend/assets/images/inner/category-icon.png')); ?>"
                                            alt="">IT Solutions</span>
                                </div>
                                <h4 class="blog-details-title"><?php echo e($blog->title); ?></h4>

                                

                                

                                <p class="blog-details-desc two"><?php echo $blog->description; ?></p>


                                
                            </div>
                            

                        </div>

                    </div>
                </div>
                <!-- <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="widget-sidber">
                                <div class="widget_search">
                                    <form action="#" method="get">
                                        <input type="text" name="s" value="" placeholder="Search Here"
                                            title="Search for:">
                                        <button type="submit" class="icons">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="widget-sidber">
                                <div class="widget-sidber-content">
                                    <h4>Main Services</h4>
                                </div>
                                <div class="widget-category">
                                    <ul>
                                        <li><a href="#"><img
                                                    src="<?php echo e(asset('public/frontend/assets/images/inner/category-icon.png')); ?>"
                                                    alt="">App Development<i class="bi bi-arrow-right"></i></a></li>
                                        <li><a href="#"><img
                                                    src="<?php echo e(asset('public/frontend/assets/images/inner/category-icon.png')); ?>"
                                                    alt="">IT Solution<i class="bi bi-arrow-right"></i></a></li>
                                        <li><a href="#"><img
                                                    src="<?php echo e(asset('public/frontend/assets/images/inner/category-icon.png')); ?>"
                                                    alt="">Digital Marketing<i class="bi bi-arrow-right"></i></a>
                                        </li>
                                        <li><a href="#"><img
                                                    src="<?php echo e(asset('public/frontend/assets/images/inner/category-icon.png')); ?>"
                                                    alt="">Web Design<i class="bi bi-arrow-right"></i></a></li>
                                        <li><a href="#"><img
                                                    src="<?php echo e(asset('public/frontend/assets/images/inner/category-icon.png')); ?>"
                                                    alt="">Web Development<i class="bi bi-arrow-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="widget-sidber">
                                <div class="widget-sidber-content">
                                    <h4>Popular Post</h4>
                                </div>
                                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="sidber-widget-recent-post">
                                        <div class="recent-widget-thumb">
                                            <img src="<?php echo e(asset('public/'.$blod->banner)); ?>" class="img-fluid"
                                                alt="img">
                                        </div>
                                        <div class="recent-widget-content">
                                            <a href="<?php echo e(route('blog-detail', $blod->slug)); ?>"><?php echo e($blod->title); ?>

                                            </a>
                                            <p><?php echo e($blod->created_at->format('M d, Y')); ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </div>
                            <div class="widget-sidber">
                                <div class="widget-sidber-content">
                                    <h4>Tags</h4>
                                </div>
                                <div class="widget-catefories-tags">
                                    <a href="#">Cyber Security</a>
                                    <a href="#">Learning</a>
                                    <a href="#">Software</a>
                                    <a href="#">Development</a>
                                    <a href="#">Marketing</a>
                                    <a href="#">Technology</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <!--==================================================-->
    <!-- end solutek blog  details Area-->
    <!--==================================================-->






    <!--==================================================-->
    <!-- Start solutek address Area -->
    <!--==================================================-->


    <div class="address-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="address-box">
                        <div class="address-icon">
                            <img src="<?php echo e(asset('public/frontend/assets/images/address1.png')); ?>" alt="address1">
                        </div>
                        <div class="address-title">
                            <h3>Elevating Customer Experience.</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="address-box2">
                        <div class="address-icon">
                            <img src="<?php echo e(asset('public/frontend/assets/images/address2.png')); ?>" alt="address1">
                        </div>
                        <div class="solutek-btn">
                            <a href="<?php echo e(route('contact')); ?>">+44 920 090 505
                                <div class="solutek-hover-btn hover-bx"></div>
                                <div class="solutek-hover-btn hover-bx2"></div>
                                <div class="solutek-hover-btn hover-bx3"></div>
                                <div class="solutek-hover-btn hover-bx4"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--==================================================-->
    <!-- end solutek address Area -->
    <!--==================================================-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ITcaredigital_29oct\SendAnywhere_085453\itCareDigital_For_SEO_Chnages_From_Mamta\itCareDigital_For_SEO_Chnages_From_Mamta\resources\views/frontend/blog-details.blade.php ENDPATH**/ ?>