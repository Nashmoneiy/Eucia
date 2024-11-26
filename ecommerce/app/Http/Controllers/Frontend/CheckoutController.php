<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class CheckoutController extends Controller
{
    function index() {
        $oldcartitems = Cart::where('user_id',Auth::id())->get();
        foreach($oldcartitems as $item) {
            if(!Product::where('id', $item->prod_id)->where('quantity', '>=' ,$item->prod_qty)->exists()) {
                  $removeitem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                  $removeitem->delete();
            }
        }
        $cartitems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.checkout.index', compact('cartitems'));
    }

    function placeorder(Request $request,) {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        $total_price = 0;
        foreach($cartitems as $item) {
            $total_price += $item->products->selling_price * $item->prod_qty;
            
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer sk_test_5f51876ef5ba1a3ea542c81b04310311fa8a87ba',
            'Content-Type' => 'application/json'
        ])->post('https://api.paystack.co/transaction/initialize', [
            'email' => 'customer@email.com',
            'amount' => "$total_price",
        ])->json();
        return response()->json([
            'access_code' => 'x4ttu8yr357pl4l',
            
        ]);

/*

        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $request->input('name');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->full_address = $request->input('address');
        $order->state = $request->input('state');
        $order->city = $request->input('city');
        $order->district = $request->input('district');
        $order->tracking_no = 'eucia'.rand(1111,0000);
        $order->save();

        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach($cartitems as $item){
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'quantity' => $item->prod_qty,
                'price' => $item->products->selling_price
            ]);
            $prod = Product::where('id', $item->prod_id)->first();
            $prod->quantity = $prod->quantity - $item->prod_qty;
            $prod->update();
        }
        if (Auth::user()->address == NULL) {
            $user = User::where('id', Auth::id())->first();
            $user->full_name = $request->input('name');
            $user->phone = $request->input('phone');
            
            $user->address = $request->input('address');
            $user->state = $request->input('state');
            $user->city = $request->input('city');
            $user->district = $request->input('district');
            $user->update();
        }
        $cartitems = Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartitems);
        return redirect('/')->with('status', "order placed");
        */


    }
    function paystackcheck(Request $request) {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        $total_price = 0;
        foreach($cartitems as $item) {
            $total_price += $item->products->selling_price * $item->prod_qty;

        }
                $name= $request->input('name');
                $phone=$request->input('phone');
                $email=$request->input('email');
                $address=$request->input('address');
                $state=$request->input('state');
                $city=$request->input('city');
                $district=$request->input('district');

                return response()->json([
                'name'  => $name,
                'phone'  => $phone,
                'email'  => $email,
                'address'  => $address,
                'state'  => $state,
                'city'  => $city,
                'district'  => $district,

                'total_price' => $total_price
                ]);
                
    }
}
