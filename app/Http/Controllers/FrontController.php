<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    // Get home page
    public function index()
    {
        $latestProducts = Product::orderBy('id', 'DESC')->where('status', 1)->take(8)->get();

        $featuredProducts = Product::orderBy('id', 'DESC')->where('is_featured', 'Yes')->where('status', 1)->take(5)->get();

        $data['latestProducts'] = $latestProducts;
        $data['featuredProducts'] = $featuredProducts;
        return view('frontend.home', $data);
    }
}
