  <header class="header">
       <div class="header-middle sticky-header">
        <div class="container">
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

            </div><!-- End .header-left -->

            <div class="header-right">
                
                <div class="dropdown user-dropdown">
                    <a href="https://wa.me/917016126901" target="_blank" rel="noopener noreferrer" class="d-inline-flex align-items-center">
                      <img src="{{ asset('public/assets/images/icons8-whatsapp.svg') }}" alt="WhatsApp"
                          style="width:18px; height:18px; margin-right:5px;"><span style="color: #c96;">+91 7016126901</span>
                    </a>

                   <!-- <a href="https://wa.me/917016126901"><i class="icon-phone"></i>Call: +917016126901</a></li> -->
                </div>

            <!--<div class="dropdown user-dropdown">
                @if(auth()->check())
                    <a href="{{ route('user.logout') }}">
                        <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                    </a>
                @else
                    <a href="#signin-modal" data-toggle="modal">
                        <i class="icon-user"></i> Login
                    </a>
                @endif
            </div>-->

            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->
</header><!-- End .header -->
