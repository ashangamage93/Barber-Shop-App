<div class="header-top">
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-2 col-lg-4 col-md-4 col-sm-3 col logo_section">
                    <div class="full">
                        <div class="center-desk">
                            <div class="logo">
                                <a href="/"  class="text-dark">EMPIRE CUTS</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-8 col-md-8 col-sm-9">
                    <div class="menu-area">
                        <div class="limit-box">
                            <nav class="main-menu ">
                                <ul class="menu-area-main">
                                    @if($item === 'index')
                                        <li class="active"><a href="/">Home</a></li>
                                    @else
                                        <li><a href="/">Home</a></li>
                                    @endif
                                    @if($item === 'blog')
                                        <li class="active"><a href="/blog">Blog</a></li>
                                    @else
                                        <li><a href="/blog">Blog</a></li>
                                    @endif
                                    @if($item === 'services')
                                        <li class="active"><a href="/services">Services</a></li>
                                    @else
                                        <li><a href="/services">Services</a></li>
                                    @endif
                                    @if($item === 'about')
                                        <li class="active"><a href="/about">About</a></li>
                                    @else
                                        <li><a href="/about">About</a></li>
                                    @endif
                                    @if($item === 'gallery')
                                        <li class="active"><a href="/gallery">Gallery</a></li>
                                    @else
                                        <li><a href="/gallery">Gallery</a></li>
                                    @endif
                                    @if($item === 'contact')
                                        <li class="active"><a href="/contact">Contact</a></li>
                                    @else
                                        <li><a href="/contact">Contact</a></li>
                                    @endif
                                    @auth('users')
                                        <li><a href="/admin/index">Admin</a></li>
                                    @endauth
                                    @auth('customers')
                                        <li><a href="/shop/account">Account</a></li>
                                    @endauth
                                    @guest('users')
                                        @guest('customers')
                                            <li><a href="/auth/sign_in">Sign In</a></li>
                                        @endguest
                                    @endguest
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
