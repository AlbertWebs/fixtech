<!DOCTYPE html>
<html lang="en" class="wide wow-animation">
<head>
<?php $SiteSettings = DB::table('sitesettings')->get(); ?>

@foreach($SiteSettings as $Settings)
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="utf-8">
<meta name="Keywords" content="Stagepass Audio Visual"/>
<!-- SEO --> 
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
{!! Twitter::generate() !!}
<!-- SEO -->
<link rel="shortcut icon" href="{{asset('theme/images/stagepassAV.ico')}}" type="image/x-icon"/>


<link rel="stylesheet" type="text/css" href="{{asset('theme/css/css.css?family=Montserrat:400,700%7CLato:300,300italic,400,400italic,700,900%7CPlayfair+Display:700italic,900')}}">
@if($page_name == 'Home' OR $page_name == 'Home1')
<link rel="stylesheet" href="{{asset('theme/css/style.css')}}">
@else
<link rel="stylesheet" href="{{asset('theme/css/style.css')}}">
@endif
@if($page_name == 'Submit RFP')
<link rel="stylesheet" href="{{asset('admins_theme/assets/css/bootstrap-fileupload.min.css')}}" />
@endif

<link rel="stylesheet" href="{{asset('theme/css/infinite-slider.css')}}">
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5cb0efa8d6e05b735b42521b/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</head>
<body style="">
<div class="page">
  <header class="page-head">
    <div class="rd-navbar-wrap">
      <nav data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-stick-up-clone="false" data-md-stick-up-offset="53px" data-lg-stick-up-offset="53px" data-md-stick="true" data-lg-stick-up="true" class="rd-navbar rd-navbar-corporate-light">
        <div class="rd-navbar-inner">
          <div class="rd-navbar-aside-wrap">
            <div class="rd-navbar-aside">
              <div data-rd-navbar-toggle=".rd-navbar-aside" class="rd-navbar-aside-toggle"><span></span></div>
              <div class="rd-navbar-aside-content">
                <ul class="rd-navbar-aside-group list-units">
                  <li>
                    <div class="unit unit-horizontal unit-spacing-xs unit-middle">
                      <div class="unit-left"><span class="icon icon-xxs icon-primary material-icons-phone"></span></div>
                      <div class="unit-body"><a href="callto:#" class="link-secondary">{{$Settings->mobile}}</a></div>
                    </div>
                  </li>
                  <li>
                    <div class="unit unit-horizontal unit-spacing-xs unit-middle">
                      <div class="unit-left"><span class="icon icon-xxs icon-primary fa-envelope-o"></span></div>
                      <div class="unit-body"><a href="/cdn-cgi/l/email-protection#ab88" class="link-secondary"><span class="__cf_email__" data-cfemail="81e8efe7eec1e5e4eceeede8efeaafeef3e6">{{$Settings->email}} </span></a></div>
                    </div>
                  </li>

                  <li>
                  <?php $File = DB::table('files')->get() ?>
                  @foreach($File as $file)
                    <div class="unit unit-horizontal unit-spacing-xs unit-middle">
                      <div class="unit-left"><span class="icon icon-xxs icon-primary fa-download"></span></div>
                      <div class="unit-body"><a download href="{{url('/')}}/uploads/files/{{$file->file}}" class="link-secondary"><span class="__cf_email__" data-cfemail="81e8efe7eec1e5e4eceeede8efeaafeef3e6">Business Profile </span></a></div>
                    </div>
                  </li>
                  @endforeach
                </ul>
                <div class="rd-navbar-aside-group">
                  <ul class="list-inline list-inline-reset">
                    <li><a target="_new" href="{{$Settings->facebook}}" class="icon icon-circle icon-silver-chalice-filled icon-xxs-smallest fa fa-facebook facebook-icon"></a></li>
                    <li><a target="_new" href="{{$Settings->twitter}}" class="icon icon-circle icon-silver-chalice-filled icon-xxs-smallest fa fa-twitter  twitter-icon"></a></li>
                    <li><a target="_new" href="{{$Settings->google}}" class="icon icon-circle icon-silver-chalice-filled icon-xxs-smallest fa fa-google-plus google-plus-icon"></a></li>
                    <li><a target="_new" href="{{$Settings->instagram}}" class="icon icon-circle icon-silver-chalice-filled icon-xxs-smallest fa fa-instagram instagram-icon"></a></li>
                    <li><a target="_new" href="{{$Settings->youtube}}" class="icon icon-circle icon-silver-chalice-filled icon-xxs-smallest fa fa-youtube youtube-icon"></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- <div class="rd-navbar-search">
              <form action="search-results.html" method="GET" data-search-live="rd-search-results-live" data-search-live-count="6" class="rd-search">
                <div class="rd-search-inner">
                  <div class="form-group">
                    <label for="rd-search-form-input" class="form-label">Search...</label>
                    <input id="rd-search-form-input" type="text" name="s" autocomplete="off" class="form-control">
                  </div>
                  <button type="submit" class="rd-search-submit"></button>
                </div>
                <div id="rd-search-results-live" class="rd-search-results-live"></div>
              </form>
              <button data-rd-navbar-toggle=".rd-navbar-search, .rd-navbar-search-wrap" class="rd-navbar-search-toggle"></button>
            </div> -->
          </div>
          <div class="rd-navbar-group">
            <div class="rd-navbar-panel">
              <button data-rd-navbar-toggle=".rd-navbar-nav-wrap" class="rd-navbar-toggle"><span></span></button>
              <a href="{{url('/')}}" class="rd-navbar-brand brand"><img src="{{url('/')}}/uploads/logo/{{$Settings->logo}}" width="200" height="22" alt="logo"/></a> </div>
            <div class="rd-navbar-nav-wrap">
              <div class="rd-navbar-nav-inner">
                <ul class="rd-navbar-nav">
                  <li class="<?php if($page_name == 'Home'){echo "active"; }else{ echo "";} ?>"><a href="{{url('/')}}">Home</a> </li>
                  <li class="<?php if($page_name == 'About'){echo "active"; }else{ echo "";} ?>"><a href="{{url('/')}}/about">About</a></li>

                  <li class="<?php if($page_name == 'Work'){echo "active"; }else{ echo "";} ?>"><a href="{{url('/')}}/portfolio">Our Work</a></li>
                  <li class="<?php if($page_name == 'Services'){echo "active"; }else{ echo "";} ?>"><a href="#">AV Services</a>
                  <ul class="rd-navbar-dropdown">
                      <?php $Services = DB::table('services')->get() ?>
                      @foreach($Services as $Service)
                      <li><a href="{{url('/service')}}/{{$Service->title}}"><span class="{{$Service->icon}}"></span>{{$Service->title}}</a> </li>
                      @endforeach
 
                    </ul>
                  </li>
                  <?php $Blog = DB::table('blog')->get() ?>
                  @if($Blog->isEmpty())
                  @else
                  <li class="<?php if($page_name == 'Our Blog'){echo "active"; }else{ echo "";} ?>"><a href="#">Blog</a>
                    <ul class="rd-navbar-dropdown">
                      <li><a href="{{url('/blog')}}"><span class="fa fa-pencil"></span> Blog</a> </li>
                      <li><a href="{{url('/blog')}}/videos"><span class="fa fa-film"></span> Videos</a> </li>
                      
 
                    </ul>
                 </li>
                  @endif
               
                  <li class="<?php if($page_name == 'Contact'){echo "active"; }else{ echo "";} ?>"><a href="{{url('/contact')}}">Contact Us</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <!-- main -->
  @yield('content')
  <!-- </main> -->
  <section class="section-40 section-sm-60 bg-cod-gray">
    <div class="shell">
      <div class="range range-xs-center">
        <div class="cell-xs-10 cell-sm-11 cell-md-12">
          <div class="range">
            <div class="cell-sm-6 cell-md-4">
              <div class="inset-md-right-30">
                <h6 class="text-uppercase">Quick Contact</h6>
                <p class="offset-top-22"> {!!html_entity_decode($Settings->location)!!} </p>
                
              </div>
              <div class="offset-top-22">
                <div class="group-md group-top">
                  <div>
                    <div class="unit unit-horizontal unit-spacing-xs">
                      <div class="unit-left"><span class="icon icon-xs-smaller icon-primary fa-phone"></span></div>
                      <div class="unit-body"><a href="callto:#" class="link link-bold link-white-v2">{{$Settings->mobile}}</a></div>
                    </div>
                    <div class="inset-left-30"><a href="/cdn-cgi/l/email-protection#f0d3" class="link-white-v2 text-italic"><span class="__cf_email__" data-cfemail="2d44434b426d494840424144434603425f4a">{{$Settings->email}}</span></a></div>
                  </div>
                  <div>
                    <ul class="list-inline list-inline-reset">
                    <?php $SiteSettings = DB::table('sitesettings')->get(); ?>
                      <li><a target="_new" href="{{$Settings->facebook}}" class="icon icon-round icon-gray-dark-filled icon-xxs-smallest fa fa-facebook facebook-icon"></a></li>
                      <li><a target="_new" href="{{$Settings->twitter}}" class="icon icon-round icon-gray-dark-filled icon-xxs-smallest fa fa-twitter twitter-icon"></a></li>
                      <li><a target="_new" href="{{$Settings->google}}" class="icon icon-round icon-gray-dark-filled icon-xxs-smallest fa fa-google-plus google-plus-icon"></a></li>
                      <li><a target="_new" href="{{$Settings->instagram}}" class="icon icon-round icon-gray-dark-filled icon-xxs-smallest fa fa-instagram instagram-icon"></a></li>
                      <li><a target="_new" href="{{$Settings->youtube}}" class="icon icon-round icon-gray-dark-filled icon-xxs-smallest fa fa-youtube youtube-icon"></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="cell-sm-6 cell-md-4 offset-top-50 offset-sm-top-0">
              <h6 class="text-uppercase">Quick links</h6>
              <div style="max-width: 340px;" class="row offset-top-22 offset-md-top-30">
                <div class="col-xs-6">
                  <ul class="list-marked-variant-2">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('/about')}}">About us</a></li>
                    <li><a href="{{url('/services')}}">Av Services</a></li>
                    <li><a href="{{url('/portfolio')}}">Our Work</a></li>
                    <li><a href="{{url('/contact')}}">Contacts</a></li>
                  </ul>
                </div>
                <div class="col-xs-6">
                  <ul class="list-marked-variant-2">
                    <?php $Blog = DB::table('blog')->get() ?>
                    @if($Blog->isEmpty())
                    @else
                    <li><a href="{{url('/blog')}}">Blog</a></li>
                    @endif
                    <li><a href="{{url('/privacy')}}">Privcay Policy</a></li>
                    <li><a href="{{url('/terms')}}">Terms & Conditions</a></li>
                    <li><a href="{{url('/copyright')}}">Copyrights</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="cell-sm-6 cell-md-4 offset-top-50 offset-md-top-0">
              <h6 class="text-uppercase">Subscribe</h6>
              <div class="offset-top-22 offset-md-top-30">
                <p>Get latest updates</p>
                <form data-form-output="form-output-global" data-form-type="subscribe" method="post" action="{{url('/subscribe')}}" class="rd-mailform form-classic form-inline offset-top-15">
                  <div class="form-group">
                    <input id="contact-email" type="email" name="email" data-constraints="@Email @Required" class="form-control">
                    <label for="contact-email" class="form-label">Enter Your E-mail</label>
                  </div>
                  <button type="submit" aria-label="Subscribe" class="btn btn-icon-only btn-primary"><span class="icon icon-xs icon-white fa-envelope-o"></span></button>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer class="page-foot section-15 bg-gray-base">
    <div class="shell text-center">
      <div class="range">
        <div class="cell-sm-12">
          <p class="rights text-white-03"><span>&#169;&nbsp;</span><span id="copyright-year"></span><span><a href="{{url('/copyright')}}" class="link-white-03">StagePass Audio Visual</a></span> |  Powered by <a href="https://designekta.com" class="link-white-03"> Designekta Studios</a> </p>
        </div>
      </div>
    </div>
  </footer>
</div>
<div id="form-output-global" class="snackbars"></div>
<div tabindex="-1" role="dialog" aria-hidden="true" class="pswp">
  <div class="pswp__bg"></div>
  <div class="pswp__scroll-wrap">
    <div class="pswp__container">
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
    </div>
    <div class="pswp__ui pswp__ui--hidden">
      <div class="pswp__top-bar">
        <div class="pswp__counter"></div>
        <button title="Close (Esc)" class="pswp__button pswp__button--close"></button>
        <button title="Share" class="pswp__button pswp__button--share"></button>
        <button title="Toggle fullscreen" class="pswp__button pswp__button--fs"></button>
        <button title="Zoom in/out" class="pswp__button pswp__button--zoom"></button>
        <div class="pswp__preloader">
          <div class="pswp__preloader__icn">
            <div class="pswp__preloader__cut">
              <div class="pswp__preloader__donut"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
        <div class="pswp__share-tooltip"></div>
      </div>
      <button title="Previous (arrow left)" class="pswp__button pswp__button--arrow--left"></button>
      <button title="Next (arrow right)" class="pswp__button pswp__button--arrow--right"></button>
      <div class="pswp__caption">
        <div class="pswp__caption__cent"></div>
      </div>
    </div>
  </div>
</div>
<script src="{{asset('theme/js/core.min.js')}}"></script> 
<script src="{{asset('theme/js/script.js')}}"></script>
@if($page_name == 'Submit RFP')

<script src="{{asset('admins_theme/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- END GLOBAL SCRIPTS -->


      <!-- PAGE LEVEL SCRIPTS -->
      <script src="{{asset('admins_theme/assets/plugins/jasny/js/bootstrap-fileupload.js')}}"></script> 
@endif
<script>
    // Get the video
    var video = document.getElementById("myVideos");
    
    // Get the button
    var btn = document.getElementById("myBtn");
    
    // Pause and play the video, and change the button text
    function myFunction() {
      if (video.paused) {
        video.play();
        btn.innerHTML = "<span class='fa fa-pause'></span>";
      } else {
        video.pause();
        btn.innerHTML = "<span class='fa fa-play'></span>";
      }
    }
</script>
</body>
@endforeach
</html>