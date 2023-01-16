@extends('front.master')
@section('content')
@foreach($SiteSettings as $Settings)
 <!--================Categories Banner Area =================-->
        <section class="solid_banner_area">
            <div class="container">
                <div class="solid_banner_inner">
                    <h3>Contact</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
    
            <!-- Systems FeedBack -->
            <center>
                 @if(Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                         
                         <div class="">
                    <h2>Why Buy From Us</h2>
                    <p>{!!html_entity_decode($Settings->welcome)!!}</p>
                </div>
            </center>
        <!--================Contact Area =================-->
               
        <section class="contact_area p_100">
            <div class="container">
                <div class="contact_title">
                    <h2>Contact US</h2>
                    
                </div>
                <div class="row contact_details">
                    <div class="col-lg-4 col-md-6">
                        <div class="media">
                            <div class="d-flex">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </div>
                            <div class="media-body">
                                <p>{{$Settings->location}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="media">
                            <div class="d-flex">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="media-body">
                                <a href="tel:{{$Settings->mobile_one}}">{{$Settings->mobile_one}}</a>
                                <a href="tel:{{$Settings->mobile_two}}">{{$Settings->mobile_two}}</a>
                            </div>
                        </div> 
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="media">
                            <div class="d-flex">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                            <div class="media-body">
                                <a href="mailto:{{$Settings->email}}">{{$Settings->email}}</a>
                                <a href="mailto:{{$Settings->email_one}}">{{$Settings->email_one}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact_form_inner">
                    <h3>Drop a Message</h3>
                    <form class="contact_us_form row" method="POST" action="{{url('/submitMessage')}}" id="contactForm" novalidate="novalidate">
                    {{ csrf_field() }}
                        <div class="form-group col-lg-4">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Full Name *">
                        </div>
                        <div class="form-group col-lg-4">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address *">
                        </div>
                        <div class="form-group col-lg-4">
                            <input type="text" class="form-control" id="website" name="phone" placeholder="Your Phone Number">
                        </div>
                        <div class="form-group col-lg-12">
                            <input type="text" class="form-control" id="website" name="subject" placeholder="Subject">
                        </div>
                        <div class="form-group col-lg-12">
                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Type Your Message..."></textarea>
                        </div>
                        <div class="form-group" style="display: none;">
                        <label for="faxonly">Fax Only
                        <input type="checkbox" name="faxonly" id="faxonly" />
                        </label>
                        </div>
                        <div class="form-group col-lg-12">
                            <button type="submit" value="submit" class="btn update_btn form-control">Send Message</button>
                        </div>
                        {!! app('captcha')->render(); !!}
                    </form>
                </div>
            </div>
        </section>
        <!--================End Contact Area =================-->
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
        </div>
                <!--================World Wide Service Area =================-->
                <section class="world_service">
                <div class="container">
                    <div class="world_service_inner">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="world_service_item">
                                    <h4><img src="{{asset('theme/img/icon/world-icon-1.png')}}" alt="">Globally Recognised</h4>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="world_service_item">
                                    <h4><img src="{{asset('theme/img/icon/world-icon-2.png')}}" alt="">24/7 Customer Support</h4>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="world_service_item">
                                    <h4><img src="{{asset('theme/img/icon/world-icon-3.png')}}" alt="">Secured Checkout</h4>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="world_service_item">
                                    <h4><img src="{{asset('theme/img/icon/world-icon-4.png')}}" alt="">Quick Delivary</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--================End World Wide Service Area =================-->
@endforeach
@endsection