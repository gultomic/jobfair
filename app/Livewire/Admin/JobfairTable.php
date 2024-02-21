<?php

namespace App\Livewire\Admin;

use App\Models\Jobfair;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use RamonRietdijk\LivewireTables\Columns\Column;
use RamonRietdijk\LivewireTables\Columns\DateColumn;
use RamonRietdijk\LivewireTables\Columns\ImageColumn;
use RamonRietdijk\LivewireTables\Livewire\LivewireTable;

class JobfairTable extends LivewireTable
{

    public string $sortColumn = 'created_at';
    public string $sortDirection = 'desc';

    protected string $model = Jobfair::class;

    protected function columns(): array
    {
        return [
            ImageColumn::make(__('Thumbnail'), 'refs->image'),
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
            Column::make(__('Actions'), function (Model $model): string {
                return '<div class="flex gap-1">
                    <a class="text-gray-400" href="/admin/jobfair/'.$model->getKey().'/read" wire:navigate>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </a>
                </div>';
            })
                ->clickable(false)
                ->asHtml(),
        ];
    }
}
