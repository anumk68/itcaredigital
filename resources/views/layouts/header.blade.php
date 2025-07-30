<div class="top_header">
    <div class="container">
        <div class="call_header_number">
            <div class="content_top">
                <div class="left_facing_issue">
                    <p>FACING ISSUE WITH YOUR PRINTER ? </p>
                </div>
                <div class="btn_top_popup">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        BOOK FREE CONSULTATION
                    </button>
                </div>
            </div>
            <div class="call_number">
                <img src="{{ asset('public/images/header_icons_2.jpg') }}" alt="printer_logo"> <a
                    href="tel:+1 8887684674" class="btn">+1 8887684674</a>
            </div>
        </div>
    </div>
</div>
<style>
    header {
        position: sticky;
        top: 0;
        z-index: 1030;
        /* higher than most elements */
        background-color: #000;
        /* or your navbar background color */
    }
</style>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <!-- Mobile Right Side: Search + Button -->
            <div class="right-header d-lg-none">
                <input class="form-control custom-search form-control-sm" type="search" placeholder="Search blogs" />
                <a href="tel:8888752997" class="call-btn btn-sm">Call Now</a>
            </div>

            <!-- Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="logo_ahead_allprinter">
                <a href="{{ route('home') }}"> <img src="{{ asset('public/images/all_print_logo.webp') }}"
                        alt="Brother"></a>
            </div>
            <!-- Nav Links -->
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">ABOUT US</a></li>
                    <li class="nav-item dropdown  droping_printing" id="hoverDropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button">
                            PRINTER SUPPORT
                        </a>
                        <!-- <button class="dropdown-toggle-btn">Toggle Dropdown</button> -->
                        <ul class="dropdown-menu" id="servicesMenu">
                            <div class="container-fluid py-4">
                                <div class="row">
                                    <!-- Left Side (Brands) -->
                                    <div class="col-lg-4 brand-box">
                                        <div class="row" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <div class="row mb-2">
                                                @foreach ($brands as $index => $brand)
                                                    @if ($brand->slug === 'installation-troubleshooting-printer')
                                                        {{-- Skip for now, render after loop --}}
                                                        @continue
                                                    @endif
                                                    <div class="col-6 mb-2">
                                                        <button
                                                            class="nav-link brand-btn w-100 {{ $loop->first ? 'active' : '' }}"
                                                            id="brand-tab-{{ $brand->id }}" data-bs-toggle="pill"
                                                            data-bs-target="#brand-{{ $brand->id }}" type="button"
                                                            role="tab" aria-controls="brand-{{ $brand->id }}"
                                                            aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                                            {{ strtoupper($brand->brand_name) }}
                                                        </button>
                                                    </div>
                                                @endforeach

                                                {{-- Render the installation-troubleshooting-printer button at bottom full width --}}
                                                @foreach ($brands as $brand)
                                                    @if ($brand->slug === 'installation-troubleshooting-printer')
                                                        <div class="col-12">
                                                            <button class="nav-link brand-btn w-100"
                                                                id="brand-tab-{{ $brand->id }}"
                                                                data-bs-toggle="pill"
                                                                data-bs-target="#brand-{{ $brand->id }}"
                                                                type="button" role="tab"
                                                                aria-controls="brand-{{ $brand->id }}"
                                                                aria-selected="false">
                                                                {{ strtoupper($brand->brand_name) }}
                                                            </button>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right Side (Services) -->
                                    <div class="col-lg-8 issue-box">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            @foreach ($brands as $index => $brand)
                                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                                    id="brand-{{ $brand->id }}" role="tabpanel"
                                                    aria-labelledby="brand-tab-{{ $brand->id }}">
                                                    <div class="issue-title">
                                                        <a
                                                            href="{{ route('printer', ['brand_slug' => strtolower($brand->slug)]) }}">
                                                            {{ strtoupper($brand->brand_name) }} PRINTER
                                                        </a>

                                                    </div>
                                                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
                                                        @forelse($brand->services as $service)
                                                            <div class="col">
                                                                <a href="{{ route('service_detail', ['brand_slug' => $brand->slug, 'service_slug' => $service->slug]) }}"
                                                                    style="text-decoration: none;">
                                                                    <div class="issue-card">
                                                                        {{ $service->service_name }}
                                                                    </div>
                                                                </a>


                                                            </div>
                                                        @empty
                                                            <div class="col">
                                                                <div class="issue-card">No Services Available</div>
                                                            </div>
                                                        @endforelse
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </li>

                    <!-- <li class="nav-item"><a class="nav-link" href="{{ route('blogs') }}">BLOGS</a></li> -->
                    <li class="nav-item"><a class="nav-link" href="{{ route('members') }}">PLANS</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('video') }}">VLOGS</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">GET SUPPORT</a></li>
                </ul>

                <!-- Desktop Right Side -->
                <div class="d-none d-lg-flex align-items-center gap-2 position-relative">
               
  <input id="searchInput" class="form-control custom-search" type="search"
                        placeholder="Search blogs, printers, services">
                          <div id="searchDropdown" class="dropdown-menu show w-100 mt-2"
                        style="max-height: 250px; overflow-y: auto; display: none;">
                    </div>
 <a href="{{ Auth::guard('user')->check() ? route('account') : route('login_frontend') }}">
    <i class="fa-solid fa-user"></i>
</a>


                    <!-- Suggestion Dropdown -->
                  

                    <!-- <a href="tel:8888752997" class="call-btn">Call Now</a> -->
                </div>

            </div>
        </div>
    </nav>
</header>
<!-- mobile_header -->

<div class="mobile_header">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <!-- Mobile Right Side: Search + Button -->
          <div class="right-header d-lg-none" style="
    align-items: center;
">
                <input class="form-control custom-search form-control-sm" type="search"
                    placeholder="Search blogs" />
                <a href="tel:8888752997" class="call-btn">Call Now</a>
                <a href="#"> <i class="fa-solid fa-user"></i></a>
                
            </div>

            <!-- Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Nav Links -->
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">ABOUT US</a></li>



                    <li class="nav-item custom-dropdown position-relative">
                        <a href="#" class="nav-link toggle-services-menu d-flex align-items-center gap-2"
                            id="toggleServicesMenu">
                            <span>SERVICES</span>
                            <span class="toggle-icon">▼</span> <!-- ▼ -->
                        </a>
                        <ul class="services-submenu">
                            @php
                                $specialSlug = 'installation-troubleshooting-printer';
                            @endphp

                            {{-- First print all brands except the special one --}}
                            @foreach ($brands as $brand)
                                @if ($brand->slug !== $specialSlug)
                                    <li>
                                        <a href="{{ route('printer', ['brand_slug' => strtolower($brand->slug)]) }}">
                                            {{ strtoupper($brand->brand_name) }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach

                            {{-- Now print the special slug brand at the end --}}
                            @foreach ($brands as $brand)
                                @if ($brand->slug === $specialSlug)
                                    <li>
                                        <a href="{{ route('printer', ['brand_slug' => strtolower($brand->slug)]) }}">
                                            {{ strtoupper($brand->brand_name) }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <!-- <li><a href="{{ route('installation') }}">Installation and Troubleshooting</a></li> -->
                        </ul>
                    </li>


                    <li class="nav-item"><a class="nav-link" href="{{ route('members') }}">PLAN</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('video') }}">VLOGS</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('blogs') }}">BLOGS</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">CONTACT US</a></li>
                </ul>

                <!-- Desktop Right Side -->
                <div class="d-none d-lg-flex align-items-center gap-2">
                    <input class="form-control custom-search" type="search" placeholder="Search blogs">
                        
                    <a href="tel:8888752997" class="call-btn">Call Now</a>
                     <i class="fa-solid fa-user"></i>
                </div>
            </div>
        </div>
    </nav>
</div>

<!-- <a href="tel:+18887684674" class="fixed-call-btn">
  <span class="phone-icon"><i class="fa-solid fa-phone"></i></span>
  <span class="phone-number">+1 888 768 4674</span>
</a> -->
<a href="tel:+18887684674" class="fixed-call-btn">
    <i class="fa-solid fa-phone"></i>+1 8887684674
</a>
