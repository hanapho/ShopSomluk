<?php

namespace App\DataTables;

use App\Models\Order;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrderDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('created_at', '{{ Carbon\Carbon::parse($created_at)->isoFormat("DD/MM/YYYY") }}')
            ->editColumn('slip', '<a href="{{ asset("storage/".$slip) }}" target="_blank"><img src="{{ asset("storage/".$slip) }}" class="img-thumbnail"></a>')
            ->editColumn('action', '<a href="{{ route("order.show", $id) }}" target="_bank" class="btn btn-info btn-sm">ดู</a> <a href="{{ route("admin.order.edit", $id) }}" class="btn btn-warning btn-sm">แก้ไข</a> <button class="btn btn-danger btn-sm del" onclick="onDelete({{ $id }})">ลบ</button>')
            ->rawColumns(['slip', 'action']);
            
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('order-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            // Column::make('image'),
            Column::make('slip'),
            Column::make('track_id'),
            Column::make('status'),
            Column::make('created_at'),
            // Column::make('action'),
            Column::computed('action'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Order_' . date('YmdHis');
    }
}
