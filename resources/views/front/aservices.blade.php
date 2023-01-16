@extends('front.master')
@section('content')
  <!-- bredcrumb and page title block start  -->
  <div id="bread-crumb">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="page-title">
            <h4>Our Services</h4>
          </div>
        </div>
        <div class="col-md-9">
          <div class="bread-crumb">
            <ul>
              <li><a href="{{url('/')}}">home</a></li>
              <li>\</li>
              <li><a href="{{url('/services')}}">Services</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- bredcrumb and page title block end  -->

    <div id="about-page-contain">
      <div class="container">
        
          
          @foreach($Services as $service)
              @if($service->id % 2 == 0)
              <div class="row">
                <div class="Experiences">

                  
                  <br><br>
                  
                  <div class="col-md-8 text-center">
                    
                    
                    <div class="exp-detail">
                    <h5>{{$service->title}}</h5>
                    
                      <p>{!!html_entity_decode($service->content)!!}</p>

                    </div>
                    
                  </div>
                  <div class="col-md-4 text-center">
                    
                    
                    
                    <div class="exp-detail">
                      
                    
                      <img src="{{url('/')}}/uploads/services/{{$service->image_one}}" alt="post" title="post" class="img-responsive">

                    </div>
                  
                  </div>
                </div>
              </div>
                @else
              <div class="row">
                <div class="Experiences">

                  
                  &nbsp; &nbsp;
                  <div class="col-md-4 text-center">
                    
                    
                    
                    <div class="exp-detail">
                      
                    
                      <img src="{{url('/')}}/uploads/services/{{$service->image_one}}" alt="post" title="post" class="img-responsive">

                    </div>
                  
                  </div>
                  <div class="col-md-8 text-center">
                    
                    
                    <div class="exp-detail">
                    <h5>{{$service->title}}</h5>
                    
                      <p>{!!html_entity_decode($service->content)!!}</p>

                    </div>
                    
                  </div>
                </div>
              </div>
              @endif
          @endforeach
              
        
        
    </div>
  </div>

<!-- Request Quote -->
<div class="container text-center">
      <div class="row">
        <div class="col-md-12">
          <div class= "newslatter">
          
              <h2 class="tf">Looking for Installation Services?</h2>
              
              <div style="padding:20px; text-align: center;">
                 <center><a href="#" class="btn btn-large btn-primary text-center"><span class="fa fa-envelope"></span> Get Quote</a></center>
              </div>
            
          </div>
        </div>
      </div>
      
    </div>
<!-- Request Quote -->
       
@endsection