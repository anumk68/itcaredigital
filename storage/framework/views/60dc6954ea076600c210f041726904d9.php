<?php $__env->startSection('content'); ?>
    <!--==================================================-->
    <!-- Start solutek breadcumb Area -->
    <!--==================================================-->
    <div class="breadcumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcumb-content">
                        <h1>Blog Grid</h1>
                        <ul class="breadcumb-list">
                            <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                            <li class="list-arrow">&lt;</li>
                            <li>Blog Grid</li>
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
    <!-- Start solutek blog Area style-grid-->
    <!--==================================================-->

    <div class="blog-area style-grid">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog-box">
                            <div class="single-blog-thumb">
                                <img src="<?php echo e(asset('public/' .$blog->banner)); ?>" alt="thumb">
                            </div>
                            <div class="blog-box-content">
                                <div class="meta-blog">
                                    <a href="<?php echo e(route('blog-detail', $blog->slug)); ?>"><span><i class="far fa-user"></i>By
                                            wotech</span></a>
                                    <p><span><img src="<?php echo e(asset('public/frontend/assets/images/inner/grid-calen.png')); ?>"
                                                alt="icon"></span>January 5, 2024</p>
                                </div>
                                <h3><a href="<?php echo e(route('blog-detail', $blog->slug)); ?>"><?php echo e($blog->title); ?>

                                    </a></h3>
                                <div class="blog-button">
                                    <a href="<?php echo e(route('blog-detail', $blog->slug)); ?>">REAM MORE<i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                
                
                
                
            </div>
        </div>
    </div>

    <!--==================================================-->
    <!-- end solutek blog Area style-grid-->
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
                            <a href="<?php echo e(route('blog-detail', $blog->slug)); ?>">+44 920 090 505
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

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\itcaredigitalforadmin_backend\resources\views/frontend/blog.blade.php ENDPATH**/ ?>