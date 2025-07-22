<?php

namespace App\Http\Controllers\costomer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();       
        $orders = $user->orders;
            // Đếm tổng số đơn đã mua
        $totalOrders = $orders->count();

        // Đếm số đơn chưa giao (status khác 'delivered')
        $undeliveredOrders = $orders->where('status', '!=', 'delivered')->count();
        return view('costomer.profile.index', compact('orders', 'totalOrders', 'undeliveredOrders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::find($id);
        $orderItems = $order->orderItems()->with('product')->get();
        return view('costomer.profile.show', compact('orderItems', 'order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('costomer.profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        if($request->hasFile('image'))
        {
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $fileName);
            $data['image'] = $fileName;
        }
        $user = User::find($id);
        $user->update($data);
        return redirect()->route('costomer.profile.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



}
