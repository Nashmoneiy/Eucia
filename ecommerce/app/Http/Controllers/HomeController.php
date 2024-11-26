<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::where('status', '1')->get();
        $categories = Category::all();
        $trendings = Product::where('trending', '1')->latest()->take(6)->get();
        $newArrivals = Product::latest()->take(4)->get();
        return view('frontend.index', compact('sliders','categories','trendings','newArrivals'));
    }
    function adminHome(){
        return view('admin-home');
    }
}
