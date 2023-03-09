@extends('layouts.app')

@section('content')
    <style>

    </style>

    <div class="container">
        <div class="row">
            <!-- <script>
                console.log('product', $products);
            </script> -->
            @if ($products)
                @foreach ($products as $product)
                    <div class="col-12 col-md-3 my-2">
                        <div class="card">
                            <a href="{{ route('product', $product->id) }}">
                                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" width=240 height=280
                                    alt="...">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <div class="row">
                                    <div class="col">
                                        <p class="card-text">ราคา: {{ $product->price }} ฿</p>
                                    </div>
                                    <div class="col">
                                        <ul class="rating justify-content-center">
                                            <li class="rating__item rating__item--active"></li>
                                            <li class="rating__item rating__item--active"></li>
                                            <li class="rating__item rating__item--active"></li>
                                            <li class="rating__item rating__item--active"></li>
                                            <li class="rating__item rating__item--active"></li>
                                        </ul>
                                    </div>
                                </div>
                                <form action="{{ route('cart.create') }}" method="post">
                                    @csrf
                                    @method('post')
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-primary"
                                        style="font-size: 10px;">หยิบใส่ตะกร้า</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                <script>
                    console.log('product', $products);
                </script>
            @else
                <div>
                    <script>
                        console.log('product', $products);
                    </script>
                    <h1>
                        ไม่มีสินค้า
                    </h1>
                </div>
            @endif

        </div>

        <div class="row mt-4">
            <div class="col">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
