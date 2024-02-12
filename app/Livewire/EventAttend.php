<?php

namespace App\Livewire;

use App\Models\Kehadiran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use RamonRietdijk\LivewireTables\Columns\Column;
use RamonRietdijk\LivewireTables\Livewire\LivewireTable;

class EventAttend extends LivewireTable
{
    protected string $model = Kehadiran::class;

    protected function query(): Builder
    {
        return $this->model()->query()
            ->where('user_id', Auth::user()->id);
    }

    protected function columns(): array
    {
        return [
            Column::make(__('Kehadiran'), 'created_at')
                ->sortable(),
            Column::make(__('Job Fair'), 'event.jobfair.nama')
                ->sortable(),
                // ->searchable(),
            Column::make(__('Lokasi'), 'event.refs->lokasi'),
                // ->sortable(),
                // ->searchable(),
        ];
    }
}
