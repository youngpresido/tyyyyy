<?php

namespace App\DataTables;

use App\Prisoner;
use Yajra\DataTables\Services\DataTable;

class PrisonersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action', 'prisonersdatatable.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Prisoner $model)
    {
        return $model->newQuery()->select('id', 
        
        'soc_number',


        'first_name',
        'last_name',
        'state',
        'marital_status',
        'sex',
        'ethnicity',
        'date_of_birth',
         'created_at',
         'personnel'
          
          
        );
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction(['width' => '80px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            
        'soc_number',
        'first_name',
        'last_name',
        'state',
        'marital_status',
        'sex',
        'ethnicity',
        'date_of_birth',
         'created_at',
         'personnel'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Prisoners_' . date('YmdHis');
    }
}
