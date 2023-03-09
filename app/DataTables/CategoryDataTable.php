<?php

namespace App\DataTables;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;


class CategoryDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    // public function dataTable(QueryBuilder $query): EloquentDataTable
    public function dataTable($query)
    {
        // return (new EloquentDataTable($query))->setRowId('id');
        return datatables()
            ->eloquent($query)
            ->editColumn('created_at','{{ Carbon\Carbon::parse($created_at)->isoFormat("DD/MM/YYYY") }}')
            ->editColumn('action', '<a href="{{ route("admin.category.edit", $id) }}" class="btn btn-warning btn-sm">edit</a> <button class="btn btn-danger btn-sm del" onclick="onDelete({{ $id }})">del</button>');

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Category $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Category $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('category-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(0);


    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            // Column::make('id'),
            Column::make('name'),
            Column::make('created_at')
                    ->width(150),
            // Column::make('action')
            // ->text('action'),
            Column::computed('action'),
        ];

    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Category_' . date('YmdHis');
    }
}
