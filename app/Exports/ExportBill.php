<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class ExportBill implements
    FromCollection,
    ShouldAutoSize,
    WithHeadings,
    WithMapping,
    WithEvents,
    WithCustomStartCell,
    WithDrawings

{
    private $bill;
    private $path_qr_code;

    public function __construct($billDetail, $path_qr_code)
    {
        $this->bill = $billDetail;
        $this->path_qr_code = $path_qr_code;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //
        return $this->bill;
    }

    /**
     * Set header columns
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            " ",
            "Product's Name",
            "Product's Price",
            "Quantity",
            "Total",
        ];
    }

    /**
     * Mapping data
     *
     * @return array
     */
    public function map($data): array
    {
        return [
            " ",
            $data->product_name,
            $data->product_price.' VND',
            $data->quantity,
            $data->quantity * $data->product_price. ' VND',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $data = $this->bill->toArray();
                // dd($data);
                $last_column = Coordinate::stringFromColumnIndex(5);
                $last_row = count($data) + 4 + 1 +1 ;
                $event->sheet->getStyle('A4:E4')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ],
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                            'color' => ['argb' => '00000000'],
                        ],
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                        'rotation' => 90,
                        'startColor' => [
                            'argb' => 'FFA0A0A0',
                        ],
                        'endColor' => [
                            'argb' => 'FFFFFFFF',
                        ],
                    ],

                ]
                );
                $style_text_center = [
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER
                    ]
                ];
                $event->sheet->mergeCells(sprintf('A1:%s1', $last_column));
                $event->sheet->mergeCells(sprintf('A2:%s2', $last_column));
                $event->sheet->mergeCells(sprintf('A3:%s3', $last_column));
                // $event->sheet->mergeCells(sprintf('A4:%s4', $last_column));

                $event->sheet->mergeCells(sprintf('A%d:%s%d', $last_row, $last_column, $last_row));
                // assign cell values
                $event->sheet->setCellValue('A1', 'Customer Name : '.$data[0]->customer_name);
                $event->sheet->setCellValue('A2', 'Customer Email : '.$data[0]->customer_email);
                $event->sheet->setCellValue('A3', 'Buy At : ' . $data[0]->bill_created);
                // $event->sheet->setCellValue('A4', 'Bill Detail');


                $event->sheet->setCellValue(sprintf('A%d', $last_row), 'Total Of Bill : '. $data[0]->bill_total.' VND');

                // assign cell styles
                $event->sheet->getStyle('A1:A3')->applyFromArray($style_text_center);
                $event->sheet->getStyle(sprintf('A%d', $last_row))->applyFromArray($style_text_center);

            },

        ];
    }

    public function startCell(): string
    {
        return 'A4';
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('QR Code');
        $drawing->setDescription('QR Code Of Your Bill');
        $drawing->setPath(public_path($this->path_qr_code));
        $drawing->setHeight(100);
        $drawing->setCoordinates('G1');

        return $drawing;
    }
}