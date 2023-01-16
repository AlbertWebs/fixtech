@extends('front.master')
@section('content') 
  <!-- Begin Amani`s Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li class="active">Special Offers</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Amani`s Breadcrumb Area End Here -->
            <!-- Begin Amani`s Content Wraper Area -->
            
            <h1 style="font-size:2px; margin:0 auto; color:#fff">Car Audio Shop in Nairobi</h1>
                               
            <!--  -->
            <div class="content-wraper pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                          
                            <!-- shop-products-wrapper start -->
                            <div class="shop-products-wrapper">
                                <div class="tab-content">
                                    <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                        <div class="product-area shop-product-area">
                                            <div class="row">
                                                @foreach($Products as $product)
                                                <div class="col-lg-3 col-md-4 col-sm-6 mt-40">
                                                    <!-- single-product-wrap start -->
                                                    <div class="single-product-wrap">
                                                        <div class="product-image centererd">
                                                            <a href="{{url('/')}}/product/{{$product->slung}}">
                                                                <img src="{{url('/')}}/uploads/product/{{$product->offer_banner}}" alt="{{$product->name}}">
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
                                                                        <a href="{{url('/products')}}/{{$final}}">
                                                                            @foreach($Category as $cat){{$cat->cat}}@endforeach
                                                                        </a>
                                                                        @endforeach
                                                                        <!--  -->
                                                                    </h5>
                                                                    <div class="rating-box">
                                                                        <ul class="rating">
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <h4><a class="product_name" href="{{url('/')}}/product/{{$product->slung}}">{{$product->name}}</a></h4>
                                                                <div class="price-box">
                                                                    <span class="new-price">KES {{$product->price}}</span>
                                                                    @if($product->offer == 1)
                                                                    @if($product->price_raw == null)

                                                                    @else
                                                                    <del><span class="new-price">KES {{$product->price_raw}}</span></del>
                                                                    @endif
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="add-actions">
                                                                <ul class="add-actions-link">
                                                                    <li class="add-cart "><a href="{{url('cart/addCart')}}/{{$product->id}}">Buy Now</a></li>
                                                                    
                                                                    <li>
                                                                        <a href="{{url('/')}}/product/{{$product->slung}}" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#view-modal"  id="getProduct" data-url="{{ route('dynamicModal',['id'=>$product->id])}}">
                                                                        <i class="fa fa-eye"></i>
                                                                        </a>
                                                                    </li>
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
                                            </div>
                                        </div>
                                    </div>
                            
                                    <div class="paginatoin-area">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <p>Page: {{$Products->currentPage()}} of {{$Products->lastPage()}}</p>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                               <?php echo $Products; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop-products-wrapper end -->
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->

                 {{--  --}}
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

                                    <?php $Trending = DB::table('product')->where('featured','1')->limit('24')->get(); ?>
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

            {{--  --}}
                 <!-- Services Section -->
            <!-- about wrapper start -->
            <div class="about-us-wrapper pt-60 pb-40">
                <div class="container">
                    <?php $Services = DB::table('services')->get(); ?>
                    @foreach($Services as $Ser)
                    <div class="row">
                        <!-- About Text Start -->
                        <div class="col-lg-6 order-last order-lg-first">
                            <div class="about-text-wrap">
                                <br><br><br><br>
                                <h2><span>{{$Ser->title}}</span></h2>
                                <p style="verticle-align:middle">{!!html_entity_decode($Ser->content)!!}</p>
                            </div>
                        </div>
                        <!-- About Text End -->
                        <!-- About Image Start -->
                        <div class="col-lg-5 col-md-10">
                            <div class="about-image-wrap">
                                <img class="img-full" src="{{url('/')}}/uploads/services/{{$Ser->image_one}}" alt="About Amani Vehicle Sounds" />
                            </div>
                        </div>
                        <!-- About Image End -->
                    </div>
                    <br><br>
                    @endforeach
                </div>
            </div>
            <!-- about wrapper end -->
        <!-- </Section Services> -->

            @include('front.brands')

@endsection

