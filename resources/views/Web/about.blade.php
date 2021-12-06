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
    <title>Empire Cuts | About</title>
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

<body class="main-layout">
<!-- loader  -->
<div class="loader_bg">
    <div class="loader"><img src="web/image/loading.gif" alt="#"/></div>
</div>
<!-- end loader -->
<!-- header -->
<header>
    <!-- header inner -->
@component('Web.Component.nav_component',  ['item' => 'about'])
@endcomponent
<!-- end header inner -->
</header>

<!-- about  -->
<div id="about" class="about mb-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="about-box">
                    <h2>About us</h2>
                    <p>The “Empire Cuts” is the shop of hairdressing, haircuts, shaving shop etc. for men and women,
                        which is located in Beliatta town at Hambantota district. The barbershop serves for nearly two
                        thousand five hundred customers around the Beliatta and Tangalle areas.</p>
                    <div class="about-box_img">
                    <figure><img src="/image/gallery/single-img-1.jpg" alt="#"/></figure>
                    </div>
                    <p>With staff having been trained at some of the top institutions in London, Italy and Hong Kong.
                        Rumours boasts a wide range of up to date, top of the line care.</p>
                    <p>Having been trained at Robert Fieldings, Tony & Guy, L’oreal Technical Centre, Vidal Sassoon,
                        Elizabeth Arden training for beauty care and Kanebo to mention a few.</p>
                    <div class="about-box_img">
                        <figure><img src="/image/gallery/single-img-2.jpg" alt="#"/></figure>
                    </div>
                    <p>Rumours has been a pioneer in its field being the first to bring Sri Lanka up to date in hair
                        color technology, specifically in high fashion colour techniques and colour corrections in order
                        to produce perfect results.</p>
                    <p>One of the many additional benefits is that the salon is an oasis among the hustle and bustle of
                        the heart of Colombo city. In the form of a super stylish studio designed with client comfort
                        foremost in mind.</p>
                    <p>Its convenient location and ample parking space, guarantees total satisfaction.</p>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 padding_rl">

            </div>
        </div>
    </div>
</div>
<!--  footer -->
@component('Web.Component.footer_component')
@endcomponent
<!-- end footer -->
<!-- Javascript files-->
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
