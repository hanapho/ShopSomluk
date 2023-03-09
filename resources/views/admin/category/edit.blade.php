@extends('layouts.admin')

@section('content')
<div class="card-header">
    ประเภทสินค้า
    <a href="{{ route('admin.category.index') }}" class="btn btn-danger btn-sm float-righ">Back</a>
</div>
<div class="card-body">
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <form action="{{ route('admin.category.update', $category->id) }}" method="post">
        @method('patch')
        @csrf
        <div class="form-group">
            <label for="">ชื่อประเภท</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>


@endsection
