<header class="header header-5">

    {{-- <div class="header-top bg-primary text-white py-2" style="margin-bottom:0; padding-bottom:0; border-bottom:0;">
        <div class="container-fluid d-flex justify-content-center align-items-center flex-wrap text-center" style="line-height:1;">
            <div class="me-4">
                <strong>US 4th of July SALE</strong><br>
                <span>70% OFF + FREE GIFTS!</span>
            </div>
            <div id="countdown" class="d-flex gap-2 align-items-center ms-4">
                <div class="time-box text-dark bg-white px-2 py-1 text-center">
                    <span id="hours" class="fw-bold d-block">00</span>
                    <small>HRS</small>
                </div>
                <div class="time-box text-dark bg-white px-2 py-1 text-center">
                    <span id="minutes" class="fw-bold d-block">00</span>
                    <small>MIN</small>
                </div>
                <div class="time-box text-dark bg-white px-2 py-1 text-center">
                    <span id="seconds" class="fw-bold d-block">00</span>
                    <small>SEC</small>
                </div>
            </div>
        </div>
    </div> --}}
   
    {{-- running --}}
    <div class="header-top text-white py-2">
        <div class="container-fluid d-flex justify-content-center align-items-center flex-wrap text-center">
            <div class="me-4" style="margin-right: 1rem; margin-top: 10px; margin-bottom: 5px;">
                <strong> {{ $data['common_settings']['top_header_heading1'] }} </strong><br>
                <span> {{ $data['common_settings']['top_header_heading2'] }} </span>
            </div>

            @if($data['common_settings']['top_header_time_status'] == "is_enable")

                <div id="countdown" class="d-flex gap-1 align-items-center ms-4" style="margin-top: 3px;">
                    <div class="time-box text-dark bg-white text-center rounded" style="min-width: 30px;">
                        <span id="hours" class="fw-bold d-block" style="font-size: 1rem;">00</span>
                        <small style="font-size: 60%;">HRS</small>
                    </div>
                    <span style="font-size: 1.2rem; font-weight: 700; margin-left: 5px; margin-right: 5px;">:</span>
                    <div class="time-box text-dark bg-white text-center rounded" style="min-width: 30px;">
                        <span id="minutes" class="fw-bold d-block" style="font-size: 1rem;">00</span>
                        <small style="font-size: 60%;">MIN</small>
                    </div>
                    <span style="font-size: 1.2rem; font-weight: 700; margin-left: 5px; margin-right: 5px;">:</span>
                    <div class="time-box text-dark bg-white text-center rounded" style="min-width: 30px;">
                        <span id="seconds" class="fw-bold d-block" style="font-size: 1rem;">00</span>
                        <small style="font-size: 60%;">SEC</small>
                    </div>
                </div>
            
                {{-- <div id="countdown" class="d-flex gap-2 align-items-center ms-4" style="margin-top: 3px;">
                    <div class="time-box text-dark bg-white px-3 py-0 text-center">
                        <span id="hours" class="fw-bold d-block">00</span>
                        <small style="font-size: 70%;">HRS</small>
                    </div>
                    <span style="margin: 2px; font-size: 20px; font-weight:700;">:</span>
                    <div class="time-box text-dark bg-white px-3 py-0 text-center">
                        <span id="minutes" class="fw-bold d-block">00</span>
                        <small>MIN</small>
                    </div>
                    <span style="margin: 2px; font-size: 20px; font-weight:700;">:</span>
                    <div class="time-box text-dark bg-white px-3 py-0 text-center">
                        <span id="seconds" class="fw-bold d-block">00</span>
                        <small>SEC</small>
                    </div>
                </div> --}}
            @endif

        </div>
    </div>
    
    <div class="header-middle sticky-header">
        <div class="container-fluid">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="{{ url('/') }}" class="logo">
                    <img src="{{ asset('public/assets/images/logo.png') }}" alt="Molla Logo" width="120" height="32">
                </a>
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="megamenu-container {{ Request::is('/') ? 'active' : '' }}">
                            <a href="{{ url('/') }}" class="goto-demos">Home</a>
                        </li>
                        <li class="{{ Request::is('more-products') ? 'active' : '' }}">
                            <a href="{{ url('more-products') }}" class="goto-demos">Shop</a>
                        </li>
                       
                    </ul>
                </nav>

                {{-- <a href="index.html" class="logo">
                    <img src="{{ asset('public/assets/images/logo.png') }}" alt="Molla Logo" width="105" height="25">
                </a>
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="megamenu-container active">
                            <a href="index.html" class="sf-with-ul">Home</a>
                        </li>
                        <li>
                            <a href="category.html" class="sf-with-ul">Shop</a>
                        </li>
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav --> --}}

            </div><!-- End .header-left -->

            <div class="header-right">
                
                <div class="dropdown user-dropdown">
                    <a href="https://wa.me/917016126901" target="_blank" rel="noopener noreferrer" class="d-inline-flex align-items-center">
                      <img src="{{ asset('public/assets/images/icons8-whatsapp.svg') }}" alt="WhatsApp"
                          style="width:18px; height:18px; margin-right:5px;"><span style="color: black;">+91 7016126901</span>
                    </a>
                </div>
                
            </div><!-- End .header-right -->
        </div><!-- End .container-fluid -->
    </div><!-- End .header-middle -->
</header><!-- End .header -->