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
    <title>Empire Cuts | Contact</title>
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
    @component('Web.Component.nav_component',  ['item' => 'contact'])
    @endcomponent
</header>

<!-- contact -->
<div id="contact" class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage mt-4">
                    <h2>Contact <strong class="llow">us</strong></h2>
                </div>
            </div>

        </div>
        <div class="white_color">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-md-12">
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <article class="message is-warning mb-6">
                                            <div class="message-header">
                                                <p>Warning</p>
                                            </div>
                                            <div class="message-body">
                                                {{ $error }}
                                            </div>
                                        </article>
                                    @endforeach
                                @endif
                                <form class="contact_bg" method="POST" action="/contact_post">
                                    @csrf
                                    <div class="col-md-12">
                                        <input class="contactus" placeholder="Your Name" type="text" name="name">
                                    </div>
                                    <div class="col-md-12">
                                        <input class="contactus" placeholder="Email" type="text" name="email">
                                    </div>
                                    <div class="col-md-12">
                                        <input class="contactus" placeholder="Phone Number" type="number"
                                               name="telephone">
                                    </div>
                                    <div class="col-md-12">
                                    <textarea class="textarea" placeholder="Message" type="text"
                                              name="message"></textarea>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <button class="send" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- end contact -->
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
