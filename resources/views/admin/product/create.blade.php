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
        <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
            @method('post')
            @csrf
            <div class="form-group">
                <label for="">ประเภทสินค้า</label>
                <select name="category" class="custom-select">
                    @foreach ($categorys as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">ชื่อ</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">ราคา</label>
                <!-- <input type="number" name="price" class="form-control"> -->
                <input type="number" required name="price" class="form-control" min="0" value="0"
                    step="any">


            </div>
            <div class="row mt-4">
                <div class="col">
       
                    <div class="form-group">
                        <h5>รูปภาพ</h5>
                        <img src="" id="previewFileImage" class="form-control-file">
                        <input type="file" onchange="previewFile()" name="image" accept='image/png,image/jpeg' class="form-control-file">

                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">รายละเอียด</label>
                <textarea id="summernote" name="description"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>

    <script>
        $('#summernote').summernote({
            placeholder: '',
            tabsize: 2,
            height: 300
        });
        
    function previewFile() {
        var preview = document.querySelector('#previewFileImage');
        var file = document.querySelector('input[type=file]').files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }
    </script>
@endsection
