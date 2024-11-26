<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;




class CartController extends Controller
{
    function index(Request $request) {
        $product_id =  $request->input('product_id');
        $product_qty =  $request->input('product_qty');

        if (Auth::check()) 
        {
            $prod_check = Product::where('id', $product_id)->first();

            if ($prod_check) 
            {

                if(Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists())
                {
                    return response()->json(['status' => "already added to cart"]);
                    
                }
                else
                {
                              
                $cartItem = new Cart();
                $cartItem->prod_id = $product_id;
                $cartItem->user_id = Auth::id();
                $cartItem->prod_qty = $product_qty;
                $cartItem->save();
                return response()->json(['status' => "Added to cart"]);
             }
          }
       }
        else
        {
            return response()->json(['status' => "login to continue"]);
        }

    }

    function cart() {
        $carts = Cart::where('user_id', Auth::id())->get();
        return view('frontend.collection.category.products.cart', compact('carts'));

    }

    function destroy(Request $request) {
        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if(Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
            {
                $cartItem = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => "item removed from cart"]);
            }
        } 
        else
        {
            return response()->json(['status' => "login to continue"]);
        }

    }
    public function update(Request $request) {
        $prod_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');

        if (Auth::check()) {
            if(Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()){
                $cart = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cart->prod_qty = $product_qty;
                $cart->update();
                return response()->json(['status' => "updated"]);

            }
            
        }

    }

    function cartCount() {
        $cartcount = Cart::where('user_id', Auth::id())->count();
        return response()->json(['count' => $cartcount]);
        
    }



}
