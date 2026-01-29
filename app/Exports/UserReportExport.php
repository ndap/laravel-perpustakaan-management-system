<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UserReportExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithTitle
{
    protected $users;
    protected $statistics;
    protected $roleName;

    public function __construct($users, $statistics, $roleName)
    {
        $this->users = $users;
        $this->statistics = $statistics;
        $this->roleName = $roleName;
    }

    public function collection()
    {
        return $this->users;
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Lengkap',
            'Username',
            'Email',
            'Role',
            'Jumlah Peminjaman',
            'Peminjaman Aktif',
        ];
    }

    public function map($user): array
    {
        static $no = 0;
        $no++;

        return [
            $no,
            $user->full_name ?? '-',
            $user->username ?? '-',
            $user->email ?? '-',
            ucfirst($user->role ?? '-'),
            $user->borrowing_count ?? 0,
            $user->active_borrowing_count ?? 0,
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
        return 'Laporan Pengguna';
    }
}
