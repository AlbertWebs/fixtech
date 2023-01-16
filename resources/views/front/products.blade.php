@extends('front.master-product')
@section('content') 
  <!-- Begin Amani`s Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li class="active">Our Shop</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Amani`s Breadcrumb Area End Here -->
            <!-- Begin Amani`s Content Wraper Area -->
            

            <!--  -->
            <div class="content-wraper pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                          
                            <!-- shop-top-bar start -->
                            <div class="shop-top-bar mt-30">
                                <div class="shop-bar-inner">
                                   
                                    <div class="toolbar-amount">
                                        <span>Showing: {{$Products->currentPage()}} of {{$Products->lastPage()}}</span>
                                    </div>
                                </div>
                                <h1 style="font-size:2px; margin:0 auto; color:#fff">Car Audio Shop in Nairobi</h1>
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
                            <!-- shop-top-bar end -->
                            <!-- shop-products-wrapper start -->
                            <div class="shop-products-wrapper">
                                <div class="tab-content">
                                    <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                        <div class="product-area shop-product-area">
                                            <div class="row">
                                                @foreach($Products as $product)
                                                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 col-6">
                                                    <!-- single-product-wrap start -->
                                                    <div class="single-product-wrap">
                                                        <div class="product-image centererd">
                                                            <a href="{{url('/')}}/product/{{$product->slung}}">
                                                                <img src="{{url('/')}}/uploads/product/{{$product->image_one}}" alt="{{$product->name}}">
                                                            </a>
                                                            <!-- <span class="sticker">New</span> -->
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

            @include('front.brands')
@endsection

