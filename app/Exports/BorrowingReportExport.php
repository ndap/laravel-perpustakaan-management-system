<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BorrowingReportExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithTitle
{
    protected $borrowings;
    protected $statistics;
    protected $startDate;
    protected $endDate;

    public function __construct($borrowings, $statistics, $startDate, $endDate)
    {
        $this->borrowings = $borrowings;
        $this->statistics = $statistics;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection()
    {
        return $this->borrowings;
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Peminjam',
            'Judul Buku',
            'Tanggal Pinjam',
            'Tanggal Kembali',
            'Status',
            'Disetujui Oleh',
            'Dikonfirmasi Oleh',
        ];
    }

    public function map($borrowing): array
    {
        static $no = 0;
        $no++;

        return [
            $no,
            $borrowing->user ? $borrowing->user->full_name : '-',
            $borrowing->book ? $borrowing->book->title : '-',
            $borrowing->borrow_date ? $borrowing->borrow_date->format('d/m/Y') : '-',
            $borrowing->return_date ? $borrowing->return_date->format('d/m/Y') : '-',
            ucfirst($borrowing->status),
            $borrowing->approvedBy ? $borrowing->approvedBy->full_name : '-',
            $borrowing->confirmedBy ? $borrowing->confirmedBy->full_name : '-',
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
        return 'Laporan Peminjaman';
    }
}
