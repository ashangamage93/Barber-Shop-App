<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Empire Cuts</title>
    <!-- fevicon -->
    <link rel="icon" href="web/image/fevicon.png" type="image/gif"/>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="web/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="web/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="web/css/responsive.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="web/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
          media="screen">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout" style="background-color: #000000">
<!-- loader  -->
<div class="loader_bg">
    <div class="loader"><img src="web/image/loading.gif" alt="#"/></div>
</div>
<!-- end loader -->
<!-- header -->
<header>
    <!-- header inner -->
@component('Web.Component.nav_component',  ['item' => 'index'])
@endcomponent
<!-- end header inner -->

    <!-- end header -->
    <section class="slider_section"
             style="background-image: url('/image/gallery/Gallery Image 4.jpg'); background-repeat: no-repeat; background-size: 100% auto;">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container-fluid padding_dd">
                    <div class="carousel-caption">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="text-bg">
                                    <span style="color: white">Welcome To <span style="color: yellow"> Empire Cuts</span></span>
                                    <h1 style="color: white">Barber Shop</h1>
                                    <p style="color: white">The “Empire Cuts” is the shop of hairdressing, haircuts, shaving shop
                                        etc. for men and women, which is located in Beliatta town at Hambantota district.
                                        The barbershop serves for nearly two thousand five hundred customers around the
                                        Beliatta and Tangalle areas.</p>
                                    <p style="color: white">With staff having been trained at some of the top
                                        institutions in Colombo. Empire Cuts boasts a wide range of up to date, top of
                                        the line care..</p>
                                    @foreach ($list_event as $event)
                                        <h2 style="color: yellow"><strong>{{ $event->title }}</strong></h2><p style="color: white">{{ $event->content }}</p>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</header>
@component('Web.Component.footer_component')
@endcomponent
<script src="web/js/jquery.min.js"></script>
<script src="web/js/popper.min.js"></script>
<script src="web/js/bootstrap.bundle.min.js"></script>
<script src="web/js/jquery-3.0.0.min.js"></script>
<script src="web/js/plugin.js"></script>
<!-- sidebar -->
<script src="web/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="web/js/custom.js"></script>
<script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>
</html>
