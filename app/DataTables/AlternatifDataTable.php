<?php

namespace App\DataTables;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AlternatifDataTable extends DataTable
{
    private $kriteria;
    private $kriteria_column;

    public function __construct()
    {
        parent::__construct();

        $this->kriteria = Kriteria::all(['id', 'nama', 'kode']);
        $this->kriteria_column = collect();
        foreach ($this->kriteria as $k) {
            $name = str_replace(' ', '_', ($k->nama . " ($k->kode)"));
            $this->kriteria_column->push(Column::make($name));
        }
    }

    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $dt = new EloquentDataTable($query);
        $dt->addColumn('action', '
            <a href="{{ url("alternatif/edit/$id") }}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i></a>
            <a href="{{ url("alternatif/delete/$id") }}" onclick="return confirm(\'Hapus Alternatif: {{ $kode }} - {{ $nama }}\')" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="bi bi-trash-fill"></i></a>
        ')
            ->setRowId('id');

        foreach ($this->kriteria as $k) {
            // Kepadatan Penduduk (C1) ==> Kepadatan_Penduduk_(C1)
            $name = str_replace(' ', '_', ($k->nama . " ($k->kode)"));
            $dt->addColumn($name, function (Alternatif $alternatif) use ($k) {
                return $alternatif->nilai()->where('id_kriteria', $k->id)->first()->nilai_kriteria->label ?? "<not set>";
            });
        }


        return $dt;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Alternatif $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Alternatif $model): QueryBuilder
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
            ->setTableId('alternatif-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(0, 'asc')
            ->buttons([
                Button::make('add'),
                Button::make('excel'),
                // Button::make('csv'),
                // Button::make('pdf'),
                Button::make('print'),
                // Button::make('reset'),
                // Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('kode'),
            Column::make('nama'),
            Column::make('keterangan'),
            ...$this->kriteria_column->toArray(),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Alternatif_' . date('YmdHis');
    }
}
