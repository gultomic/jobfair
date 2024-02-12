<?php

namespace App\Livewire\Admin;

use App\Models\Jobfair;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use RamonRietdijk\LivewireTables\Columns\Column;
use RamonRietdijk\LivewireTables\Columns\DateColumn;
use RamonRietdijk\LivewireTables\Livewire\LivewireTable;

class JobfairTable extends LivewireTable
{

    public string $sortColumn = 'tanggal';
    public string $sortDirection = 'desc';

    protected string $model = Jobfair::class;

    protected function columns(): array
    {
        return [
            Column::make(__('Job Fair'), 'nama')
                ->sortable(),
                // ->searchable(),
            Column::make(__('Event'), function (mixed $value, Model $model): int {
                return $model->events()->count();
            }),
            Column::make(__('Kehadiran'), function (mixed $value, Model $model): int {
                return $model->attendances()->count();
            }),
                // ->sortable(),
                // ->searchable(),
            DateColumn::make(__('Tanggal'), 'created_at')
                ->format('d-M-Y')
                ->sortable(),
            // Column::make(__('Actions'), function (Model $model): string {
            //     return '
            //         <a class="underline" href="/admin/pembelajaran/'.$model->getKey().'/show" wire:navigate>Edit</a>
            //         <a class="underline" href="/admin/pembelajaran/'.$model->getKey().'/list" wire:navigate>Materi</a>
            //     ';
            // })
            //     ->clickable(false)
            //     ->asHtml(),
        ];
    }
}
