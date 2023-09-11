<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithTitle;

class UjiLaporan implements FromCollection, WithDrawings, WithStyles, WithTitle, WithHeadings
{

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect($this->data);
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setPath(public_path('assets/img/sumbar.png'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('B2');

        return $drawing;
    }

    public function headings(): array
    {
        return [
           [null, null, null, null, 'LAPORAN IPK III/1 - IKHTISAR STATISTIK ANTAR KERJA PROPINSI SUMATERA BARAT' ],
           [null, null, null, null, 'SEMESTER   1    :  JANUARI  S/D  JUNI  2023'],
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                // Mengatur jenis huruf (font) untuk baris pertama (baris judul kolom)
                'font' => ['name' => 'Tahoma', 'size' => 14, 'bold' => true],
            ],
            'B2:B5' => [
                // Mengatur jenis huruf (font) untuk sel B2 sampai B5
                'font' => ['name' => 'Times New Roman', 'size' => 12, 'italic' => true],
            ],
        ];
    }

    public function title(): string
    {
        // Judul yang ingin Anda atur untuk lembar Excel
        return 'Daftar Pengguna';
    }
}
