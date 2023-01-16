@extends('front.master')

@section('content')
<style>
    form #faxonly{ display:none; }
    </style>
@foreach($SiteSettings as $Settings)
        <!-- Begin Li's Breadcrumb Area -->
        <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- Begin Contact Main Page Area -->
            <div class="contact-main-page mt-60 mb-40 mb-md-40 mb-sm-40 mb-xs-40">
                <div class="container mb-60">
                    <div style="">
                       <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15955.279274066641!2d36.8202995!3d-1.2818717!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcec2f8cb2767d579!2sFixtech%20Printer%20Solutions!5e0!3m2!1sen!2ske!4v1673859927727!5m2!1sen!2ske" width="100%" height="800" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 offset-lg-1 col-md-12 order-1 order-lg-2">
                            <div class="contact-page-side-content">
                                <h3 class="contact-page-title">Why Choose Us</h3>
                                <p class="contact-page-message mb-25">{!!html_entity_decode($Settings->welcome)!!}</p>

                                <div class="single-contact-block">
                                    <h4><i class="fa fa-phone"></i> Contacts</h4>
                                    <p>Mobile: {{$Settings->mobile}}</p>
                                    <p>Hotline: {{$Settings->mobile_one}}</p>
                                    <p><i class="fa fa-map-marker"></i> {{$Settings->location}}</p>
                                    <p><i class="fa fa-envelope-o"></i> {{$Settings->email}}</p>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                            <div class="contact-form-content pt-sm-55 pt-xs-55">
                                <h3 class="contact-page-title">Write Us a Message</h3>
                                <h1 style="font-size:2px; margin:0 auto; color:#fff">Car Audio Shop in Nairobi</h1>
                                <div class="contact-form">
                                    <form  id="contact-foram" method="POST" action="{{url('/submitMessage')}}">
                                    {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>Your Name <span class="required">*</span></label>
                                            <input type="text" name="name" id="customername" required>
                                        </div>
                                        <!-- within your existing form add this field -->
                                        <input type="text" id="faxonly" name="faxonly"/>
                                        <div class="form-group">
                                            <label>Your Email <span class="required">*</span></label>
                                            <input type="email" name="email" id="customerEmail" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Subject</label>
                                            <input type="text" name="subject" id="contactSubject">
                                        </div>
                                        <div class="form-group mb-30">
                                            <label>Your Message</label>
                                            <textarea name="message" id="contactMessage" ></textarea>
                                        </div>
                                        <div class="col-lg-12 col-md-12" id="TheCapcha">
                                            <div class="g-recaptcha" data-sitekey="6Ld1MOEZAAAAAFA0hpFQ4DKf0Si330YkpOpKtrH1" data-callback="correctCaptcha"></div>
                                            <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=en"></script>
                                        </div>
                                        <br><br>
                                        <div class="clearfix"></div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                {{-- <input type="submit" value="Send" id="submit" class="li-btn-3" name="submit"> --}}
                                                <button id="universalbtn" name="submit" type="submit" value="Submit" class="li-btn-3"> <span>Submit</span> </button>
                                            </div>
                                        </div>


                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact Main Page Area End Here -->
@endforeach
@endsection
