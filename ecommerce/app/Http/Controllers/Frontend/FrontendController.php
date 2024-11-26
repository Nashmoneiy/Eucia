<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;


class FrontendController extends Controller
{
    function index(){
        $trendings = Product::where('trending', '1')->latest()->take(6)->get();
        $newArrivals = Product::latest()->take(4)->get();
        $sliders = Slider::where('status', '1')->get();
        return view('frontend.index', compact('sliders', 'trendings', 'newArrivals'));
    }
    function categories(){
        $categories = Category::where('status', '1')->get();
        return view('frontend.collection.category.index', compact('categories'));
    }

    function products(Request $request, $category_slug){
        //dd($request->all());
        
        $category = Category::where('slug',$category_slug)->first();
        $brands = Brand::all();
         
        
        
        if ($category) {    
             $products = $category->products()->get(); 
             $query = Product::query();  

             if(isset($request->brand) && ($request->brand !=null)){
                $query->whereHas('brands', function($q) use($request){
                    $q->whereIn('name', $request->brand);
                    
                });
                $products= $query->get();
             }
             
            
            return view('frontend.collection.category.products.index', compact('products','category','brands'));
        }else {
             return redirect()->back();
        }
    }

    function productView(string $category_slug, string $product_slug){
        $category = Category::where('slug',$category_slug)->first();
        if ($category) {    
            $products = $category->products()->where('slug', $product_slug)->where('status', '1')->first(); 
            if ($products) {
                return view('frontend.collection.category.products.view', compact('products','category'));
            }else {
                return redirect()->back();
           }
            
       }else {
            return redirect()->back();
       }
    }


    function arrival(){
        $newArrivals = Product::latest()->take(4)->get();
        return view('frontend.arrivals', compact('newArrivals'));

    }


    function searchProduct(Request $request) {
        
        if($request->search){
        $searchProduct = Product::where('name','LIKE', '%'.$request->search.'%')->latest()->paginate(15);
        return view('frontend.pages.search',compact('searchProduct'));
    
    }else{
        return redirect()->back()->with('message','Empty Search');
        

    }

  }
}
