<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class StatisticsReportExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithTitle, WithEvents
{
    protected $topBooks;
    protected $metrics;
    protected $periodName;
    protected $activeUsers;

    public function __construct($topBooks, $metrics, $periodName, $activeUsers)
    {
        $this->topBooks = $topBooks;
        $this->metrics = $metrics;
        $this->periodName = $periodName;
        $this->activeUsers = $activeUsers;
    }

    public function collection()
    {
        return $this->topBooks;
    }

    public function headings(): array
    {
        return [
            'No',
            'Judul Buku',
            'Penulis',
            'Jumlah Peminjaman',
        ];
    }

    public function map($book): array
    {
        static $no = 0;
        $no++;

        return [
            $no,
            $book->title ?? '-',
            $book->author ?? '-',
            $book->borrowings_count ?? 0,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'E2E8F0']
                ]
            ],
        ];
    }

    public function title(): string
    {
        return 'Laporan Statistik';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Add metrics summary at the top
                $sheet = $event->sheet->getDelegate();

                // Insert rows at the top for metrics
                $sheet->insertNewRowBefore(1, 8);

                // Add title
                $sheet->setCellValue('A1', 'LAPORAN STATISTIK PERPUSTAKAAN');
                $sheet->mergeCells('A1:D1');
                $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);

                // Add period
                $sheet->setCellValue('A2', 'Periode: ' . $this->periodName);
                $sheet->mergeCells('A2:D2');

                // Add metrics
                $sheet->setCellValue('A4', 'RINGKASAN STATISTIK');
                $sheet->mergeCells('A4:D4');
                $sheet->getStyle('A4')->getFont()->setBold(true);

                $sheet->setCellValue('A5', 'Total Peminjaman:');
                $sheet->setCellValue('B5', $this->metrics['total_borrowings']);

                $sheet->setCellValue('A6', 'Pengguna Aktif:');
                $sheet->setCellValue('B6', $this->activeUsers);

                $sheet->setCellValue('C5', 'Pending:');
                $sheet->setCellValue('D5', $this->metrics['pending']);

                $sheet->setCellValue('C6', 'Approved:');
                $sheet->setCellValue('D6', $this->metrics['approved']);

                $sheet->setCellValue('C7', 'Returned:');
                $sheet->setCellValue('D7', $this->metrics['returned']);

                // Add section title for top books
                $sheet->setCellValue('A9', 'TOP 10 BUKU TERPOPULER');
                $sheet->mergeCells('A9:D9');
                $sheet->getStyle('A9')->getFont()->setBold(true);

                // Auto-size columns
                foreach (range('A', 'D') as $col) {
                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }
            },
        ];
    }
}
