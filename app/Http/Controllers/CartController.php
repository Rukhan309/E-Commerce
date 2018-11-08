<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request) {
        $product = Product::find($request->product_id);
        Cart::add([
            'id' => $product->id,
            'name' => $product->product_name,
            'price' => $product->product_price,
            'qty' => $request->qty,
            'options' => [
                'image' =>$product->product_image
            ]
        ]);
        return redirect('/show-cart');
    }

    public function showCart() {
        $cartProducts = Cart::content();
        return view('front-end.cart.show-cart', ['cartProducts'=>$cartProducts]);
    }
    public function deleteCartProduct($rowId) {
        Cart::remove($rowId);
        return redirect('/show-cart');
    }
    public function updateCartProduct(Request $request) {
        Cart::update($request->row_id, $request->qty);
        return redirect('/show-cart');
    }










}
