<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Storage;

class CheckoutController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', '=', Auth::user()->id)->get();
        return view('checkout', compact('carts'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'slip' => 'required',
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->address = $request->address;
        $user->save();

        $order = new Order();
        $order->slip = Storage::disk('public')->put('product', $request->file('slip'));
        $order->track_id = '';
        $order->status = 'รอชำระเงิน';
        $order->user_id = Auth::user()->id;
        $order->save();

        $carts = Cart::where('user_id', Auth::user()->id)
            ->get();

        foreach ($carts as $cart) {
            $order_detail = new OrderDetail();
            $order_detail->name = $cart->product->name;
            $order_detail->price = $cart->product->price;
            $order_detail->category = $cart->product->category->name;
            $order_detail->qty = $cart->qty;
            $order_detail->product_id = $cart->product->id;
            $order_detail->order_id = $order->id;
            $order_detail->save();
        }

        Cart::where('user_id', Auth::user()->id)->delete();

        return redirect()->route('order.show', $order->id);
    }
}
