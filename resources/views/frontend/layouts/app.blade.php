<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title', 'IT Care Digital | Digital Marketing Experts')</title>
    <meta name="description" content="@yield('meta_description', 'Boost your business with SEO, PPC, web design, social media, and content marketing. IT Care Digital delivers results-driven strategies for growth.')">
    <meta name="keywords" content="@yield('meta_keywords', '')">
    <meta name="robots" content="noindex, nofollow">
    
    <!-- Organisation Schema can be written here -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <meta name="robots" content="noindex" /> -->
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="56x56"
        href="{{ asset('public/frontend/assets/images/fav-icon/icon.png') }}">
    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/bootstrap.min.css') }}" type="text/css"
        media="all">
    <!-- carousel CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/owl.carousel.min.css') }}" type="text/css"
        media="all">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/animate.css') }}" type="text/css" media="all">
    <!-- animated-text CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/animated-text.css') }}" type="text/css"
        media="all">
    <!-- font-awesome CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/all.min.css') }}" type="text/css" media="all">
    <!-- font-flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/flaticon.css') }}" type="text/css" media="all">
    <!-- theme-default CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/theme-default.css') }}" type="text/css"
        media="all">
    <!-- meanmenu CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/meanmenu.min.css') }}" type="text/css"
        media="all">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/style.css') }} " type="text/css" media="all">
    <!-- transitions CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/owl.transitions.css') }}" type="text/css"
        media="all">
    <!-- venobox CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend/venobox/venobox.css') }}" type="text/css" media="all">
    <!-- responsive CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/responsive.css') }}" type="text/css" media="all">
    <!-- modernizr js -->
    <script src="{{ asset('public/frontend/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <style>
        .hero-area {
            height: 890px;
            background: url("{{ asset('public/frontend/assets/images/hero-bg.png') }}");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            margin: -154px 0px 0;
        }

        .footer-area {
            background: url("{{ asset('public/frontend/assets/images/footer-bg.png') }}");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            padding: 0 0 20px;
            margin: 0 50px 35px;
        }

        .about-area.style-two {
            border-radius: 40px;
            background: url("{{ asset('public/frontend/assets/images/home-two/about-bg.png') }}");
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
            background: url("{{ asset('public/frontend/assets/images/feature6.png') }}");
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
            background: url("{{ asset('public/frontend/assets/images/feature7.png') }}");
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
            background: url("{{ asset('public/frontend/assets/images/service6.png') }}");
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
            content: "It Care Digital";
            background: url("{{ asset('public/frontend/assets/images/logo_white.png') }}") no-repeat left center;
            background-size: 30px auto;
            padding-left: 40px;
            font-size: 18px;
            font-weight: 600;
            color: #fff;
            position: absolute;
            top: 17px;
            left: 10px;
        }

        /* 
        @media (max-width: 991px) {
            .hero-contant {
                margin-top: 880px !important;
            }
        }

        @media (max-width: 480px) {

            .hero-contant {
                margin-top: 580px !important;
            }

        } */
    </style>


    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QGRGWJ4WMT"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-QGRGWJ4WMT');
    </script>
    <meta name="google-site-verification" content="c-TogzIdPIcSqJ6hRAde4MnyYbJeBhyNDWuefA25xdc" />
    <meta name="msvalidate.01" content="AEF5727EBA04B6F1B0EE2275B17F634C" />
    <link rel="canonical" href="https://itcaredigital.com/" />

    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "IT Care Digital",
  "url": "https://itcaredigital.com/",
  "publisher": {
	"@type": "Organization",
	"name": "IT Care Digital",
	"logo": {
  	"@type": "ImageObject",
  	"url": "https://itcaredigital.com/public/frontend/assets/images/Artboard%201It%20care%20digital.png"
	}
  },
  "hasPart": [
	{
  	"@type": "WebPage",
  	"url": "https://itcaredigital.com/about-us"
	},
	{
  	"@type": "WebPage",
  	"url": "https://itcaredigital.com/web-development"
	},
	{
  	"@type": "WebPage",
  	"url": "https://itcaredigital.com/web-design"
	},
	{
  	"@type": "WebPage",
  	"url": "https://itcaredigital.com/search-engine-optimization"
	},
	{
  	"@type": "WebPage",
  	"url": "https://itcaredigital.com/ppc-services"
	},
	{
  	"@type": "WebPage",
  	"url": "https://itcaredigital.com/social-media-marketing"
	},
	{
  	"@type": "WebPage",
  	"url": "https://itcaredigital.com/digital-content-marketing"
	},
	{
  	"@type": "WebPage",
  	"url": "https://itcaredigital.com/local-seo"
	},
	{
  	"@type": "WebPage",
  	"url": "https://itcaredigital.com/ecommerce-seo"
	},
	{
  	"@type": "WebPage",
  	"url": "https://itcaredigital.com/blog"
	},
	{
  	"@type": "WebPage",
  	"url": "https://itcaredigital.com/contact-us"
	}
  ]
}
</script>



</head>

<body>

    @include('frontend.layouts.header')

    @yield('content')

    @include('frontend.layouts.footer')


    <!-- jquery js -->
    <script src="{{ asset('public/frontend/assets/js/vendor/jquery-3.6.2.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('public/frontend/assets/js/bootstrap.min.js') }}"></script>
    <!-- carousel js -->
    <script src="{{ asset('public/frontend/assets/js/owl.carousel.min.js') }}"></script>
    <!-- counterup js -->
    <script src="{{ asset('public/frontend/assets/js/jquery.counterup.min.js') }}"></script>
    <!-- waypoints js -->
    <script src="{{ asset('public/frontend/assets/js/waypoints.min.js') }}"></script>
    <!-- wow js -->
    <script src="{{ asset('public/frontend/assets/js/wow.js') }}"></script>
    <!-- imagesloaded js -->
    <script src="{{ asset('public/frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- venobox js -->
    <script src="{{ asset('public/frontend/venobox/venobox.js') }}"></script>
    <!--  animated-text js -->
    <script src="{{ asset('public/frontend/assets/js/animated-text.js') }}"></script>
    <!-- venobox min js -->
    <script src="{{ asset('public/frontend/venobox/venobox.min.js') }}"></script>
    <!-- isotope js -->
    <script src="{{ asset('public/frontend/assets/js/isotope.pkgd.min.js') }}"></script>
    <!-- jquery meanmenu js -->
    <script src="{{ asset('public/frontend/assets/js/jquery.meanmenu.js') }}"></script>
    <!-- jquery scrollup js -->
    <script src="{{ asset('public/frontend/assets/js/jquery.scrollUp.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/jquery.barfiller.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/typed.js') }}"></script>
    <!-- jquery js -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="{{ asset('public/frontend/assets/js/vanilla-tilt.min.js') }}"></script>
    <!-- partial -->

    <!-- theme js -->
    <script src="{{ asset('public/frontend/assets/js/theme.js') }}"></script>

</body>

</html>