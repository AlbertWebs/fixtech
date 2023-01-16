@extends('front.master')
@section('content')

  <!-- bredcrumb and page title block start  -->
  <div id="bread-crumb">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="page-title">
          @foreach($Products as $Product)
            <h4> 
                <?php $CategoryName = DB::table('category')->where('cat',$Product->cat)->get(); ?>
                @foreach($CategoryName as $CatName)
                  {{$CatName->cat}}
                @endforeach
            </h4>
          @endforeach
          </div>
        </div>
        <div class="col-md-9">
          <div class="bread-crumb">
            <ul>
              <li><a href="{{url('/')}}">home</a></li>
              <li>\</li>
              <li><a href="{{url('/product')}}/{{$page_title}}">{{$page_title}}</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- bredcrumb and page title block end  -->
  
  <div id="product-category">
    <div class="container">
      <div class="row">
      <div class="col-md-3 col-sm-4"> 
          <!-- left block Start  -->
          <div id="left">
            <div class="sidebar-block">
              <div class="sidebar-widget Category-block">
                <div class="sidebar-title">
                  <h4> Categories</h4>
                </div>
                <ul class="title-toggle">
                  <?php $Categories  = DB::table('category')->get(); ?>
                  @foreach($Categories as $Cat)
                  <li><a href="{{url('/')}}/products/cat/{{$Cat->cat}}">{{$Cat->cat}}</a></li>
                  @endforeach
                  
                </ul>
              </div>
             
              <div class="sidebar-widget Shop-by-block">
                <div class="sidebar-title">
                  <h4>Shop by</h4>
                </div>
                <ul class="title-toggle">
                
                 
                  <li class="manufacture">
                    <h5><a href="grid-view.html">Brand</a></h5>
                    <ul>
                        <?php $Brands = DB::table('brands')->get(); ?>
                        @foreach($Brands as $Brand)
                          <li><a href="{{url('/')}}/products/brand/{{$Brand->name}}"> {{$Brand->name}} </a></li>
                        @endforeach
                     
                    </ul>
                  </li>
                </ul>
              </div>
              <!-- <div class="sidebar-widget banner-block">
                <div class="left-banner"> <a href="#"><img src="images/product/left-banner.jpg" alt="#"></a> </div>
              </div> -->
              <div class="sidebar-widget Best-Products-block">
                <div class="sidebar-title">
                  <h4> Best Products</h4>
                </div>
                <ul class="title-toggle">
                  <?php $BestProuct = DB::table('product')->paginate(6) ?>
                @foreach($BestProuct as $product)
                  <li>
                    <div class="product-block ">
                      <div class="item col-md-4 col-sm-4 col-xs-4">
                        <div class="image"> <a href="{{url('/classifieds')}}/{{$product->code}}"><img class="img-responsive" title="T-shirt" alt="T-shirt" src="{{url('/')}}/uploads/product/{{$product->image_one}}"></a> </div>
                      </div>
                      <div class="item col-md-8 col-sm-8 col-xs-8">
                        <div class="product-details">
                          <div class="product-name">
                            <h5><a href="{{url('/classifieds')}}/{{$product->code}}">{{$product->name}} </a></h5>
                          </div>
                          <div class="review"></div>
                          <div class="price"> <span class="price-new">KSH {{$product->price}}</span> </div>
                          <div class="addto-cart"><a href="{{url('/cart/addCart')}}/{{$product->id}}">Add to Cart</a></div>
                        </div>
                      </div>
                    </div>
                  </li>
                @endforeach
                  
                </ul>
              </div>
            </div>
          </div>
          <!-- left block end  --> 
        </div>
        @foreach($Products as $Product)
        <div class="col-md-9 col-sm-8"> 
          <!-- right block Start  -->
          <div id="right">
            <div class="product-detail-view">
              <div class="row">
                <div class="col-md-6">
                  <div class="sp-loading"><img src="{{asset('theme/images/loading.gif')}}" alt=""><br>
                    LOADING IMAGES</div>

                 
                  <div class="sp-wrap"> 

                    @if($Product->image_one == null or $Product->image_one == '')
                    @else
                      <a  href="{{url('/')}}/uploads/product/{{$Product->image_one}}"><img style="min-height:800px" src="{{url('/')}}/uploads/product/{{$Product->image_one}}" alt=""></a> 
                    @endif
                    @if($Product->image_two == null or $Product->image_two == '')
                    @else
                      <a  href="{{url('/')}}/uploads/product/{{$Product->image_two}}"><img style="min-height:800px" src="{{url('/')}}/uploads/product/{{$Product->image_two}}" alt=""></a> 
                    @endif
                    @if($Product->image_three == null or $Product->image_three == '')
                    @else
                      <a  href="{{url('/')}}/uploads/product/{{$Product->image_three}}"><img style="min-height:800px" src="{{url('/')}}/uploads/product/{{$Product->image_three}}" alt=""></a> 
                    @endif
                    @if($Product->image_four == null or $Product->image_four == '')
                    @else
                      <a  href="{{url('/')}}/uploads/product/{{$Product->image_three}}"><img style="min-height:800px" src="{{url('/')}}/uploads/product/{{$Product->image_three}}" alt=""></a> 
                    @endif
                 
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="product-detail-content">
                    <div class="product-name">
                      <h4><a href="{{url('/product')}}/{{$Product->name}}">{{$Product->name}} </a></h4>
                    </div>
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
                       @if($Reviews->isEmpty())
                       
                       @else
                       @foreach($Reviews as $review)
                         <div class="review"> 
                           <span class="rate"> 
                             @if($RevewProcessed == 1)
                             <i class="fa fa-star rated"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                             @endif
                             @if($RevewProcessed == 2)
                             <i class="fa fa-star rated"></i> <i class="fa fa-star rated"></i> <i class="fa fa-star"></i> <i class="fa fa-star rated"></i> <i class="fa fa-star"></i>
                             @endif
                             @if($RevewProcessed == 3)
                             <i class="fa fa-star rated"></i> <i class="fa fa-star rated"></i> <i class="fa fa-star rated"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                             @endif
                             @if($RevewProcessed == 4)
                             <i class="fa fa-star rated"></i> <i class="fa fa-star rated"></i> <i class="fa fa-star rated"></i> <i class="fa fa-star rated"></i> <i class="fa fa-star"></i>
                             @endif
                             @if($RevewProcessed == 5)
                             <i class="fa fa-star rated"></i> <i class="fa fa-star rated"></i> <i class="fa fa-star rated"></i> <i class="fa fa-star rated"></i> <i class="fa fa-star rated"></i>
                             @endif
                              
                           </span> (<?php $CountReviews = count($Reviews); echo $CountReviews ?>) Review(s)
                         </div>
                       @endforeach
                       @endif
                    @if($Product->offer == 1)
                    <div class="price"> <span class="price-old">KSH {{$Product->price_raw}}</span> <span class="price-new">KSH {{$Product->price}}</span> </div>
                    @else
                    <div class="price">  <span class="price-new">KSH {{$Product->price}}</span> </div>
                    @endif
                    
                    <div class="stock"><span>Availability : </span>@if($Product->stock == 'In Stock') {{$Product->stock}}  @else <i style="color:#ff0000">{{$Product->stock}}</i> @endif</div>
                    <div class="products-code"> <span>Product Brief :</span> {{$Product->meta}}</div>
                    <div class="product-discription"><span>Description</span>
                        <p>
                            <?php
                                    $original_string = $Product->content;
                                    $num_words = 30;
                                    $words = array();
                                    $words = explode(" ", $original_string, $num_words);
                                    $shown_string = "";
                                    
                                    if(count($words) == 30){
                                      $words[29] = ".....";
                                    }

                                 

                                    if(count($words) == 30){
                                      $words[29] = "........";
                                    }

                                    $shown_string = implode(" ", $words);

                            ?>
                            
                              {!!html_entity_decode($shown_string)!!}
                         </p>
                    </div> 
                   
                    <form method="POST" action="{{url('cart/addCart/')}}/{{$Product->id}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="product-qty">
                      <label for="qty">Qty:</label>
                      <div class="custom-qty">
                        <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) result.value--;return false;" class="reduced items" type="button"> <i class="fa fa-minus"></i> </button>
                        <input type="text" class="input-text qty" title="Qty" value="1" maxlength="8" id="qty" name="qty">
                        <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items" type="button"> <i class="fa fa-plus"></i> </button>
                      </div>
                    </div>
                    <div class="add-to-cart">
                      <button type="submit" class="btn btn-default">Buy Now</button>
                    </div>
                    </form>
                    <ul class="add-links">
                      <!-- <li> <a class="add-to-wishlist" href="#"> <i class="fa fa-heart-o"></i> Add to Wishlist </a></li> -->
                      <!-- Feature Will Be Added in the next version of the system -->
                      <!-- <li> <a class="link-compare" href="#"> <i class="fa fa-bar-chart"></i> Add to Compare </a></li> -->
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="product-detail-tab">
              <div class="row">
                <div class="col-md-12">
                  <div id="tabs">
                    <ul class="nav nav-tabs">
                      <li><a class="tab-Description selected" title="Description">Description</a></li>
                      
                      <li><a class="tab-Reviews" title="Reviews">Reviews (<?php $Review = DB::table('reviews')->where('product_id',$Product->id)->where('status','1')->get(); $countReview=count($Review); echo $countReview; ?>) </a></li>

                      
                    </ul>
                  </div>
                  <div id="items">
                    <div class="tab-content">
                      <ul>
                        <li>
                          <div class="items-Description selected">
                            <div class="Description"> 
                            {!!html_entity_decode($Product->content)!!}
                                  
                            </div>
                          </div>
                        </li>

                        @if($Review->isEmpty())
                        <li>
                        <div style="padding:100px; background-color:#fff" class="review">
                              <center>
                                   <h5>There are no reviews for {{$Product->name}}</h5>
                              </center>
                        </div>
                        </li>
                        @else
                        
                        <li>
                        @foreach($Review as $review)
                          
                          <div class="items-Reviews">
                            <div class="author fa fa-user"> {{$review->name}}</div>
                               <p>{!!html_entity_decode($review->content)!!}</p>
                          <div class="review"> <span class="rate"> <i class="fa fa-star rated"></i> <i class="fa fa-star rated"></i> <i class="fa fa-star rated"></i> <i class="fa fa-star rated"></i> <i class="fa fa-star"></i> </span> </div>
                          </div>
                          
                        @endforeach
                        </li>
                        @endif
                        
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="Related-product">
              <div class="row">
                <div class="col-md-12">
                  <div class="Featured-Products-title">
                    <h1 class="tf">Related Products</h1>
                  </div>
                  <div class= "customNavigation"> <a class="btn related_prev prev"><i class="fa fa-angle-left"></i></a> <a class="btn related_next next"><i class="fa fa-angle-right"></i></a> </div>
                  <div id="related-products" class="owl-carousel">
                  <?php $RelatedProducts = DB::table('product')->where('cat',$Product->cat)->paginate(10) ?>
                  @foreach($RelatedProducts as $rel)
                  @if($rel->id == $Product->id)

                  @else
                    <div class="item">
                      <div class="product-block ">
                        <div class="image"> <a href="{{url('/product')}}/{{$rel->name}}"><img class="img-responsive" title="T-shirt" alt="T-shirt" src="{{url('/')}}/uploads/product/{{$rel->image_one}}"></a> </div>
                        <div class="product-details">
                          <div class="product-name">
                            <h4><a href="{{url('/product')}}/{{$rel->name}}">{{$rel->name}}</a></h4>
                          </div>
                          <div class="price"> <span class="price-old">KSH {{$rel->price}}</span> <span class="price-new"> {{$rel->price}}</span> </div>
                          <div class="product-hov">
                            <ul>
                            <li class="addtocart"><a href="{{url('/cart/addCart')}}/{{$rel->id}}">Buy Now</a> </li>
                            <li class="addtocart"><a href="{{url('product')}}/{{$rel->name}}">Explore</a> </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endif
                    
                  @endforeach
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- right block end  --> 
        </div>
        @endforeach
      </div>
    </div>
  </div>   
@include('checkout.popup')    
@endsection

