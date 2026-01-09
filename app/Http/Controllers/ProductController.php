<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct(Request $req)
    {
        $formFields = $req->validate([
            "product_name" => ['required','min:3','max:50'],
            "product_sku" => ['required','min:10','max:20'],
            "product_description" => ['required','min:20','max:500'],
            "main_price" => ['required','min:1000','max:100000','integer'],
            "compare_price" => ['required','min:1000','max:100000','integer'],
            "stock" => ['required','integer'],
            "product_image" => ['required','image','mimes:jpg,jpeg,png,webp'],
            "category" => ['required'],
            "status" => ['required'],
        ]);

        // Store image correctly
        $formFields['product_image'] =
            $req->file('product_image')->store('product_images', 'public');

        Products::create($formFields);

       return back()->with('message','Product added successfully!');
    }







    // get the data
    public function getProducts()
{
    $products = Products::all();
    return view('welcome', compact('products'));
}


public function getreleventProducts($category){
    $releventProducts = Products::where('category' ,$category)->get();
    return view('pages.users.category-page',compact('releventProducts'));
    
}

public function getSingleProduct($id){
    $singleProduct = Products::find($id);
    return view('pages.users.checkout',compact('singleProduct'));
}


}
