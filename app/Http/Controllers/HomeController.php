<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Message;
use App\Notifications;
use App\Privacy;
use App\Quote;
use Vinkla\Instagram\Instagram;
use App\ReplyMessage;
use App\ServiceRequest;
use App\Models\Services;
use App\Slider;
use App\Subscriber;
use App\RFP;
use App\Models\Term;
use App\Models\Product;
use App\Delivery;
use App\User;
use App\Testimonial;
use Input;
use App\Portfolio;
use Session;
use App\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use OpenGraph;
use SEOMeta;
use Twitter;

class HomeController extends Controller
{


    public function index1()
    {
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Best Commercial Printer Dealer in Nairobi - ' . $Settings->sitename . '');
            SEOMeta::setDescription('Fixtech Printer Solutions, Commercial Printers, Tonners, Bizhub, Kyocera,  Ricoh Printers' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . '');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('Best Commercial Printer Dealer in Nairobi - ' . $Settings->sitename . '');
            OpenGraph::setUrl('' . $Settings->url . '');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename. '');
            Twitter::setSite('@amanisounds');

            $About = DB::table('about')->get();
            $Slider = DB::table('slider')->paginate(1);
            $Clients =
            $Blog = DB::table('blog')->paginate(2);
            $Portfolio = DB::table('portfolio')->get();
            $Services = Services::all();
            $Testimonial =DB:: table('testimonial')->paginate(12);

            $Video = DB::table('videos')->paginate(1);
            $SiteSettings = DB::table('sitesettings')->get();
            $page_name = 'Home1';
            $page_title = 'Home Page';

            $keywords = 'Fixtech Printers Solutions, Bizhub Printers, Konica Minolta , Kyocera, HP Laptops';


            return view('front.index1', compact('Blog', 'keywords', 'Video', 'About', 'SiteSettings', 'page_title', 'Testimonial', 'Slider', 'Services', 'Portfolio', 'page_name'));
        }
    }


    public function contact()
    {
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Contact Us | ' . $Settings->sitename . '');
            SEOMeta::setDescription('Fixtech Printer Solutions, Contact Kyocera Dealer in Nairobi');
            SEOMeta::setCanonical('' . $Settings->url . '/contact-us');

            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/contact-us');
            OpenGraph::addProperty('type', 'website');

            Twitter::setTitle('' . $Settings->sitename. '');
            Twitter::setSite('@amanisounds');
            $page_name = 'Contact';
            $page_title = 'Contact Us';
            $SiteSettings = DB::table('sitesettings')->get();
            $keywords = 'Bizhub Printer, Kyocera Printers, Photcopy Machine';
            return view('front.contact', compact('page_title', 'SiteSettings', 'page_name','keywords'));
        }
    }

    public function request()
    {
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Request Quote | ' . $Settings->sitename . ' Car Radio for Sale, Car Radio, Subwoofers for sale');
            SEOMeta::setDescription('Fixtech Printer Solutions, Contact Bizhub Printers in Kenya, Kyocera Printers');
            SEOMeta::setCanonical('' . $Settings->url . '/request-quote');

            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/contact-us');
            OpenGraph::addProperty('type', 'website');

            Twitter::setTitle('' . $Settings->sitename. '');
            Twitter::setSite('@amanisounds');
            $page_name = 'Contact';
            $page_title = 'Request Quote';
            $SiteSettings = DB::table('sitesettings')->get();
            $keywords = 'Bizhub Printer, Vehicle Alarm Systems, Vehicle Surveillance Systems';
            return view('front.quote', compact('page_title', 'SiteSettings', 'page_name','keywords'));
        }
    }



    public function about()
    {
        $SEOSettings = DB::table('seosettings')->get();

        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('About Us | ' . $Settings->sitename . '');
            SEOMeta::setDescription('Fixtech Printer Solutions, Kyocera Printers  Ricoh Printers. Photocopy machines for sale in kenya ');
            SEOMeta::setCanonical('' . $Settings->url . '/about-us');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/about-us');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename. '');
            Twitter::setSite('@amanisounds');
            $Admin = Admin::all();
            $About = DB::table('about')->get();
            $SiteSettings = DB::table('sitesettings')->get();
            $Services = DB::table('services')->inRandomOrder()->paginate(2);
            $page_title = 'About Us';
            $Testimonial = DB::table('testimonial')->inRandomOrder()->paginate(3);
            $page_name = 'About';
            $keywords = 'Printers In Kenya';
            return view('front.about', compact('keywords','Testimonial', 'page_title', 'page_name', 'Services', 'SiteSettings', 'About', 'Admin'));
        }
    }

    public function terms()
    {
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Terms and Conditions | ' . $Settings->sitename . '  ');
            SEOMeta::setDescription('Fixtech Printer Solutions Systems' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . '/terms-and-conditions');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/terms');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename. '');
            Twitter::setSite('@amanisounds');
            $page_name = 'Terms';
            $Term = Term::all();
            $page_title = 'Terms Of Service';
            $keywords = 'Bizhub Printer';
            return view('front.terms', compact('page_title', 'Term', 'page_name','keywords'));
        }
    }

    public function delivery()
    {
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Terms Of Delivery | ' . $Settings->sitename . '  ');
            SEOMeta::setDescription('Fixtech Printer Solutions Systems' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . '/delivery');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/terms');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename. '');
            Twitter::setSite('@amanisounds');
            $page_name = 'Terms';
            $Term = Delivery::all();
            $page_title = 'Terms Of Delivery';
            $keywords = 'Bizhub Printer';
            return view('front.delivery', compact('page_title', 'Term', 'page_name','keywords'));
        }
    }



    public function privacy()
    {
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Privacy Policy | ' . $Settings->sitename . '  ');
            SEOMeta::setDescription('Fixtech Printer Solutions Privacy Policies' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . '/privacy');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/privacy');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename. '');
            Twitter::setSite('@amanisounds');
            $page_name = 'Terms';
            $Privacy = Privacy::all();
            $page_title = 'Privacy Policy';
            $keywords = 'Bizhub Printer';
            return view('front.privacy', compact('page_title', 'Privacy', 'page_name','keywords'));
        }
    }

    public function shipping()
    {
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Shipping Policy | ' . $Settings->sitename . '  ');
            SEOMeta::setDescription('Fixtech Printer Solutions Privacy Policies' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . '/privacy');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/privacy');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename. '');
            Twitter::setSite('@amanisounds');
            $page_name = 'Terms';
            $Privacy = Privacy::all();
            $page_title = 'Privacy Policy';
            $keywords = 'Bizhub Printer';
            return view('front.privacy', compact('page_title', 'Privacy', 'page_name','keywords'));
        }
    }



    public function copyright()
    {
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Copyright Statement | ' . $Settings->sitename . '  ');
            SEOMeta::setDescription('Fixtech Printer Solutions Copyrights' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . '/copyright');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/copyright');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename. '');
            Twitter::setSite('@amanisounds');
            $page_name = 'Terms';
            $Copyright = DB::table('copyright')->get();
            $page_title = 'Copyright Statement';
            $keywords = 'Bizhub Printer';
            return view('front.copyright', compact('page_title', 'keywords','Copyright', 'page_name'));
        }
    }

    public function services()
    {
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Our Services | ' . $Settings->sitename . '');
            SEOMeta::setDescription('Bizhub Printer Installation, ' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . '/our-services');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/our-services');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename. '');
            Twitter::setSite('@amanisounds');
            $page_name = 'Services';
            $Services = Services::all();
            $page_title = 'Our Services';
            $keywords = 'Bizhub Printer installations';
            return view('front.services', compact('Services', 'page_title', 'page_name','keywords'));
        }
    }

    public function subscribe(Request $request)
    {
        $FindMail = DB::table('subscribers')->where('email', $request->email)->get();
        $Countmails = count($FindMail);
        if ($Countmails == 0) {
            $email = $request->email;
            $Subscriber = new Subscriber;
            $Subscriber->email = $email;
            $Subscriber->save();
            $results = "You have successfully subscribed to our news letters";
            ReplyMessage::notification($email);
            return $results;

        } else {
            $results =  "You are already in our subscribers list thank you for staying with us";

            return $results;

        }


    }
    public function request_quote()
    {
        $page_title = 'Request Quote';
        $SiteSettings = DB::table('sitesettings')->get();
        return view('front.request_quote', compact('page_title', 'SiteSettings'));
    }
    public function servicerequest($id)
    {
        $page_title = 'Order Service';
        $Pricings = DB::table('pricing')->where('id', $id)->get();
        return view('front.servicerequest', compact('page_title', 'Pricings'));
    }

    public function service_request(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $id = $request->id;
        $service = $request->service;
        $price = $request->price;
        $content = $request->content;
        $budget = $request->budget;

        $ServiceRequest = new ServiceRequest;
        $ServiceRequest->name = $name;
        $ServiceRequest->email = $email;
        $ServiceRequest->serviceID = $id;
        $ServiceRequest->service = $service;
        $ServiceRequest->content = $content;
        $ServiceRequest->price = $price;
        $ServiceRequest->budget = $budget;
        $ServiceRequest->save();
        ReplyMessage::mailrequest($name, $email, $service, $price, $content, $budget);
        return "Your Request Has Been Received,If we dont respond within an hour kindly contact us through our contact form,call us or use the live chat";
    }

    public function checkEmail(Request $request)
    {
        $email = $request->input('email');
        $isExists = \App\User::where('email', $email)->first();
        //Create The Logics To return AJAX
        if($isExists){
            return response()->json(array("exists" => true));
        }else{
            return response()->json(array("exists" => false));
        }
    }

    public function getQuote(Request $request)
    {

        $name = $request->name;
        $email = $request->email;
        $phone = $request->mobile;
        $subject = "Quote Request";
        $content = $request->message;
        $Quote = new Quote;
        $Quote->name = $name;

        $Quote->email = $email;
        $Quote->mobile = $phone;
        $Quote->content = $content;
        $Quote->save();
        //Add Notification

        $Notifications = new Notifications;
        $Notifications->type = 'Quote';
        $Notifications->content = 'You have a new Quote Request';
        $Notifications->save();
        $theMessage = "Hi admin, This is a Quote Request From, $name with email: $email and Phone Number: $phone the message is: $content ";
        ReplyMessage::mailNotificaton($name, $email, $subject, $theMessage);
        Session::flash('message', "Your Quote Has Been Posted");
        return Redirect::back();

    }

    public function searchsiteget(Request $request)
    {
        $keywords = '';
        $category = $request->category;
        $search = $request->keyword;
        $search = Input::get('keyword');


                $Products = DB::table('product')->where('name', 'like', '%' . $request->keyword . '%')->orWhere('code', 'like', '%' . $request->keyword . '%')->paginate(100);
                $page_name = $request->keyword;
                $page_title = $request->keyword;
                $search_results = $search;
                $search_results_category = 'All Categories';

                $SEOSettings = DB::table('seosettings')->get();
                foreach ($SEOSettings as $Settings) {
                    SEOMeta::setTitle('Search Results | ' . $Settings->sitename .'');
                    SEOMeta::setDescription('Pioneer Car Speakers, Sony Car Speakers, Kenwood Car speakers, Kenwood speakers, Sony Speakers' . $Settings->welcome . '');
                    SEOMeta::setCanonical('' . $Settings->url . '/search-results?keyword=/'.$search_results_category.'');
                    OpenGraph::setDescription('' . $Settings->welcome . '');
                    OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
                    OpenGraph::setUrl('' . $Settings->url . '/search-results?keyword=/'.$search_results_category.'');
                    OpenGraph::addProperty('type', 'website');
                    Twitter::setTitle('' . $Settings->sitename. '');
                    Twitter::setSite('@amanisounds');
                    $ProductsCategory = DB::table('category')->where('cat', 'like', '%' . $request->keyword . '%')->limit(1)->get();
                    $ProductsTag = DB::table('tags')->where('title', 'like', '%' . $request->keyword . '%')->limit(1)->get();
                    $ProductsBrand = DB::table('brands')->where('name', 'like', '%' . $request->keyword . '%')->limit(1)->get();

                    // Call Route
                    // return redirect()->route('search-results', ['ProductsTag'=>$ProductsTag,'ProductsBrand'=>$ProductsBrand,'ProductsCategory'=>$ProductsCategory]);

                    if($ProductsCategory->isEmpty() && $ProductsBrand->isEmpty())
                    {
                        return view('front.search', compact('ProductsCategory','ProductsTag','ProductsBrand','page_title','keywords', 'Products', 'page_name', 'search_results', 'search_results_category','search'));
                    }
                    elseif($ProductsBrand->isEmpty() && !empty($ProductsCategory) )
                    {
                        foreach($ProductsCategory as $ProductsWithCategory){
                            $ProductWithBrandAndCategory = DB::table('product')->where('cat',$ProductsWithCategory->id)->get();
                            $data = $Products->merge($ProductWithBrandAndCategory)->unique();
                            return view('front.searcher', compact('data','ProductsCategory','ProductsTag','ProductsBrand','page_title','keywords', 'Products', 'page_name', 'search_results', 'search_results_category','search'));
                        }

                    }
                    elseif(!empty($ProductsBrand) && $ProductsCategory->isEmpty())
                    {

                        foreach($ProductsBrand as $ProductsBrand){
                            if($ProductsCategory->isEmpty()){
                                $ProductWithBrandAndCategory = DB::table('product')->where('brand',$ProductsBrand->name)->get();
                                $data = $Products->merge($ProductWithBrandAndCategory)->unique();
                                return view('front.searcher', compact('data','ProductsCategory','ProductsTag','ProductsBrand','page_title','keywords', 'Products', 'page_name', 'search_results', 'search_results_category','search'));

                            }else{
                                foreach($ProductsCategory as $ProductsWithCategory){

                                    $ProductWithBrandAndCategory = DB::table('product')->where('brand',$ProductsBrand->name)->where('cat',$ProductsWithCategory->id)->get();
                                    $data = $Products->merge($ProductWithBrandAndCategory)->unique();
                                    var_dump($data);
                                    return view('front.searcher', compact('data','ProductsCategory','ProductsTag','ProductsBrand','page_title','keywords', 'Products', 'page_name', 'search_results', 'search_results_category','search'));
                                }
                            }

                        }

                    }
                    elseif(!empty($ProductsCategory) && $ProductsBrand->isEmpty())
                    {


                                foreach($ProductsCategory as $ProductsWithCategory){
                                    $ProductWithBrandAndCategory = DB::table('product')->where('cat',$ProductsWithCategory->id)->get();
                                    $data = $Products->merge($ProductWithBrandAndCategory)->unique();
                                    var_dump($data);
                                    return view('front.searcher', compact('data','ProductsCategory','ProductsTag','ProductsBrand','page_title','keywords', 'Products', 'page_name', 'search_results', 'search_results_category','search'));
                                }
                    }
                    else
                    {
                        return view('front.search', compact('ProductsCategory','ProductsTag','ProductsBrand','page_title','keywords', 'Products', 'page_name', 'search_results', 'search_results_category','search'));
                    }




        }


    }


    public function searchsite(Request $request)
    {
        $keywords = '';
        $category = $request->category;
        $search = $request->search;
            if($category == '0'){
                $Products = DB::table('product')->where('name', 'like', '%' . $request->search . '%')->paginate(100);
                $page_name = $request->search;
                $page_title = $request->search;
                $search_results = $search;
                $search_results_category = 'All Categories';
                $SEOSettings = DB::table('seosettings')->get();
                foreach ($SEOSettings as $Settings) {
                    SEOMeta::setTitle('Our Products | ' . $Settings->sitename .'');
                    SEOMeta::setDescription('Pioneer Car Speakers, Sony Car Speakers, Kenwood Car speakers, Kenwood speakers, Sony Speakers' . $Settings->welcome . '');
                    SEOMeta::setCanonical('' . $Settings->url . '/searchsite/'.$search_results_category.'');
                    OpenGraph::setDescription('' . $Settings->welcome . '');
                    OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
                    OpenGraph::setUrl('' . $Settings->url . '/products/grid');
                    OpenGraph::addProperty('type', 'website');
                    Twitter::setTitle('' . $Settings->sitename. '');
                    Twitter::setSite('@amanisounds');
                    $ProductsCategory = DB::table('category')->where('keywords', 'like', '%' . $request->search . '%')->limit(4)->get();
                    $ProductsTag = DB::table('tags')->where('title', 'like', '%' . $request->search . '%')->limit(1)->get();
                    $ProductsBrand = DB::table('brands')->where('name', 'like', '%' . $request->search . '%')->limit(1)->get();

                    // Call Route
                    // return redirect()->route('search-results', ['ProductsTag'=>$ProductsTag,'ProductsBrand'=>$ProductsBrand,'ProductsCategory'=>$ProductsCategory]);

                    return view('front.search', compact('ProductsCategory','ProductsTag','ProductsBrand','page_title','keywords', 'Products', 'page_name', 'search_results', 'search_results_category','search'));

            }
        }


    }



    public function grid(){
        Session::forget('Category');
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Our Products | ' . $Settings->sitename .'');
            SEOMeta::setDescription('Pioneer Car Speakers, Sony Car Speakers, Kenwood Car speakers, Kenwood speakers, Sony Speakers' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . '/products/grid');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/products/grid');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename. '');
            Twitter::setSite('@amanisounds');
            $page_name = 'Products';
            $search_results ='';
            $search_results_category = '';
            $page_title = 'Products';
            $Products = DB::table('product')->inRandomOrder()->paginate(15);
            $keywords = 'Sony Car Tweeters, Sony Car Ampifires, Kenwood Car Speakers, Kenwood Car Subwoofers, Sony car Subwoofers';
            return view('front.grid', compact('keywords','page_title', 'Products', 'page_name', 'search_results', 'search_results_category'));
        }

    }


    public function specialoffers(){
        Session::forget('Category');
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Special Offers | ' . $Settings->sitename .'');
            SEOMeta::setDescription('Fixtech Printer Solutions Special Offers Car Entertainment Systems');
            SEOMeta::setCanonical('' . $Settings->url . '/special-offers');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/special-offers');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename. '');
            Twitter::setSite('@amanisounds');
            $page_name = 'Products';
            $Copyright = DB::table('copyright')->get();
            $page_title = 'Products';
            $search_results ='';
            $search_results_category = '';
            $Products = DB::table('product')->where('offer','1')->OrderBy('id','DESC')->paginate(20);
            $keywords = 'Sony Car Tweeters, Sony Car Ampifires, Kenwood Car Speakers, Kenwood Car Subwoofers, Sony car Subwoofers';
            return view('front.special-offers', compact('keywords','page_title', 'Products', 'page_name', 'search_results', 'search_results_category'));
        }

    }
    public function products(){
        Session::forget('Category');
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Products | ' . $Settings->sitename .'');
            SEOMeta::setDescription('Pioneer Car Speakers, Sony Car Speakers, Kenwood Car speakers, Kenwood speakers, Sony Speakers' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . '/products');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/products');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename. '');
            Twitter::setSite('@amanisounds');
            $page_name = 'Products';
            $Copyright = DB::table('copyright')->get();
            $page_title = 'Products';
            $search_results ='';
            $search_results_category = '';
            $Products = DB::table('product')->OrderBy('id','DESC')->paginate(64);
            $keywords = 'Sony Car Tweeters, Sony Car Ampifires, Kenwood Car Speakers, Kenwood Car Subwoofers, Sony car Subwoofers';
            return view('front.products', compact('keywords','page_title', 'Products', 'page_name', 'search_results', 'search_results_category'));
        }

    }

    public function portfolio(){

        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Our Work | ' . $Settings->sitename .'');
            SEOMeta::setDescription('Sony Car Speakers, Kenwood Car speakers, Pioneer Car Speakers,   Sony Speakers' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . '/our-portfolio');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/products');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename. '');
            Twitter::setSite('@amanisounds');
            $page_name = 'Products';
            $Copyright = DB::table('copyright')->get();
            $page_title = 'Portfolio';
            $search_results ='';
            $search_results_category = '';
            $Products = DB::table('portfolio')->OrderBy('id','DESC')->paginate(18);
            $keywords = 'Sony Car Tweeters, Sony Car Ampifires, Kenwood Car Speakers, Kenwood Car Subwoofers, Sony car Subwoofers';
            return view('front.portfolio', compact('keywords','page_title', 'Products', 'page_name', 'search_results', 'search_results_category'));
        }

    }




    public function product($title){
        Session::forget('Category');
        $SEOSettings = DB::table('seosettings')->get();
        $Products = DB::table('product')->where('slung',$title)->get();
        foreach ($Products as $key => $value) {
            foreach ($SEOSettings as $Settings) {
                SEOMeta::setTitle(' '.$value->name.' | ' . $Settings->sitename .'');
                SEOMeta::setDescription(''.$value->meta.'');
                SEOMeta::setCanonical('' . $Settings->url . '/product/'.$title.'');
                OpenGraph::setDescription(''.$value->meta.'');
                OpenGraph::setTitle(' '.$value->name.' | ' . $Settings->sitename .'');
                OpenGraph::setUrl('' . $Settings->url . '/product/'.$title.'');
                OpenGraph::addProperty('type', 'product.item');
                Twitter::setTitle('' . $Settings->sitename. '');
                Twitter::setSite('@amanisounds');
                $page_name = 'details';
                $Copyright = DB::table('copyright')->get();
                $page_title = $title;
                $Products = DB::table('product')->where('slung',$title)->get();
                $keywords = $value->name;
                return view('front.product', compact('keywords','page_title', 'Products', 'page_name'));
            }
        }


    }

    public function loadModal($id){

       $user = Product::find($id);
       $csfr = csrf_field();
       $url = url('/');
       $htmlFormated = "
       <div class='col-lg-5 col-md-6 col-sm-6'>
       <!-- Product Details Left -->
           <div class='product-details-left'>
               <div class='product-details-images slider-navigation-1'>
                   <div class='lg-image'>
                       <img src='$url/uploads/product/$user->image_one' alt='$user->name'>
                   </div>


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
                       <form action='$url/cart/addToTheCart/$user->id' class='cart-quantity' method='post'>
                       $csfr

                           <div class='quantity'>
                               <label>Quantity</label>
                               <div class='cart-plus-minus'>
                                   <input class='cart-plus-minus-box' name='qty' value='1' type='text'>
                                   <div class='dec qtybutton'><i class='fa fa-angle-down'></i></div>
                                   <div class='inc qtybutton'><i class='fa fa-angle-up'></i></div>
                               </div>
                           </div>
                           <button class='add-to-cart' type='submit'>Buy Now</button>
                       </form>
                   </div>

               </div>
           </div>
       </div>
       ";
       return $htmlFormated;

       //return view('front.modal',['data'=>$user]);

    }



    public function fullPackages(){
        Session::forget('Category');
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Products | ' . $Settings->sitename .'');
            SEOMeta::setDescription('Pioneer Car Speakers, Sony Car Speakers, Kenwood Car speakers, Kenwood speakers, Sony Speakers' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . '/products');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/products');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename. '');
            Twitter::setSite('@amanisounds');
            $page_name = 'Products';
            $Copyright = DB::table('copyright')->get();
            $page_title = 'Products';
            $search_results ='';
            $search_results_category = '';
            $Products = DB::table('product')->where('full','1')->inRandomOrder()->paginate(15);
            $keywords = 'Sony Car Tweeters, Sony Car Ampifires, Kenwood Car Speakers, Kenwood Car Subwoofers, Sony car Subwoofers';
            return view('front.productsFull', compact('keywords','page_title', 'Products', 'page_name', 'search_results', 'search_results_category'));
        }

    }


    public function fullPackage($title){
        Session::forget('Category');
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle(' '.$title.' | ' . $Settings->sitename .'');
            SEOMeta::setDescription('kenwood Speakers in kenya, Sony Speakers in kenya, '.$title.' ' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . '/product/'.$title.'');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/product/'.$title.'');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename. '');
            Twitter::setSite('@amanisounds');
            $page_name = 'details';
            $Copyright = DB::table('copyright')->get();
            $page_title = $title;
            $Products = DB::table('product')->where('name',$title)->get();
            $keywords = $title;
            return view('front.product', compact('keywords','page_title', 'Products', 'page_name'));
        }

    }



    public function code($code){
        Session::forget('Category');
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle(' '.$code.' | ' . $Settings->sitename .'');
            SEOMeta::setDescription('kenwood Speakers in kenya, Sony Speakers in kenya, '.$code.' ' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . '/'.$code.'');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/'.$code.'');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename. '');
            Twitter::setSite('@amanisounds');
            $page_name = 'details';
            $Copyright = DB::table('copyright')->get();
            $page_title = $code;
            $Products = DB::table('product')->where('code',$code)->get();
            $keywords = $code;
            return view('front.product', compact('keywords','page_title', 'Products', 'page_name'));
        }

    }



    public function commingsoon()
    {
        $page_title = 'We will be Back Shortly';
        $page_name = 'We will be Back Shortly';
        return view('front.commingsoon', compact('page_title', 'page_name'));
    }
    public function submitMessage(Request $request)
    {


        if ($request->faxonly) {
            Session::flash('message', "Your Message Has Been Sent");
            return Redirect::back();
        }else{
            $email = $request->email;
            $name = $request->name;
            $phone = $request->phone;
            $message = $request->message;
            $subject = $request->subject;



            $Message = new Message;
            $Message->name = $name;
            $Message->email = $email;
            $Message->mobile = $phone;
            $Message->subject = $subject;
            $Message->content = $message;

             //Send Mail Notification
             ReplyMessage::mailNotificaton($name, $email, $subject, $message);


            $Message->save();
            $Notifications = new Notifications;
            $Notifications->type = 'Message';
            $Notifications->content = 'You have a new Message';
            $Notifications->save();

            Session::flash('message', "Your Message Has Been Sent");
            return Redirect::back();
        }


    }

    public function quote()
    {
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Request Quote | ' . $Settings->sitename . ' - ' . $Settings->intro . ' ');
            SEOMeta::setDescription('' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . '/quote');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/quote');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename. '');
            Twitter::setSite('@amanisounds');
            $page_title = 'Get Quote';
            $page_name = 'Get a Quote';
            return view('front.quote', compact('page_title', 'page_name'));
        }
    }
    public function who()
    {
        $SEOSettings = DB::table('seosettings')->get();
        $page_name = 'What we do';
        $Action = DB::table('actions')->get();
        $page_title = 'What we do';
        $page_titleSEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('What we do | ' . $Settings->sitename . ' - ' . $Settings->intro . ' ');
            SEOMeta::setDescription('' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . '/' . $page_title . '');

            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/who');
            OpenGraph::addProperty('type', 'website');

            Twitter::setTitle('' . $Settings->sitename. '');
            Twitter::setSite('@amanisounds');

            return view('front.who', compact('page_title', 'page_name','Action'));
        }
    }

    public function version(){

        return view('version',compact('page_title','page_name'));
    }

    public function rfp(){
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Submit RFP | ' . $Settings->sitename . ' - ' . $Settings->intro . ' ');
            SEOMeta::setDescription('' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . '/rfp');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/rfp');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename. '');
            Twitter::setSite('@amanisounds');
            $page_title = 'Submit RFP';
            $page_name = 'Submit RFP';
            return view('front.rfp', compact('page_title', 'page_name'));
        }
    }

    public function post_rfp(Request $request){
        // Get Form Data
        $fname = $request->fname;
        $lname = $request->lname;
        $email = $request->email;
        $phone = $request->phone;
        $message = $request->message;

        // Upload
        $path = 'uploads/RFP';
        if(isset($request->file)){
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
            $rfp_file = $filename;
        }else{
            $rfp_file = $request->logo_cheat;
        }

        // Save
        $RFP = new RFP;
        $RFP->fname = $fname;
        $RFP->lname = $lname;
        $RFP->email = $email;
        $RFP->phone = $phone;
        $RFP->message =  $message;
        $RFP->file = $rfp_file;
        // Email Stagepass
        ReplyMessage::sendrfp($fname,$email,$phone,$message,$phone);

        // Redirect
        Session::flash('message', "Your Info Has Been Received");
        return Redirect::back();
    }

    public function gallery(){
        $SEOSettings = DB::table('seosettings')->get();
        $page_name = 'Gallery';
        $page_title = 'Gallery';
        $Gallery = DB::table('gallery')->paginate(12);
        $page_titleSEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle('Gallery | ' . $Settings->sitename . ' - ' . $Settings->intro . ' ');
            SEOMeta::setDescription('' . $Settings->welcome . '');
            SEOMeta::setCanonical('gallery' . $Settings->url . '/' . $page_title . '');

            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/gallery');
            OpenGraph::addProperty('type', 'website');

            Twitter::setTitle('' . $Settings->sitename. '');
            Twitter::setSite('@amanisounds');

            return view('front.gallery', compact('page_title', 'page_name','Gallery'));
        }
    }

    public function brand($title){
        Session::forget('Category');
        $SEOSettings = DB::table('seosettings')->get();
        foreach ($SEOSettings as $Settings) {
            SEOMeta::setTitle(' '.$title.' | ' . $Settings->sitename .'');
            SEOMeta::setDescription('JVC speakers, Pioneer amplifires, Sony , Kenwood ' . $Settings->welcome . '');
            SEOMeta::setCanonical('' . $Settings->url . '/products/brand/'.$title.'');
            OpenGraph::setDescription('' . $Settings->welcome . '');
            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
            OpenGraph::setUrl('' . $Settings->url . '/product/brand/');
            OpenGraph::addProperty('type', 'website');
            Twitter::setTitle('' . $Settings->sitename. '');
            Twitter::setSite('@amanisounds');
            $page_name = $title;

            $page_title = 'Products';
            $search_results ='';
            $search_results_category = '';
            $Products = DB::table('product')->where('brand',$title)->paginate(24);
            $keywords = $title;
            return view('front.productss', compact('keywords','page_title', 'Products', 'page_name','search_results','search_results_category'));
    }
}
            public function cat($title){
                Session::forget('Category');
                $Category = DB::table('category')->where('cat',$title)->get();
                $page_name = $title;
                    foreach ($Category as $key => $value) {
                        $SEOSettings = DB::table('seosettings')->get();
                        foreach ($SEOSettings as $Settings) {
                            SEOMeta::setTitle(' '.$page_name.' | ' . $Settings->sitename .'');
                            SEOMeta::setDescription(''.$title.'' . $Settings->welcome . '');
                            SEOMeta::setCanonical('' . $Settings->url . '/product/cat/'.$title.'');
                            OpenGraph::setDescription('' . $Settings->welcome . '');
                            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
                            OpenGraph::setUrl('' . $Settings->url . '/product/cat/');
                            OpenGraph::addProperty('type', 'website');
                            Twitter::setTitle('' . $Settings->sitename. '');
                            Twitter::setSite('@amanisounds');
                            // Set Session Here
                            Session::put('Category', $title);
                            // End Session Here
                            $page_name = $title;

                            $page_title = 'Products';
                            $search_results ='';
                            $search_results_category = '';
                            $keywords = $title;
                            $Products = DB::table('product')->where('cat',$value->id)->paginate(12);
                            return view('front.products', compact('keywords','page_title', 'Products', 'page_name','search_results','search_results_category'));
                    }
                }



            }


            public function product_tags($slung){

                $Category = DB::table('tags')->where('slung',$slung)->get();
                    foreach ($Category as $key => $value) {
                        $page_name = $value->title;
                        $SEOSettings = DB::table('seosettings')->get();
                        foreach ($SEOSettings as $Settings) {
                            SEOMeta::setTitle(' '.$value->title.'  | ' . $Settings->sitename .'');
                            SEOMeta::setDescription(''.$value->title.' '.$value->keywords.'');
                            SEOMeta::setCanonical('' . $Settings->url . '/product-tags/'.$slung.'');
                            OpenGraph::setDescription('' . $value->title . '');
                            OpenGraph::setTitle('' . $value->title . '');
                            OpenGraph::setUrl('' . $Settings->url . '/product-tags/'.$slung.'');
                            OpenGraph::addProperty('type', 'website');
                            Twitter::setTitle('' . $Settings->sitename. '');
                            Twitter::setSite('@amanisounds');
                            // Set Session Here

                            // End Session Here
                            $page_name = $value->title;

                            $page_title = 'Products';
                            $search_results ='';
                            $search_results_category = '';
                            $keywords = "$value->title, $value->keywords";
                            $Products = DB::table('product')->where('tag',$value->id)->paginate(12);
                            return view('front.tags', compact('Category','keywords','page_title', 'Products', 'page_name','search_results','search_results_category'));
                    }
                }
            }

            public function productss($titlee){
                $title = str_replace('-', ' ', $titlee);
                Session::forget('Category');
                $Category = DB::table('category')->where('slung',$titlee)->get();
                $page_name = $title;
                    foreach ($Category as $key => $value) {
                        $page_name = $value->cat;
                        $SEOSettings = DB::table('seosettings')->get();
                        foreach ($SEOSettings as $Settings) {
                            SEOMeta::setTitle(' '.$value->cat.'  | ' . $Settings->sitename .'');
                            SEOMeta::setDescription(''.$value->cat.' '.$value->keywords.'');
                            SEOMeta::setCanonical('' . $Settings->url . '/producta/'.$titlee.'');
                            OpenGraph::setDescription('' . $value->cat . '');
                            OpenGraph::setTitle('' . $value->cat . '');
                            OpenGraph::setUrl('' . $Settings->url . '/product/cat/');
                            OpenGraph::addProperty('type', 'website');
                            Twitter::setTitle('' . $Settings->sitename. '');
                            Twitter::setSite('@amanisounds');
                            // Set Session Here
                            Session::put('Category', $title);
                            // End Session Here
                            $page_name = $title;

                            $page_title = 'Products';
                            $search_results ='';
                            $search_results_category = '';
                            $keywords = "$title, $value->keywords";
                            $Products = DB::table('product')->where('cat',$value->id)->paginate(24);
                            return view('front.productss', compact('keywords','page_title', 'Products', 'page_name','search_results','search_results_category'));
                    }
                }



            }



            public function catt($titlee){
                $title = str_replace("-", " ", $titlee);
                Session::forget('Category');
                // UnSetting a Session
                $Category = DB::table('category')->where('cat',$title)->get();
                    foreach ($Category as $key => $value) {
                        $SEOSettings = DB::table('seosettings')->get();
                        foreach ($SEOSettings as $Settings) {
                            SEOMeta::setTitle(' '.$title.' | ' . $Settings->sitename .'');
                            SEOMeta::setDescription(''.$title.'' . $Settings->welcome . '');
                            SEOMeta::setCanonical('' . $Settings->url . '/product/cat/'.$title.'');
                            OpenGraph::setDescription('' . $Settings->welcome . '');
                            OpenGraph::setTitle('' . $Settings->sitename . ' - ' . $Settings->welcome . '');
                            OpenGraph::setUrl('' . $Settings->url . '/product/cat/');
                            OpenGraph::addProperty('type', 'website');
                            Twitter::setTitle('' . $Settings->sitename. '');
                            Twitter::setSite('@amanisounds');
                            // Set Session Here
                            Session::put('Category', $title);
                            // End Session Here
                            $page_name = $title;


                            $page_title = 'Products';
                            $search_results ='';
                            $search_results_category = '';
                            $keywords = $title;
                            $Products = DB::table('product')->where('cat',$value->id)->paginate(12);
                            return view('front.products', compact('keywords','page_title', 'Products', 'page_name','search_results','search_results_category'));
                    }
                }



            }


            public function search(Request $request)
            {
            if($request->search == null or $request->search == ''){
                $output = '';
                return Response($output);
            }else
                $url = url('/product-tags/');
                if($request->ajax())
                {
                $output="";
                $products=DB::table('tags')->where('title','LIKE','%'.$request->search."%")->paginate(10);
                if($products)
                {
                foreach ($products as $key => $product) {
                $output.='<tr>'.

                '<td><a href="'.$url.'/'.$product->slung.'"><b>'.$product->title.'</b></a></td>'.

                '</tr>';
                }
                return Response($output);
                    }
                    }
            }


public function escrow(Request $request){
    // $content=json_decode($request->getContent(), true);
    // dd($content);
    dd($request->all());
}



}
