<?php

namespace App\Livewire\Admin;

use App\Models\Kehadiran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use RamonRietdijk\LivewireTables\Columns\Column;
use RamonRietdijk\LivewireTables\Livewire\LivewireTable;

class KehadiranTable extends LivewireTable
{
    public string $sortColumn = 'created_at';
    public string $sortDirection = 'desc';

    #[Locked]
    public string $eid;

    protected string $model = Kehadiran::class;

    protected function query(): Builder
    {
        return $this->model()->query()
            ->where('event_id', '=', $this->eid);
    }

    protected function columns(): array
    {
        return [
            Column::make(__('Check-in'), 'created_at')
                ->sortable(),
            Column::make(__('Nama'), 'user.name')
                ->sortable(),
            Column::make(__('Email'), 'user.email')
                ->sortable(),
            Column::make(__('Telpon'), 'user.refs->telp')
                ->sortable(),
        ];
    }
}
