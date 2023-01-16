@extends('front.master')
@section('content')
@foreach($Products as $Product)

     <!--================Categories Banner Area =================-->
        <section class="categories_banner_area"> 
            <div class="container">
                <div class="c_banner_inner">
                    <h3>{{$Product->name}}</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li class="current"><a href="{{url('/')}}/classifieds/{{$Product->name}}">{{$Product->name}}</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
         
        <!--================Product Details Area =================-->
        <section class="product_details_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="product_details_slider">
                            <div id="product_slider" class="rev_slider" data-version="5.3.1.6">
                                <ul>	
                                    @if($Product->image_one == null or $Product->image_one == '')
                                    @else
                                    <!-- SLIDE  -->
                                    <li data-index="rs-137221490" data-transition="scaledownfrombottom" data-slotamount="7"  data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="1500"  data-thumb="{{url('/')}}/uploads/product/{{$Product->image_one}}"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Ishtar X Tussilago" data-param1="25/08/2015" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="{{url('/')}}/uploads/product/{{$Product->image_one}}"  alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                        <!-- LAYERS -->
                                    </li>
                                    @endif
                                    @if($Product->image_two == null or $Product->image_two == '')
                                    @else
                                    <!-- SLIDE  -->
                                    <li data-index="rs-136228343" data-transition="scaledownfrombottom" data-slotamount="7"  data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="1500"  data-thumb="{{url('/')}}/uploads/product/{{$Product->image_two}}"  data-rotate="0"  data-saveperformance="off"  data-title="Los Angeles" data-param1="13/08/2015" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="{{url('/')}}/uploads/product/{{$Product->image_two}}"  alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                        <!-- LAYERS -->
                                    </li>
                                    @endif
                                    @if($Product->image_three == null or $Product->image_three == '')
                                    @else
                                    <!-- SLIDE  -->
                                    <li data-index="rs-135960434" data-transition="scaledownfrombottom" data-slotamount="7"  data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="1500"  data-thumb="{{url('/')}}/uploads/product/{{$Product->image_three}}"  data-rotate="0"  data-saveperformance="off"  data-title="The Colors of Feelings" data-param1="11/08/2015" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="{{url('/')}}/uploads/product/{{$Product->image_three}}"  alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                        <!-- LAYERS -->

                                       
                                    </li>
                                    @endif
                                    @if($Product->image_four == null or $Product->image_four == '')
                                    @else
                                    <!-- SLIDE  -->
                                    <li data-index="rs-134008155" data-transition="scaledownfrombottom" data-slotamount="7"  data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="1500"  data-thumb="{{url('/')}}/uploads/product/{{$Product->image_four}}"  data-rotate="0"  data-saveperformance="off"  data-title="Powerful Iceland" data-param1="20/07/2015" data-description="">
                                        <!-- MAIN IMAGE -->
                                       <img src="{{url('/')}}/uploads/product/{{$Product->image_four}}"  alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                        <!-- LAYERS -->

                                    </li>
                                    @endif
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="product_details_text">
                            <h3>{{$Product->name}}</h3>
                            <!--  -->
                            <?php 
                          
                                $Reviews = DB::table('reviews')->where('product_id',$Product->id)->where('status','1')->get();
                                $CountReviews = count($Reviews);
                                if($CountReviews == 0){
                                  $CountReviews = 1;
                                }else{
                                  $CountReviews = $CountReviews = count($Reviews);
                                }
                                  $sumOfAllReviews = DB::table('reviews')->where('product_id', '=', $Product->id)->sum('rating');
                                  $Average = $sumOfAllReviews/$CountReviews;
                                  $RevewProcessed = round($Average);
                                  
                            ?>
                            <!--  -->
                            @if($Reviews->isEmpty())
                            
                            @else
                           
                            <ul class="p_rating">
                              
                            @foreach($Reviews as $review)
                              @if($RevewProcessed == 1)
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                              @endif
                              @if($RevewProcessed == 2)
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                              @endif
                              @if($RevewProcessed == 3)
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                              @endif
                              @if($RevewProcessed == 4)
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                              @endif
                              @if($RevewProcessed == 5)
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                              @endif
                            @endforeach
                            
                            </ul>
                            @endif
                            <div class="add_review">
                                <a href="#"><?php $Reviews = DB::table('reviews')->where('product_id',$Product->id)->where('status','1')->get(); echo $CountReviews = count($Reviews); ?> Reviews</a>
                                <a target="new" href="{{url('/')}}/clientarea/addReview/{{$Product->id}}">Add your review</a>
                            </div>
                            <h6>@if($Product->stock == 'In Stock') Available In <span>Stock</span>  @else <i style="color:#ff0000">{{$Product->stock}}</i> @endif</h6>
                            
                            <h4>KSH {{$Product->price}}</h4>
                            <p>{{$Product->meta}}</p>
                            
                            <form method="POST" action="{{url('cart/addCart/')}}/{{$Product->id}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="quantity">
                                <div class="custom">
                                    <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon_minus-06"></i></button>
                                    <input type="text" name="qty" id="sst" maxlength="12" value="01" title="Quantity:" class="input-text qty">
                                    <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="icon_plus"></i></button>
                                </div>
                                <button class="add_cart_btn" href="#">add to cart</button>
                            </div>
                            </form>
                            <div class="shareing_icon">
                                <h5>share :</h5>
                                <ul>
                                   

                                    <li><a target="new" href="https://twitter.com/intent/tweet?text={{url('/')}}/classifieds/{{$Product->code}}"> <i class="social_twitter"></i></a></li>

                                    <li><a target="new" href="https://www.facebook.com/sharer/sharer.php?u={{url('/')}}/classifieds/{{$Product->code}}"> <i class="social_facebook"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Product Details Area =================-->
        
        <!--================Product Description Area =================-->
        <section class="product_description_area">
            <div class="container">
                <nav class="tab_menu">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Product Description</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Reviews (<?php $Review = DB::table('reviews')->where('product_id',$Product->id)->where('status','1')->get(); $countReview=count($Review); echo $countReview; ?>)</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Category</a>
                     </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                      {!!html_entity_decode($Product->content)!!}  
                    </div>
                    @if($Review->isEmpty())
                          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                              <center>
                                   <h5>There are no reviews for {{$Product->name}}</h5>
                              </center>
                          </div>
                    @else
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                      @foreach($Review as $review)
                        <h4>{{$review->name}}</h4>
                        <p>{!!html_entity_decode($review->content)!!} </p>
                        <ul>
                              @if($review->rating == 1)
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                              @endif
                              @if($review->rating == 2)
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                              @endif
                              @if($review->rating == 3)
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                              @endif
                              @if($review->rating == 4)
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                              @endif
                              @if($review->rating == 5)
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                              @endif
                        </ul>
                      @endforeach
                    </div>
                    @endif
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <p> <?php $CategorySingleProduct = DB::table('category')->where('id',$Product->cat)->get(); ?> @foreach($CategorySingleProduct as $CatSigPro) {!!html_entity_decode($CatSigPro->description)!!} @endforeach </p>
                    </div>
                    
                </div>
            </div>
        </section>
        <!--================End Product Details Area =================-->
        
        <!--================End Related Product Area =================-->
        <section class="our_latest_product">
            <div class="container">
                <div class="s_m_title">
                  <h2 class="single_c_title">Related Product</h2>
                </div>
                <div class="l_product_slider owl-carousel">
                   
                    <?php $Trending = DB::table('product')->where('cat',$Product->cat)->inRandomOrder()->Limit('12')->get(); ?>
                    @foreach($Trending as $featured)
                        @if($featured->id == $Product->id)

                        @else
                        <div class="item">
                            
                            <div class="l_product_item"> 
                                <div class="l_p_img">
                                    <img src="{{url('/')}}/uploads/product/{{$featured->image_one}}" alt="">
                                </div>
                                <div class="l_p_text" style="min-height:120px; vertical-align:middle">
                                    <ul>
                                        <li class="p_icon"><a title="Explore More" href="{{url('/')}}/classifieds/{{$featured->code}}"><i class="fa fa-plus"></i></a></li>
                                        <li><a class="add_cart_btn" href="{{url('cart/addCart')}}/{{$featured->id}}">Buy Now <i class="fa fa-shopping-cart"></i></a></li>
                                        <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                    </ul>
                                    <h4>{{$featured->name}}</h4>
                                    @if($featured->offer == 1)
                                    <h5><del>KSH {{$featured->price_raw}}</del>  KSH{{$featured->price}}</h5>
                                    @else
                                    <h5>KSH {{$featured->price}}</h5>
                                    @endif
                                </div>
                            </div>
                           
                        </div>
                        @endif
                    @endforeach  
                    
                </div>
            </div>
        </section>
        <!--================End Related Product Area =================-->
@endforeach
@endsection

