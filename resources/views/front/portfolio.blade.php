@extends('front.master')
@section('content')
 <!-- Begin Amani's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li class="active">Portfolio</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Amani's Breadcrumb Area End Here -->
            <!-- Begin Amani's Main Blog Page Area -->
            <div class="li-main-blog-page pt-60 pb-55">
                <div class="container">
                    <div class="row">
                        <!-- Begin Amani's Main Content Area -->
                        <div class="col-lg-12">
                            <h1 style="font-size:2px; margin:0 auto; color:#fff">Car Audio Shop in Nairobi</h1>
                            <div class="row li-main-content">
                                @foreach($Products as $Pro)
                                    @if($Pro->link == null or $Pro->link == '')
                                    <div class="col-lg-4 col-md-6">
                                        <div class="li-blog-single-item pb-25">
                                            <div class="li-blog-gallery-slider slick-dot-style">
                                                @if($Pro->image_one == 'null' or $Pro->image_one == '')

                                                @else
                                                <div class="li-blog-banner">
                                                    <a href="{{url('/')}}/product/{{$Pro->product}}"><img class="img-full" src="{{url('/')}}/uploads/portfolio/{{$Pro->image_one}}" alt=""></a>
                                                </div>
                                                @endif
                                                @if($Pro->image_two == 'null' or $Pro->image_two == '')

                                                @else
                                                <div class="li-blog-banner">
                                                    <a href="{{url('/')}}/product/{{$Pro->product}}"><img class="img-full" src="{{url('/')}}/uploads/portfolio/{{$Pro->image_two}}" alt=""></a>
                                                </div>
                                                @endif
                                                @if($Pro->image_three == 'null' or $Pro->image_three == '')

                                                @else
                                                <div class="li-blog-banner">
                                                    <a href="{{url('/')}}/product/{{$Pro->product}}"><img class="img-full" src="{{url('/')}}/uploads/portfolio/{{$Pro->image_three}}" alt=""></a>
                                                </div>
                                                @endif
                                                @if($Pro->image_four == 'null' or $Pro->image_four == '')

                                                @else
                                                <div class="li-blog-banner">
                                                    <a href="{{url('/')}}/product/{{$Pro->product}}"><img class="img-full" src="{{url('/')}}/uploads/portfolio/{{$Pro->image_four}}" alt=""></a>
                                                </div>
                                                @endif
                                               
                                            </div>
                                            <div class="li-blog-content text-center">
                                                <div class="li-blog-details">
                                                    <style>
                                                        a{
                                                            color:#66139B;
                                                        }
                                                    </style>
                                                    <h3 class="li-blog-heading pt-25"><a style="color:#66139B !important" href="#">{{$Pro->title}}</a></h3>
                                                    <div class="li-blog-meta">
                                                        <a style="color:#66139B !important"  class="author" href="#"><i class="fa fa-cog"></i><?php $Service = DB::table('services')->where('id',$Pro->service)->get() ?>@foreach($Service as $ser) {{$ser->title}} @endforeach</a>
                                                        @if($Pro->client == null)

                                                        @else
                                                        <a style="color:#66139B !important"  class="comment" href="#"><i class="fa fa-user-o"></i>{{$Pro->client}}</a>
                                                        @endif
                                                        @if($Pro->date == null)

                                                        @else
                                                        <a style="color:#66139B !important"  class="post-time" href="#"><i class="fa fa-calendar"></i> {{$Pro->date}}</a>
                                                        @endif
                                                    </div>
                                                    <p style="color:#000000">
                                                        <style>
                                                            a{
                                                                color:#0645AD !important;
                                                                text-decoration: underline !important;
                                                            }
                                                        </style>
                                                        {!!html_entity_decode($Pro->content)!!}
                                                    </p>
                                                    {{-- <a target="_new" class="read-more" href="{{url('/')}}/product/{{$Pro->product}}">View Product</a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-lg-6 col-md-6">
                                        <div class="li-blog-single-item pb-25">
                                            <div class="li-blog-banner embed-responsive embed-responsive-16by9">
                                                <iframe src="https://www.youtube.com/embed/{{$Pro->link}}" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                            </div>
                                            <div class="li-blog-content text-center">
                                                <div class="li-blog-details">
                                                    <h3 class="li-blog-heading pt-25"><a href="#">{{$Pro->title}}</a></h3>
                                                    <div class="li-blog-meta">
                                                        <a class="author" href="#"><i class="fa fa-cog"></i><?php $Service = DB::table('services')->where('id',$Pro->service)->get() ?>@foreach($Service as $ser) {{$ser->title}} @endforeach</a>
                                                        <a class="comment" href="#"><i class="fa fa-user-o"></i>{{$Pro->client}}</a>
                                                        <a class="post-time" href="#"><i class="fa fa-calendar"></i> {{$Pro->date}}</a>
                                                    </div>
                                                    <p>
                                                        <style>
                                                            a{
                                                                color:#66139B !important;
                                                            }
                                                        </style>
                                                        {!!html_entity_decode($Pro->content)!!}
                                                    </p>
                                                    {{-- <a target="_new" class="read-more" href="{{url('/')}}/product/{{$Pro->product}}">View Product</a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                <!-- Begin Amani's Pagination Area -->
                                <div class="col-lg-12">
                                    <div class="li-paginatoin-area text-center pt-25">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?php echo $Products; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Amani's Pagination End Here Area -->
                            </div>
                        </div>
                        <!-- Amani's Main Content Area End Here -->
                    </div>
                </div>
            </div>
            <!-- Amani's Main Blog Page Area End Here -->
       
@endsection

