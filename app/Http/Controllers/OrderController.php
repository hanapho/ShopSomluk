<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('order.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::find($id);
        $order_details = OrderDetail::where('order_id', $id)->get();

        return view('order.show', compact('order', 'order_details'));
    }

    public function cancel(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = 'ยกเลิก';
        $order->save();

        return back()->with('success', 'ยกเลิกออเดอร์สำเร็จ');
    }
}
