@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center" style="background-color:   #FF9292;">ตะกร้าสินค้า</div>

                <div class="card-body text-center" style="background-color: #FFDCDC;">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="row">
                        @php
                        $total = 0;
                        @endphp
                        @foreach ($carts as $cart)

                        <div class="col">
                            <br>
                            <img src="{{ asset('storage/' . $cart->product->image) }}" width=240 height=280  alt="...">
                            <br>
                            {{ $cart->product->name }}
                            {{ number_format($cart->product->price, 2) }} ฿

                        </div>

                        <!-- <div class="col-7"> -->

                            <!-- {{ $cart->product->name }}
                            {{ number_format($cart->product->price, 2) }} ฿ -->
                        <!-- </div> -->

                        <div class="col">

                        <br>
                        <br>
                        <form class="form-inline" action="{{ route('cart.update', $cart->id) }}" method="post" style="width: auto;">
                            
                        @csrf
                            @method('patch')
                            <input type="number" name="qty" class="form-control" value="{{ $cart->qty }}">
                            <button class="btn btn-warning" style="font-size: 12px;">แก้ไข</button>
                            &nbsp;
                            <a class="text-white btn btn-danger shadow rounded-full" href="{{ route('cart.remove', $cart->id)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                        </a>
                        <br>
                        รวม: {{ number_format($cart->product->price * $cart->qty, 2) }}฿
                            
                        </form>
                        <!-- <div class="col-6"> -->
                            <!-- <h6>รวม: {{ number_format($cart->product->price * $cart->qty, 2) }}฿</h6> -->
                        </div>

                        @php
                        $total += $cart->product->price * $cart->qty;
                        @endphp
                        @endforeach

                        <div class="col-12" >
                            
                            <h5>ยอดรวม: {{ number_format($total, 2) }}฿</h5>
                            <a href="{{ route('checkout.index') }}" class="btn btn-success">ดำการเนินการต่อ</a>
                        </div>


                        <!-- </div> -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection