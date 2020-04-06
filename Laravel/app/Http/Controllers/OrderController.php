<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::where('status', '<>', 'cart')->get();
        return view('orders.index', compact('orders'));
    }

    public function update(Order $order, Request $request)
    {
        $order->status = $request->status;
        $order->save();

        return redirect()->route('order.index')->withSuccess('Cập nhật thành công');
    }
}
