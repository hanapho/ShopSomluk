@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-white" style="background-color: #064420;">ออเดอร์</div>

                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <!-- <th>#</th> -->
                                        <th>เลขพัสดุ</th>
                                        <th>สถานะการชำระเงิน</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <!-- <td>{{ $order->id }}</td> -->
                                            <td>{{ $order->track_id }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>
                                                <div class="form-inline">
                                                    <a href="{{ route('order.show', $order->id) }}" class="btn btn-info">
                                                        ดูข้อมูล
                                                    </a>
                                                    &nbsp;
                                                    @if ($order->status == 'รอชำระเงิน')
                                                        <form action="{{ route('order.cancel', $order->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger">ยกเลิก</button>
                                                        </form>
                                                    @else
                                                        <button class="btn btn-danger" disabled>ยกเลิก</button>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
