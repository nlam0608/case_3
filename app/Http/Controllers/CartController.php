<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        $oldCart = Session::get('cart');
        return view('admin.cart.index', compact('oldCart'));
    }

    public function addToCart($idProduct)
    {
        $product = Product::findOrFail($idProduct);
        $cart = [
            "items"=>[],
            "totalMoney"=> 0,
            "totalQuantity"=>0
        ];

        $oldCart = Session::get('cart');
        if (!$oldCart){
            Array_push($cart['items'], $product);
            $cart['totalMoney'] += $product->price;
            $cart['totalQuantity'] = 1;
            Session::put('cart', $cart);
        }else{
            array_push($oldCart['items'], $product);
            $oldCart['totalMoney'] += $product->price;
            $oldCart['totalQuantity'] ++;
            Session::put('cart',$oldCart);
        }
        return redirect()->route('orders.index');
    }

    public function remove($index)
    {
        $oldCart = Session::get('cart');
        $productRemove = $oldCart['items'][$index];
        $oldCart['totalQuantity']--;
        $oldCart['totalMoney'] -= $productRemove->price;
        array_splice($oldCart['items'], $index, 1);
        Session::put('cart', $oldCart);
        return back();
    }
}
