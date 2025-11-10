<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?php echo $__env->yieldContent('title', 'IT Care Digital | Digital Marketing Experts'); ?></title>
    <meta name="description"
        content="<?php echo $__env->yieldContent('meta_description', 'Boost your business with SEO, PPC, web design, social media, and content marketing. IT Care Digital delivers results-driven strategies for growth.'); ?>" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="robots" content="noindex" />
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="56x56"
        href="<?php echo e(asset('public/frontend/assets/images/fav-icon/icon.png')); ?>">
    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/bootstrap.min.css')); ?>" type="text/css"
        media="all">
    <!-- carousel CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/owl.carousel.min.css')); ?>" type="text/css"
        media="all">
    <!-- animate CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/animate.css')); ?>" type="text/css" media="all">
    <!-- animated-text CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/animated-text.css')); ?>" type="text/css"
        media="all">
    <!-- font-awesome CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/all.min.css')); ?>" type="text/css" media="all">
    <!-- font-flaticon CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/flaticon.css')); ?>" type="text/css" media="all">
    <!-- theme-default CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/theme-default.css')); ?>" type="text/css"
        media="all">
    <!-- meanmenu CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/meanmenu.min.css')); ?>" type="text/css"
        media="all">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/style.css')); ?> " type="text/css" media="all">
    <!-- transitions CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/owl.transitions.css')); ?>" type="text/css"
        media="all">
    <!-- venobox CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/venobox/venobox.css')); ?>" type="text/css" media="all">
    <!-- responsive CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/responsive.css')); ?>" type="text/css" media="all">
    <!-- modernizr js -->
    <script src="<?php echo e(asset('public/frontend/assets/js/vendor/modernizr-3.5.0.min.js')); ?>"></script>
    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <style>
        .hero-area {
            height: 890px;
            background: url("<?php echo e(asset('public/frontend/assets/images/hero-bg.png')); ?>");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            margin: -154px 0px 0;
        }

        .footer-area {
            background: url("<?php echo e(asset('public/frontend/assets/images/footer-bg.png')); ?>");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            padding: 0 0 20px;
            margin: 0 50px 35px;
        }

        .about-area.style-two {
            border-radius: 40px;
            background: url("<?php echo e(asset('public/frontend/assets/images/home-two/about-bg.png')); ?>");
            margin: 0 50px;
            padding: 120px 0 120px;
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .alert-success {
            color: green;
            font-weight: bold;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid green;
            border-radius: 5px;
        }

        .feature-sinble-single-box::before {
            position: absolute;
            content: "";
            height: 100%;
            width: 100%;
            background: url("<?php echo e(asset('public/frontend/assets/images/feature6.png')); ?>");
            left: -17%;
            top: -3%;
            z-index: -1;
            background-repeat: no-repeat;
            background-position: center;
        }

        .feature-sinble-single-box:after {
            position: absolute;
            content: "";
            height: 100%;
            width: 100%;
            transition: 0.5s;
            z-index: -1;
            background: url("<?php echo e(asset('public/frontend/assets/images/feature7.png')); ?>");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            right: 0;
            bottom: 0;
            transform: perspective(500px) rotateX(-90deg);
            opacity: 0;
        }

        .feature-sinble-single-box:hover:after {
            transform: perspective(500px) rotateX(0deg);
            opacity: 1;
        }

        .service-single-box::before {
            position: absolute;
            content: "";
            height: 100%;
            width: 100%;
            background: url("<?php echo e(asset('public/frontend/assets/images/service6.png')); ?>");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            left: 0;
            top: 0;
            z-index: -1;
            clip-path: polygon(50% 0, 50% 0, 50% 50%, 50% 100%, 50% 100%, 50% 50%);
            transition: 0.4s;
        }
        
.mean-container .mean-bar::before {
	color: #fff;
  background: url("<?php echo e(asset('public/frontend/assets/images/Artboard 1It care digital.png')); ?>");
	content: "It Care Digital";
	font-size: 28px;
	font-weight: 600;
	left: 10px;
	position: absolute;
	top: 17px;
}
@media (max-width: 991px) {
.hero-contant {
    margin-top: 520px !important;
}
}
@media (max-width: 480px) {
  
.hero-contant {
    margin-top: 0px !important;
}

}
    </style>

    <meta name="robots" content="noindex, nofollow">
</head>

<body>

    <?php echo $__env->make('frontend.layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('frontend.layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


    <!-- jquery js -->
    <script src="<?php echo e(asset('public/frontend/assets/js/vendor/jquery-3.6.2.min.js')); ?>"></script>
    <!-- bootstrap js -->
    <script src="<?php echo e(asset('public/frontend/assets/js/bootstrap.min.js')); ?>"></script>
    <!-- carousel js -->
    <script src="<?php echo e(asset('public/frontend/assets/js/owl.carousel.min.js')); ?>"></script>
    <!-- counterup js -->
    <script src="<?php echo e(asset('public/frontend/assets/js/jquery.counterup.min.js')); ?>"></script>
    <!-- waypoints js -->
    <script src="<?php echo e(asset('public/frontend/assets/js/waypoints.min.js')); ?>"></script>
    <!-- wow js -->
    <script src="<?php echo e(asset('public/frontend/assets/js/wow.js')); ?>"></script>
    <!-- imagesloaded js -->
    <script src="<?php echo e(asset('public/frontend/assets/js/imagesloaded.pkgd.min.js')); ?>"></script>
    <!-- venobox js -->
    <script src="<?php echo e(asset('public/frontend/venobox/venobox.js')); ?>"></script>
    <!--  animated-text js -->
    <script src="<?php echo e(asset('public/frontend/assets/js/animated-text.js')); ?>"></script>
    <!-- venobox min js -->
    <script src="<?php echo e(asset('public/frontend/venobox/venobox.min.js')); ?>"></script>
    <!-- isotope js -->
    <script src="<?php echo e(asset('public/frontend/assets/js/isotope.pkgd.min.js')); ?>"></script>
    <!-- jquery meanmenu js -->
    <script src="<?php echo e(asset('public/frontend/assets/js/jquery.meanmenu.js')); ?>"></script>
    <!-- jquery scrollup js -->
    <script src="<?php echo e(asset('public/frontend/assets/js/jquery.scrollUp.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/assets/js/jquery.barfiller.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/assets/js/typed.js')); ?>"></script>
    <!-- jquery js -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="<?php echo e(asset('public/frontend/assets/js/vanilla-tilt.min.js')); ?>"></script>
    <!-- partial -->

    <!-- theme js -->
    <script src="<?php echo e(asset('public/frontend/assets/js/theme.js')); ?>"></script>

</body>

</html><?php /**PATH C:\Neww Xammppp\htdocs\digiitcare_website\resources\views/frontend/layouts/app.blade.php ENDPATH**/ ?>