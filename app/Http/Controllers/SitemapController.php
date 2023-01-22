<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class SitemapController extends Controller
{
    public function index()
    {
        $Product = Product::latest()->get();
        $Category = Category::all();

        return response()->view('sitemap', [
            'Product' => $Product,
            'Category' => $Category,
        ])->header('Content-Type', 'text/xml');
    }
}
