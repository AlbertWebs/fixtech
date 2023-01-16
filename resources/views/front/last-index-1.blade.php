@extends('front.master')
@section('content')
            <?php $Slider = DB::table('product')->where('stock','In Stock')->where('slider','1')->get(); $CountSlider = count($Slider); ?> 
            @if($CountSlider == 0)

            @else
            <!-- Begin Slider With Banner Area -->
            <div class="slider-with-banner">
                <div class="container">
                    <div class="row">
                         <!-- Begin Category Menu Area -->
                         <div class="col-lg-3">
                            <!--Category Menu Start-->
                            <div class="category-menu">
                                <div class="category-heading">
                                    <h2 style="color:#fff" class="categories-toggle"><span>categories</span></h2>
                                </div>
                                <div id="cate-toggle" class="category-menu-list">
                                    <ul>
                                        <?php $CatMenu = DB::table('category')->limit('9')->get() ?>
                                        @foreach($CatMenu as $Cat)
                                        <?php $final = preg_replace('#[ -]+#', '-', $Cat->cat);?>
                                        <?php $ProductMenuCount = DB::table('product')->where('cat',$Cat->id)->get(); $CountProducts = count($ProductMenuCount); ?>
                                        @if($CountProducts == 0)

                                        @else
                                           <li><a href="{{url('/classifieds')}}/shop/{{$final}}">{{$Cat->cat}} (<?php echo $CountProducts; ?>)</a></li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!--Category Menu End-->
                        </div>
                        <!-- Category Menu Area End Here -->
                        <!-- Begin Slider Area -->
                        <div class="col-lg-9 col-md-8">
                            <div class="slider-area">
                                <div class="slider-active owl-carousel">
                                    <?php $countSlider = 1; ?>
                                    @foreach($Slider as $slider)
                                   
                                        <style>
                                        .bg-{{$countSlider}}{
                                            background-image: url('{{url('/')}}/uploads/product/{{$slider->image_two}}');
                                            background-repeat: no-repeat;
                                            background-position: center center;
                                            background-size: cover;
                                            min-height: 475px;
                                            width: 100%;
                                        }
                                        </style>
                                        <!-- Begin Single Slide Area -->
                                        <!-- <div class="single-slide align-center-left  animation-style-01 bg-1" style="background-image: url('{{url('/')}}/uploads/slider/2.jpg');"> -->
                                        <div class="single-slide align-center-left  animation-style-01 bg-{{$countSlider}}">
                                            <div class="slider-progress"></div>
                                            <div class="slider-content">
                                                <h5> <span>{{$slider->meta}}</span> </h5>
                                                <h2>{{$slider->name}}</h2>
                                                <h3>Starting at <span>KES {{$slider->price}}</span></h3>
                                                <div class="default-btn slide-btn">
                                                    <a class="links" href="{{url('cart/addCart')}}/{{$slider->id}}"><i class="fa fa-shopping-cart"></i> Buy Now</a>
                                                    <a class="links" href="{{url('/')}}/classifieds/{{$slider->code}}">Explore</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Slide Area End Here -->
                                        <?php $countSlider = $countSlider + 1; ?>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Slider Area End Here -->
                        <?php $Full = DB::table('product')->where('stock','In Stock')->where('full','1')->limit('2')->inRandomOrder()->get(); $CountSlider = count($Slider); ?> 

                    </div>
                </div>
            </div>
            <!-- Slider With Banner Area End Here -->
            @endif
            <!-- Begin Product Area -->
            <div class="product-area pt-60 pb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-product-tab">
                                <ul class="nav li-product-menu">
                                   <li><a class="active" data-toggle="tab" href="#li-new-product"><span>New Arrival</span></a></li>
                                   <li><a data-toggle="tab" href="#li-bestseller-product"><span>Trending</span></a></li>
                                   <!-- <li><a data-toggle="tab" href="#li-featured-product"><span>Featured Products</span></a></li> -->
                                </ul>               
                            </div>
                            <!-- BeginAmani's Tab Menu Content Area -->
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                            <div class="row">
                                <div class="product-active owl-carousel">
                                    <?php $New = DB::table('product')->where('featured','1')->orderBy('updated_at','DESC')->limit('6')->get(); ?>
                                    @foreach($New as $pro)
                                        <div class="col-lg-12">
                                                    
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image image-div-holder">
                                                    <a href="{{url('/')}}/classifieds/{{$pro->code}}">
                                                        <img src="{{url('/')}}/uploads/product/{{$pro->image_one}}" alt="{{$pro->name}}">
                                                    </a>
                                                    <!-- <span class="sticker">{{$pro->stock}}</span> -->
                                                </div>
                                                <div class="product_desc">
                                                    <div class="product_desc_info">
                                                        <div class="product-review">
                                                            <h5 class="manufacturer">
                                                                <a href="{{url('/')}}/classifieds/{{$pro->code}}">
                                                                <?php
                                                                        $original_string = $pro->meta;
                                                                        $num_words = 10;
                                                                        $words = array();
                                                                        $words = explode(" ", $original_string, $num_words);
                                                                        $shown_string = "";
                                                                        
                                                                        if (count($words) == 10) {
                                                                            $words[9] = "...";
                                                                        }

                                                                        $shown_string = implode(" ", $words);

                                                                        ?>
                                                                    {!!html_entity_decode($shown_string)!!}

                                                                </a>
                                                            </h5>
                                                            <!-- <div class="rating-box">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                            </div> -->
                                                        </div>
                                                        <h4><a class="product_name" href="{{url('/')}}">{{$pro->name}}</a></h4>
                                                        <div class="price-box">
                                                            <span class="new-price">Ksh {{$pro->price}}</span>
                                                            @if($pro->offer == 1)
                                                                @if($pro->price_raw == null)

                                                                @else
                                                                <del><span class="new-price">Ksh {{$pro->price_raw}}</span></del>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul class="add-actions-link">
                                                            <li class="add-cart active"><a href="{{url('cart/addCart')}}/{{$pro->id}}">Add to cart</a></li>
                                                            <li>
                                                            <!-- Process Wishlist -->
                                                            @if(Auth::user())
                                                              <a class="links-details" href="{{url('/cart/addWishlist/')}}/{{$pro->id}}/{{Auth::user()->id}}"><i class="fa fa-heart-o"></i></a>
                                                            @else
                                                              <?php 
                                                                // get ip Address
                                                                $ip = Request::ip();
                                                              ?>
                                                              <a class="links-details" href="{{url('/cart/addWishlist/')}}/{{$pro->id}}/{{$ip}}"><i class="fa fa-heart-o"></i></a>
                                                            @endif
                                                            <!-- Process Wishlist -->
                                                            </li>
                                                            <li><a href="{{url('/')}}/classifieds/{{$pro->code}}" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter_{{$pro->id}}"><i class="fa fa-eye"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product-wrap end -->
                                        
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="li-bestseller-product" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <div class="product-active owl-carousel">

                                    <?php $Trending = DB::table('product')->where('featured','1')->where('trending','1')->limit('6')->get(); ?>
                                    @foreach($Trending as $pro)
                                        <div class="col-lg-12">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image image-div-holder">
                                                    <a href="{{url('/')}}/classifieds/{{$pro->code}}">
                                                        <img src="{{url('/')}}/uploads/product/{{$pro->image_one}}" alt="{{$pro->name}}">
                                                    </a>
                                                    <!-- <span class="sticker">{{$pro->stock}}</span> -->
                                                </div>
                                                <div class="product_desc">
                                                    <div class="product_desc_info">
                                                        <div class="product-review">
                                                            <h5 class="manufacturer">
                                                                <a href="{{url('/')}}/classifieds/{{$pro->code}}">
                                                                <?php
                                                                        $original_string = $pro->meta;
                                                                        $num_words = 10;
                                                                        $words = array();
                                                                        $words = explode(" ", $original_string, $num_words);
                                                                        $shown_string = "";
                                                                        
                                                                        if (count($words) == 10) {
                                                                            $words[9] = "...";
                                                                        }

                                                                        $shown_string = implode(" ", $words);

                                                                        ?>
                                                                    {!!html_entity_decode($shown_string)!!}

                                                                </a>
                                                            </h5>
                                                            <!-- <div class="rating-box">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                            </div> -->
                                                        </div>
                                                        <h4><a class="product_name" href="{{url('/')}}">{{$pro->name}}</a></h4>
                                                        <div class="price-box">
                                                            <span class="new-price">Ksh {{$pro->price}}</span>
                                                            @if($pro->offer == 1)
                                                                @if($pro->price_raw == null)

                                                                @else
                                                                <del><span class="new-price">Ksh {{$pro->price_raw}}</span></del>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul class="add-actions-link">
                                                            <li class="add-cart active"><a href="{{url('cart/addCart')}}/{{$pro->id}}">Add to cart</a></li>
                                                            <li>
                                                               <!-- Process Wishlist -->
                                                                @if(Auth::user())
                                                                <a class="links-details" href="{{url('/cart/addWishlist/')}}/{{$pro->id}}/{{Auth::user()->id}}"><i class="fa fa-heart-o"></i></a>
                                                                @else
                                                                <?php 
                                                                    // get ip Address
                                                                    $ip = Request::ip();
                                                                ?>
                                                                <a class="links-details" href="{{url('/cart/addWishlist/')}}/{{$pro->id}}/{{$ip}}"><i class="fa fa-heart-o"></i></a>
                                                                @endif
                                                              <!-- Process Wishlist -->
                                                            </li>
                                                            <li><a href="{{url('/')}}/classifieds/{{$pro->code}}" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter_{{$pro->id}}"><i class="fa fa-eye"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>
                                    @endforeach
                                   
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- Product Area End Here -->
            <?php $Full = DB::table('product')->where('stock','In Stock')->where('full','1')->limit('3')->inRandomOrder()->get(); $CountSlider = count($Slider); ?>
            @if($Full->isEmpty())

            @else
            <!-- BeginAmani's Static Banner Area -->
            <div class="li-static-banner">
                <div class="container">
                    <div class="row">
                    
                        @foreach($Full as $full)
                        <!-- Begin Single Banner Area -->
                        <div class="col-lg-4 col-md-4 text-center">
                            <div class="single-banner">
                                <a href="{{url('/')}}/classifieds/{{$full->code}}">
                                    <img src="{{url('/')}}/uploads/product/{{$full->image_one}}" alt="{{$full->name}}">
                                </a>
                            </div>
                        </div>
                        <!-- Single Banner Area End Here -->
                        @endforeach
                    </div>
                </div>
            </div>
            <!--Amani's Static Banner Area End Here -->
            @endif
            <?php $Category = DB::table('category')->orderBy('id','DESC')->get() ?>
            @foreach($Category as $cat)
            <?php $Product = Db::table('product')->where('featured','1')->limit('16')->where('cat',$cat->id)->get(); $count = count($Product); ?>
            <!-- BeginAmani's Categories Product Area -->
            @if($count <= 4)

            @else
            <section class="product-area li-laptop-product pt-60 pb-45">
                <div class="container">
                    <div class="row">
                        <!-- BeginAmani's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>{{$cat->cat}}</span>
                                </h2>
                                
                            </div>
                            <div class="row">
                                <!-- <div class="product-active owl-carousel"> -->
                                        @foreach($Product as $product)
                                          
                                            <div class="col-lg-3 col-md-4 col-sm-6 mt-40">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image product-image-div-holder">
                                                        <a href="{{url('/')}}/classifieds/{{$product->code}}">
                                                            <img src="{{url('/')}}/uploads/product/{{$product->image_one}}" alt="{{$product->name}}">
                                                        </a>
                                                        <!-- <span class="sticker">New</span> -->
                                                    </div>
                                                    <div class="product_desc">
                                                        <div class="product_desc_info">
                                                            <div class="product-review">
                                                                <h5 class="manufacturer">
                                                                    <?php $Category = DB::table('category')->where('id',$product->cat)->get(); ?>
                                                                    <!--  -->
                                                                    @foreach($Category as $Cat)
                                                                    <?php $final = preg_replace('#[ -]+#', '-', $Cat->cat);?>
                                                                    <a href="{{url('/classifieds')}}/shop/{{$final}}">
                                                                        @foreach($Category as $cat){{$cat->cat}}@endforeach
                                                                    </a>
                                                                    @endforeach
                                                                    <!--  -->
                                                                </h5>
                                                                <!-- <div class="rating-box">
                                                                    <ul class="rating">
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                    </ul>
                                                                </div> -->
                                                            </div>
                                                            <h4><a class="product_name" href="{{url('/')}}/classifieds/{{$product->code}}">{{$product->name}}</a></h4>
                                                            <div class="price-box">
                                                                <span class="new-price">KES {{$product->price}}</span>
                                                                @if($pro->offer == 1)
                                                                    @if($pro->price_raw == null)

                                                                    @else
                                                                    <del><span class="new-price">Ksh {{$pro->price_raw}}</span></del>
                                                                    @endif
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="add-actions">
                                                            <ul class="add-actions-link">
                                                                <li class="add-cart "><a href="{{url('cart/addCart')}}/{{$product->id}}">Add to cart</a></li>
                                                                <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter_{{$product->id}}"><i class="fa fa-eye"></i></a></li>
                                                                <li>
                                                                    <!-- Process Wishlist -->
                                                                    @if(Auth::user())
                                                                    <a class="links-details" href="{{url('/cart/addWishlist/')}}/{{$product->id}}/{{Auth::user()->id}}"><i class="fa fa-heart-o"></i></a>
                                                                    @else
                                                                    <?php 
                                                                        // get ip Address
                                                                        $ip = Request::ip();
                                                                    ?>
                                                                    <a class="links-details" href="{{url('/cart/addWishlist/')}}/{{$product->id}}/{{$ip}}"><i class="fa fa-heart-o"></i></a>
                                                                    @endif
                                                                    <!-- Process Wishlist -->
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- single-product-wrap end -->
                                            </div>
                                            
                                        @endforeach
                                <!-- </div> -->
                            </div>
                        </div>
                        <!--Amani's Section Area End Here -->
                    </div>
                </div>
            </section>
            <!--Amani's Categories Product Area End Here -->
            @endif
            @endforeach

            
         
            @include('front.brands')

@endsection