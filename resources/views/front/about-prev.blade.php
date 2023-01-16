@extends('front.master')
@section('content')
        <div class="container">
              <div class="row">
                <div class="col-md-12 col-sm-8"> 
                  <h3 style="font-size:20px; padding:24px" class="text-center">About US</h3>
                  <p style="font-size:20px; padding:20px" class="text-center">
                    @foreach($About as $about)
              
                
                        {!!html_entity_decode($about->content)!!}

                    
                    @endforeach
                  </p>
                </div>
              </div>
        </div>
        
        <!--================Featured Product Area =================-->
        <section class="feature_product_area">
            <div class="container">
            
                
                <?php 
                     $ProductCategoriesOne = DB::table('category')->Limit('5')->where('col','1')->get();
                     $ProductCategoriesTwo = DB::table('category')->Limit('5')->where('col','2')->get();
                     $ProductCategoriesThree = DB::table('category')->Limit('5')->where('col','3')->get();
                     $ProductCategoriesFour = DB::table('category')->Limit('5')->where('col','4')->get();
                     
                     
                ?>
                <div class="f_p_inner">
                    <div class="row">
                    
                        <div class="col-lg-3">
                            <div class="f_product_left">
                                <div class="s_m_title">
                                    <h2></h2>
                                </div>
                                <div class="f_product_inner">
                                  @foreach($ProductCategoriesOne as $CatOne)
                                    <div class="media">
                                        <div class="d-flex">
                                            <img width="50" height="50" src="{{url('/')}}/uploads/categories/{{$CatOne->image}}" alt="{{$CatOne->cat}}">
                                        </div>
                                        <div class="media-body">
                                            <h4>{{$CatOne->cat}}</h4>
                                            <h5><a style="color:#66139B" href="{{url('/')}}/classifieds/shop/{{$CatOne->cat}}">Explore</a></h5>
                                        </div>
                                    </div>
                                  @endforeach
                                   
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="f_product_left">
                                <div class="s_m_title">
                                    <h2></h2>
                                </div>
                                <div class="f_product_inner">
                                  @foreach($ProductCategoriesTwo as $CatOne)
                                    <div class="media">
                                        <div class="d-flex">
                                            <img width="50" height="50" src="{{url('/')}}/uploads/categories/{{$CatOne->image}}" alt="{{$CatOne->cat}}">
                                        </div>
                                        <div class="media-body">
                                            <h4>{{$CatOne->cat}}</h4>
                                            <h5><a style="color:#66139B" href="{{url('/')}}/classifieds/shop/{{$CatOne->cat}}">Explore</a></h5>
                                        </div>
                                    </div>
                                  @endforeach
                                   
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="f_product_left">
                                <div class="s_m_title">
                                    <h2></h2>
                                </div>
                                <div class="f_product_inner">
                                  @foreach($ProductCategoriesThree as $CatOne)
                                    <div class="media">
                                        <div class="d-flex">
                                            <img width="50" height="50" src="{{url('/')}}/uploads/categories/{{$CatOne->image}}" alt="{{$CatOne->cat}}">
                                        </div>
                                        <div class="media-body">
                                            <h4>{{$CatOne->cat}}</h4>
                                            <h5><a style="color:#66139B" href="{{url('/')}}/classifieds/shop/{{$CatOne->cat}}">Explore</a></h5>
                                        </div>
                                    </div>
                                  @endforeach
                                   
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="f_product_left">
                                <div class="s_m_title">
                                    <h2></h2>
                                </div>
                                <div class="f_product_inner">
                                  @foreach($ProductCategoriesFour as $CatOne)
                                    <div class="media">
                                        <div class="d-flex">
                                            <img width="50" height="50" src="{{url('/')}}/uploads/categories/{{$CatOne->image}}" alt="{{$CatOne->cat}}">
                                        </div>
                                        <div class="media-body">
                                            <h4>{{$CatOne->cat}}</h4>
                                            <h5><a style="color:#66139B" href="{{url('/')}}/classifieds/shop/{{$CatOne->cat}}">Explore</a></h5>
                                        </div>
                                    </div>
                                  @endforeach
                                   
                                </div>
                            </div>
                        </div>

                        
                        
                       
                    </div>
                </div>
            </div>
        </section>
        <!--================End Featured Product Area =================-->

       
        <div class="container" style="padding:20px;">
            <section class="customer-logos slider">
            <?php $Brand = DB::table('brands')->get() ?>
                        @foreach($Brand as $brand)
                <div class="slide"><img src="{{url('/')}}/uploads/brands/{{$brand->image}}" alt="{{$brand->name}}"></div>
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