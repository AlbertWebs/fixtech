@extends('front.master')
@section('content')
            <?php $Slider = DB::table('product')->where('stock','In Stock')->limit(10)->InRandomOrder()->where('slider','1')->get(); $CountSlider = count($Slider); ?>
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
                                        <?php $CatMenu = DB::table('category')->where('home','1')->limit('9')->get() ?>
                                        @foreach($CatMenu as $Cat)
                                        <?php $final = preg_replace('#[ -]+#', '-', $Cat->cat);?>
                                        <?php $ProductMenuCount = DB::table('product')->where('cat',$Cat->id)->get(); $CountProducts = count($ProductMenuCount); ?>
                                        @if($CountProducts == 0)

                                        @else
                                           <li><a href="{{url('/products')}}/{{$Cat->slung}}">{{$Cat->cat}} (<?php echo $CountProducts; ?>)</a></li>
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
                                    @foreach($Slider as $slider)
                                    <!-- Begin Single Slide Area -->
                                    <!-- <div class="single-slide align-center-left  animation-style-01 bg-1" style="background-image: url('{{url('/')}}/uploads/slider/2.jpg');"> -->
                                    <div class="single-slide align-center-left  animation-style-01 bg-1">
                                         <!-- Mobile Image -->
                                         <div class="centererd hide-me-desktop" style="display:none;"><img class="hide-me-desktop" style="display:none; position:relative" src="{{url('/')}}/uploads/product/{{$slider->image_one}}"  alt=""></div>
                                            <!-- Mobile Image -->
                                    <div class="single-slide align-center-left  animation-style-01 bg-1 hide-me-slider-mobile" style="background-image: url('{{url('/')}}/uploads/product/{{$slider->image_two}}');"></div>
                                    <!-- <div class="single-slide align-center-left  animation-style-01 bg-1 hide-me-slider-desktop" style="background-image: url('{{url('/')}}/uploads/product/{{$slider->image_one}}');"></div> -->

                                        <div class="slider-progress"></div>
                                        <div class="slider-content">
                                            <h5>
                                                <span>
                                                <?php
                                                        $original_string = $slider->meta;
                                                        $num_words = 15;
                                                        $words = array();
                                                        $words = explode(" ", $original_string, $num_words);
                                                        $shown_string = "";

                                                        if (count($words) == 15) {
                                                            $words[14] = "...";
                                                        }

                                                        $shown_string = implode(" ", $words);

                                                        ?>
                                                    {!!html_entity_decode($shown_string)!!}


                                                </span>
                                            </h5>
                                            <h2>{{$slider->name}}</h2>
                                            <h3>Starting at <span>KES {{$slider->price}}</span></h3>

                                            <div class="default-btn slide-btn">
                                                <a class="links" href="{{url('cart/addCart')}}/{{$slider->id}}"><i class="fa fa-shopping-cart"></i> Buy Now</a>
                                                @if($slider->replaced == 0)
                                                <a class="links" href="{{url('/')}}/product/{{$slider->slung}}">Explore</a>
                                                @else
                                                <?php
                                                     $ProductNew = App\Product::find($slider->replaced);
                                                ?>
                                                <a class="links" href="{{url('/')}}/product/{{$ProductNew->slung}}">Explore</a>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Slide Area End Here -->
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
            <h1 style="font-size:2px; margin:0 auto; color:#fff">Car Audio Shop in Nairobi</h1>
            <!-- Begin Product Area -->
            <div class="product-area pt-60 pb-50 trending-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-product-tab">
                                <ul class="nav li-product-menu">
                                   <!-- <li><a class="active" data-toggle="tab" href="#li-new-product"><span>New Arrival</span></a></li> -->
                                   <li><a data-toggle="tab" href="#li-bestseller-product"><span>Trending</span></a></li>

                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="tab-content">

                        <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                            <div class="row">
                                <div class="product-active owl-carousel">

                                    <?php $Trending = DB::table('product')->where('featured','1')->where('trending','1')->limit('6')->get(); ?>
                                    @foreach($Trending as $pro)
                                    {{--  --}}

                                    @if($pro->replaced == 0)
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-6">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <!--image-div-holder centererd" style="display: block;"-->
                                            <div class="product-image">
                                                <a class="text-center" href="{{url('/')}}/product/{{$pro->slung}}">
                                                    <img class="text-center" src="{{url('/')}}/uploads/product/{{$pro->image_one}}" alt="{{$pro->name}}">
                                                </a>
                                                <!--  -->
                                                {{-- @if($pro->stock == "In Stock")

                                                @else
                                                <span class="sticker">{{$pro->stock}}</span>
                                                @endif --}}
                                                <!--  -->
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="{{url('/')}}/product/{{$pro->slung}}">
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
                                                    </div>
                                                    <h4><a class="product_name" href="{{url('/')}}/product/{{$pro->slung}}">{{$pro->name}}</a></h4>
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
                                                        <!--  -->
                                                        <li>
                                                            <a href="{{url('/')}}/product/{{$pro->slung}}" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#view-modal"  id="getProduct" data-url="{{ route('dynamicModal',['id'=>$pro->id])}}">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                        </li>
                                                        <!--  -->
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                    @else
                                    <?php
                                         $ProductNew = App\Product::find($pro->replaced);
                                    ?>
                                    {{-- <a class="links" href="{{url('/')}}/product/{{$ProductNew->slung}}">Explore</a> --}}
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-6">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <!--image-div-holder centererd" style="display: block;"-->
                                            <div class="product-image">
                                                <a class="text-center" href="{{url('/')}}/product/{{$ProductNew->slung}}">
                                                    <img class="text-center" src="{{url('/')}}/uploads/product/{{$pro->image_one}}" alt="{{$pro->name}}">
                                                </a>
                                                <!--  -->
                                                {{-- @if($pro->stock == "In Stock")

                                                @else
                                                <span class="sticker">{{$pro->stock}}</span>
                                                @endif --}}
                                                <!--  -->
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="{{url('/')}}/product/{{$ProductNew->slung}}">
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
                                                    </div>
                                                    <h4><a class="product_name" href="{{url('/')}}/product/{{$ProductNew->slung}}">{{$pro->name}}</a></h4>
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
                                                        <!--  -->
                                                        <li>
                                                            <a href="{{url('/')}}/product/{{$ProductNew->slung}}" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#view-modal"  id="getProduct" data-url="{{ route('dynamicModal',['id'=>$ProductNew->id])}}">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                        </li>
                                                        <!--  -->
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                    @endif
                                    {{--  --}}

                                    @endforeach

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Product Area End Here -->
            <?php $Full = DB::table('product')->where('stock','In Stock')->where('offer','1')->limit('10')->inRandomOrder()->get(); $CountSlider = count($Slider); ?>
            @if($Full->isEmpty())

            @else
            <!-- BeginAmani's Static Banner Area -->
            <div class="li-static-banner">
                <div class="container">
                    <div class="row">
                        <!--  -->
                        <div class="li-section-title">
                            <h2>
                                <span>Special Offers</span>
                            </h2>

                            <a class="btn" style="float:right" href="{{url('/')}}/special-offers">View All Offers</a>

                        </div>
                        <!--  -->

                        @foreach($Full as $full)
                        <!-- Begin Single Banner Area -->
                        <div class="col-lg-4 col-md-4 text-center" style="margin:0 auto; padding-top:50px;">
                            <div class="single-banner">
                                <a href="{{url('/')}}/product/{{$full->slung}}">
                                    <img src="{{url('/')}}/uploads/product/{{$full->offer_banner}}" alt="{{$full->name}}">
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
            <?php $Category = DB::table('category')->orderBy('id','ASC')->get() ?>
            @foreach($Category as $cat)
            <?php $Product = Db::table('product')->where('featured','1')->limit('8')->where('cat',$cat->id)->inRandomOrder()->get(); $count = count($Product); ?>
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
                                <?php $final = preg_replace('#[ -]+#', '-', $cat->cat);?>
                                <a class="btn" style="float:right" href="{{url('/products/')}}/{{$cat->slung}}">View All</a>

                            </div>
                            <div style="margin-top:100px"></div>
                            <div class="row">
                                <!-- <div class="product-active owl-carousel"> -->
                                        @foreach($Product as $product)
                                        @if($product->replaced == 0)

                                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 col-6" style="margin:0 auto;">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image product-image-div-holder centererd">
                                                        <a href="{{url('/')}}/product/{{$product->slung}}">
                                                            <img src="{{url('/')}}/uploads/product/{{$product->image_one}}" alt="{{$product->name}}">
                                                        </a>
                                                        {{-- @if($product->stock == "In Stock")

                                                        @else
                                                        <span class="sticker">{{$product->stock}}</span>
                                                        @endif --}}
                                                    </div>
                                                    <div class="product_desc">
                                                        <div class="product_desc_info">
                                                            <div class="product-review">
                                                                <h5 class="manufacturer">
                                                                    <?php $Category = DB::table('category')->where('id',$product->cat)->get(); ?>
                                                                    <!--  -->
                                                                    @foreach($Category as $Cat)
                                                                    <?php $final = preg_replace('#[ -]+#', '-', $Cat->cat);?>
                                                                    <a href="{{url('/products')}}/{{$Cat->slung}}">
                                                                        @foreach($Category as $cat){{$cat->cat}}@endforeach
                                                                    </a>
                                                                    @endforeach
                                                                    <!--  -->
                                                                </h5>
                                                                <div class="rating-box trending-area">
                                                                    <ul class="rating trending-area">
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <h4><a class="product_name" href="{{url('/')}}/product/{{$product->slung}}">{{$product->name}}</a></h4>
                                                            <div class="price-box">
                                                                <span class="new-price price-now" style="color:#000000">KES {{$product->price}}</span>
                                                                @if($product->offer == 1)
                                                                    @if($product->price_raw == null)

                                                                    @else
                                                                    <del><span class="new-price">Ksh {{$product->price_raw}}</span></del>
                                                                    @endif
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="add-actions">
                                                            <ul class="add-actions-link">
                                                            @if($product->stock == "In Stock")
                                                            <li class="add-cart "><a href="{{url('cart/addCart')}}/{{$product->id}}">Add to cart</a></li>
                                                            @else
                                                                <li class="add-cart "><a onClick="return confirm('Out Of Stock')" href="#">Add to cart</a></li>
                                                            @endif
                                                                 <!--  -->
                                                                <li>
                                                                        <a href="{{url('/')}}/product/{{$pro->slung}}" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#view-modal"  id="getProduct" data-url="{{ route('dynamicModal',['id'=>$product->id])}}">
                                                                        <i class="fa fa-eye"></i>
                                                                        </a>
                                                                </li>
                                                                <!--  -->
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
                                        @else
                                        <?php  $ProductNew = App\Product::find($product->replaced); ?>

                                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 col-6">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image product-image-div-holder centererd">
                                                        <a href="{{url('/')}}/product/{{$ProductNew->slung}}">
                                                            <img src="{{url('/')}}/uploads/product/{{$product->image_one}}" alt="{{$product->name}}">
                                                        </a>
                                                        {{-- @if($product->stock == "In Stock")

                                                        @else
                                                        <span class="sticker">{{$product->stock}}</span>
                                                        @endif --}}
                                                    </div>
                                                    <div class="product_desc">
                                                        <div class="product_desc_info">
                                                            <div class="product-review">
                                                                <h5 class="manufacturer">
                                                                    <?php $Category = DB::table('category')->where('id',$product->cat)->get(); ?>
                                                                    <!--  -->
                                                                    @foreach($Category as $Cat)
                                                                    <?php $final = preg_replace('#[ -]+#', '-', $Cat->cat);?>
                                                                    <a href="{{url('/products')}}/{{$Cat->slung}}">
                                                                        @foreach($Category as $cat){{$cat->cat}}@endforeach
                                                                    </a>
                                                                    @endforeach
                                                                    <!--  -->
                                                                </h5>
                                                                <div class="rating-box trending-area">
                                                                    <ul class="rating trending-area">
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <h4><a class="product_name" href="{{url('/')}}/product/{{$ProductNew->slung}}">{{$product->name}}</a></h4>
                                                            <div class="price-box">
                                                                <span class="new-price price-now" style="color:#000000">KES {{$product->price}}</span>
                                                                @if($product->offer == 1)
                                                                    @if($product->price_raw == null)

                                                                    @else
                                                                    <del><span class="new-price">Ksh {{$product->price_raw}}</span></del>
                                                                    @endif
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="add-actions">
                                                            <ul class="add-actions-link">
                                                            @if($product->stock == "In Stock")
                                                            <li class="add-cart "><a href="{{url('cart/addCart')}}/{{$product->id}}">Add to cart</a></li>
                                                            @else
                                                                <li class="add-cart "><a onClick="return confirm('Out Of Stock')" href="#">Add to cart</a></li>
                                                            @endif
                                                                 <!--  -->
                                                                <li>
                                                                        <a href="{{url('/')}}/product/{{$ProductNew->slung}}" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#view-modal"  id="getProduct" data-url="{{ route('dynamicModal',['id'=>$product->id])}}">
                                                                        <i class="fa fa-eye"></i>
                                                                        </a>
                                                                </li>
                                                                <!--  -->
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

                                        @endif

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
