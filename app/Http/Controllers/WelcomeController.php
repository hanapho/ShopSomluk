<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Review;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {

            $products = Product::where('name', 'like', '%' . $request->input('search') . '%')->paginate(12);
        } else {
            $products = Product::paginate(12);
        }
        return view('welcome', [
            'products' => $products->appends($request->query())
        ]);
    }

    public function product($id)
    {
        $product = Product::find($id);

        $reviews = Review::where('product_id', $id)
            ->get();

        $r_count = Review::where('product_id', $id)
            ->count();


        return view('product', compact('product', 'reviews', 'r_count'));
    }

    public function review(Request $request, $id)
    {
        $r_count = Review::where('user_id', Auth::user()->id)
            ->where('product_id', $id)
            ->count();

        if ($r_count == 0) {
            $review = new Review();
            $review->message = $request->message;
            $review->rating = $request->rating;
            $review->user_id = Auth::user()->id;
            $review->product_id = $id;
            $review->save();

            return back()->with('success', 'ทำรายการสำเร็จ');
        }

        return back()->with('warning', 'เกิดข้อผิดพลาด');
    }
}
