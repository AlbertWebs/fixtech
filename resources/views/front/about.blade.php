@extends('front.master')
@section('content')
        <div class="container">
              <div class="row">
                <div class="col-md-12 col-sm-8"> 
                  <h1 style="font-size:20px; padding:24px" class="text-center">About US</h1>
                  <p style="font-size:20px; color:#000; padding:20px" class="text-center">
                    @foreach($About as $about)
              
                
                        {!!html_entity_decode($about->content)!!}

                    
                    @endforeach
                  </p>
                </div>
              </div>
        </div>
        
        <!--================Featured Product Area =================-->
        <section class="feature_product_area" style="padding-bottom:100px; padding-top:100px;">
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
                                            <img width="100" height="100" src="{{url('/')}}/uploads/categories/{{$CatOne->image}}" alt="{{$CatOne->cat}}">
                                        </div>
                                        <div class="media-body">
                                            <h5 style="font-weight:100">{{$CatOne->cat}}</h5>
                                            <h6><a style="color:#66139B" href="{{url('/')}}/classifieds/shop/{{$CatOne->cat}}">Explore</a></h6>
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
                                            <img width="100" height="100" src="{{url('/')}}/uploads/categories/{{$CatOne->image}}" alt="{{$CatOne->cat}}">
                                        </div>
                                        <div class="media-body">
                                            <h5 style="font-weight:100">{{$CatOne->cat}}</h5>
                                            <h6><a style="color:#66139B" href="{{url('/')}}/classifieds/shop/{{$CatOne->cat}}">Explore</a></h6>
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
                                            <img width="100" height="100" src="{{url('/')}}/uploads/categories/{{$CatOne->image}}" alt="{{$CatOne->cat}}">
                                        </div>
                                        <div class="media-body">
                                            <h5 style="font-weight:100">{{$CatOne->cat}}</h5>
                                            <h6><a style="color:#66139B" href="{{url('/')}}/classifieds/shop/{{$CatOne->cat}}">Explore</a></h6>
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
                                            <img width="100" height="100" src="{{url('/')}}/uploads/categories/{{$CatOne->image}}" alt="{{$CatOne->cat}}">
                                        </div>
                                        <div class="media-body">
                                            <h5 style="font-weight:100">{{$CatOne->cat}}</h5>
                                            <h6><a style="color:#66139B" href="{{url('/')}}/classifieds/shop/{{$CatOne->cat}}">Explore</a></h6>
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