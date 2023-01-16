@extends('front.master')
@section('content')
	<!-- Breadcrumb -->
	@include('front.breadcrumb')
	<!-- BreadCrumb -->
  <!-- contact-area start -->
  <div class="contact-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="contact-wrap form-style">
                            <h3>Contact Us</h3>
                            <div class="cf-msg"></div>
							<form action="mail.php" method="post" id="cf">
								<div class="row">
									<div class="col-sm-6 col-xs-12">
										<input type="text" placeholder="Name" id="fname" name="fname">
									</div>
									<div class="col-sm-6 col-xs-12">
										<input type="text" placeholder="Email" id="email" name="email">
									</div>
									<div class="col-xs-12">
										<input type="text" placeholder="Subject" id="subject" name="subject">
									</div>
									<div class="col-xs-12">
										<textarea class="contact-textarea" placeholder="Message" id="msg" name="msg"></textarea>
									</div>
									<div class="col-xs-12">
										<button id="submit" class="cont-submit btn-contact" name="submit">SEND MESSAGE</button>
									</div>
								</div>
							</form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-wrap">
                            <ul>
                                <li>
                                    <i class="fa fa-phone"></i>
                                    <p>+842 1544 2554</p>
                                    <p>+842 1544 2554</p>
                                </li>
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <p>martxa1545@gmail.com</p>
                                    <p>martxa1545@gmail.com</p>
                                </li>
                                <li>
                                    <i class="fa fa-fax"></i>
                                    <p>15455 54564866 3554</p>
                                    <p>15455 54564866 3554</p>
                                </li>
                                <li>
                                    <i class="fa fa-location-arrow"></i>
                                    227 Marion Street Address Here Columbia, SC 29201
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- contact-area end -->

        <!-- quote-area start -->
        <div class="quote-area bg-1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9 col-xs-12">
                        <div class="quote-wrap">
                            <h2>Over 50 years of experience we’ll ensure you get the best guidance.</h2>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="quote-wrap text-right">
                            <a href="contact.html">Request Quote</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- quote-area end -->
@endsection