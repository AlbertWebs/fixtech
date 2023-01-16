@extends('front.master-product')
@section('content') 
  <!-- Begin Amani`s Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li class="active">{{$page_name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Amani`s Breadcrumb Area End Here -->
          
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <h1 style="font-size:2px; margin:0 auto; color:#fff">Car Audio Shop in Nairobi</h1>
            <!-- Begin Li's Content Wraper Area -->
            <div class="content-wraper pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 order-1 order-lg-2">
                            @foreach($Category as $product)
                            @if($product->image == null)

                            @else
                            <div class="single-banner shop-page-banner">
                                <a href="#">
                                    <img style="max-height:210px;" src="{{url('/')}}/uploads/tags/{{$product->image}}" alt="Li's Static Banner">
                                </a>
                            </div>
                            @endif
                           @endforeach
                            <!-- shop-top-bar start -->
                            
                            <!-- shop-top-bar end -->
                                <!-- shop-top-bar start -->
                                <div class="shop-top-bar mt-30">
                                    <div class="shop-bar-inner">
                                       
                                        <div class="toolbar-amount">
                                            <span>Showing: {{$Products->currentPage()}} of {{$Products->lastPage()}}</span>
                                        </div>
                                    </div>
                                       <!-- product-select-box start -->
                                       <?php $Brands = DB::table('brands')->get(); ?>
                                    <div class="product-select-box">
                                        <div class="product-short">
                                            <p>Sort By Brand:</p>
                                            <select class="nice-select" onchange="changeFunc();" id="selectBox">
                                                @foreach($Brands as $Brand)
                                                <option value="{{$Brand->name}}">{{$Brand->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- product-select-box end -->
                                    <script type="text/javascript">
    
                                        function changeFunc() {
                                        var selectBox = document.getElementById("selectBox");
                                        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    
                                        var url = '{!! url('/products/brand') !!}'
    
                                        window.open(url+'/'+selectedValue,"_self");
    
    
    
                                        }
    
                                    </script>
                                </div>
                            <!-- shop-products-wrapper start -->
                            <div class="shop-products-wrapper">
                                <div class="tab-content">
                                    <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                        <div class="product-area shop-product-area">
                                            <div class="row">
                                                @foreach($Products as $product)
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 col-6">
                                                    <!-- single-product-wrap start -->
                                                    <div class="single-product-wrap">
                                                        <div class="product-image centererd">
                                                            <a href="{{url('/')}}/product/{{$product->slung}}">
                                                                <img src="{{url('/')}}/uploads/product/{{$product->image_one}}" alt="{{$product->name}}">
                                                            </a>
                                                            <!-- <span class="sticker">New</span> -->
                                                            @if($product->stock == "In Stock")
                                                   
                                                            @else
                                                            <span class="sticker">{{$product->stock}}</span>
                                                            @endif
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
                                          
                                            <div class="col-lg-12 col-md-6">
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
                                    </div>
                                </div>
                            </div>
                            <!-- shop-products-wrapper end -->
                        </div>
                        <div class="col-lg-3 order-2 order-lg-1">
                            <!--sidebar-categores-box start  -->
                            <div class="sidebar-categores-box">
                     
                            <!-- category-sub-menu start -->
                            <div class="sidebar-categores-box mb-sm-0">
                                <div class="sidebar-title">
                                    <h2>Product Tags</h2>
                                </div>
                                <div class="category-tags">
                                    <ul>
                                        <?php $AllTags = DB::table('tags')->get(); ?>
                                        @foreach($AllTags as $allTags)
                                        <li><a href="{{url('/')}}/product-tags/{{$allTags->slung}}">{{$allTags->title}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- category-sub-menu end -->
                            </div>
                                <!-- filter-sub-area end -->
                                <!-- filter-sub-area start -->
                                <div class="filter-sub-area pt-sm-10 pt-xs-10">
                                    <h5 class="filter-sub-titel">Categories</h5>
                                    <div class="categori-checkbox">
                                        <form action="#">
                                            <ul>
                                                <?php $Category  = DB::table('category')->get(); ?>
                                                @foreach ($Category as $category)
                                                <li><a href="{{url('/')}}/products/{{$category->slung}}">{{$category->cat}} (<?php echo count($ProCat = DB::table('product')->where('cat',$category->id)->get()); ?>)</a></li>
                                                @endforeach
                                            </ul>
                                        </form>
                                    </div>
                                 </div>
                                <!-- filter-sub-area end -->
                            </div>
                            <!--sidebar-categores-box end  -->
                            <!-- category-sub-menu start -->
                            <div class="sidebar-categores-box mb-sm-0">
                                <div class="sidebar-title">
                                    <h2>Shop By Brand</h2>
                                </div>
                                <div class="category-tags">
                                    <ul>
                                        <?php $AllTags = DB::table('brands')->get(); ?>
                                        @foreach($AllTags as $allTags)
                                        <li><a href="{{url('/')}}/products/brand/{{$allTags->name}}">{{$allTags->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- category-sub-menu end -->
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content Wraper Area End Here -->

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

