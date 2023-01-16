@extends('front.master')
@section('content') 
        <?php $Banner = DB::table('banners')->where('name','PageOne')->get(); ?>
        @foreach($Banner as $Ban)
        <!-- bredcrumb and page title block start  -->
        <section class="categories_banner_area" style="background: url('{{url('/')}}/uploads/banners/{{$Ban->image}}') no-repeat scroll center center;">
            <div class="container">
                <div class="c_banner_inner">
                    <h3>Amani Vehicle Sounds - Complete Vehicle Accessories</h3>
                    <ul>
                        <li><a href="{{url('/')}}">Home</a></li>
                        
                        <li class="current"><a href="{{url('/complete-vehicle-assessories')}}">Our Products</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- bredcrumb and page title block end  -->
        @endforeach
        
        <!--================Categories Product Area =================-->
        <section class="no_sidebar_2column_area">
            <div class="container">
                @if($Products->isEmpty())
                    <center><h3>No Packages Added for This Category</h3></center>
                @else
                <div class="two_column_product">
                    <div class="row">
                    @foreach($Products as $featured)
                        <div class="col-lg-4 col-sm-6">
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
                @endif
            </div>
        </section>
        <!--================End Categories Product Area =================-->
       
@endsection

