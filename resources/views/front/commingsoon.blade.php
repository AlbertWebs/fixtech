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
<link rel="stylesheet" href="{{asset('theme/css/stylee.css')}}">
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
<body style="background-image: url(images/1920x900.jpg);" class="one-screen-page bg-gray-darker bg-image">
<div class="page">
  <div class="page-inner">
    <header class="page-head">
      <div class="divider-spectrum"></div>
      <div class="page-head-inner">
        <div class="shell text-center"><a href="#" class="brand brand-md"><img src="{{url('/')}}/uploads/logo/stagepassAVLogo.png" width="200" height="22" alt="logo"/></a> </div>
      </div>
    </header>
    <section class="page-content text-center">
      <div class="shell">
        <div class="range range-sm-center">
          <div class="cell-sm-12">
            <h2 class="text-style-lighter">We'll be back in</h2>
            <div class="block-centered offset-top-30 offset-sm-top-60">
              <div data-type="until" data-time="19 Apr 2019 00:00" data-format="dhms" class="countdown countdown-default countdown-inverse"></div>
            </div>
            <p style="opacity: 0.8;" class="text-white offset-top-30">We are passionate about delivering inspired projects to our clients on time. From the extravagant to the delicately intimate, we will build on your napkin sketches and deliver immersive experiences for the people that truly matter to you.</p>
          </div>
          <div class="cell-sm-6 cell-md-5 cell-lg-4 offset-top-40 offset-sm-top-60 offset-xl-top-120">
            <h5>Stay tunned, we will be back soon</h5>
            <form data-form-output="form-output-global" data-form-type="subscribe" method="post" action="{{url('/subscribe')}}" class="rd-mailform form-modern form-inverse offset-top-40">
              <div class="form-group">
                <label for="contact-email" class="form-label">Email</label>
                <input id="contact-email" type="email" name="email" data-constraints="@Email @Required" class="form-control">
              </div>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="btn btn-primary btn-block offset-top-30">Subscribe</button>
            </form>
          </div>
        </div>
      </div>
    </section>
    <footer class="page-foot">
      <div class="page-foot-inner">
        <div class="shell text-center">
          <div class="range">
            <div class="cell-xs-12">
            <p class="rights text-white-03"><span>&#169;&nbsp;</span><span id="copyright-year"></span><span><a href="{{url('/copyright')}}" class="link-white-03">StagePass Audio Visual</a></span> |  Powered by <a href="https://designekta.com" class="link-white-03"> Designekta Studios</a> </p>
            </div>
          </div>
        </div>
      </div>
      <div class="divider-spectrum"></div>
    </footer>
  </div>
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
</body>
@endforeach
</html>
