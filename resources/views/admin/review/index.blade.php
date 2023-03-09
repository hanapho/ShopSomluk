@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header text-white" style="background-color: #00337C;">
            รีวิว
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
                    url: "{{ url('admin/review') }}/" + id,
                    method: "DELETE",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(resp) {
                        window.LaravelDataTables["reviewdatatable-table"].ajax.reload();
                    }
                })
            }
        }
    </script>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
