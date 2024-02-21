<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class EventExport implements FromCollection, WithHeadings
{
    public function __construct(
        protected Collection $collection
    ) {
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Job fair',
            'Lokasi',
            'Kehadiran'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->collection;
    }
}
