@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center" style="background-color: #BFCED6;">ตรวจสอบรายละเอียด</div>

                <div class="card-body" style="background-color: #D9E1E2;">
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
                        <div class="col-8">
                        
                            <h4>ข้อมูลผู้สั่งซื้อ</h4>

                            <form action="{{ route('checkout.create') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('post')

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">ชื่อ - นามสกุล</label>
                                            <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">ที่อยู่</label>
                                            <textarea name="address" cols="30" rows="3" class="form-control">{{ auth()->user()->address }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    
                                                    <tr>
                                                        <th>ธนาคาร</th>
                                                        <th>เลขบัญชี</th>
                                                        <th>ชื่อบัญชี</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>กสิกรไทย</td>
                                                        <td>1191406466</td>
                                                        <td>ฐาปกรณ์ สิทธิเดช</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                    <div class="col">
                                        <h5>PromptPay</h5>
                                        <img src="{{ asset('/tatata.jpg') }}"width=200height=290 alt="">
                                        
                                    </div>
                    
                                </div>

                                <div class="row mt-4">
                                    <div class="col">
                                        <div class="form-group">
                                            <h5>แนบสลิป</h5>
                                            <img src="" id="previewFileImage" class="form-control-file">
                                            <input type="file" onchange="previewFile()" name="slip" accept='image/png,image/jpeg' class="form-control-file">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col">
                                        <div class="form-group">
                                            <button class="btn btn-success">ยืนยันการโอน</button>
                                        </div>
                                    </div>
                                </div>


                            </form>


                        </div>

                        <div class="col-4">
                            <h4>รายการสั่งซื้อของคุณ</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>สินค้า</th>
                                            <th>มูลค่า</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $total = 0;
                                        @endphp
                                        @foreach ($carts as $cart)
                                        <tr>
                                            <td>
                                                {{ $cart->product->name }} <b>x {{ $cart->qty }}</b>
                                            </td>
                                            <td>{{ number_format($cart->product->price * $cart->qty, 2) }}</td>
                                        </tr>
                                        @php
                                        $total += $cart->product->price * $cart->qty;
                                        @endphp
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>รวม</td>
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
    </div>
</div>

<script>
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