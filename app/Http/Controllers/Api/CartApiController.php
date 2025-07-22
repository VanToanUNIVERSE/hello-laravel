<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use Illuminate\Http\Request;

class CartApiController extends Controller
{
    function changeQuantity(Request $request)
    {
        $cart = session()->get('cart', []);
        $cart[$request->id]['quantity'] = $request->quantity;
        session()->put('cart', $cart);
        $totalPrice = 0;
        foreach($cart as $cartItem)
        {
            $totalPrice += $cartItem['quantity'] * $cartItem['price'];
        }
        
       
        return response()->json(['cart' => $cart, 'totalPrice' => $totalPrice]);
    }
}
