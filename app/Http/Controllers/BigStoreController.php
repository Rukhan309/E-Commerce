<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class BigStoreController extends Controller
{
    public function index() {
        $products = Product::orderBy('id', 'desc')->take(8)->get();
        return view('front-end.home.home', ['products'  =>$products]);
    }

    public function categoryProduct($id) {
        $products = Product::where('category_id', $id)
                            ->where('publication_status', 1)
                            ->orderBy('id', 'desc')
                            ->get();

        return view('front-end.category.category', ['products'=>$products]);
    }

    public function productDetails($id) {
        $product = Product::find($id);
        return view('front-end.product.product-details', ['product'=>$product]);
    }



    public function contactUs() {
        return view('front-end.contact.contact');
    }
}






