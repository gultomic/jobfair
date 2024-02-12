<?php

namespace App\Livewire\Admin;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use RamonRietdijk\LivewireTables\Columns\Column;
use RamonRietdijk\LivewireTables\Livewire\LivewireTable;

class EventTable extends LivewireTable
{
    protected string $model = Event::class;

    // protected function query(): Builder
    // {
    //     return $this->model()->query()
    //         ->orderByDesc('tanggal');
    // }

    protected function columns(): array
    {
        return [
            Column::make(__('Tanggal'), 'tanggal')
                ->sortable(),
            Column::make(__('Job Fair'), 'jobfair.nama')
                ->sortable(),
                // ->searchable(),
            Column::make(__('Lokasi'), 'refs->lokasi'),
                // ->sortable(),
                // ->searchable(),
            Column::make(__('Kehadiran'), function (mixed $value, Model $model): int {
                return $model->kehadiran()->count();
            })
                ->sortable(),
                // ->searchable(),
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
