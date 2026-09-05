<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;      // ✅ fixed
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getMyOrders(){
        // Auth::user()->id(orignakl)
        $user_id = Auth::id();
        $myOrders = Order::where('user_id', $user_id)->get();

        return view('pages.seller.proceed-out', compact('myOrders'));
    }




   public function addShippingAddress(Request $req)
{
    $formFields = $req->validate([
        "first_name"      => ['required', 'string', 'max:255'],
        "last_name"       => ['required', 'string', 'max:255'],
        "phone"           => ['required'],
        "city"            => ['required'],
        "house_no"        => ['required'],
        "address"         => ['required'],
        "shipping_method" => ['required'],
    ]);

    // Add user_id automatically
    $formFields['user_id'] = Auth::id();

    // Save record
    Order::create($formFields);

    return redirect('/')->with('message', 'Order Placed Successfully!');
}


}
