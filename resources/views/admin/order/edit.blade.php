@extends('layouts.admin')

@section('content')
    <div class="card-header">
        ออเดอร์
        <a href="{{ route('admin.order.index') }}" class="btn btn-danger btn-sm float-righ">Back</a>
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
        <form action="{{ route('admin.order.update', $order->id) }}" method="post" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="form-group">
                <label for="">สถานะ</label>
                <select name="status" class="form-control">
                    <option @if($order->status == 'รอชำระเงิน') selected @endif value="รอชำระเงิน">รอชำระเงิน</option>
                    <option @if($order->status == 'ชำระเงินสำเร็จ') selected @endif value="ชำระเงินสำเร็จ">ชำระเงินสำเร็จ</option>
                    <option @if($order->status == 'ยกเลิก') selected @endif value="ยกเลิก">ยกเลิก</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Track ID</label>
                <input type="text" name="track_id" class="form-control" value="{{ $order->track_id }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            
        </form>
    </div>
@endsection
