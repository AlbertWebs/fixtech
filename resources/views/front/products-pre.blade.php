@extends('front.master')
@section('content') 
<?php $Banner = DB::table('banners')->where('name','PageOne')->get(); ?>
@foreach($Banner as $Ban)
 <!-- bredcrumb and page title block start  -->
 <section class="categories_banner_area" style="background: url('{{url('/')}}/uploads/banners/{{$Ban->image}}') no-repeat scroll center center;">
      <div class="container">
          <div class="c_banner_inner">
              <h3>Our Products</h3>
              <ul>
                  <li><a href="{{url('/')}}">Home</a></li>
                  
                  <li class="current"><a href="{{url('/classifieds')}}">Our Products</a></li>
              </ul>
          </div>
      </div>
  </section>
  <!-- bredcrumb and page title block end  -->
  @endforeach
        <?php $Brands = DB::table('brands')->get(); ?>
        <!--================Categories Product Area =================-->
        <section class="categories_product_main p_80">
            <div class="container">
                <div class="categories_main_inner">
                    <div class="row row_disable">
                        <div class="col-lg-9 float-md-right">
                            
                              <div class="row">
                                <div class="col-md-6">
                                  <!-- Something Here -->
                                  <div class="first_fillter">
                                        <h4>Products Label Here - Changes With The Page</h4>
                                    </div>
                                  <!-- Something Here -->
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
                              </div>

                          
                            <div class="categories_product_area">
                                <div class="row">
                                  @foreach($Products as $featured)
                                  <div class="col-lg-4 col-md-4 col-sm-6 woman bags">
                                      <div class="l_product_item">
                                          <div class="l_p_img">
                                              <img class="img-fluid" src="{{url('/')}}/uploads/product/{{$featured->image_one}}" alt="{{$featured->name}}">
                                          </div>
                                          <div class="l_p_text" style="min-height:120px; vertical-align:middle">
                                              <ul>
                                                  <li class="p_icon"><a title="Explore More" href="{{url('/')}}/product/{{$featured->slung}}"><i class="fa fa-plus"></i></a></li>
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
                                  @endforeach  
                                </div>
                                <nav aria-label="Page navigation example" class="pagination_area">
                                  <ul class="pagination">
                                    <?php echo $Products ?>
                                  </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-3 float-md-right">
                            <div class="categories_sidebar">
                                <aside class="l_widgest l_p_categories_widget">
                                    <div class="l_w_title">
                                        <h3>Categories</h3>
                                    </div>
                                    <ul class="navbar-nav">
                                    <?php $Categories  = DB::table('category')->get(); ?>
                                      @foreach($Categories as $Cat)
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="{{url('products/cat')}}/{{$Cat->cat}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{$Cat->cat}}
                                            <i class="icon_plus" aria-hidden="true"></i>
                                            <i class="icon_minus-06" aria-hidden="true"></i>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <?php $ProductCategory = DB::table('product')->inRandomOrder()->limit('10')->get(); ?>
                                                @foreach($ProductCategory as $CategoryPro)
                                                <li class="nav-item"><a class="nav-link" href="{{url('/')}}/product/{{$CategoryPro->slung}}">{{$CategoryPro->name}}</a></li>
                                                @endforeach
                                                
                                            </ul>
                                        </li>
                                      @endforeach
                                    </ul>
                                </aside>
                              
                                
                                <aside class="l_widgest l_menufacture_widget">
                                    <div class="l_w_title">
                                        <h3>Brands</h3>
                                    </div>
                                    <ul>

                                        @foreach($Brands as $Brand)
                                          <li><a href="{{url('/')}}/products/brand/{{$Brand->name}}"> {{$Brand->name}} </a></li>
                                        @endforeach
                                        
                                    </ul>
                                </aside>
                                <aside class="l_widgest l_feature_widget">
                                    <div class="l_w_title">
                                        <h3>Featured Products</h3>
                                    </div>
                                    <?php $BestProuctBest = DB::table('product')->where('featured','1')->inRandomOrder()->paginate(5) ?>
                                    @foreach($BestProuctBest as $Best)
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="{{url('/')}}/uploads/product/{{$Best->image_one}}" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4>{{$Best->name}}</h4>
                                            <h5>KSH {{$Best->price}}</h5>
                                        </div>
                                    </div>
                                    @endforeach
                                  
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Categories Product Area =================-->
       
@endsection

