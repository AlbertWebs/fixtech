@extends('front.master')
@section('content')
        <?php $Slider = DB::table('product')->where('stock','In Stock')->where('slider','1')->get(); $CountSlider = count($Slider); ?> 
        @if($CountSlider == 0)

        @else
        <!--================Home Carousel Area =================--> 
        <section class="home_carousel_area">
            <div class="home_carousel_slider owl-carousel">
                
                @foreach($Slider as $slider)
                <div class="item">
                    <div class="h_carousel_item">
                        <img src="{{url('/')}}/uploads/product/{{$slider->image_two}}" alt="">
                        <div class="carousel_hover">
                            <h3><small>In: <?php $Category = DB::table('category')->where('id',$slider->cat)->get(); ?> @foreach($Category as $Cat) {{$Cat->cat}} @endforeach  </small></h3>
                            <h4>{{$slider->name}} </h4>
                            <h5>Including:</h5>
                            <p>{{$slider->meta}}</p>
                            <a class="discover_btn" href="{{url('/')}}/classifieds/{{$slider->code}}">discover now</a>
                        </div>
                    </div>
                </div>
                @endforeach
              
            </div>
        </section>
        <!--================End Home Carousel Area =================-->
        @endif

        <?php $Banner = DB::table('product')->where('banner','1')->limit('2')->inRandomOrder()->get(); $CountBanner = count($Banner); ?>
        @if($CountBanner == 0 or $CountBanner == 1)

        @else
        <!--================Special Offer Area =================-->
        <section class="special_offer_area">
            <div class="container">
                <div class="row">
                
                    @foreach($Banner as $Ban)
                    <div class="col-lg-6">
                        <div class="special_offer_item">
                            <img class="img-fluid" src="{{url('/')}}/uploads/product/{{$slider->image_three}}" alt="">
                            <div class="hover_text">
                                <h6 style="color:#66139B; text-shadow: 2px 2px #ffffff;">{{$Ban->name}}</h6>
                                <!-- <h5 style="font-size:10px">{{$Ban->name}}</h5> -->
                                <a class="shop_now_btn" href="{{url('/classifieds')}}/{{$Ban->code}}">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                
                </div>
            </div>
        </section>
        <!--================End Special Offer Area =================-->
        @endif
        <!--================Trending Area =================-->
        <section class="our_latest_product">
            <div class="container">
                <div class="s_m_title">
                    <h2>Trending.</h2>
                </div>
                <div class="l_product_slider owl-carousel">
                    <?php $Trending = DB::table('product')->where('trending','1')->inRandomOrder()->Limit('12')->get(); ?>
                    @foreach($Trending as $featured)
                    
                        <div class="item">
                            
                            <div class="l_product_item"> 
                                <div class="l_p_img">
                                    <img src="{{url('/')}}/uploads/product/{{$featured->image_one}}" alt="">
                                </div>
                                <div class="l_p_text" style="min-height:120px; vertical-align:middle">
                                    <ul>
                                        <li class="p_icon"><a title="Explore More" href="{{url('/')}}/classifieds/{{$featured->code}}"><i class="fa fa-plus"></i></a></li>
                                        <li><a class="add_cart_btn" href="{{url('cart/addCart')}}/{{$featured->id}}">Buy Now <i class="fa fa-shopping-cart"></i></a></li>
                                        <li class="p_icon"><a title="Add To Compare" href="{{url('cart/addCompare')}}/{{$featured->id}}"><i class="icon_heart_alt"></i></a></li>
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
                    @endforeach  
                </div>
            </div>
        </section>
        <!--================End Trending Area =================-->

        <?php $Featured = DB::table('product')->where('trending','1')->inRandomOrder()->paginate(12) ?>
        <!--================Featured Products Area =================-->
        <section class="fillter_latest_product text-center">
            <div class="container">
                <div class="single_c_title">
                    <h2>Featured Products</h2>
                </div>
                <div class="fillter_l_p_inner">
                    
                    <div class="row isotope_l_p_inner">
                    @foreach($Featured as $featured)
                        <div class="col-lg-3 col-md-4 col-sm-6 woman bags">
                            <div class="l_product_item">
                                <div class="l_p_img">
                                    <img class="img-fluid" src="{{url('/')}}/uploads/product/{{$featured->image_one}}" alt="{{$featured->name}}">
                                </div>
                                <div class="l_p_text" style="min-height:120px; vertical-align:middle">
                                    <ul>
                                        <li class="p_icon"><a title="Explore More" href="{{url('/')}}/classifieds/{{$featured->code}}"><i class="fa fa-plus"></i></a></li>
                                        <li><a class="add_cart_btn" href="{{url('cart/addCart')}}/{{$featured->id}}">Buy Now <i class="fa fa-shopping-cart"></i></a></li>
                                        <li class="p_icon"><a title="Add To Compare" href="{{url('cart/addCompare')}}/{{$featured->id}}"><i class="icon_heart_alt"></i></a></li>
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
                    @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!--================End Featured Area =================-->

       
        
        <!--================Latest Product isotope Area =================-->
        <section class="fillter_latest_product">
            <div class="container">
                <div class="single_c_title">
                    <h2>Our Latest Product</h2>
                </div>
                <div class="fillter_l_p_inner">
                    <ul class="fillter_l_p">

                        <li class="active" data-filter="*"><a href="#">All</a></li>
                        <?php $CategoriesHading = DB::table('category')->limit('5')->inRandomOrder()->get() ?>
                        @foreach($CategoriesHading as $CHead)
                        <li data-filter=".cat_{{$CHead->id}}"><a href="#">{{$CHead->cat}}</a></li>
                        @endforeach
                      
                    </ul>

                    <div class="row isotope_l_p_inner">
                    <?php $TheProduct = DB::table('product')->orderBy('id','DESC')->limit('12')->get(); ?>
                      @foreach($TheProduct as $TheP)
                        <div class="col-lg-3 col-md-4 col-sm-6 cat_{{$TheP->cat}}">
                            <div class="l_product_item">
                                <div class="l_p_img">
                                    <img class="img-fluid" src="{{url('/')}}/uploads/product/{{$TheP->image_one}}" alt="{{$TheP->name}}">
                                </div>
                                <div class="l_p_text" style="min-height:120px; vertical-align:middle">
                                    <ul>
                                        <li class="p_icon"><a title="Explore More" href="{{url('/')}}/classifieds/{{$TheP->code}}"><i class="fa fa-plus"></i></a></li>
                                        <li><a class="add_cart_btn" href="{{url('cart/addCart')}}/{{$featured->id}}">Buy Now <i class="fa fa-shopping-cart"></i></a></li>
                                        <li class="p_icon"><a title="Add To Compare" href="{{url('cart/addCompare')}}/{{$featured->id}}"><i class="icon_heart_alt"></i></a></li>
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
                      @endforeach
                        
                    </div>
                </div>
            </div>
        </section>
        <!--================End Latest Product isotope Area =================-->
   
       
        <div class="container" style="padding:20px;">
            <section class="customer-logos slider">
            <?php $Brand = DB::table('brands')->get() ?>
                        @foreach($Brand as $brand)
                <div class="slide"><img src="{{url('/')}}/uploads/brands/{{$brand->image}}"></div>
                @endforeach
               
            </section>
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

@endsection