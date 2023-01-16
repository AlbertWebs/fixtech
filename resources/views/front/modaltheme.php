<div class='col-lg-5 col-md-6 col-sm-6'>
<!-- Product Details Left -->
    <div class='product-details-left'>
        <div class='product-details-images slider-navigation-1'>
            <div class='lg-image'>
                <img src='{{url("/")}}/uploads/product/{{$user->image_one}}' alt='$user->name'>
            </div>
            <div class='lg-image'>
                <img src='{{url("/")}}/uploads/product/{{$user->image_two}}' alt='$user->name'>
            </div>
            <div class='lg-image'>
                <img src='{{url("/")}}/uploads/product/{{$user->image_three}}' alt='$user->name'>
            </div>
            
        </div>
        <div class='product-details-thumbs slider-thumbs-1'>                                        
            <div class='sm-image'><img src='{{url("/")}}/uploads/product/{{$user->image_one}}' alt='$user->name'></div>
            <div class='sm-image'><img src='{{url("/")}}/uploads/product/{{$user->image_two}}' alt='$user->name'></div>
            <div class='sm-image'><img src='{{url("/")}}/uploads/product/{{$user->image_three}}' alt='$user->name'></div>
        </div>
    </div>
    <!--// Product Details Left -->
</div>

<div class='col-lg-7 col-md-6 col-sm-6'>
    <div class='product-details-view-content pt-60'>
        <div class='product-info'>
            <h2>$user->name</h2>
            <span class='product-details-ref'>Reference: $user->code</span>
            
            <div class='price-box pt-20'>
                <span class='new-price new-price-2'>KES $user->price</span>
            </div>
            <div class='product-desc'>
                <p>
                    <span>
                      $user->meta
                    </span>
                </p>
            </div>
            
            <div class='single-add-to-cart'>
                <form action='#' class='cart-quantity'>
                    <div class='quantity'>
                        <label>Quantity</label>
                        <div class='cart-plus-minus'>
                            <input class='cart-plus-minus-box' value='1' type='text'>
                            <div class='dec qtybutton'><i class='fa fa-angle-down'></i></div>
                            <div class='inc qtybutton'><i class='fa fa-angle-up'></i></div>
                        </div>
                    </div>
                    <button class='add-to-cart' type='submit'>Add to cart</button>
                </form>
            </div>
            <div class='product-additional-info pt-25'>
                <!-- <a class='wishlist-btn' href='wishlist.html'><i class='fa fa-heart-o'></i>Add to wishlist</a> -->
                <div class='product-social-sharing pt-25'>
                    <ul>
                        <li class='facebook'><a href=''><i class='fa fa-facebook'></i>Facebook</a></li>
                        <li class='twitter'><a href=''><i class='fa fa-twitter'></i>Twitter</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>