<!DOCTYPE html>
<html lang="en">
<head>
<?php $SiteSettings = DB::table('sitesettings')->get(); ?>

@foreach($SiteSettings as $Settings)
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- SEO --> 
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
{!! Twitter::generate() !!}
<meta name="keywords" content="{{$keywords}}"/>
<meta name="_token" content="{{ csrf_token() }}">
<!-- SEO -->
<meta content="" name="Designekta Studios">
<meta name="_token" content="{{ csrf_token() }}"/>
<link rel="shortcut icon" type="image/x-icon" href="{{url('/')}}/uploads/logo/{{$Settings->favicon}}">
<link rel="icon" type="image/png" href="images/favicon.png">
<link rel="apple-touch-icon" href="images/favicon.png">
<link href="{{asset('theme/Bootstrap/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('theme/css/style.css')}}" rel="stylesheet" type="text/css">
<!-- <link rel="stylesheet" href="{{asset('theme/css/DioProgress.css')}}" type="text/css"> -->
<link href="{{asset('theme/css/font-awesome.css')}}" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Poppins:300,500,600,700' rel='stylesheet' type='text/css'>
<link href="{{asset('theme/css/owl.carousel.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{asset('theme/css/smoothproducts.css')}}">

<!-- Bottom Slider -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!-- <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="{{asset('theme/js/DioProgress.js')}}"></script> -->

<!-- Live Search -->
<!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> -->
<!-- </Live Search -->

<style type="text/css">
.popper{
  position:fixed;
  bottom:10px;
  left:10px;
  width:300px;
  height:auto;
  background-color: rgba(255,255,255,0.9);
}
.popper p{
  font-size: 11px;
}
.popper a{
  color:#66139;
}
.info-msg,
.success-msg,
.warning-msg,
.error-msg {

  
  border-radius: 3px 3px 3px 3px;
}

.error-msg {
  color: #666;
 
}
.close{
  color:#000;
}

.hide {
  display: none;
  -webkit-transition: all 1s linear;
    -moz-transition: all 1s linear;
    -o-transition: all 1s linear;
    transition: all 1s linear;
}

#loading-image{
    background-image: url("{{url('/')}}/uploads/preloaders/preloader.gif");
   
		color:#66139B;
	}

</style>
<!-- </Bottom Slider -->


@if($page_name == 'Services')
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="{{asset('theme/js/DioProgress.js')}}"></script>
@endif
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

</head>
<body id="index">
<div class="wrapar"> 
  <!-- Header Start-->
  <div class="header">
    <div class="header-top">
      <div class="container">
        <div class="call pull-left">
          <p><i class="fa fa-phone"></i> <i class="fa fa-whatsapp"></i> Call/ WhatsApp  <span>&nbsp {{$Settings->mobile}}</span> <span>&nbsp {{$Settings->mobile_two}}</span> &nbsp <i class="fa fa-map-marker"></i>&nbsp  <span><a style="color:#fff" href="{{url('/contact')}}"> Locate Us </a></span></p>
        </div>
        <div class="user-info pull-right">
          <div class="user">
            <ul>
            @if(Auth::user())
              <li><a href="{{url('clientarea/')}}"><span class="fa fa-user"></span> Welcome back! {{Auth::user()->name}} | <a href="{{url('/clientarea/logout')}}"><span class="fa fa-power-off"></span> Logout</a> </a> 
            @else
              <li><a href="#" data-toggle="modal" data-target="#login"><span class="fa fa-user"></span>  My Account</a> 
            @endif
                <!-- Modal -->
                <div class="modal fade" id="login" role="dialog">
                  <div class="modal-dialog"> 
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <div class="panel-heading">
                          <div class="panel-title pull-left">Login</div>
                          <div class="pull-right"><a href="{{url('/clientarea')}}">Forgot password?</a>
                            <button aria-hidden="true" data-dismiss="modal" class="close btn btn-xs " type="button"> <i class="fa fa-times"></i> </button>
                          </div>
                        </div>
                      </div>
                      <div class="modal-body">
                        <form id="loginform" method="POST" action="{{ route('login') }}" class="form-horizontal">
                        {{ csrf_field() }}
                          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="juliekoi@domain.com">
                          </div>
                          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                          </div>
                          <div class="input-group">
                            <div class="checkbox">
                              <label>
                                <input id="login-remember" type="checkbox" name="remember" value="1">
                                Remember me</label>
                            </div>
                          </div>
                          <div class="form-group"> 
                            <!-- Button -->
                            <div class="col-sm-12 controls"> <button id="btn-login" type="submit" class="btn btn-primary facebook">Login</button>  </div>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <div class="form-group">
                          <div class="col-md-12 control">
                            <div>Don't have an account! <a href="{{url('/clientarea')}}">Sign Up Here</a></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
             
                <div class="modal fade" id="quote" role="dialog">
                  <div class="modal-dialog"> 
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <div class="panel-heading">
                          <div class="panel-title pull-left">Request for an Installation Service Quote</div>
                          <div class="pull-right">
                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button"><i class="fa fa-times"></i> </button>
                          </div>
                         
                        </div>
                      </div>
                      <form class="form-horizontal" method="POST" action="{{url('/getQuote')}}">
                        {{ csrf_field() }}
                      <div class="modal-body">
                      <div class="col-md-12 col-sm-12">
                        <div class="control-group"> 
                          <!-- Username -->
                          <label class="control-label"  for="username">Full Name</label>
                          <div class="controls">
                            <input type="text" id="username" name="name" placeholder="" class="form-control" autocomplete="off" required>
                            <p class="help-block">Your Name</p>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12 col-sm-12">
                        <div class="control-group"> 
                          <!-- Username -->
                          <label class="control-label"  for="username">Email</label>
                          <div class="controls">
                            <input type="email" id="username" name="email" placeholder="" class="form-control" autocomplete="off" required>
                            <p class="help-block">Your Email Address</p>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12 col-sm-12">
                        <div class="control-group"> 
                          <!-- Username -->
                          <label class="control-label"  for="username">Mobile</label>
                          <div class="controls">
                            <input type="text" id="username" name="mobile" placeholder="" class="form-control" autocomplete="off" required>
                            <p class="help-block">Your Phone Number</p>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12 col-sm-12">
                        <div class="control-group"> 
                          <!-- Username -->
                          <label class="control-label"  for="username">Your Message</label>
                          <div class="controls">
                          <textarea style="height:100px" name="message" class="form-control" id="textarea_message" placeholder="Message" required></textarea>
                            <p class="help-block">*Include product, the nature of service, location and Date *</p>
                          </div>
                        </div>
                      </div>

                     
                       
                       
                       
                        <div class="control-group"> 
                          <!-- Button -->
                          <div class="controls">
                            <button type="submit" class="btn btn-success">Submit Request</button>
                          </div>
                          
                        </div>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
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
    <div class="header-mid">
      <div class="container">
        <div class="row">
          <div class="col-md-3 header-left">
            <div class="logo"> <a href="{{url('/')}}"><img width="253" height="62" src="{{url('/')}}/uploads/logo/{{$Settings->logo}}" alt="logo"></a> </div>
          </div>
          <div class="col-md-6 search_block">
            <div class="search">
              <form action="{{url('/searchsite')}}" method="POST">
              {{csrf_field()}}
                <div class="search_cat">
                  <select class="search-category" name="category">
                    <?php $SearchCategory = DB::table('category')->get(); ?>
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
          <div class="col-md-3 header-right">
            <div class="cart">
              <div class="cart-icon dropdown" style="background: url({{url('/')}}/theme/images/cart.png) no-repeat scroll 0 0;"></div>
              <?php  $CartItems = Cart::content()?> 
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
                      $Products = DB::table('product')->where('id',$CartItem->id)->get();
                      ?>
                      @foreach($Products as $Product)
                      <tr>
                        <td class="text-center"><a href="{{url('/')}}/product/{{$Product->name}}"><img class="img-thumbnail" src="{{url('/')}}/uploads/product/{{$Product->image_one}}" alt="img"></a></td>
                        <td class="text-left"><a href="{{url('/')}}/product/{{$Product->name}}">{{$Product->name}}</a></td>
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
                    <div class="controls"> <a class="btn btn-primary pull-left" href="{{url('/cart')}}" id="view-cart"><i class="fa fa-shopping-cart"></i> View Cart </a> <a class="btn btn-primary pull-right" href="{{url('/cart/checkout')}}" id="checkout"><i class="fa fa-share"></i> Checkout</a> </div>
                  </div>
                </li>
              @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="new-further">
              <p>All your vehicle sounds & accessories  : </p>
              <ul class="toggle-newinFurther">\
                <?php $SearchCategory = DB::table('category')->inRandomOrder()->paginate(10); ?>
                @foreach($SearchCategory as $SearchCats)
                  <?php $final = preg_replace('#[ -]+#', '-', $SearchCats->cat); ?>
                  <li><a href="{{url('/classifieds')}}/shop/{{$final}}">{{$SearchCats->cat}}</a></li>
                @endforeach
              
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Main menu Start -->
  <div id="main-menu">
    <div class="container">
      <nav class="navbar navbar-default">
        <div class="navbar-header">
          <button aria-controls= "navbar" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a href="#" class="navbar-brand">menu</a> </div>
        <div class="navbar-collapse collapse" id="navbar">
          <ul class="nav navbar-nav">
            <li><a href="{{url('/')}}">HOME</a></li>
            <li><a href="{{url('/about')}}">About</a></li>
            <li><a href="{{url('/products')}}">Products</a><span class="new">new</span></li>
            @if($CartItems->isEmpty())

            @else
            <li><a href="{{url('/cart')}}"><i class="fa fa-shopping-cart"></i> Your Cart</a></li>
            <li><a href="{{url('/cart/checkout')}}"><i class="fa fa-share"></i> Checkout</a></li>
            @endif
            <li><a href="{{url('/services')}}"> Services</a></li>
            <li><a href="{{url('/contact')}}">Contact Us</a></li>
            <a class="requestQuote" data-toggle="modal" data-target="#quote" href="#"><span class="fa fa-envelope"></span> Request Quote</a> 
            
          </ul>
        </div>
      </nav>
    </div>
  </div>
  <!-- Main menu End --> 
  <!-- Header End --> 
  <!-- Contents -->
  @yield('content')
  <!-- </Contents -->
  
  <!-- Footer block Start  -->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class= "newslatter">
            <form id="subscribe-form">
              <h2 class="tf">Be The First To Get Updates On Our Latest Offers and Discounts</h2>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <p></p>
              <div class="input-group">
                <input id="email" name="email" class=" form-control" type="text" placeholder="Email Here......">
                <button id="subscribe-btn" type="submit" value="Sign up" class="btn btn-large btn-primary">Sign up</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-5">
          <div class="about">
            <div><h4>Why Buy From Us</h4></div>
            <span>
                <?php
                          $original_string = $Settings->welcome;
                          $num_words = 40;
                          $words = array();
                          $words = explode(" ", $original_string, $num_words);
                          $shown_string = "";
                          $url = url("/contact/#why");

                          if(count($words) == 40){
                            $words[39] = "<a href='$url'>Read More >></a>.";
                          }

                          $shown_string = implode(" ", $words);

                    ?>
                    {!!html_entity_decode($shown_string)!!}
            </span>
          </div>
        </div>
        <div class="col-md-2">
          <div class="new-store">
            <h4>Quick Links</h4>
            <ul class="toggle-footer">
              <li><a href="{{url('/about')}}">About</a></li>
              <li><a href="{{url('/services')}}">Services</a></li>
              <li><a href="{{url('/products')}}">Products</a></li>
             
              <li><a href="{{url('/contact')}}">Contact US</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-2">
          <div class="information">
            <h4>information</h4>
            <ul class="toggle-footer">
              
              <li><a href="{{url('/clientarea')}}">My Account</a></li>
              <li><a href="{{url('/privacy')}}">Privacy Policies</a></li>
              <li><a href="{{url('/terms')}}">Terms & Conditions</a></li>
              <li><a href="{{url('/copyright')}}">Copyrights</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="contact">
            <h4>Contact Us</h4>
            <ul class="toggle-footer">
              <li> <i class="fa fa-map-marker"></i>
                <div class="address-info">{{$Settings->location}} </div>
              </li>
              <li> <i class="fa fa-mobile"></i>
                <div class="call-info">{{$Settings->mobile}}<br>
                  <span>{{$Settings->mobile_two}}</span> </div>
              </li>
              <li> <i class="fa fa-envelope"></i>
                <div class="email-info"> <a href="#">{{$Settings->email}}</a></div> 
                <!-- Contact Area -->
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="social-link">
              <ul>
                <li><a href="{{$Settings->facebook}}"><i class="fa fa-facebook"></i></a></li>
                
                <li><a href="{{$Settings->google}}"><i class="fa fa-google-plus"></i></a></li>
                
               
                <li><a href="{{$Settings->instagram}}"><i class="fa fa-instagram"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="footer-link">
            <?php $Category = DB::table('category')->inRandomOrder()->paginate(7); ?>
           
              <ul>
              @foreach($Category as $Cat)
              <?php $final = preg_replace('#[ -]+#', '-', $Cat->cat); ?>
              <li><a href="{{url('/')}}/classifieds/shop/{{$final}}">{{$Cat->cat}}</a></li>
              @endforeach
                
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="copy-right">
              <p> &copy {{$Settings->sitename}} All Rights Reserved. Copyright <?php $date = date('Y'); echo $date;  ?> | Powered by <a href="http://designekta.com">Designekta Studios</a>.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-offer">
        <h2>{{$Settings->tagline}}</h2>
      </div>
    </div>
  </footer>
  <!-- Footer block End  --> 
  
</div>
@if($page_name == 'Services' or $page_name == 'About')
<script type="text/javascript">
		$( "#progress1" ).appendSimpleProgressBar();
		$( "#progress1" ).slow( { width:"78" } );
		
		$( "#progress2" ).appendSimpleProgressBar();
		$( "#progress2" ).slow( { width:"92" } );
		
		$( "#progress3" ).appendSimpleProgressBar();
		$( "#progress3" ).slow( { width:"76" } );
		
		$( "#progress4" ).appendSimpleProgressBar();
		$( "#progress4" ).slow( { width:"98" } );
	</script> 
@endif
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="{{asset('theme/js/jQuery.js')}}"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="{{asset('theme/Bootstrap/js/bootstrap.js')}}"></script> 
<script src="{{asset('theme/js/owl.carousel.min.js')}}"></script> 
<script src="{{asset('theme/js/globle.js')}}"></script>
@if($page_title == 'Payment')
<script>
  
    function close_accordion_section() {
		jQuery('.accordion .accordion-section-title').removeClass('active');
		jQuery('.accordion .accordion-section-content').slideUp(300).removeClass('open');
		jQuery('.accordion2 .accordion-section-title1').removeClass('active');
		jQuery('.accordion2 .accordion-section-content1').slideUp(300).removeClass('open');
	}

	jQuery('.accordion-section-title').click(function(e) {
		// Grab current anchor value
		var currentAttrValue = jQuery(this).attr('href');

		if(jQuery(e.target).is('.active')) {
			close_accordion_section();
		}else {
			close_accordion_section();

			// Add active class to section title
			jQuery(this).addClass('active');
			// Open up the hidden content panel
			jQuery('.accordion ' + currentAttrValue).slideDown(300).addClass('open');
			jQuery('.accordion2 ' + currentAttrValue).slideDown(300).addClass('open'); 
		}

		e.preventDefault();
	});

</script>
@endif

@if($page_name == 'details')

<!-- product tab js --> 

<!-- <script type="text/javascript">	
      $("#tabs li a").click(function(e){
        var title = $(e.currentTarget).attr("title");
        $("#tabs li a").removeClass("selected")
        $(".tab-content li div").removeClass("selected")
        $(".tab-"+title).addClass("selected")
        $(".items-"+title).addClass("selected")
        $("#items").attr("class","tab-"+title);
      });
	      $(window).load( function() {
        $('.sp-wrap').smoothproducts();
    });
     </script> -->


<!-- <script type="text/javascript" src="js/smoothproducts.min.js"></script> -->
<script type="text/javascript" src="{{asset('theme/js/jquery-2.1.3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme/js/smoothproducts.min.js')}}"></script>

<script type="text/javascript">
    /* wait for images to load */
    $(window).load( function() {
        $('.sp-wrap').smoothproducts();
    });
</script>
@endif

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
                    $('#success-alert').html('The Purchase Was Successfull')
                    $('#veryfyID').html('Successfull')
                    
                    window.open('{{url('/')}}/clientarea/thankyou','_self')
              }else{
                    $('#fail-alert').html('The Transaction Code Entered is Not Valid, Please try again')
                    $('#veryfyID').html('Veryfy')
              }
            }
          });

        });
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

   

@endforeach
</body>
</html>
