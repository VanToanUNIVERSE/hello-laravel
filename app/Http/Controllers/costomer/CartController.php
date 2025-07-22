<?php

namespace App\Http\Controllers\costomer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_Item;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, Product $product)
    {
       
        $quantity = $request->quantity;

        $cart = session()->get('cart', []);

        if(isset($cart[$product->id]))
        {
            $cart[$product->id]['quantity'] += $quantity;
        }
        else
        {
           $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'image' => $product->image,
                'price' => $product->price,
                'quantity' => $quantity
            ];
        }
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng!');
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('costomer.cart.index', compact('cart'));
    }

    public function removeItem($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
    }

    public function checkout(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Bạn chưa đăng nhập!');
        }
        $order = Order::create([
            'price' => $request->totalPrice,
            'payment_method' => $request->payment_method,
            'payment_status' => 'unpaid',
            'address' => $request->address,
            'phone' => $request->phone,
            'user_id' => Auth::user()->id,
        ]);

        $cart = session()->get('cart', []);
        foreach($cart as $cartItem)
        {
            Order_Item::create([
                'order_id' => $order->id,
                'product_id' => $cartItem['id'],
                'quantity' => $cartItem['quantity']
            ]);
        }
        session()->forget('cart');
        return redirect()->back()->with('success', 'Đặt hàng thành công');
    }
}
