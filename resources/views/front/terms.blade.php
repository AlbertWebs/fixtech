@extends('front.master')
@section('content')
<style type="text/css">
 a{
   color:#66139B;
 }
</style>
<div id="blog-page-contain">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-8"> 
        @if($Term->isEmpty())
        <center>
          
        </center>
        @else
          <!-- left block Start  -->
          <div id="left">
          @foreach($Term as $terms)
            <div class="single-post-item">
              
              <div class="single-post-details">
                <div class="post-title">
                  <h1 style="font-size:2px; margin:0 auto; color:#fff">Car Audio Shop in Nairobi</h1>
                  <h4><a href="#">{{$terms->title}}</a></h4>
                </div>
                <div class="description">
                  <p>{!!html_entity_decode($terms->content)!!}</p>
                 
                </div>
              </div>
            </div>

          @endforeach
       
            
          </div>
          <!-- left block end  --> 
        @endif
        </div>
      
      </div>
    </div>
  </div>
@endsection