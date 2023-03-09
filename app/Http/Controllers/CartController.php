<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', '=', Auth::user()->id)->get();
        return view('cart', compact('carts'));
    }

    public function create(Request $request)
    {
        if (auth()->check() == false) {
            return redirect()->route('login');
        }

        $cart = Cart::where('product_id', '=', $request->id)->count();
        if ($cart == 0) {
            $cart = new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->product_id = $request->id;
            $cart->qty = 1;
            $cart->save();
        } else {
            Cart::where('product_id', '=', $request->id)
                ->increment('qty', 1);
        }

        return back();
    }

    public function update(Request $request, $id)
    {
        Cart::where('id', '=', $id)
            ->update([
                'qty' => $request->qty
            ]);

        return back()->with('success', 'แก้ไขข้อมูลสำเร็จ');
    }

    public function remove($id)
    {
        Cart::findOrFail($id)->delete();

        return back()->with('success', 'ลบข้อมูลสำเร็จ');
    }
}
