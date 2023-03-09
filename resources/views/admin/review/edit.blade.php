@extends('layouts.admin')

@section('content')
    <div class="card-header">
        รีวิว
        <a href="{{ route('admin.review.index') }}" class="btn btn-danger btn-sm float-righ">Back</a>
    </div>
    <div class="card-body">
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
        <form action="{{ route('admin.review.update', $review->id) }}" method="post">
            @method('patch')
            @csrf
            <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
                <input type="radio" id="star5" name="rating" value="5" @if($review->rating == 5) checked @endif />
                <label for="star5" title="5 star">5</label>
                <input type="radio" id="star4" name="rating" value="4" @if($review->rating == 4) checked @endif />
                <label for="star4" title="4 star">4</label>
                <input type="radio" id="star3" name="rating" value="3" @if($review->rating == 3) checked @endif />
                <label for="star3" title="3 star">3</label>
                <input type="radio" id="star2" name="rating" value="2" @if($review->rating == 2) checked @endif />
                <label for="star2" title="2 star">2</label>
                <input type="radio" id="star1" name="rating" value="1" @if($review->rating == 1) checked @endif />
                <label for="star1" title="1 star">1</label>
            </div>
            <textarea class="form-control @error('message') is-invalid @enderror" cols="50" name="message"
                placeholder="เขียนรีวิว" rows="5">{{ $review->message }}</textarea>

            @error('message')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
