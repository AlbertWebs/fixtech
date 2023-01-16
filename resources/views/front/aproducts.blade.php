@extends('front.master')
@section('content') 

<!-- offer block Start  -->
 <!-- Search Results -->
 
  @if($search_results != '' OR $search_results_category != ''))
  <div id="offer"> 
    <div class="container">
      <div class="offer">
        
         
            
            <h5 style="color:#fff">Your Results @if($search_results == '') @else for @endif {{$search_results}} in @if($search_results_category == 'All Categories') {{$search_results_category}} @else <?php $CategoryResults = DB::table('category')->where('id',$search_results_category)->get(); ?>@foreach($CategoryResults as $CatResults){{$CatResults->cat}}@endforeach @endif</h5>
            

          <!-- </Search Results -->
        
      </div>
    </div>
  </div>
  @endif
  
  
  <!-- bredcrumb and page title block start  -->
  <div id="bread-crumb">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-3">
          <div class="page-title">
            <h4>All Products</h4>
          </div>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9">
          <div class="bread-crumb">
            <ul>
              <li><a href="{{url('/')}}">Home</a></li>
              <li>\</li>
              <li><a href="{{url('/products')}}">products</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- bredcrumb and page title block end  --> 
  
  <!-- left colunm and right colunm block end  -->
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
                  <li><a href="{{url('products/cat')}}/{{$Cat->cat}}">{{$Cat->cat}}</a></li>
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
                  <h4> Featured Products</h4> 
                </div>
                <ul class="title-toggle">
                  <?php $BestProuct = DB::table('product')->where('featured','1')->inRandomOrder()->paginate(10) ?>
                @foreach($BestProuct as $product)
                  <li>
                    <div class="product-block ">
                      <div class="item col-md-4 col-sm-4 col-xs-4">
                        <div class="image"> <a href="{{url('/classifieds')}}/{{$product->code}}"><img class="img-responsive" title="{{$product->name}}" alt="{{$product->name}}" src="{{url('/')}}/uploads/product/{{$product->image_one}}"></a> </div>
                      </div>
                      <div class="item col-md-8 col-sm-8 col-xs-8">
                        <div class="product-details">
                          <div class="product-name">
                            
                          </div>
                          <div class="review"></div>
                          <div class="price"> <span class="price-new">KSH {{$product->price}}</span> </div>
                          <div class="addto-cart"><a href="{{url('cart/addCart')}}/{{$product->id}}">Buy Now</a></div>
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
        <!-- right block Start  -->
        <div class="col-md-9  col-sm-8">
          
          <div id="right">
           <div class="row">
              <div class="col-md-6">
                <div class="view">
                  <div class="grid  "><a href="{{url('/products/grid')}}">
                    <div class="grid-icon "></div>
                    </a> </div>
                  <div class="list active"><a href="{{url('/products')}}">
                    <div class="list-icon "></div>
                    </a> </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="shoring pull-right">
                  <div class="short-by">
                    <p>Sort By Brand</p>
                    <div class="select-item"> 
                      <select onchange="changeFunc();" id="selectBox">

                          @foreach($Brands as $Brand)
                          <option value="{{$Brand->name}}">{{$Brand->name}}</option>
                          @endforeach
                        
                      </select>
                      <span class="fa fa-angle-down"></span>
                    </div>
                  </div>

                    <script type="text/javascript">

                        function changeFunc() {
                        var selectBox = document.getElementById("selectBox");
                        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
                        
                        var url = '{!! url('/products/brand') !!}'

                        window.open(url+'/'+selectedValue,"_self");

                        
                        
                        }

                    </script>
               
              </div>
            </div>
            <div class="product-list-view">
              <ul>
              @if($Products->isEmpty())
              <center>
              <section style="padding-top:100px">
                <div class="">
                  
                  <div>
                  
                   <h2>No results for your keywords <i class="fa fa-frown-o"></i></h2>
                    <a id="verifyCoupon" class="btn btn-default update" href="{{url('/products')}}">All Products</a>
                    <a id="verifyCoupon" class="btn btn-default update" href="{{url('/services')}}">Our Services</a>
                  
                    
                  
                  </div>
                </div>
              </section> <!--/#cart_items-->
              </center>
              @else
              @foreach($Products as $product)
                <li>
                  <div class="product-block ">
                    <div class="item col-md-4 col-sm-6 col-xs-4">
                      <div class="image"> <a href="{{url('/product')}}/{{$product->name}}"><img class="img-responsive" title="{{$product->name}}" alt="{{$product->name}}" src="{{url('/')}}/uploads/product/{{$product->image_one}}"></a> </div>
                    </div>
                    <div class="item col-md-8 col-sm-6 col-xs-8">
                      <div class="product-details">
                        <div class="product-name">
                          <h4><a href="{{url('product')}}/{{$product->name}}">{{$product->name}} </a></h4>
                        </div>
                        <?php 
                          
                           $Reviews = DB::table('reviews')->where('product_id',$product->id)->where('status','1')->get();
                           $CountReviews = count($Reviews);
                           if($CountReviews == 0){
                             $CountReviews = 1;
                           }else{
                             $CountReviews = $CountReviews = count($Reviews);
                           }
                             $sumOfAllReviews = DB::table('reviews')->where('product_id', '=', $product->id)->sum('rating');
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
                           
                        <div class="price"> @if($product->offer == 0) @else <span class="price-old"> KSH {{$product->price_raw}}</span>@endif <span class="price-new">KSH {{$product->price}}</span> </div>
                        <div class="product-discription">
                          <p> 

                              <?php
                                    $original_string = $product->content;
                                    $num_words = 30;
                                    $words = array();
                                    $words = explode(" ", $original_string, $num_words);
                                    $shown_string = "";
                                    
                                    if(count($words) == 30){
                                      $words[29] = ".....";
                                    }

                                    $post_id = $product->name;
                                    $url = url("/product");

                                    if(count($words) == 30){
                                      $words[29] = "<a href='$url/$post_id'>....More &raquo;</a> ";
                                    }

                                    $shown_string = implode(" ", $words);

                            ?>
                            
                              {!!html_entity_decode($shown_string)!!}
                         </p>
                        </div>
                        <div class="product-hov">
                          <ul>
                            
                            <li class="addtocart"><a href="{{url('/cart/addCart')}}/{{$product->id}}">Buy Now</a> </li>
                            <li class="addtocart"><a href="{{url('/classifieds')}}/{{$product->code}}">Explore</a> </li>
                            
                           
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              @endforeach
              @endif
              </ul>
            </div>
            <div class="pagination-bar">
             <?php echo $Products; ?>
            </div>
          </div>
        </div>
        <!-- right block end  --> 
      </div>
    </div>
  </div>
  <!-- left colunm and right colunm block block end  --> 
       
@endsection

