<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//HomeRoutes

Route::get('/','App\Http\Controllers\HomeController@index1');
// New Routes
Route::get('/product-tags/{slung}','App\Http\Controllers\HomeController@product_tags');

// All Products
Route::get('/products','App\Http\Controllers\HomeController@products');
//Products Category
Route::get('/products/{category}','App\Http\Controllers\HomeController@productss');
//Single Product
Route::get('/product/{name}','App\Http\Controllers\HomeController@product');
// Modal View
Route::get('dynamicModal/{id}',[
  'as'=>'dynamicModal',
  'uses'=> 'App\Http\Controllers\HomeController@loadModal'
]);

Route::get('/clear-cache', function() {
  $exitCode = Artisan::call('cache:clear');
  $exitCode = Artisan::call('route:clear');
  echo 'Cache Cleared';
});

Route::get('export', 'DemoController@export')->name('export');
Route::get('importExportView', 'DemoController@importExportView');
Route::post('import', 'DemoController@import')->name('import');

Route::get('delivery','App\Http\Controllers\HomeController@index1');

Route::get('/search-results/{search}','App\Http\Controllers\HomeController@search_page')->name('search-results');

// Stupid Links
Route::get('//about','App\Http\Controllers\HomeController@index1');
Route::get('//services','App\Http\Controllers\HomeController@index1');
Route::get('//login','App\Http\Controllers\HomeController@index1');
Route::get('//products','App\Http\Controllers\HomeController@index1');
Route::get('//terms-and-conditions','App\Http\Controllers\HomeController@index1');
Route::get('//copyright','App\Http\Controllers\HomeController@index1');
Route::get('//delivery','App\Http\Controllers\HomeController@index1');
Route::get('//products','App\Http\Controllers\HomeController@index1');
Route::get('//contact','App\Http\Controllers\HomeController@index1');

//



// * Products*/
Route::get('/classifieds','App\Http\Controllers\HomeController@products');
Route::get('/our-products','App\Http\Controllers\HomeController@products');

/** Single Product */
Route::get('/classifieds/{code}','App\Http\Controllers\HomeController@code');
// Full Packages
Route::get('/complete-vehicle-assessories','App\Http\Controllers\HomeController@fullPackages');
Route::get('/special-offers','App\Http\Controllers\HomeController@specialoffers');
Route::get('/complete-vehicle-assessories/{code}','App\Http\Controllers\HomeController@fullPackage');
/** Product Categories */
Route::get('/classifieds/shop/{cat}','App\Http\Controllers\HomeController@catt');
// *Products Brands*/
Route::get('/classifieds/brand/{brand}','App\Http\Controllers\HomeController@brand');
Route::get('/our-portfolio','App\Http\Controllers\HomeController@portfolio');
Route::get('/request-quote','App\Http\Controllers\HomeController@request');

// Other Routes
Route::get('/products','App\Http\Controllers\HomeController@products');
Route::get('/products/grid','App\Http\Controllers\HomeController@grid');
Route::get('/product/{title}','App\Http\Controllers\HomeController@product');
Route::get('/products/cat/{title}','App\Http\Controllers\HomeController@cat');
Route::get('/cat/{title}','App\Http\Controllers\HomeController@cat');
Route::get('/products/brand/{title}','App\Http\Controllers\HomeController@brand');
Route::get('/shop/cat/{cat}','App\Http\Controllers\HomeController@shop_cat');
Route::get('/shop/{name}','App\Http\Controllers\HomeController@product');
Route::get('/contact','App\Http\Controllers\HomeController@contact');
Route::get('/contact-us','App\Http\Controllers\HomeController@contact');
// Route::get('/services','App\Http\Controllers\HomeController@services');
// Route::get('/our-services','App\Http\Controllers\HomeController@services');
// Route::get('/service/{name}','App\Http\Controllers\HomeController@service');
// Route::get('/about','App\Http\Controllers\HomeController@about');
Route::get('/about-us','App\Http\Controllers\HomeController@about');
Route::get('/terms','App\Http\Controllers\HomeController@terms');
// Route::get('/delivery','App\Http\Controllers\HomeController@delivery');
Route::get('/terms-and-conditions','App\Http\Controllers\HomeController@terms');
Route::get('/privacy','App\Http\Controllers\HomeController@privacy');
Route::get('/privacy-policy','App\Http\Controllers\HomeController@privacy');
Route::get('/shipping-policy','App\Http\Controllers\HomeController@shipping');

Route::get('/search','App\Http\Controllers\HomeController@search');
Route::get('/copyright','App\Http\Controllers\HomeController@copyright');
Route::get('/commingsoon','App\Http\Controllers\HomeController@commingsoon');
Route::post('/submitMessage','App\Http\Controllers\HomeController@submitMessage');
Route::post('/till','PaymentsConroller@till');

Route::post('/getQuote','App\Http\Controllers\HomeController@getQuote');

// Geo Location
Route::get('get-ip-details', function () {

	  $ip = '154.79.70.69';

    $data = \Location::get($ip);
    dd($data);
    echo $data->areaCode;



});


// Version Control
Route::get('/version_control', 'App\Http\Controllers\HomeController@version');

//Check If Mail Exists
Route::post('/checkemail','App\Http\Controllers\HomeController@checkEmail');
//Subscribers
Route::post('/subscribe','App\Http\Controllers\HomeController@subscribe');

//Search Site
Route::post('/searchsite','App\Http\Controllers\HomeController@searchsite');
Route::get('/search-results','App\Http\Controllers\HomeController@searchsiteget');
//BlogRoutes
Route::get('/blog','BlogController@index');
Route::get('/blog/videos','BlogController@videos');
Route::get('/blog/{title}','BlogController@blog');
Route::get('/blog/cat/{cat}','BlogController@blogCat');
Route::post('/blog/search','BlogController@search_blog');
Route::get('/blog/tag/{tag}','BlogController@tag');
Route::post('/blog/comment','BlogController@add_comment');

Auth::routes();

// Cart Routes
Route::get('/cart','App\Http\Controllers\CartController@index')->name('cart.index');
Route::get('/cart/wishlist','App\Http\Controllers\CartController@wishlist');
Route::get('/cart/removewishlist/{rowId}/{user}','App\Http\Controllers\CartController@removeWishlist');

Route::get('/cart/destroy/{rowId}','App\Http\Controllers\CartController@destroy');
Route::get('/cart/destroy/{rowId}','App\Http\Controllers\CartController@removeCart');

Route::get('/cart/destroyCompare/{rowId}','App\Http\Controllers\CartController@destroyCompare');
Route::get('cart/addItem/{id}','App\Http\Controllers\CartController@addItem');
Route::get('cart/addWishlist/{id}/{user}','App\Http\Controllers\CartController@addWishlist');

Route::get('cart/addCart/{id}','App\Http\Controllers\CartController@addCart');
Route::get('cart/addCarts/{id}','App\Http\Controllers\CartController@addCarts');

Route::get('cart/addCompare/{id}','App\Http\Controllers\CartController@addCompare');
Route::post('cart/addCart/{id}','App\Http\Controllers\CartController@addCartPost');
Route::post('cart/addToTheCart/{id}','App\Http\Controllers\CartController@addToTheCart');

Route::post('url()->current()/cart/addToTheCart/{id}','App\Http\Controllers\CartController@addToTheCart');

Route::post('/cart/update', 'App\Http\Controllers\CartController@update');
Route::get('/cart/compare', 'App\Http\Controllers\CartController@compare');





Auth::routes();
Route::post('cart/checkout/updateShipping', 'App\Http\Controllers\CheckoutController@updateShipping');
// Checkout Routes
Route::get('cart/checkout','App\Http\Controllers\CheckoutController@index');
Route::get('cart/checkout/checkout_billing','App\Http\Controllers\CheckoutController@checkout_billing');
Route::get('cart/checkout/shipping_method','App\Http\Controllers\CheckoutController@shipping_method');
Route::get('cart/checkout/payment','App\Http\Controllers\CheckoutController@payment')->name('payment.route');
Route::get('cart/checkout/order','App\Http\Controllers\CheckoutController@checkout_confirm');
Route::post('cart/checkout/formvalidate', 'App\Http\Controllers\CheckoutController@formvalidate');
Route::post('cart/checkout/create-user', 'App\Http\Controllers\CheckoutController@create');
Route::post('cart/checkout/save-user-data', 'App\Http\Controllers\CheckoutController@save');

Route::post('cart/checkout/login', 'App\Http\Controllers\CheckoutController@login');
// Route::post('cart/checkout/placeOrder', 'App\Http\Controllers\CheckoutController@placeOrder');
Route::get('cart/checkout/placeOrder', 'App\Http\Controllers\CheckoutController@placeOrderGet');
Route::get('cart/checkout/placeOrderNow', 'App\Http\Controllers\CheckoutController@placeOrderGetAjaxNow');

//Payment pages

Route::post('payments/veryfy/mpesa','PaymentsConroller@verify'); //The Lipa na MPESA Page
Route::post('payments/veryfy/sitoki','PaymentsConroller@stk'); //The Lipa na MPESA Page
Route::get('mpesa/confirm','PaymentsConroller@confirm');             //Rquired URL
Route::get('mpesa/validate','PaymentsConroller@validation');         //Rquired URL
Route::get('mpesa/register','PaymentsConroller@register');           //Rquired URL

Route::group(['prefix'=>'admin'], function(){

Route::middleware(['auth', 'user-access:admin'])->group(function () {

//Login route

Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/', 'App\Http\Controllers\AdminsController@index')->name('admin.index');
Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');

//reset password
Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/password/reset','Auth\AdminResetPasswordController@reset');
Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

//Testimonial
Route::get('/addTestimonial', 'App\Http\Controllers\AdminsController@addTestimonial');
Route::post('/add_Testimonial', 'App\Http\Controllers\AdminsController@add_Testimonial');
Route::get('/testimonials','App\Http\Controllers\AdminsController@testimonials');
Route::get('/editTestimonial/{id}', 'App\Http\Controllers\AdminsController@editTestimonial');
Route::get('/deleteTestimonial/{id}', 'App\Http\Controllers\AdminsController@deleteTestimonial');
Route::post('/edit_Testimonial/{id}', 'App\Http\Controllers\AdminsController@edit_Testimonial');


Route::get('/edit-Product-slung', 'App\Http\Controllers\AdminsController@edit_Product_slung');


Route::get('/edit-category-slung', 'App\Http\Controllers\AdminsController@edit_category_slung');


//Terms Privacy copyright
//copyright
Route::get('/copyright','App\Http\Controllers\AdminsController@copyright');
Route::post('/edit_copyright', 'App\Http\Controllers\AdminsController@edit_copyright');
// Delivery Terms
Route::get('/delivery','App\Http\Controllers\AdminsController@delivery');
Route::post('/edit_delivery', 'App\Http\Controllers\AdminsController@edit_delivery');
//Privacy
Route::get('/privacy','App\Http\Controllers\AdminsController@privacy');
Route::get('/addPrivacy', 'App\Http\Controllers\AdminsController@addPrivacy');
Route::get('/editPrivacy/{id}', 'App\Http\Controllers\AdminsController@editPrivacy');
Route::post('/add_privacy', 'App\Http\Controllers\AdminsController@add_privacy');
Route::get('/delete_privacy/{id}','App\Http\Controllers\AdminsController@delete_privacy');
Route::post('/edit_privacy/{id}', 'App\Http\Controllers\AdminsController@edit_privacy');
//values
Route::get('/values','App\Http\Controllers\AdminsController@values');
Route::get('/addValues', 'App\Http\Controllers\AdminsController@addValues');
Route::get('/editValues/{id}', 'App\Http\Controllers\AdminsController@editValues');
Route::post('/add_values', 'App\Http\Controllers\AdminsController@add_values');
Route::get('/delete_values/{id}','App\Http\Controllers\AdminsController@delete_values');
Route::post('/edit_values/{id}', 'App\Http\Controllers\AdminsController@edit_values');

//Offers
Route::get('/Products_offer','App\Http\Controllers\AdminsController@Products_offer');
Route::get('/swapoffer/{id}','App\Http\Controllers\AdminsController@swapoffer');
Route::get('/deleteOffer/{id}','App\Http\Controllers\AdminsController@deleteOffer');
Route::post('/swap_offer/{id}','App\Http\Controllers\AdminsController@swap_offer');
Route::get('/special_offer/{id}','App\Http\Controllers\AdminsController@special_offer');
Route::post('/special_offer_post','App\Http\Controllers\AdminsController@special_offer_post');
Route::get('/special_offer_edit/{id}','App\Http\Controllers\AdminsController@special_offer_edit');
Route::get('/swap_full/{id}','App\Http\Controllers\AdminsController@swap_full');

// Featured& trending
Route::get('/swapTrending/{id}','App\Http\Controllers\AdminsController@swapTrending');
Route::get('/swapFeatured/{id}','App\Http\Controllers\AdminsController@swapFeatured');
Route::get('/swapSlider/{id}','App\Http\Controllers\AdminsController@swapSlider');
Route::get('/swapBanner/{id}','App\Http\Controllers\AdminsController@swapBanner');

Route::get('/wishlist','App\Http\Controllers\AdminsController@wishlist');

//Who
Route::get('/who','App\Http\Controllers\AdminsController@who');
Route::get('/editWho/{id}', 'App\Http\Controllers\AdminsController@editWho');
Route::get('/delete_who/{id}','App\Http\Controllers\AdminsController@delete_who');
Route::post('/edit_who/{id}', 'App\Http\Controllers\AdminsController@edit_who');

//Terms
Route::get('/terms','App\Http\Controllers\AdminsController@terms');
Route::get('/addTerms', 'App\Http\Controllers\AdminsController@addTerms');
Route::get('/editTerm/{id}', 'App\Http\Controllers\AdminsController@editTerm');
Route::post('/add_term', 'App\Http\Controllers\AdminsController@add_term');
Route::post('/edit_term/{id}', 'App\Http\Controllers\AdminsController@edit_term');
Route::get('/delete_term/{id}','App\Http\Controllers\AdminsController@delete_term');
//About
Route::get('/about','App\Http\Controllers\AdminsController@about');
Route::post('/about_save', 'App\Http\Controllers\AdminsController@about_save');
//Services
Route::get('/services','App\Http\Controllers\AdminsController@services');
Route::get('/deleteService/{id}','App\Http\Controllers\AdminsController@deleteService');
Route::post('/edit_Services/{id}', 'App\Http\Controllers\AdminsController@edit_Services');
Route::get('/editServices/{id}', 'App\Http\Controllers\AdminsController@editServices');
Route::get('/addService', 'App\Http\Controllers\AdminsController@addService');
Route::post('/add_Service', 'App\Http\Controllers\AdminsController@add_Service');

//Pricing
Route::get('/pricing','App\Http\Controllers\AdminsController@pricing');
Route::get('/deletePricing/{id}','App\Http\Controllers\AdminsController@deletePricing');
Route::post('/edit_Pricing/{id}', 'App\Http\Controllers\AdminsController@edit_Pricing');
Route::get('/editPricing/{id}', 'App\Http\Controllers\AdminsController@editPricing');
Route::get('/addPricing', 'App\Http\Controllers\AdminsController@addPricing');
Route::post('/add_Pricing', 'App\Http\Controllers\AdminsController@add_Pricing');

//Video
Route::get('/videos','App\Http\Controllers\AdminsController@videos');
Route::get('/deleteVideo/{id}','App\Http\Controllers\AdminsController@deleteVideo');
Route::post('/edit_Video/{id}', 'App\Http\Controllers\AdminsController@edit_Video');
Route::get('/editVideo/{id}', 'App\Http\Controllers\AdminsController@editVideo');
Route::post('/add_Video/{id}', 'App\Http\Controllers\AdminsController@add_Video');
Route::get('/addVideo', 'App\Http\Controllers\AdminsController@addVideo');


//Porfolio
Route::get('/portfolio','App\Http\Controllers\AdminsController@portfolio');
Route::get('/deletePortfolio/{id}','App\Http\Controllers\AdminsController@deletePortfolio');
Route::post('/edit_Portfolio/{id}', 'App\Http\Controllers\AdminsController@edit_Portfolio');
Route::get('/editPortfolio/{id}', 'App\Http\Controllers\AdminsController@editPortfolio');
Route::get('/addPortfolio', 'App\Http\Controllers\AdminsController@addPortfolio');
Route::post('/add_Portfolio', 'App\Http\Controllers\AdminsController@add_Portfolio');

//How It Works
Route::get('/how','App\Http\Controllers\AdminsController@how');
Route::get('/deleteHow/{id}','App\Http\Controllers\AdminsController@deleteHow');
Route::post('/edit_How/{id}', 'App\Http\Controllers\AdminsController@edit_How');
Route::get('/editHow/{id}', 'App\Http\Controllers\AdminsController@editHow');
Route::get('/addHow', 'App\Http\Controllers\AdminsController@addHow');
Route::post('/add_How', 'App\Http\Controllers\AdminsController@add_How');

//Gallery
Route::get('/gallery','App\Http\Controllers\AdminsController@gallery');
Route::get('/editGallery/{id}','App\Http\Controllers\AdminsController@editGallery');
Route::get('/deleteGallery/{id}','App\Http\Controllers\AdminsController@deleteGallery');
Route::post('/save_gallery/{id}', 'App\Http\Controllers\AdminsController@save_gallery');
Route::get('/addGallery', 'App\Http\Controllers\AdminsController@addGallery');
Route::get('/galleryList', 'App\Http\Controllers\AdminsController@galleryList');
Route::post('/add_Gallery', 'App\Http\Controllers\AdminsController@add_Gallery');

//Slider
Route::get('/slider','App\Http\Controllers\AdminsController@slider');
Route::get('/editSlider/{id}','App\Http\Controllers\AdminsController@editSlider');
Route::get('/deleteSlider/{id}','App\Http\Controllers\AdminsController@deleteSlider');
Route::post('/edit_Slider/{id}', 'App\Http\Controllers\AdminsController@edit_Slider');
Route::get('/addSlider', 'App\Http\Controllers\AdminsController@addSlider');
Route::post('/add_Slider', 'App\Http\Controllers\AdminsController@add_Slider');

//Banner
Route::get('/banner','App\Http\Controllers\AdminsController@banners');
Route::get('/editBanner/{id}','App\Http\Controllers\AdminsController@editBanner');
Route::post('/edit_Banner/{id}', 'App\Http\Controllers\AdminsController@edit_Banner');

//Clients
Route::get('/addClient', 'App\Http\Controllers\AdminsController@addClient');
Route::post('/add_Client', 'App\Http\Controllers\AdminsController@add_Client');
Route::get('/clients','App\Http\Controllers\AdminsController@clients');
Route::get('/editClient/{id}', 'App\Http\Controllers\AdminsController@editClient');
Route::get('/deleteClient/{id}', 'App\Http\Controllers\AdminsController@deleteClient');
Route::post('/edit_Client/{id}', 'App\Http\Controllers\AdminsController@edit_Client');


//Clients
Route::get('/addBrand', 'App\Http\Controllers\AdminsController@addBrand');
Route::post('/add_Brand', 'App\Http\Controllers\AdminsController@add_Brand');
Route::get('/brands','App\Http\Controllers\AdminsController@brands');
Route::get('/editBrand/{id}', 'App\Http\Controllers\AdminsController@editBrand');
Route::get('/deleteBrand/{id}', 'App\Http\Controllers\AdminsController@deleteBrand');
Route::post('/edit_Brand/{id}', 'App\Http\Controllers\AdminsController@edit_Brand');

//Statisctics
Route::get('/stats','App\Http\Controllers\AdminsController@stats');
Route::get('/editStats/{id}', 'App\Http\Controllers\AdminsController@editStats');
Route::get('/deleteStats/{id}', 'App\Http\Controllers\AdminsController@deleteStats');
Route::post('/edit_Stats/{id}', 'App\Http\Controllers\AdminsController@edit_Stats');

//Pages
Route::get('/pages','App\Http\Controllers\AdminsController@pages');
Route::get('/editPage/{id}','App\Http\Controllers\AdminsController@editPage');
Route::get('/deletePage/{id}','App\Http\Controllers\AdminsController@deletePage');
Route::post('/edit_Page/{id}', 'App\Http\Controllers\AdminsController@edit_Page');
Route::get('/addPage', 'App\Http\Controllers\AdminsController@addPage');
Route::post('/add_Page', 'App\Http\Controllers\AdminsController@add_Page');
Route::post('/set_Page/{name}', 'App\Http\Controllers\AdminsController@set_Page');
Route::get('/setPage/{name}', 'App\Http\Controllers\AdminsController@setPage');

// My Api
Route::get('/myApi', 'App\Http\Controllers\AdminsController@myApi');
Route::get('/invoices', 'App\Http\Controllers\AdminsController@invoices');
Route::get('/deleteInvoice/{id}', 'App\Http\Controllers\AdminsController@deleteInvoice');
Route::get('/approveInvoice/{id}', 'App\Http\Controllers\AdminsController@approveInvoice');


//Priducts
Route::get('/products','App\Http\Controllers\AdminsController@products');
Route::get('/Products-lte','App\Http\Controllers\AdminsController@productslte');

Route::get('/editProduct/{id}','App\Http\Controllers\AdminsController@editProduct');
Route::get('/editProductDetails/{id}','App\Http\Controllers\AdminsController@editProductDetails');
Route::get('/deleteProduct/{id}','App\Http\Controllers\AdminsController@deleteProduct');
Route::post('/edit_Product/{id}', 'App\Http\Controllers\AdminsController@edit_Product');
Route::post('/edit_Product_Details/{id}', 'App\Http\Controllers\AdminsController@edit_Product_Details');
Route::get('/addProduct', 'App\Http\Controllers\AdminsController@addProduct');
Route::post('/add_Product', 'App\Http\Controllers\AdminsController@add_Product');


//Admin
Route::get('/admins','App\Http\Controllers\AdminsController@admins');
Route::get('/editAdmin/{id}','App\Http\Controllers\AdminsController@editAdmin');
Route::get('/deleteAdmin/{id}','App\Http\Controllers\AdminsController@deleteAdmin');
Route::post('/edit_Admin/{id}', 'App\Http\Controllers\AdminsController@edit_Admin');
Route::get('/addAdmin', 'App\Http\Controllers\AdminsController@addAdmin');
Route::post('/add_Admin', 'App\Http\Controllers\AdminsController@add_Admin');

//Orders
Route::get('/orders','App\Http\Controllers\AdminsController@orders');
Route::get('/editOrders/{id}','App\Http\Controllers\AdminsController@editOrders');
Route::get('/deleteOrders/{id}','App\Http\Controllers\AdminsController@deleteOrders');
Route::get('/confrimOrder/{id}','App\Http\Controllers\AdminsController@confrimOrder');
Route::get('/swapOrder/{id}','App\Http\Controllers\AdminsController@swapOrder');
Route::post('/edit_Orders/{id}', 'App\Http\Controllers\AdminsController@edit_Orders');
Route::get('/addOrder', 'App\Http\Controllers\AdminsController@addOrder');
Route::post('/add_Order', 'App\Http\Controllers\AdminsController@add_Order');

//User
Route::get('/users','App\Http\Controllers\AdminsController@users');
Route::get('/editUser/{id}','App\Http\Controllers\AdminsController@editUser');
Route::get('/deleteUser/{id}','App\Http\Controllers\AdminsController@deleteUser');
Route::post('/edit_User/{id}', 'App\Http\Controllers\AdminsController@edit_User');
Route::get('/addUser', 'App\Http\Controllers\AdminsController@addUser');
Route::post('/add_User', 'App\Http\Controllers\AdminsController@add_User');

//Blog Controls
Route::get('/blog','App\Http\Controllers\AdminsController@blog');
Route::get('/editBlog/{id}','App\Http\Controllers\AdminsController@editBlog');
Route::get('/delete_Blog/{id}','App\Http\Controllers\AdminsController@delete_Blog');
Route::post('/edit_Blog/{id}', 'App\Http\Controllers\AdminsController@edit_Blog');
Route::get('/addBlog', 'App\Http\Controllers\AdminsController@addBlog');
Route::post('/add_blog', 'App\Http\Controllers\AdminsController@add_Blog');
//Categories Control
Route::get('/categories','App\Http\Controllers\AdminsController@categories');
Route::get('/editCategories/{id}','App\Http\Controllers\AdminsController@editCategories');
Route::get('/deleteCategory/{id}','App\Http\Controllers\AdminsController@deleteCategory');
Route::post('/edit_Category/{id}', 'App\Http\Controllers\AdminsController@edit_Category');
Route::get('/addCategory', 'App\Http\Controllers\AdminsController@addCategory');
Route::post('/add_Category', 'App\Http\Controllers\AdminsController@add_Category');

Route::get('/tags','App\Http\Controllers\AdminsController@tags');
Route::get('/editTag/{id}','App\Http\Controllers\AdminsController@editTag');
Route::get('/deleteTag/{id}','App\Http\Controllers\AdminsController@deleteTag');
Route::post('/edit_Tag/{id}', 'App\Http\Controllers\AdminsController@edit_Tag');
Route::get('/addTag', 'App\Http\Controllers\AdminsController@addTag');
Route::post('/add_Tag', 'App\Http\Controllers\AdminsController@add_Tag');

//Service Renreded Control
Route::get('/service_rendered','App\Http\Controllers\AdminsController@service_rendered');
Route::get('/editService_rendered/{id}','App\Http\Controllers\AdminsController@editService_rendered');
Route::get('/deleteService_rendered/{id}','App\Http\Controllers\AdminsController@deleteService_rendered');
Route::post('/edit_Service_rendered/{id}', 'App\Http\Controllers\AdminsController@edit_Service_rendered');
Route::get('/addService_rendered', 'App\Http\Controllers\AdminsController@addService_rendered');
Route::post('/add_Service_rendered', 'App\Http\Controllers\AdminsController@add_Service_rendered');

//Daily
Route::get('/daily','App\Http\Controllers\AdminsController@daily');
Route::get('/editDaily/{id}','App\Http\Controllers\AdminsController@editDaily');
Route::get('/deleteDaily/{id}','App\Http\Controllers\AdminsController@deleteDaily');
Route::post('/edit_Daily/{id}', 'App\Http\Controllers\AdminsController@edit_Daily');
Route::get('/addDaily', 'App\Http\Controllers\AdminsController@addDaily');
Route::post('/add_Daily', 'App\Http\Controllers\AdminsController@add_Daily');


//Sub Categories
Route::get('/subCategories','App\Http\Controllers\AdminsController@subCategories');
Route::get('/editSubCategories/{id}','App\Http\Controllers\AdminsController@editSubCategories');
Route::get('/deleteSubCategory/{id}','App\Http\Controllers\AdminsController@deleteSubCategory');
Route::post('/edit_SubCategory/{id}', 'App\Http\Controllers\AdminsController@edit_SubCategory');
Route::get('/addSubCategory', 'App\Http\Controllers\AdminsController@addSubCategory');
Route::post('/add_SubCategory', 'App\Http\Controllers\AdminsController@add_SubCategory');

//Active Services
Route::get('/traceServices','App\Http\Controllers\AdminsController@traceServices');
Route::get('/editTraceServices/{id}','App\Http\Controllers\AdminsController@editTraceServices');
Route::get('/deleteTraceServices/{id}','App\Http\Controllers\AdminsController@deleteTraceServices');
Route::post('/edit_TraceServices/{id}', 'App\Http\Controllers\AdminsController@edit_TraceServices');
Route::get('/addTraceServices', 'App\Http\Controllers\AdminsController@addTraceServices');
Route::post('/add_TraceServices', 'App\Http\Controllers\AdminsController@add_TraceServices');

// Generic Routes
Route::get('/form','App\Http\Controllers\AdminsController@form');
Route::get('/list','App\Http\Controllers\AdminsController@list');
Route::get('/formfile','App\Http\Controllers\AdminsController@formfile');
Route::get('/formfiletext','App\Http\Controllers\AdminsController@formfiletext');

//Payments
Route::get('/payments','App\Http\Controllers\AdminsController@payments');
Route::get('/payments/explore/{id}','App\Http\Controllers\AdminsController@payments_explore');
//MPESA Routes
Route::get('/balance','App\Http\Controllers\AdminsController@balance');
Route::get('/reverse','App\Http\Controllers\AdminsController@reverse');
Route::get('/lnmo','App\Http\Controllers\AdminsController@lnmo');
Route::get('/b2b','App\Http\Controllers\AdminsController@b2b');
Route::get('/b2c','App\Http\Controllers\AdminsController@b2c');
Route::get('/lnmo/confirm/{id}','App\Http\Controllers\AdminsController@lnmo_confirm');


// Order
Route::get('/orders/explore/{id}','App\Http\Controllers\AdminsController@order_explore');

//Notifications
Route::get('/notifications','App\Http\Controllers\AdminsController@notifications');
Route::get('/notification/{id}','App\Http\Controllers\AdminsController@notification');
Route::get('/deleteNotification/{id}','App\Http\Controllers\AdminsController@deleteNotification');

//Service Requests
Route::get('/requests','App\Http\Controllers\AdminsController@quoterequeste');
Route::get('/markRequest/{id}/{status}/{type}','App\Http\Controllers\AdminsController@markRequest');

//Comments
Route::get('/reviews','App\Http\Controllers\AdminsController@reviews');
Route::get('/approve/{id}','App\Http\Controllers\AdminsController@approve');
Route::get('/decline/{id}','App\Http\Controllers\AdminsController@decline');

// Error Pages
Route::get('/403','App\Http\Controllers\AdminsController@error403');
Route::get('/404','App\Http\Controllers\AdminsController@error404');
Route::get('/405','App\Http\Controllers\AdminsController@error405');
Route::get('/500','App\Http\Controllers\AdminsController@error500');
Route::get('/503','App\Http\Controllers\AdminsController@error503');





// Subscribers Mail
Route::post('/updatemail','App\Http\Controllers\AdminsController@updatemail');


//Updates
Route::get('/updates','App\Http\Controllers\AdminsController@updates');
Route::get('/update/{id}','App\Http\Controllers\AdminsController@update');
Route::get('/mark/{id}','App\Http\Controllers\AdminsController@mark');

//profile
Route::get('/profile','App\Http\Controllers\AdminsController@profile');
Route::post('/profile_save/{id}','App\Http\Controllers\AdminsController@profile_save');
Route::get('/editFile/{id}','App\Http\Controllers\AdminsController@editFile');
Route::post('/edit_File/{id}','App\Http\Controllers\AdminsController@edit_File');

// Gallery
Route::get('/gallery','App\Http\Controllers\AdminsController@gallery');

//Under Contruction
Route::get('/under_construction','App\Http\Controllers\AdminsController@under_construction');

//Wizard
Route::get('/wizard','App\Http\Controllers\AdminsController@wizard');

//Maps
Route::get('/maps','App\Http\Controllers\AdminsController@maps');
// SiteSettings
Route::get('/sitesettings','App\Http\Controllers\AdminsController@sitesettings');
Route::post('/savesitesettings','App\Http\Controllers\AdminsController@savesitesettings');
//Messages
Route::get('/allMessages', 'App\Http\Controllers\AdminsController@allMessages');
Route::get('/unread', 'App\Http\Controllers\AdminsController@unread');
Route::get('/read/{id}', 'App\Http\Controllers\AdminsController@read');
Route::post('/reply/{id}', 'App\Http\Controllers\AdminsController@reply');
Route::get('/deleteMessage/{id}', 'App\Http\Controllers\AdminsController@deleteMessage');

//Subscribers
Route::get('/subscribers', 'App\Http\Controllers\AdminsController@subscribers');
Route::get('/mailSubscribers/{email}', 'App\Http\Controllers\AdminsController@mailSubscribers');
Route::get('/mailSubscriber/{email}', 'App\Http\Controllers\AdminsController@mailSubscriber');
Route::get('/deleteSubscriber/{id}', 'App\Http\Controllers\AdminsController@deleteSubscriber');
// Version Control
Route::get('/version', 'App\Http\Controllers\AdminsController@version');

// Seo Settings
// SeoSettings
Route::get('/seosettings','App\Http\Controllers\AdminsController@seosettings');
Route::post('/saveseosettings','App\Http\Controllers\AdminsController@saveseosettings');

Route::get('/addProductToFacebookPixel','App\Http\Controllers\AdminsController@addProductToFacebookPixel');

});


});

// Users Routes
Auth::routes();
Route::group(['prefix'=>'clientarea'], function(){
    Route::middleware(['auth', 'user-access:user'])->group(function () {
        Route::get('/','App\Http\Controllers\ClientController@index')->name('home');
        Route::get('/logout','App\Http\Controllers\Auth\LoginController@userLogout')->name('user.logout');
        Route::get('/profile','App\Http\Controllers\ClientController@profile');
        Route::get('/transactions','App\Http\Controllers\ClientController@transactions');
        Route::get('/invoices','App\Http\Controllers\ClientController@invoices');
        Route::get('/invoice/{invoicenumber}','App\Http\Controllers\ClientController@invoice');
        Route::get('/thankyou','App\Http\Controllers\ClientController@thankyou');
        Route::get('/addReview/{id}','App\Http\Controllers\ClientController@addReview');
        Route::post('/add_Review','App\Http\Controllers\ClientController@add_Review');
        Route::post('/save','App\Http\Controllers\ClientController@save');
        Route::post('/wishlist','App\Http\Controllers\ClientController@wishlist');
        Route::post('/place_order','App\Http\Controllers\ClientController@place_order');
    });
});

Route::get('get/details/{id}', 'PaymentsConroller@getDetails')->name('getDetails');


    // MPESA
    Route::group(['prefix'=>'payments'], function(){
    Route::post('/B2C/{AccID}','PaymentsConroller@B2C');
    Route::get('/balance/{AccID}','PaymentsConroller@Balance');
    Route::post('/reverse','PaymentsConroller@reversal');
    Route::post('/TransactionStatus/{AccID}','PaymentsConroller@TransactionStatus');
    Route::post('/B2B/{AccID}','PaymentsConroller@B2B');
    Route::post('/C2B','PaymentsConroller@C2B');
    Route::post('/transStatus/{AccID}','PaymentsConroller@TransactionStatus');
    Route::get('/stk','PaymentsConroller@stk');
    Route::get('/C2B','PaymentsConroller@C2B');
    //Post STK
    Route::post('/stk','PaymentsConroller@stk');
    Route::get('/check/{ref}','PaymentsConroller@check');
    });


Route::any('{query}',
  function() { return redirect('/'); })
  ->where('query', '.*');

