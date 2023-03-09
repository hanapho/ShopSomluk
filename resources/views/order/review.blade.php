@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 my-10">
                <div class="card">
                    <div class="card-header text-center" style="background: #F7D07A;">รีวิวสินค้า</div>

                    <div class="card-body" style="background: #FBF1D5;">

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('warning'))
                            <div class="alert alert-warning" role="alert">
                                {{ session('warning') }}
                            </div>
                        @endif

                        <form action="{{ route('order.review_create', $id) }}" method="post">
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
                </div>
            </div>
        </div>
    @endsection
