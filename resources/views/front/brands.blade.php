        <div class="container" style="padding:20px;">
            <section class="customer-logos slider">
            <?php $Brand = DB::table('brands')->get() ?>
                        @foreach($Brand as $brand)
                <div class="slide"><img style="max-height:80px" src="{{url('/')}}/uploads/brands/{{$brand->image}}" alt="{{$brand->name}}"></div>
                @endforeach
            </section>
        </div>