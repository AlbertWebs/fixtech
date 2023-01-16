@extends('front.master')
@section('content')

 

<div id="bread-crumb">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="page-title">
            <h4>Contact Us</h4>
          </div>
        </div>
        <div class="col-md-9">
          <div class="bread-crumb">
            <ul>
              <li><a href="{{url('/')}}">Home</a></li>
              <li>\</li>
              <li><a href="{{url('/contact')}}">Contact us</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- bredcrumb and page title block end  -->
  @foreach($SiteSettings as $Settings)
  <div id="contact-page-contain">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-sm-12">
          <div class="map"> 
            <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
            <div style="overflow:hidden;height:500px;width:100%;">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d249.30100549775818!2d36.8278346!3d-1.2842642!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x677ac7d99a0ff352!2sAmani+Vehicle+Sounds+%26+Accessories!5e0!3m2!1sen!2ske!4v1557146026043!5m2!1sen!2ske" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <div class="contact-title">
            <h2 id="why" class="tf">Why Buy From Us</h2>
            <center>
               <p class="text-center">{!!html_entity_decode($Settings->welcome)!!} </p>
            </center>
            <!-- Systems FeedBack -->
            <center>
                 @if(Session::has('message'))
							       <div class="alert alert-success">{{ Session::get('message') }}</div>
				         @endif
            </center>
            <!-- </Systems FeedBack -->
          </div>
        </div>
      </div>
      <div class="contact-submit">
        <form method="POST" action="{{url('/submitMessage')}}">
        {{ csrf_field() }}
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="input-group">
                <input name="name" type="text" class="form-control" placeholder="Name *" required>
              </div>
              <!-- /input-group -->
              <div class="input-group">
                <input name="email" type="email" class="form-control" placeholder="E-mail *" required>
              </div>
              <!-- /input-group --> 
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="input-group">
                <input name="phone" type="text" class="form-control" placeholder="Phone *" required>
              </div>
              <!-- /input-group -->
              <div class="input-group">
                <input name="subject" type="text" class="form-control" placeholder="Subject *" required>
              </div>
              <!-- /input-group --> 
            </div>
            <div class="col-md-12">
              <div class="input-group">
                <textarea name="message" class="form-control" id="textarea_message" placeholder="Message *" required></textarea>
              </div>
              <div class="col-md-12 text-center">
                <button class="btn btn-primary" type="submit"><i class="fa fa-envelope-o"></i> Send </button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="address">
            <h2 class="tf"><i class="fa fa-map-marker"></i></h2>
            <div class="address-info">{{$Settings->location}} </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="complaint">
            <h2 class="tf"><i class="fa fa-mobile"></i></h2>
            <div class="call-info">{{$Settings->mobile_one}}<br>
              <span>{{$Settings->mobile_two}}</span> </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feedback">
            <h2 class="tf"><i class="fa fa-envelope"></i></h2>
            <div class="email-info"> <a href="#">{{$Settings->email}}</a><br>
              <span><a href="#">{{$Settings->email_one}}</a></span></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
    
@endsection