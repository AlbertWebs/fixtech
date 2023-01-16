@extends('front.master')
@section('content')
  <!-- bredcrumb and page title block start  -->
  <div id="bread-crumb">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="page-title">
            <h4>About</h4>
          </div>
        </div>
        <div class="col-md-9">
          <div class="bread-crumb">
            <ul>
              <li><a href="{{url('/')}}">Home</a></li>
              <li>\</li>
              <li><a href="{{url('/about')}}">About us</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div> 
  </div>
  <!-- bredcrumb and page title block end  -->
  
  <div id="about-page-contain">
    <div class="container">
      
      
      <div class="row">
        
        <div class="Experiences">
          <div class="col-md-6">
            <h2 class="tf">About Us</h2>
            @foreach($About as $about)
            <div class="exp-detail">
              
              <p> {!!html_entity_decode($about->content)!!}</p>
            </div>
            @endforeach
          </div>
        </div>
        <div class="work">
          <div class="col-md-6">
            <h2 class="tf">Our Services</h2>
          <?php $Services = DB::table('services')->get() ?>
            <ul>
              @foreach($Services as $services)
              <li><span>{{$services->id}}</span>
                <h5>{{$services->title}}</h5>
                <p>
                <?php
                          $original_string = $services->content;
                          $num_words = 30;
                          $words = array();
                          $words = explode(" ", $original_string, $num_words);
                          $shown_string = "";
                          $url = url("/services");

                          if(count($words) == 30){
                            $words[29] = "<a href='$url'>Read More >></a>.";
                          }

                          $shown_string = implode(" ", $words);

                    ?>
                    {!!html_entity_decode($shown_string)!!}
                </p>
              </li>
              @endforeach
              
            </ul>
          </div>
        </div>
        
      </div>
      
      
    </div>
  </div>

  <!-- Brands With Icons  -->
  <div id="fashion-sale">
    <div class="container">
      <div class="row">
        <div class="col-md-12 fashion">
          <div class="box">
            <div id="fashion-product" class="owl-carousel fashion-product text-center">
            
              <?php $Brand = DB::table('brands')->get(); ?>
              @foreach($Brand as $brand)
              <div class="item">
                <div class="product-block ">
                <div class="image"> <a href="{{url('/')}}/products/brand/{{$brand->name}}"><img width="100" height="65" class="img-responsive" title="{{$brand->name}}" alt="{{$brand->name}}" src="{{url('/')}}/uploads/brands/{{$brand->image}}"></a> </div>
                  <div class="product-details">
                    <div class="product-name">
                      <h3><a href="{{url('/')}}/products/brand/{{$brand->name}}">{{$brand->name}}</a></h3>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach

            
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Fashio Sale block End  --> 

    
@endsection