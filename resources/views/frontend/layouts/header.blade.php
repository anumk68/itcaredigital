<header id="sticky-header" class="solutek_nav_manu">
  <div class="container-fluid">
    <div class="row align-items-center">
      <!-- LOGO -->
      <div class="col-lg-2 col-6">
        <div class="logo">
          <a href="{{ route('home') }}" class="logo_img">
            <img src="{{ asset('public/frontend/assets/images/Artboard 1It care digital.png') }}" alt="logo" class="img-fluid">
          </a>
        </div>
      </div>

      <!-- DESKTOP MENU -->
      <div class="col-lg-8 d-none d-lg-block">
        <nav class="solutek_menu">
          <ul class="nav_scroll">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about-us') }}">About Us</a></li>

            <li>
              <a href="#">Web Services <i class="bi bi-chevron-down"></i></a>
              <ul class="sub-menu">
                <li><a href="{{ route('web-design') }}">Web Design</a></li>
                <li><a href="{{ route('web-development') }}">Web Development</a></li>
              </ul>
            </li>

            <li>
              <a href="#">Digital Marketing <i class="bi bi-chevron-down"></i></a>
              <ul class="sub-menu">
                <li><a href="{{ route('search-engine-optimization') }}">Search Engine Optimization</a></li>
                <li><a href="{{ route('ppc-services') }}">PPC Management</a></li>
                <li><a href="{{ route('social-media-marketing') }}">Social Media Marketing</a></li>
                <li><a href="{{ route('digital-content-marketing') }}">Digital Content Marketing</a></li>
                <li><a href="{{ route('local-seo') }}">Local SEO</a></li>
                <li><a href="{{ route('ecommerce-seo') }}">Ecommerce SEO</a></li>
              </ul>
            </li>

            <li><a href="{{ route('contact') }}">Contact</a></li>
          </ul>
        </nav>
      </div>

      <!-- DESKTOP BUTTON -->
      <div class="col-lg-2 d-none d-lg-block text-end">
        <div class="header-btn">
          <a href="{{ route('contact') }}" class="btn-quote">Get A Quote NOW <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>

      <!-- MOBILE TOGGLE BUTTON -->
      <!-- <div class="col-6 d-lg-none text-end">
        <button id="mobileMenuBtn" class="mobile-toggle" aria-label="Toggle menu">
          <span class="hamburger"></span>
        </button>
      </div> -->
    </div>
  </div>
</header>

<!-- MOBILE MENU -->
<div id="mobileMenuWrap" class="mobile-menu-area d-lg-none" style="position: relative; z-index: 9999;">
  <div class="mobile-menu-inner">
    
    <!-- 🔹 LOGO + TOGGLE BUTTON -->
    <div class="mobile-logo d-flex justify-content-between align-items-center px-3 py-2" style="background:#0a0f2c;">
      <a href="{{ route('home') }}">
        <img src="{{ asset('public/frontend/assets/images/logo_white.png') }}" alt="Itcare" width="140">
      </a>
      <!-- Toggle Button -->
      <button id="mobileMenuBtn" class="mobile-toggle" aria-label="Toggle menu" style="z-index:10000;">
        <span class="hamburger"></span>
      </button>
    </div>

    <!-- 🔹 MOBILE NAVIGATION -->
    <nav id="mobileMenu" class="mobile-nav" aria-hidden="true">
      <ul class="mobile-nav-list">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('about-us') }}">About Us</a></li>

        <li>
          <a href="#" class="submenu-toggle">Web Services <i class="bi bi-chevron-down"></i></a>
          <ul class="sub-menu">
            <li><a href="{{ route('web-design') }}">Web Design</a></li>
            <li><a href="{{ route('web-development') }}">Web Development</a></li>
          </ul>
        </li>

        <li>
          <a href="#" class="submenu-toggle">Digital Marketing <i class="bi bi-chevron-down"></i></a>
          <ul class="sub-menu">
            <li><a href="{{ route('search-engine-optimization') }}">Search Engine Optimization</a></li>
            <li><a href="{{ route('ppc-services') }}">PPC Management</a></li>
            <li><a href="{{ route('social-media-marketing') }}">Social Media Marketing</a></li>
            <li><a href="{{ route('digital-content-marketing') }}">Digital Content Marketing</a></li>
            <li><a href="{{ route('local-seo') }}">Local SEO</a></li>
            <li><a href="{{ route('ecommerce-seo') }}">Ecommerce SEO</a></li>
          </ul>
        </li>

        <li><a href="{{ route('blog') }}">Blog</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
      </ul>
    </nav>
  </div>
</div>


<!-- JS -->






<script>





document.addEventListener("DOMContentLoaded", function () {
  const btn = document.getElementById("mobileMenuBtn");
  const menu = document.getElementById("mobileMenu");

  // Initially hidden
  menu.classList.remove("open");

  // Toggle main mobile menu
  btn.addEventListener("click", function (e) {
    e.stopPropagation();
    const isOpen = menu.classList.toggle("open");
    btn.classList.toggle("active", isOpen);
    btn.setAttribute("aria-expanded", isOpen);
  });

  // Close menu when clicking outside (optional)
  document.addEventListener("click", function (e) {
    if (!menu.contains(e.target) && !btn.contains(e.target)) {
      menu.classList.remove("open");
      btn.classList.remove("active");
    }
  });

  // Toggle submenus on click
  document.querySelectorAll("#mobileMenu .submenu-toggle").forEach((toggle) => {
    toggle.addEventListener("click", function (e) {
      e.preventDefault(); // prevent link jump to top
      const subMenu = this.nextElementSibling;
      this.classList.toggle("active");
      subMenu.classList.toggle("open");
    });
  });
});






</script>