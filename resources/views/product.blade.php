@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-2">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" style="height: 500px;">
                        </div>
                        <h5 class="mt-5 text-center">{{ $product->name }}</h5>

                        {!! $product->description !!}

                        <div class="mt-5">
                            <h5>รีวิวทั้งหมด</h5>
                            @foreach ($reviews as $review)
                                <div class="row">
                                    <div class="col-6">
                                        <h6>{{ $review->user->name }}</h6>
                                        <p style="color: #838E95; font-size: 13px;">Time
                                            {{ $review->created_at->diffForHumans() }}
                                        </p>
                                        <ul class="rating justify-content-center">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <li
                                                    class="rating__item @if ($review->rating >= $i) rating__item--active @endif">
                                                </li>
                                            @endfor
                                        </ul>
                                        <p>
                                            {{ $review->message }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>



                <!-- @auth
                    @if ($r_count == 0)
                        <div class="mt-5">
                            <h3>เขียนรีวิว</h3>

                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <form action="{{ route('product.reviews', $product->id) }}" method="post">
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
                                <textarea class="form-control @error('message') is-invalid @enderror" cols="50" name="message"
                                    placeholder="เขียนรีวิว" rows="5"></textarea>

                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="d-flex justify-content-end mt-2">
                                    <button class="btn btn-success btn-md" type="submit">รีวิว</button>
                                </div>
                            </form>
                        </div>
                    @endif
                @endauth -->


            </div>
        </div>
    </div>
@endsection
