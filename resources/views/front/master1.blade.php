<!DOCTYPE html>
<html lang="en">
  <head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php $SiteSettings = DB::table('sitesettings')->get(); ?>
  @foreach($SiteSettings as $Settings)
  
    <link rel="icon" href="{{url('/')}}/uploads/logo/{{$Settings->favicon}}" type="image/png">
  
   
    <!-- SEO --> 
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
	
    <!-- SEO -->
   
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700"> 
    <link rel="stylesheet" href="{{asset('theme/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('theme/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{asset('theme/css/bootstrap-datepicker.css')}}">

    <link rel="stylesheet" href="{{asset('theme/fonts/flaticon/font/flaticon.css')}}">



    <link rel="stylesheet" href="{{asset('theme/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('theme/css/style.css')}}">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5c9d34901de11b6e3b05bbd9/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
    
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar py-3" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-11 col-xl-2">
            <h1 class="mb-0"><a href="{{url('/')}}" class="text-white h2 mb-0"><img width="150" height="150" src="{{url('/')}}/uploads/logo/{{$Settings->logo}}" alt="Logistics"></a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                <li class="<?php if($page_name == 'Home'){echo "active";}else{ echo "";} ?>" data-aos="fade-up" data-aos-delay="100"><a href="{{url('/')}}"><i class="icon-home"></i> Home</a></li>
                <li class="<?php if($page_name == 'About'){echo "active";}else{ echo "";} ?>" data-aos="fade-up" data-aos-delay="250"><a href="{{url('/about')}}">About Us</a></li>
                <li class="<?php if($page_name == 'Services'){echo "active";}else{ echo "";} ?> has-children" data-aos="fade-up" data-aos-delay="300">
                  <a href="{{url('/services')}}">Services</a>
                  <ul class="dropdown">
                  <?php $Services = DB::table('services')->get(); ?>
                  @foreach($Services as $service)
                    <li><a href="{{url('/service')}}/{{$service->id}}">{{$service->title}}</a></li>
                  @endforeach
                    
                  </ul>
                </li>
                <li class="<?php if($page_name == 'How it Works'){echo "active";}else{ echo "";} ?>" data-aos="fade-up" data-aos-delay="500"><a href="{{url('/how')}}"><i class="icon-cog"></i> How it Works</a></li>
                <li class="<?php if($page_name == 'Containers'){echo "active";}else{ echo "";} ?>" data-aos="fade-up" data-aos-delay="600"><a href="{{url('/containers')}}"><i class="icon-cog"></i> Containers </a></li>
                <li class="<?php if($page_name == 'Blog'){echo "active";}else{ echo "";} ?>" data-aos="fade-up" data-aos-delay="700"><a href="{{url('/blog')}}">Blog</a></li>
                <li class="<?php if($page_name == 'Contact'){echo "active";}else{ echo "";} ?>" data-aos="fade-up" data-aos-delay="900"><a href="{{url('/contact')}}"><i class="icon-phone"></i> Contact</a></li>
              </ul>
            </nav>
          </div>


          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
      
    </header>

  
    <!-- Content -->
   @yield('content')
    <!-- </Content -->
    
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="row">
              
            
              <div class="col-md-5">
                <h2 class="footer-heading mb-4">Contact Us</h2>
                
                <p><span class="icon-home" data-aos="fade-up" data-aos-delay="200"></span> {{$Settings->location}}</p>
                <p><span class="icon-location-arrow" data-aos="fade-up" data-aos-delay="400"></span> {{$Settings->address}}</p>
                <p><span class="icon-envelope" data-aos="fade-up" data-aos-delay="600"></span> {{$Settings->email}}</p>
                <p><span class="icon-phone" data-aos="fade-up" data-aos-delay="800"></span> {{$Settings->mobile}}</p>
                <p><span class="icon-clock-o" data-aos="fade-up" data-aos-delay="800"></span> <strong>Thursday-Saturday from 8uhr to 17 uhr</strong></p>
                
                
              </div>

              <div class="col-md-3">
                <h2 class="footer-heading mb-4" data-aos="fade-up" data-aos-delay="100">Quick Links</h2>
                <ul class="list-unstyled" data-aos="fade-up" data-aos-delay="400">
                  <li><a href="{{url('/')}}">Home</a></li>
                  <li><a href="{{url('/about')}}">About</a></li>
                  <li><a href="{{url('/services')}}">Services</a></li>
                  <li><a href="{{url('/blog')}}">Our Blog</a></li>
                  <li><a href="{{url('/contact')}}">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-md-4">
                <h2 class="footer-heading mb-4" data-aos="fade-up" data-aos-delay="100">Policies</h2>
                <ul class="list-unstyled" data-aos="fade-up" data-aos-delay="400">
                  <li><a href="{{url('/privacy')}}">Privacy Policy</a></li>
                  <li><a href="{{url('/terms')}}">Terms & Conditions</a></li>
                  <li><a href="{{url('/copyright')}}">Copyright</a></li>
                  <li><a href="{{url('/how')}}">How it works</a></li>
                  <li><a href="{{url('/clientarea')}}">My Account</a></li>
                </ul>
              </div>
              
            </div>
          </div>
          <div class="col-md-4">
            <h2 class="footer-heading mb-4" data-aos="fade-up" data-aos-delay="100">Estimate Your Shipping Costs In Euros</h2>
      
            <form class="calc" method="post">
            <div class="row form-group">
                <div class="col-md-4 mb-3 mb-md-0">
                  <label class="text-white" for="fname">Length</label>
                  <input required type="text" name="length" placeholder="Length" class="form-control">
                </div>
                <div class="col-md-4">
                  <label class="text-white" for="lname">Width</label>
                  <input required type="text" name="width" placeholder="Width" class="form-control">
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-md-4">
                  <label class="text-white" for="lname">Height</label>
                  <input required type="text" name="height" placeholder="Height" class="form-control">
                </div>
              </div>
              <div class="col-md-12">
              <button type="submit" class="btn btn-primary text-white py-2 px-4 btn-block calcbtn">Estimate Shipping</button>
              
              <div class="text-success text-center Results" ></div>
              </div>
            </form>
             
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <center>
            <a href="#" class="pl-0 pr-3" data-aos="fade-up" data-aos-delay="200"><span class="icon-facebook"></span></a>
                <a href="#" class="pl-3 pr-3" data-aos="fade-up" data-aos-delay="400"><span class="icon-twitter"></span></a>
                <a href="#" class="pl-3 pr-3" data-aos="fade-up" data-aos-delay="600"><span class="icon-instagram"></span></a>
                <a href="#" class="pl-3 pr-3" data-aos="fade-up" data-aos-delay="800"><span class="icon-linkedin"></span></a>
                <a href="#" class="pl-0 pr-3" data-aos="fade-up" data-aos-delay="1000"><span class="icon-youtube"></span></a>
                <a href="#" class="pl-0 pr-3" data-aos="fade-up" data-aos-delay="1200"><span class="icon-google-plus"></span></a>
            </center>
            <p>
            <!-- Link back to Designekta Studios can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Powered By <a title="Credits to Leemtech Solutions" href="https://designekta.com" target="_blank" >Designekta Studios</a>
            <!-- Link back to Designekta Studios can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>
          
        </div>
      </div>
    </footer>
  </div>

  <script src="{{asset('theme/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('theme/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('theme/js/jquery-ui.js')}}"></script>
  <script src="{{asset('theme/js/popper.min.js')}}"></script>
  <script src="{{asset('theme/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('theme/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('theme/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('theme/js/jquery.countdown.min.js')}}"></script>
  <script src="{{asset('theme/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('theme/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('theme/js/aos.js')}}"></script>

  <script src="{{asset('theme/js/main.js')}}"></script>
  <script src="{{asset('/theme/js/vendor/jquery-1.12.4.min.js')}}"></script>
  <script type="text/javascript">
  
    $(document).ready(function(){
      $('.contactRealAlert').hide();
      $('.calcbtn').click(function (event) {
          event.preventDefault();
				   $('.calcbtn').html('Calculating.........');
                   
              $.ajax({
                     headers: {
                                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                             },
                    type: "post",
                    url : '{{url('/')}}/calculate',
                    data:  $('.calc').serialize(),
                    success: function( msg ) {
                        $('.calcbtn').html('Estimate Shipping');
                        
                        
                        $('.Results').html(msg);
                     }
              });

      });

      $('#calcbtn').click(function (event) {
          event.preventDefault();
				   $('#calcbtn').html('Calculating.........');
                   
              $.ajax({
                     headers: {
                                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                             },
                    type: "post",
                    url : '{{url('/')}}/calculate',
                    data:  $('#calc').serialize(),
                    success: function( msg ) {
                        $('#calcbtn').html('Estimate Shipping');
                        
                        
                        $('.Results').html(msg);
                     }
              });

      });

      //  Quick Contact
      $('#contactRealButton').click(function (event) {
				$('.contactRealAlert').show(200);
        $('.contactRealAlert').html('Sending.....');
         event.preventDefault();
         
         var Email = $("#contactRealEmail").val();
         var Name = $("#contactRealName").val();
         var Subject = $("#contactRealSubject").val();
         var Message = $("#contactRealMessage").val();
        
         
         
         $.ajax({
             headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
            type: "post",
            url : '{{url('/')}}/submitMessage',
            data: {email:Email,name:Name,message:Message,subject:Subject},
            success: function( msg ) {
          
             $('.contactRealAlert').show(800);
             $("#contactRealEmail").val("");
             $("#contactRealName").val("");
             $("#contactRealSubject").val("");
             $("#contactRealMessage").val("");
             $('#contactRealAlert').hide(400);
             $('.contactRealAlert').html(msg);
          
             
             }
         });
     });

      
    
    });
  </script>
    
  </body>
@endforeach
</html>
