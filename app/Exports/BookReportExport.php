<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BookReportExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithTitle
{
    protected $books;
    protected $statistics;
    protected $categoryName;

    public function __construct($books, $statistics, $categoryName)
    {
        $this->books = $books;
        $this->statistics = $statistics;
        $this->categoryName = $categoryName;
    }

    public function collection()
    {
        return $this->books;
    }

    public function headings(): array
    {
        return [
            'No',
            'Judul Buku',
            'Penulis',
            'Penerbit',
            'Tahun Terbit',
            'Stok',
            'Kategori',
        ];
    }

    public function map($book): array
    {
        static $no = 0;
        $no++;

        $categories = $book->categories->pluck('category_name')->join(', ');

        return [
            $no,
            $book->title ?? '-',
            $book->author ?? '-',
            $book->publisher ?? '-',
            $book->publication_year ?? '-',
            $book->stock ?? 0,
            $categories ?: '-',
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
        return 'Laporan Koleksi Buku';
    }
}
