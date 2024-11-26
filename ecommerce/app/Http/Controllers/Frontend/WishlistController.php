<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\File;




class WishlistController extends Controller
{

    function store(Request $request) {
        $product_id =  $request->input('product_id');
        

        if (Auth::check()) 
        {
            $prod_check = Product::where('id', $product_id)->first();

            if ($prod_check) 
            {

                if(Wishlist::where('product_id', $product_id)->where('user_id', Auth::id())->exists())
                {
                    return response()->json(['status' => "already added to wishlist"]);
                    
                }
                else
                {
                              
                $wishlistItem = new Wishlist();
                $wishlistItem->product_id = $product_id;
                $wishlistItem->user_id = Auth::id();
                
                $wishlistItem->save();
                return response()->json(['status' => "Added to wishlist"]);
             }
          }
       }
        else
        {
            return response()->json(['status' => "login to continue"]);
        }
        
    }




    function index() {
        $wishlists = Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.collection.category.products.wishlist', compact('wishlists'));

    }

    function destroy(Request $request) {
        if (Auth::check()) {
            $product_id = $request->input('product_id');
            
            if(Wishlist::where('product_id', $product_id)->where('user_id', Auth::id())->exists())
            {
                $wishlistItem = Wishlist::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $wishlistItem->delete();
                return response()->json(['status' => "item removed from wishlist"]);
            }
        } 
        else
        {
            return response()->json(['status' => "login to continue"]);
        }

    }


    function wishlistCount() {

        $cartcount =Wishlist:: where('user_id', Auth::id())->count();
        return response()->json(['count'=> $cartcount]);

    }
}
