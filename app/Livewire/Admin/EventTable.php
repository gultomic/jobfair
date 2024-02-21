<?php

namespace App\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Event;
use App\Exports\EventExport;
use Illuminate\Support\Enumerable;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use RamonRietdijk\LivewireTables\Actions\Action;
use RamonRietdijk\LivewireTables\Columns\Column;
use RamonRietdijk\LivewireTables\Columns\DateColumn;
use RamonRietdijk\LivewireTables\Livewire\LivewireTable;

class EventTable extends LivewireTable
{

    public string $sortColumn = 'tanggal';
    public string $sortDirection = 'desc';

    protected string $model = Event::class;

    protected function columns(): array
    {
        return [
            DateColumn::make(__('Tanggal'), 'tanggal')
                ->format('D, d-M-Y')
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
            Column::make(__('Actions'), function (Model $model): string {
                return '<div class="flex gap-1">
                    <a class="text-gray-600" href="#'.$model->getKey().'" wire:navigate>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 3.75 9.375v-4.5ZM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 0 1-1.125-1.125v-4.5ZM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 13.5 9.375v-4.5Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 6.75h.75v.75h-.75v-.75ZM6.75 16.5h.75v.75h-.75v-.75ZM16.5 6.75h.75v.75h-.75v-.75ZM13.5 13.5h.75v.75h-.75v-.75ZM13.5 19.5h.75v.75h-.75v-.75ZM19.5 13.5h.75v.75h-.75v-.75ZM19.5 19.5h.75v.75h-.75v-.75ZM16.5 16.5h.75v.75h-.75v-.75Z" />
                        </svg>
                    </a>
                    <a href="/admin/event/'.$model->getKey().'" wire:navigate>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </a>
                    <a class="text-gray-400" href="/admin/event/'.$model->getKey().'/read" wire:navigate>
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

    protected function actions(): array
    {

        return [
            Action::make(__('Export'), 'export', function (): mixed {
                $collection = $this->appliedQuery()->get()->map(function($q) {
                    return [
                        'a' => Carbon::parse($q->tanggal)->format('D, d-M-Y'),
                        'b' => $q->jobfair->nama,
                        'c' => $q->refs['lokasi'],
                        'd' => $q->kehadiran()->count(),
                    ];
                });

                $t = Carbon::now()->format('Ymd-His');

                return Excel::download(
                    new EventExport($collection), "JobFairEvent_$t.xlsx",
                );
            })->standalone(),
        ];
    }
}
