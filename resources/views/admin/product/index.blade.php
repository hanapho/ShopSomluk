@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header text-white" style="background-color: #00337C;">
        สินค้า
            <a href="{{ route('admin.product.create') }}" class="btn btn-success btn-sm float-right">Add</a>
        </div>
        <div class="card-body" style="background-color: #FFFFFF;">
            {{ $dataTable->table() }}
        </div>
    </div>
@endsection

@section('js')
    <script>
        function onDelete(id) {
            if (confirm("คุณต้องการลบข้อมูลนี้หรือไม่?") == true) {
                $.ajax({
                    url: "{{ url('admin/product') }}/" + id,
                    method: "DELETE",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(resp) {
                        window.LaravelDataTables["product-table"].ajax.reload();
                    }
                })
            }
        }
    </script>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
