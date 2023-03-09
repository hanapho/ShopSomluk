@extends('layouts.admin')

@section('content')
    <div class="card-header">
        สินค้า
        <a href="{{ route('admin.product.index') }}" class="btn btn-danger btn-sm float-righ">Back</a>
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
        <form action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="form-group">
                <label for="">ประเภทสินค้า</label>
                <select name="category" class="custom-select">
                    @foreach ($categorys as $category)
                        <option @if ($category->id == $product->category_id) selected @endif value="{{ $category->id }}">
                            {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">ชื่อ</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}">
            </div>
            <div class="form-group">
                <label for="">ราคา</label>
                <input type="number" name="price" class="form-control" value="{{ $product->price }}">
            </div>
            <div class="form-group">
                <label for="">รูปภาพ</label>
                <input type="file" name="image" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="">รายละเอียด</label>
                <textarea id="summernote" name="description"> {!! $product->description !!} </textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

    <script>
        $('#summernote').summernote({
            placeholder: '',
            tabsize: 2,
            height: 300
        });
    </script>
@endsection
