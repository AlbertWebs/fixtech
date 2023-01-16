<!DOCTYPE html>
<?php $SiteSettings = DB::table('sitesettings')->get();?>

@foreach($SiteSettings as $Settings)
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="img/fav-icon.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
              <!-- SEO -->
        {!! SEOMeta::generate() !!}
        {!! OpenGraph::generate() !!}
        {!! Twitter::generate() !!}
        <meta name="keywords" content="{{$keywords}}"/>
        <meta name="_token" content="{{ csrf_token() }}">
        <!-- SEO -->
        <link rel="shortcut icon" type="image/x-icon" href="{{url('/')}}/uploads/logo/{{$Settings->favicon}}">
        <!-- Icon css link -->
        <link href="{{asset('theme/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('theme/vendors/line-icon/css/simple-line-icons.css')}}" rel="stylesheet">
        <link href="{{asset('theme/vendors/elegant-icon/style.css')}}" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="{{asset('theme/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Rev slider css -->
        <link href="{{asset('theme/vendors/revolution/css/settings.css')}}" rel="stylesheet">
        <link href="{{asset('theme/vendors/revolution/css/layers.css')}}" rel="stylesheet">
        <link href="{{asset('theme/vendors/revolution/css/navigation.css')}}" rel="stylesheet">

        <!-- Extra plugin css -->
        <link href="{{asset('theme/vendors/owl-carousel/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('theme/vendors/bootstrap-selector/css/bootstrap-select.min.css')}}" rel="stylesheet">

        <link href="{{asset('theme/css/style.css')}}" rel="stylesheet">
        <link href="{{asset('theme/css/responsive.css')}}" rel="stylesheet">

        <link href="{{asset('theme/css/infinite-slider.css')}}" rel="stylesheet">



        <!-- Bottom Slider -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- <link href="{{asset('theme/preloader/preloader.css')}}" rel="stylesheet"> -->

        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5ccd55492846b90c57acd37d/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
        </script>
        <!--End of Tawk.to Script-->
        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-141449503-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-141449503-1');
</script>


<!-- Event snippet for Days to convert conversion page -->
<script>
  gtag('event', 'conversion', {
      'send_to': 'AW-734726023/l_HkCN3alK4BEIePrN4C',
      'value': 1.0,
      'currency': 'KES',
      'transaction_id': ''
  });
</script>

<!-- Event snippet for Days to convert conversion page -->
<script>
  gtag('event', 'conversion', {
      'send_to': 'AW-734726023/l_HkCN3alK4BEIePrN4C',
      'value': 1.0,
      'currency': 'KES',
      'transaction_id': ''
  });
</script>

<!-- Global site tag (gtag.js) - Google Ads: 734726023 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-734726023"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-734726023');
</script>


    </head>
    <body id="content">

        <!--================ Header Area =================-->
        <!-- Header Start-->
        <div class="header">
            <div class="header-top row text-center">
                <div class="container">
                    <div class="call pull-left">
                    <p><i class="fa fa-phone"></i> <i class="fa fa-whatsapp"></i> Call/ WhatsApp  <span>&nbsp {{$Settings->mobile}}</span> <span>&nbsp {{$Settings->mobile_two}}</span> &nbsp <i class="fa fa-map-marker"></i>&nbsp  <span><a style="color:#fff" href="{{url('/contact')}}"> Locate Us </a></span></p>
                    </div>
                    <div class="user-info">
                        <div class="user">
                            <ul>
                                @if(Auth::user())
                                <li><a href="{{url('clientarea/')}}"><span class="fa fa-user"></span> Welcome back! {{Auth::user()->name}} | <a href="{{url('/clientarea/logout')}}"><span class="fa fa-power-off"></span> Logout</a> </a>
                                @else
                                <li><a href="{{url('clientarea/')}}"><span class="fa fa-user"></span>  My Account</a>
                                @endif

                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <center>
                @if(Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif
            </center>
            @if($page_name == 'Compare Products')
            <div class="header-mid">
                <div class="container">
                    <div class="row">
                    <div class="col-md-6 header-left hide-mobile">
                        <div class="logo"> <a href="{{url('/')}}"><img width="253" height="62" src="{{url('/')}}/uploads/logo/{{$Settings->logo}}" alt="logo"></a> </div>
                    </div>
                    <div class="col-md-6 search_block">
                        <div class="search">
                        <form action="{{url('/searchsite')}}" method="POST">
                        {{csrf_field()}}
                            <div class="search_cat">
                            <select class="search-category" name="category">
                                <?php $SearchCategory = DB::table('category')->get();?>
                                <option value="all" selected class="computer" selected>All Categories</option>

                                    @foreach($SearchCategory as $SearchCats)
                                    <option class="computer" value="{{$SearchCats->id}}">{{$SearchCats->cat}}</option>
                                    @endforeach

                            </select>
                            <span class="fa fa-angle-down"></span> </div>
                            <input type="text" id="search" name="search" placeholder="Search for products,brands and categories" autocomplete="off">
                            <button type="submit" class="btn submit"> <span class="fa fa-search"></span></button>
                        </form>
                        <!-- Livesearch Results -->
                        <div style="background-image: url('{{url('/')}}/uploads/preloaders/preloader.gif');" class="text-center" id="loading-image">Loading.....</div>
                        <table class="table table-bordered table-hover" style="position:absolute; background-color:rgba(255,255,255,0.9); color:#000;  z-index: 10; text-overflow:visible;">
                        <thead>
                        <!-- <tr>

                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        </tr> -->
                        </thead>
                        <tbody>
                        </tbody>
                        </table>
                        <!-- Live seach Results -->
                        </div>
                    </div>
                    <?php

//  $CartItems = Cart::content();
$CartItems = Cart::content();

?>

                    </div>
                </div>
            </div>
            @else
            <div class="header-mid">
                <div class="container">
                    <div class="row">
                    <div class="col-md-3 header-left hide-mobile">
                        <div class="logo"> <a href="{{url('/')}}"><img width="253" height="62" src="{{url('/')}}/uploads/logo/{{$Settings->logo}}" alt="logo"></a> </div>
                    </div>
                    <div class="col-md-6 search_block">
                        <div class="search">
                        <form action="{{url('/searchsite')}}" method="POST">
                        {{csrf_field()}}
                            <div class="search_cat">
                            <select class="search-category" name="category">
                                <?php $SearchCategory = DB::table('category')->get();?>
                                <option value="all" selected class="computer" selected>All Categories</option>

                                    @foreach($SearchCategory as $SearchCats)
                                    <option class="computer" value="{{$SearchCats->id}}">{{$SearchCats->cat}}</option>
                                    @endforeach

                            </select>
                            <span class="fa fa-angle-down"></span> </div>
                            <input type="text" id="search" name="search" placeholder="Search for products,brands and categories" autocomplete="off">
                            <button type="submit" class="btn submit"> <span class="fa fa-search"></span></button>
                        </form>
                        <!-- Livesearch Results -->
                        <div style="background-image: url('{{url('/')}}/uploads/preloaders/preloader.gif');" class="text-center" id="loading-image">Loading.....</div>
                        <table class="table table-bordered table-hover" style="position:absolute; background-color:rgba(255,255,255,0.9); color:#000;  z-index: 10; text-overflow:visible;">
                        <thead>
                        <!-- <tr>

                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        </tr> -->
                        </thead>
                        <tbody>
                        </tbody>
                        </table>
                        <!-- Live seach Results -->
                        </div>
                    </div>
                    <div class="col-md-3 header-right hide-mobile">
                        <div class="cart">
                        <div class="cart-icon dropdown" style="background: url({{url('/')}}/theme/images/cart.png) no-repeat scroll 0 0;"></div>

                        <?php

//  $CartItems = Cart::content();
$CartItems = Cart::content();

?>
                        <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="{{url('/cart')}}">My Cart( {{Cart::count()}} )<span> KSH {{Cart::total()}}</span></a>



                        <ul class="dropdown-menu pull-right cart-dropdown-menu">
                        <!-- Check For Empty Cart -->
                        @if($CartItems->isEmpty())
                            <li>
                                <table class="table table-striped">
                                <tbody>
                                    <center>Your Cart Is Empty</center>
                                <tbody>
                                </table>
                            </li>
                        @else
                        <!-- Check For Empty Cart -->
                            <li>
                            <table class="table table-striped">
                                <tbody>
                                <!-- Server Iterations Begin -->

                                @foreach($CartItems as $CartItem)
                                <?php
$Products = DB::table('product')->where('id', $CartItem->id)->get();
?>
                                @foreach($Products as $Product)
                                <tr>
                                    <td class="text-center"><a href="{{url('/')}}/product/{{$Product->name}}"><img class="img-thumbnail" src="{{url('/')}}/uploads/product/{{$Product->image_one}}" alt="img"></a></td>
                                    <td class="text-left"><a style="color:#ce171f" href="{{url('/')}}/product/{{$Product->name}}"><small>{{$Product->name}}</small></a></td>
                                    <td class="text-right quality">X{{$CartItem->qty}}</td>
                                    <td class="text-right price-new">{{$CartItem->total}}</td>
                                    <td class="text-center"><a href="{{url('/')}}/cart/destroy/{{$CartItem->rowId}}" title="Remove" class="btn btn-xs remove"><i class="fa fa-times"></i></a></td>
                                </tr>
                                @endforeach
                                @endforeach

                                <!-- Server Iterations Stops -->

                                </tbody>
                            </table>
                            </li>
                        @endif

                        @if($CartItems->isEmpty())

                        @else
                            <li>
                            <div class="minitotal">
                                <table class="table pricetotal">
                                <tbody>
                                    <tr>
                                    <td class="text-right"><strong>Sub-Total</strong></td>
                                    <td class="text-right price-new">{{Cart::subtotal()}}</td>
                                    </tr>

                                    <tr>
                                    <td class="text-right"><strong>VAT (0%)</strong></td>
                                    <td class="text-right price-new">{{Cart::tax()}}</td>
                                    </tr>
                                    <tr>
                                    <td class="text-right"><strong>Total</strong></td>
                                    <td class="text-right price-new">KSH {{Cart::total()}}</td>
                                    </tr>
                                </tbody>
                                </table>
                                <div class="controls"> <a style="background-color:#ce171f" class="btn btn-primary pull-left" href="{{url('/cart')}}" id="view-cart"><i class="fa fa-shopping-cart"></i> View Cart </a> <a style="background-color:#ce171f" class="btn btn-primary pull-right" href="{{url('/cart/checkout')}}" id="checkout"><i class="fa fa-share"></i> Checkout</a> </div>
                            </div>
                            </li>
                        @endif
                        </ul>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="header-bottom hide-mobile">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="new-further">
                            <p>All your vehicle sounds & accessories  : </p>
                            <ul class="toggle-newinFurther">\
                                <?php $SearchCategory = DB::table('category')->inRandomOrder()->paginate(10);?>
                                @foreach($SearchCategory as $SearchCats)
                                <?php $final = preg_replace('#[ -]+#', '-', $SearchCats->cat);?>
                                <li><a style="color:#ce171f" href="{{url('/classifieds')}}/shop/{{$final}}">{{$SearchCats->cat}}</a></li>
                                @endforeach

                            </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main menu Start -->
         <!--================Menu Area =================-->
         <header class="shop_header_area">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#"><img width="253" height="62" src="{{url('/')}}/uploads/logo/{{$Settings->logo}}" alt="Logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- <ul class="navbar-nav categories">
                            <li class="nav-item">
                                <?php $CategoriesHead = DB::table('category')->get();?>
                                <select onchange="changeFunc();" id="selectBoxTwo" class="selectpicker">
                                    @foreach($CategoriesHead as $CatHead)
                                    <option value="{{$CatHead->cat}}">{{$CatHead->cat}}</option>
                                    @endforeach
                                </select>
                            </li>
                        </ul> -->
                        <script type="text/javascript">

                            function changeFunc() {
                            var selectBoxTwo = document.getElementById("selectBoxTwo");
                            var selectedValue = selectBoxTwo.options[selectBoxTwo.selectedIndex].value;

                            var url = '{!! url('/products/cat') !!}'

                            window.open(url+'/'+selectedValue,"_self");



                            }

                        </script>
                        <ul style="width:auto; margin:auto;" class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{url('/')}}">
                                Home <i class="fa fa-home" aria-hidden="true"></i>
                                </a>

                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{url('/about-us')}}">
                                About
                                </a>

                            </li>

                            <li class="nav-item active">
                                <a class="nav-link" href="{{url('/classifieds')}}">
                                Products
                                </a>

                            </li>

                            <?php $CountCompare = Cart::instance('wishlist')->count();?>
                            @if($CountCompare >= 2)
                            <li class="nav-item active">
                                <a class="nav-link" href="{{url('/cart/compare')}}">
                                Compare <i class="fa fa-exchange" aria-hidden="true"></i>
                                </a>

                            </li>
                            @else

                            @endif




                            @if($CartItems->isEmpty())

                            @else
                            <li class="nav-item active">
                                <a class="nav-link" href="{{url('/cart')}}">
                                Your Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                </a>

                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{url('/cart/checkout')}}">
                                Checkout
                                </a>

                            </li>

                            @endif
                            <li class="nav-item active">
                                <a class="nav-link" href="{{url('/our-services')}}">
                                Services
                                </a>

                            </li>

                            <li class="nav-item active">
                                <a class="nav-link" href="{{url('/contact-us')}}">
                                Contact Us <i class="fa fa-phone" aria-hidden="true"></i>
                                </a>

                            </li>



                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!--================End Menu Area =================-->
        <!-- Main menu End -->
        <!-- Header End -->
        <!--================End Menu Area =================-->

        @yield('content')

        <!--================Footer Area =================-->
        <footer class="footer_area text-center">
            <div class="container">
                <div class="footer_widgets">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-6">
                            <aside class="f_widget f_about_widget">
                                <!-- <img style="max-width:200px" src="{{url('/')}}/uploads/logo/{{$Settings->logo}}" alt=""> -->
                                <div class="f_w_title" style="padding-bottom:-30px">
                                    <h3>Why Buy From Us</h3>
                                </div>
                                <span style="padding-top:-30px">
                                  <?php
                                    $original_string = $Settings->welcome;
                                    $num_words = 30;
                                    $words = array();
                                    $words = explode(" ", $original_string, $num_words);
                                    $shown_string = "";
                                    $url = url("/contact/#why");

                                    if (count($words) == 30) {
                                        $words[29] = "<a href='$url'>Read More >></a>.";
                                    }

                                    $shown_string = implode(" ", $words);

                                    ?>
                                  {!!html_entity_decode($shown_string)!!}

                                </span>
                                <p></p>

                            </aside>
                        </div>

                        <div class="col-lg-2 col-md-4 col-6">
                            <aside class="f_widget link_widget f_service_widget">
                                <div class="f_w_title">
                                    <h3>Quick Links</h3>
                                </div>
                                <ul>
                                    <li><a href="{{url('/about-us')}}">About</a></li>
                                    <li><a href="{{url('/our-services')}}">Services</a></li>
                                    <li><a href="{{url('/classifieds')}}">Products</a></li>

                                    <li><a href="{{url('/contact-us')}}">Contact US</a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6">
                            <aside class="f_widget link_widget f_extra_widget">
                                <div class="f_w_title">
                                    <h3>information</h3>
                                </div>
                                <ul>
                                <li><a href="{{url('/clientarea')}}">My Account</a></li>
                                <li><a href="{{url('/privacy-policy')}}">Privacy Policies</a></li>
                                <li><a href="{{url('/terms-and-conditions')}}">Terms & Conditions</a></li>
                                <li><a href="{{url('/copyright')}}">Copyrights</a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-lg-4 col-md-4 col-6">
                            <aside class="f_widget link_widget f_account_widget">
                                <div class="f_w_title">
                                    <h3>Contact Us</h3>
                                </div>
                                <ul>
                                <li>
                                    <div class="address-info"><i class="fa fa-map-marker"></i> {{$Settings->location}} </div>
                                </li>
                                <li>
                                    <div class="call-info"> <i class="fa fa-mobile"></i> {{$Settings->mobile}}<br>
                                    <span>{{$Settings->mobile_two}}</span> </div>
                                </li>
                                <li>
                                    <div class="email-info"><i class="fa fa-envelope"></i>  <a href="#">{{$Settings->email}}</a></div>
                                    <!-- Contact Area -->
                                </li>
                                </ul>
                            </aside>
                        </div>
                    </div>
                </div>

                <aside class="f_widget f_about_widget" style="padding-top:30px;">
                   <h6>Social:</h6>
                    <ul>
                        <li><a target="new" href="{{$Settings->facebook}}"><i class="social_facebook"></i></a></li>
                        <li><a target="new" href="{{$Settings->twitter}}"><i class="social_twitter"></i></a></li>

                        <li><a target="new" href="{{$Settings->instagram}}"><i class="social_instagram"></i></a></li>
                        <li><a target="new" href="{{$Settings->youtube}}"><i class="social_youtube"></i></a></li>
                    </ul>
                </aside>

                <div class="footer_copyright">
                    <h5>© <script>document.write(new Date().getFullYear());</script> <!-- Link back to Designekta Studios can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Powered By <a href="https://designekta.com" target="_blank">Designekta Studios</a>
<!-- Link back to Designekta Studios can't be removed. Template is licensed under CC BY 3.0. -->
</h5>
                </div>
            </div>
        </footer>
        <!--================End Footer Area =================-->



        <!-- <div id="loader-wrapper">
            <div id="loader"></div>

            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>

        </div> -->


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{{asset('theme/js/jquery-3.2.1.min.js')}}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{asset('theme/js/popper.min.js')}}"></script>
        <script src="{{asset('theme/js/bootstrap.min.js')}}"></script>
        <!-- Rev slider js -->
        <script src="{{asset('theme/vendors/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
        <script src="{{asset('theme/vendors/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
        <script src="{{asset('theme/vendors/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
        <script src="{{asset('theme/vendors/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
        <script src="{{asset('theme/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
        <script src="{{asset('theme/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
        <script src="{{asset('theme/vendors/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
        <script src="{{asset('theme/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
        <!-- Extra plugin css -->
        <script src="{{asset('theme/vendors/counterup/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('theme/vendors/counterup/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('theme/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('theme/vendors/bootstrap-selector/js/bootstrap-select.min.js')}}"></script>
        <script src="{{asset('theme/vendors/image-dropdown/jquery.dd.min.js')}}"></script>
        <script src="{{asset('theme/js/smoothscroll.js')}}"></script>
        <script src="{{asset('theme/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('theme/vendors/isotope/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('theme/vendors/magnify-popup/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('theme/vendors/vertical-slider/js/jQuery.verticalCarousel.js')}}"></script>
        <script src="{{asset('theme/vendors/jquery-ui/jquery-ui.js')}}"></script>

        <script src="{{asset('theme/js/theme.js')}}"></script>

        <!-- foreign -->
        <!-- Client Logo -->
        <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
        <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->
        <!-- Client Logo -->

        <script type="text/javascript">
        /** Client Logo */
        $(document).ready(function(){
                $('.customer-logos').slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1000,
                arrows: false,
                dots: false,
                pauseOnHover: false,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                    slidesToShow: 4
                    }
                }, {
                    breakpoint: 520,
                    settings: {
                    slidesToShow: 3
                    }
                }]
                });
            });
            /*------------------------ */
        </script>



      <script type="text/javascript">

      $(document).ready(function() {
        $('#loading-image').hide();
        $('#actionBtn1').attr("disabled",true);

        $('#termsCheckbox1').change(function() {
            $('#actionBtn1').attr('disabled', $('#termsCheckbox1:checked').length == 0);
        });

      });

      $(document).ready(function() {

      $('#actionBtn2').attr("disabled",true);

      $('#termsCheckbox2').change(function() {
          $('#actionBtn2').attr('disabled', $('#termsCheckbox2:checked').length == 0);
      });

      });



      </script>



      <script>
            $(function () {

              $('#verify').on('submit', function (e) {
              $('#veryfyID').html('Checking......')
                e.preventDefault();

                $.ajax({

                  type: 'post',
                  url: '{{url('/')}}/payments/veryfy/mpesa',
                  data: $('#verify').serialize(),
                  success: function ($results) {
                    $('#CardNumber').val('')
                    if($results == 1){
                          alert('Verification Was Successfull')
                          $('#success-alert').html('The Purchase Was Successfull')
                          $('#veryfyID').html('Successfull')
                          //Submit The Order
                          window.open('{{url('/')}}/cart/checkout/placeOrder','_self')
                          //Redirect The User To Thank You Page
                          window.open('{{url('/')}}/clientarea/thankyou','_self')
                    }else{
                          alert('Error Verifying The Transaction Code')
                          $('#veryfyID').html('Error Verifying Transaction ID  <i style="font-size:20px;color:red" class="fa fa-frown-o"></i>')
                    }
                  }
                });

              });
              //StK hehe SITOKI
              $('#sitokii').on('submit', function (e) {
              $('#phoneNumber').prop('readonly', true);
              $('#sitokiID').html('Check your phone....')
                e.preventDefault();

                $.ajax({
                  type: 'post',
                  url: '{{url('/')}}/payments/veryfy/sitoki',
                  data: $('#sitoki').serialize(),
                  success: function ($results) {
                    $('#sitokiID').val('')
                    if($results == 1){

                          /* Check If Payment Has Been Received And Redirect*/

                          //Submit The Order
                          window.open('{{url('/')}}/cart/checkout/placeOrder','_self')
                          //Redirect The User To Thank You Page
                          window.open('{{url('/')}}/clientarea/thankyou','_self')
                    }else{

                          /* Return Message Here  */

                    }
                 }
                });

              });


            //   STK Initialize
            $('#sitoki').on('submit', function (e) {

              $('#phoneNumber').prop('readonly', true);
              $('#sitokiID').html('Initializing....')
              $('#sitokiID').html('')
              $('#sitokiID').html('Check your phone....')

                e.preventDefault();

                $.ajax({
                  type: 'post',
                  url: '{{url('/')}}/payments/stk',
                  data: $('#sitoki').serialize(),
                  success: function (results) {
                    $('#sitokiID').val('')
                    /** Initializing Transaction */

                    // Call Check Function

                    if(results == 1){
                          //Tell The Visitor The Payment Has Been Received
                          $('#sitokiID').html(' Payment Successfull <i class="fa fa-check alert-success> </i>')
                          //Submit The Order
                          //window.open('{{url('/')}}/cart/checkout/placeOrder','_self')
                          //Redirect The User To Thank You Page
                          //window.open('{{url('/')}}/clientarea/thankyou','_self')
                    }else{

                          /* Return Message Here  */

                    }
                 }
                });

              });
            // STK INIT
              // Subscribe
            //   End Sitoki
              // Subscribe

              $('#subscribe-form').on('submit', function (e) {
                $('#subscribe-btn').html('Working..')
                  e.preventDefault();

                    $.ajax({

                      type: 'post',
                      url: '{{url('/')}}/subscribe',
                      data: $('#subscribe-form').serialize(),
                      success: function ($results) {
                        $('#email').val('')
                        $('#subscribe-btn').html('<i class="fa fa-check"></i>  Success')
                        alert($results);
                      }
                    });

                });

            });
          </script>

          <!-- Live Search Scripts -->
          <script type="text/javascript">
          $('#search').on('keyup',function(){
            // Add preloader
            $('#loading-image').show();
          $value=$(this).val();
          $.ajax({
          type : 'get',
          url : '{{URL::to('search')}}',
          data:{'search':$value},
          success:function(data){
          $('#loading-image').hide();
          $('tbody').html(data);
          }
          });
          })
          </script>
          <script type="text/javascript">
          $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
          </script>
          <!-- </Live Search Scripts -->


          <!-- Check Mail Exists -->
          <script type="text/javascript">
          function duplicateEmail(element){

            $('#mailChecking').html('Checking...........')
              var email = $(element).val();
              $.ajax({
                  type: "POST",
                  url: '{{url('checkemail')}}',
                  data: {
                        email:email,
                        "_token": "{{ csrf_token() }}",
                    },
                  dataType: "json",
                  success: function(res) {

                      if(res.exists){
                          // Exists
                          $('#mailChecking').hide();
                          $('#mailAvailable').hide();
                          $('#mailExists').html('The Email is already in use by another person')
                      }else{
                          // Available
                          $('#mailChecking').hide();
                          $('#mailExists').hide();

                      }
                  },
                  error: function (jqXHR, exception) {

                  }
              });
          }
          </script>
          <!-- </Check mail Exists -->


    </body>
@endforeach
</html>
