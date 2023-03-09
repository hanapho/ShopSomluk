<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total = 0;
        $total_day = 0;
        $total_month = 0;
        $total_year = 0;

        $orders = Order::where('status', 'ชำระเงินสำเร็จ')
            ->get();
        foreach ($orders as $order) {
            foreach ($order->detail as $detail) {
                $total += $detail->price * $detail->qty;
            }
        }

        $orders = Order::whereBetween('created_at', [Carbon::now()->subDay(), Carbon::now()])
            ->where('status', 'ชำระเงินสำเร็จ')
            ->get();
        foreach ($orders as $order) {
            foreach ($order->detail as $detail) {
                $total_day += (float)$detail->price * $detail->qty;
            }
        }

        $orders = Order::whereBetween('created_at', [Carbon::now()->subMonth(), Carbon::now()])
            ->where('status', 'ชำระเงินสำเร็จ')
            ->get();
        foreach ($orders as $order) {
            foreach ($order->detail as $detail) {
                $total_month += (float)$detail->price * $detail->qty;
            }
        }

        $orders = Order::whereBetween('created_at', [Carbon::now()->subYear(), Carbon::now()])
            ->where('status', 'ชำระเงินสำเร็จ')
            ->get();
        foreach ($orders as $order) {
            foreach ($order->detail as $detail) {
                $total_year += (float)$detail->price * $detail->qty;
            }
        }

        return view('admin.dashboard', compact('total', 'total_day', 'total_month', 'total_year'));
    }
}
