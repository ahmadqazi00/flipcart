<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request; 

class CartController extends Controller
{
    public function AddToCart(Request $req){
        $formFields = $req->validate([
            "name" => ['required'],
            "image" => ['required'],
            "price" => ['required'],
            "user_id" => [''],
        ]);

        $formFields['user_id'] = Auth::user()->id;
        CartModel::create($formFields);
        return back()->with('message','Added to cart');
    }

    public function getCartData(){
        $user_id = Auth::user()->id;
        $myCart = CartModel::where('user_id', $user_id)->get();
        return view('pages.users.cart-page', compact('myCart'));
    }   

    public function order(Request $req){    
        $req->validate([
            'name.*' => 'required',
            'price.*' => 'required',
            'image.*' => 'required',
        ]);
        
        foreach($req->name as $index => $item){
            Order::create([
                "name" => $req->name[$index],
                "price" => $req->price[$index],
                "image" => $req->image[$index],
                "user_id" => Auth::user()->id,
            ]);
        }
        
        CartModel::where('user_id', Auth::user()->id)->delete();
        return back()->with('success','Order placed successfully');
    }

    // NEW METHOD: Cart se item remove karne ke liye
    public function removeFromCart($id)
    {
        // Auth check ke sath safe deletion
        $cartItem = CartModel::where('id', $id)
                             ->where('user_id', Auth::user()->id)
                             ->first();

        if ($cartItem) {
            $cartItem->delete();
            return back()->with('message', 'Item removed from cart successfully');
        }

        return back()->with('error', 'Item not found');
    }
}