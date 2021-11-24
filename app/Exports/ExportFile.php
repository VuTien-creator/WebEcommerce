<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class ExportFile implements FromCollection, ShouldAutoSize,  WithHeadings, WithMapping
{
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return $this->data;
    }

    /**
     * Set header columns
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Time',
            'Revenue',
        ];
    }

    /**
     * Mapping data
     *
     * @return array
     */
    public function map($data): array {
        return [
            $data->date,
            $data->total,
        ];
    }

}