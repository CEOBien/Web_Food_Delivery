<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        $categorys = Category::where('parent_id', 0)->get();
        $products = Product::take(6)->get();//take dung de lay san pham
        $productsRecommend = Product::latest('view_count', 'desc')->take(9)->get();
        $categorysLimit = Category::where('parent_id', 0)->take(3)->get();
        return view('home.home', compact('sliders', 'categorys', 'products', 'productsRecommend', 'categorysLimit'));
    }
  
}
