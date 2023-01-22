<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SitemapController extends Controller
{
    public function index()
    {
        $Product = Product::latest()->get();

        return response()->view('sitemap', [
            'Product' => $Product
        ])->header('Content-Type', 'text/xml');
    }
}
