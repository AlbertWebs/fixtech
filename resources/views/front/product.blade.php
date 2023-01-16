@extends('front.master-product')
@section('content')
@foreach($Products as $Product)
<?php $SiteSettings = DB::table('sitesettings')->get();?>
@foreach($SiteSettings as $Settings)
<style>
    .youtube-embed{
        width:560px !important;
    }
    @media only screen and (max-width: 768px) {
        .youtube-embed{
        width:100% !important;
    }
    }
</style>
      <!-- Begin Amani's Breadcrumb Area -->
      <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{url('/our-products')}}">Our Products</a></li>
                            <li class="active">{{$Product->name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Amani's Breadcrumb Area End Here -->
            <!-- content-wraper start -->
            <div class="content-wraper">
                <div class="container">
                    <div class="row single-product-area">
                        <div class="col-lg-5 col-md-6">
                           <!-- Product Details Left -->
                            <div class="product-details-left">
                                <div class="product-details-images slider-navigation-1">
                                @if($Product->image_one == 'null' or $Product->image_one == '')

                                @else
                                    <div class="lg-image">
                                        <a class="popup-img venobox vbox-item" href="{{url('/')}}/uploads/product/{{$Product->image_one}}" data-gall="myGallery">
                                            <img src="{{url('/')}}/uploads/product/{{$Product->image_one}}" alt="{{$Product->name}}">
                                        </a>
                                    </div>
                                @endif

                                @if($Product->image_two == 'null' or $Product->image_two == '')

                                @else
                                    <div class="lg-image">
                                        <a class="popup-img venobox vbox-item" href="{{url('/')}}/uploads/product/{{$Product->image_two}}" data-gall="myGallery">
                                            <img src="{{url('/')}}/uploads/product/{{$Product->image_two}}" alt="{{$Product->name}}">
                                        </a>
                                    </div>
                                @endif

                                @if($Product->image_three == 'null' or $Product->image_three == '')

                                @else
                                    <div class="lg-image">
                                        <a class="popup-img venobox vbox-item" href="{{url('/')}}/uploads/product/{{$Product->image_three}}" data-gall="myGallery">
                                            <img src="{{url('/')}}/uploads/product/{{$Product->image_three}}" alt="{{$Product->name}}">
                                        </a>
                                    </div>
                                @endif

                                </div>
                                <div class="product-details-thumbs slider-thumbs-1">
                                    @if($Product->image_one == 'null' or $Product->image_one == '')

                                    @else
                                    <div class="sm-image"><img height="auto" width="100%" src="{{url('/')}}/uploads/product/{{$Product->image_one}}" alt="{{$Product->name}}"></div>
                                    @endif

                                    @if($Product->image_two == 'null' or $Product->image_two == '')

                                    @else
                                    <div class="sm-image"><img height="auto" width="100%" src="{{url('/')}}/uploads/product/{{$Product->image_two}}" alt="{{$Product->name}}"></div>
                                    @endif

                                    @if($Product->image_three == 'null' or $Product->image_three == '')

                                    @else
                                    <div class="sm-image"><img height="auto" width="100%" src="{{url('/')}}/uploads/product/{{$Product->image_three}}" alt="{{$Product->name}}"></div>
                                    @endif
                                </div>
                            </div>
                            <!--// Product Details Left -->
                        </div>

                        <div class="col-lg-7 col-md-6">
                            <div class="product-details-view-content pt-60">
                                <div class="product-info">
                                    <h1 style="font-size: 18px; letter-spacing: -.025em; line-height: 24px; color: #ce171f;text-transform: capitalize; font-weight: 500; margin: 0 0 15px 0">{{$Product->name}}</h1>
                                    <span class="product-details-ref">Reference: {{$Product->slung}}</span>
                                    <div class="rating-box pt-20">
                                        @if($Product->stock == "In Stock")
                                        Status: <span class="sticker"><strong style="color:#ce171f">{{$Product->stock}}</strong></span>
                                        @else
                                        Status: <span class="sticker"><strong style="color:#ce171f">{{$Product->stock}}</strong></span>
                                        @endif

                                        <?php
                                           $CheckReplacements = DB::table('product')->where('replaced',$Product->id)->get();

                                        ?>
                                        @if($CheckReplacements->isEmpty())

                                        @else
                                            @foreach($CheckReplacements as $checker)
                                            <br><br>
                                            Replacement For: <span class="sticker"><strong style="color:#ce171f"><a style="color:#ce171f" href="{{url('/')}}/product/{{$checker->slung}}">{{$checker->name}}</a></strong></span>

                                            @endforeach
                                        @endif


                                        <?php
                                           $CheckReplacements = DB::table('product')->where('id',$Product->replaced)->get();
                                        ?>
                                        @if($CheckReplacements->isEmpty())

                                        @else
                                            @foreach($CheckReplacements as $checker)
                                            <br><br>
                                            Raplaced By: <span class="sticker"><strong style="color:#ce171f"><a style="color:#ce171f" href="{{url('/')}}/product/{{$checker->slung}}">{{$checker->name}}</a></strong></span>

                                            @endforeach
                                        @endif



                                    </div>
                                    <div class="price-box pt-20">
                                        <span class="new-price new-price-2">KES {{$Product->price}}</span>
                                    </div>
                                    <div class="product-desc">
                                        <p>
                                            <span>{{$Product->meta}}
                                            </span>
                                        </p>
                                    </div>

                                    <div class="single-add-to-cart">
                                        <form action="{{url('cart/addCart/')}}/{{$Product->id}}" method="POST" class="cart-quantity">
                                            {{ csrf_field() }}
                                            <div class="quantity">
                                                <label>Quantity</label>
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" name="qty" value="1" type="text">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </div>
                                            <button class="add-to-cart" type="submit">Add to cart</button>
                                        </form>
                                        <?php
                                            //prepare data to send
                                            $dataObj = new stdClass();
                                            $dataObj->ek_access_token = base64_encode("AVS.F7ETM1BK1619708873ZB19PSN");
                                            $dataObj->ek_access_type = "api_access";
                                            $dataObj->ek_redirect_url = "https://amanivehiclesounds.co.ke/api/escrow-callback";
                                            $dataObj->ek_item_unique_identifier = $Product->id;
                                            $dataObj->ek_item_title = $Product->name;
                                            $dataObj->ek_seller_email = $Settings->email;
                                            $dataObj->ek_seller_phone = $Settings->mobile;
                                            $dataObj->ek_item_cost = $Product->price;
                                            $dataObj->ek_item_currency = "KES";

                                            $encodedData = urlencode(json_encode($dataObj));

                                        ?>

                                        {{-- <form class="cart-quantity"  action="https://escrowkenya.com/api/v1/orders/start_view" method="POST">
                                            <input type="hidden" name="payload" value="<?php echo $encodedData; ?>">
                                            <button class="add-to-cart" type="submit" class="escrow">Buy with Escrow Kenya</button>
                                        </form> --}}
                                    </div>
                                    <div class="product-additional-info pt-25">
                                        <!-- <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Add to wishlist</a> -->
                                        <div class="product-social-sharing pt-25">
                                            <ul>
                                                <li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u={{url('/')}}/product/{{$Product->slung}}"><i class="fa fa-facebook"></i>Facebook</a></li>
                                                <li class="instagram"><a href="https://www.instagram.com/amanivehiclesounds/?hl=en"><i class="fa fa-instagram"></i>instagram</a></li>

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wraper end -->
              <!-- Begin Product Area -->
              <div class="product-area pt-35">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-product-tab">
                                <ul class="nav li-product-menu">
                                   <li><a class="active" data-toggle="tab" href="#description"><span>Description</span></a></li>
                                   <li><a data-toggle="tab" href="#product-details"><span>Product Details</span></a></li>
                                   <li><a data-toggle="tab" href="#reviews"><span>Reviews(<?php $Review = DB::table('reviews')->where('product_id',$Product->id)->where('status','1')->get(); $countReview=count($Review); echo $countReview; ?>)</span></a></li>
                                </ul>
                            </div>
                            <!-- Begin Amani's Tab Menu Content Area -->
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="description" class="tab-pane active show" role="tabpanel">
                            <div class="product-description">
                                @if($Product->iframe ==null)

                                @else
                                <iframe class="youtube-embed" src="https://www.youtube.com/embed/{{$Product->iframe}}?autoplay=&showinfo=0&loop=1&rel=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                @endif
                                <span style="list-style-type: circle;">{!!html_entity_decode($Product->content)!!}</span>
                            </div>
                        </div>
                        <div id="product-details" class="tab-pane" role="tabpanel">
                            <div class="product-details-manufacturer">
                                <a href="#">
                                    <img width="100" src="{{url('/')}}/uploads/product/{{$Product->image_one}}" alt="Product Manufacturer Image">
                                </a>
                                <p><span>Type</span> <?php $CategoryName = DB::table('category')->where('id',$Product->cat)->get();  ?> @foreach($CategoryName as $Cat) {{$Cat->cat}} @endforeach</p>
                                <p><span>Brand</span> {{$Product->brand}}</p>
                            </div>
                        </div>
                        <div id="reviews" class="tab-pane" role="tabpanel">
                            <div class="product-reviews">
                                <div class="product-details-comment-block">
                                @foreach($Review as $review)
                                    <!-- Review Area -->
                                    <div class="comment-review">
                                        <span>{{$review->name}}</span>
                                        <ul class="rating">
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
                                    </div>
                                    <div class="comment-author-infos pt-25">
                                        <p>{!!html_entity_decode($review->content)!!}</p>
                                    </div>
                                    <!-- Review Area -->
                                    @endforeach
                                    <!-- <div class="review-btn">
                                        <a class="review-links" href="#" data-toggle="modal" data-target="#mymodal">Write Your Review!</a>
                                    </div> -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Area End Here -->
            <!-- Begin Amani's Laptop Product Area -->
            <section class="product-area li-laptop-product pt-30 pb-50">
                <div class="container">
                    <div class="row">
                        <!-- Begin Amani's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Related Products:</span>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">
                                <?php $Trending = DB::table('product')->where('cat',$Product->cat)->inRandomOrder()->Limit('12')->get(); ?>
                                    @foreach($Trending as $featured)
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image centererd">
                                                <a href="{{url('/')}}/product/{{$featured->slung}}">
                                                    <img src="{{url('/')}}/uploads/product/{{$featured->image_one}}" alt="{{$featured->name}}">
                                                </a>
                                                <!-- <span class="sticker">New</span> -->
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                                <?php $Category = DB::table('category')->where('id',$Product->cat)->get(); ?>
                                                                    <!--  -->
                                                                    @foreach($Category as $Cat)
                                                                    <?php $final = preg_replace('#[ -]+#', '-', $Cat->cat);?>
                                                                    <a href="{{url('/')}}/products/{{$Cat->slung}}">
                                                                        @foreach($Category as $cat){{$cat->cat}}@endforeach
                                                                     </a>
                                                                    @endforeach
                                                                    <!--  -->
                                                        </h5>
                                                        {{-- <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>

                                                            </ul>
                                                        </div> --}}
                                                    </div>
                                                    <h4><a class="product_name" href="{{url('/')}}/product/{{$featured->slung}}">{{$featured->name}}</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">KES {{$featured->price}}</span>

                                                    </div>
                                                    <p>{{$featured->meta}}</p>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a href="{{url('cart/addCart')}}/{{$featured->id}}">Add to cart</a></li>
                                                        <li><a href="{{url('/')}}/product/{{$featured->slung}}" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#view-modal" id="getProduct" data-url="{{ route('dynamicModal',['id'=>$featured->id])}}"><i class="fa fa-eye"></i></a></li>
                                                        <li><a class="links-details" href="#"><i class="fa fa-heart-o"></i></a></li>
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
                        <!-- Amani's Section Area End Here -->
                    </div>
                </div>
            </section>
            <!-- Amani's Laptop Product Area End Here -->
@endforeach
@endforeach
@endsection

