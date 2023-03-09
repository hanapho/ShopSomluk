@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 my-10">
            <div class="card">
                <div class="card-header text-center text-white" style="background: #064420;">รายละเอียดการสั่งซื้อ</div>

                <div class="card-body" style="background: #FFFFFF;">
                    @if (isset($errors))
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                    @endforeach
                    @endif

                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col">

                            <h4 class="text-center">สถานะการสั่งซื้อ: {{ $order->status }}</h4>
                            <h4 class="text-center">เลขพัสดุ: {{ $order->track_id }}</h4>
                        </div>
                    </div>



                    <hr>
                    <div class="row">
                        <div class="col text-center">

                            <h5>ข้อมูลผู้สั่งซื้อ</h5>

                            <div class="row">
                                <div class="col">

                                    <label>ชื่อ - นามสกุล</label>
                                    <input type="text" name="name" class="form-control text-center" value="{{ $order->user->name }}" readonly>
                                    <label>ที่อยู่</label>
                                    <textarea name="address" cols="30" rows="3" class="form-control text-center" readonly>{{ $order->user->address }}</textarea>

                                </div>


                            </div>


                            <br>
                            <h5>รายการสั่งซื้อของคุณ</h5>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th>สินค้า</th>
                                            <th></th>
                                            <th>มูลค่า</th>
                                            <th>คะแนน</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $total = 0;
                                        @endphp
                                        @foreach ($order_details as $order_detail)
                                        <tr>
                                            <td width="20">
                                                <a href="{{ asset('storage/' . $order_detail->product->image) }}" target="__bank">
                                                    <img src="{{ asset('storage/' . $order_detail->product->image) }}" class="img-thumbnail w-25 h-25">
                                                </a>
                                                <p>{{ $order_detail->product->id }}</p>


                                            </td>


                                            <td width="30">
                                                {{ $order_detail->name }} <b>x {{ $order_detail->qty }}</b>
                                            </td>
                                            <td width="50">
                                                {{ number_format($order_detail->price * $order_detail->qty, 2) }}
                                            </td>
                                            <td style="width:20%">
                                                @auth
                                                @php
                                                $r_count = App\Models\Review::where('user_id', Auth::user()->id)
                                                ->where('product_id', $order_detail->product->id)
                                                ->count();
                                                @endphp

                                                @if ($r_count == 0)
                                                <div class="mt-5">
                                                    <h6>เขียนรีวิว</h6>

                                                    @error('message')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                    <form action="{{ route('product.reviews', $order_detail->product->id) }}" method="post">
                                                        @csrf
                                                        @method('post')
                                                        <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
                                                            <input type="radio" id="star5" name="rating" value="5" checked />
                                                            <label for="star5" title="5 star">5</label>
                                                            <input type="radio" id="star4" name="rating" value="4" />
                                                            <label for="star4" title="4 star">4</label>
                                                            <input type="radio" id="star3" name="rating" value="3" />
                                                            <label for="star3" title="3 star">3</label>
                                                            <input type="radio" id="star2" name="rating" value="2" />
                                                            <label for="star2" title="2 star">2</label>
                                                            <input type="radio" id="star1" name="rating" value="1" />
                                                            <label for="star1" title="1 star">1</label>
                                                        </div>
                                                        <textarea class="form-control @error('message') is-invalid @enderror" cols="50" name="message" placeholder="เขียนรีวิว" rows="5"></textarea>

                                                        @error('message')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <div class="d-flex justify-content-end mt-2">
                                                            <button class="btn btn-success " type="submit" style="font-size: 12px;">รีวิว</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                @else
                                                <span>คุณได้รีวิวแล้ว</span>
                                                @endif
                                                @else
                                                <span>กรุณาเข้าสู่ระบบ</span>
                                                @endauth
                                            </td>
                                        </tr>

                                        @php
                                        $total += $order_detail->price * $order_detail->qty;
                                        @endphp
                                        @endforeach

                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <td colspan="2" class="text-right">รวม</td>
                                            <td>{{ number_format($total, 2) }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        @endsection