<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Peminjaman Buku</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 11px;
            line-height: 1.4;
            color: #333;
        }
        
        .header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 3px solid #059669;
        }
        
        .header h1 {
            font-size: 20px;
            color: #059669;
            margin-bottom: 5px;
        }
        
        .header h2 {
            font-size: 16px;
            color: #333;
            font-weight: normal;
        }
        
        .period {
            text-align: center;
            background: #f0fdf4;
            padding: 10px;
            margin: 15px 0;
            border-radius: 5px;
            border: 1px solid #059669;
        }
        
        .period strong {
            color: #059669;
        }
        
        .statistics {
            display: table;
            width: 100%;
            margin: 15px 0;
        }
        
        .stat-item {
            display: table-cell;
            width: 20%;
            padding: 10px;
            text-align: center;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
        }
        
        .stat-item .label {
            font-size: 9px;
            color: #6b7280;
            text-transform: uppercase;
            margin-bottom: 5px;
        }
        
        .stat-item .value {
            font-size: 18px;
            font-weight: bold;
            color: #059669;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        
        table thead {
            background: #059669;
            color: white;
        }
        
        table thead th {
            padding: 10px 8px;
            text-align: left;
            font-weight: bold;
            font-size: 10px;
        }
        
        table tbody tr {
            border-bottom: 1px solid #e5e7eb;
        }
        
        table tbody tr:nth-child(even) {
            background: #f9fafb;
        }
        
        table tbody td {
            padding: 8px;
            font-size: 10px;
        }
        
        .status {
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 9px;
            font-weight: bold;
            text-transform: uppercase;
        }
        
        .status.pending {
            background: #fef3c7;
            color: #92400e;
        }
        
        .status.approved {
            background: #dbeafe;
            color: #1e40af;
        }
        
        .status.returned {
            background: #d1fae5;
            color: #065f46;
        }
        
        .status.rejected {
            background: #fee2e2;
            color: #991b1b;
        }
        
        .footer {
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #e5e7eb;
            text-align: center;
            font-size: 9px;
            color: #6b7280;
        }
        
        .no-data {
            text-align: center;
            padding: 30px;
            color: #6b7280;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>SISTEM PERPUSTAKAAN</h1>
        <h2>Laporan Peminjaman Buku</h2>
    </div>

    <div class="period">
        <strong>Periode:</strong> {{ $startDate->format('d F Y') }} - {{ $endDate->format('d F Y') }}
    </div>

    <div class="statistics">
        <div class="stat-item">
            <div class="label">Total</div>
            <div class="value">{{ $statistics['total'] }}</div>
        </div>
        <div class="stat-item">
            <div class="label">Pending</div>
            <div class="value" style="color: #d97706;">{{ $statistics['pending'] }}</div>
        </div>
        <div class="stat-item">
            <div class="label">Disetujui</div>
            <div class="value" style="color: #2563eb;">{{ $statistics['approved'] }}</div>
        </div>
        <div class="stat-item">
            <div class="label">Dikembalikan</div>
            <div class="value" style="color: #059669;">{{ $statistics['returned'] }}</div>
        </div>
        <div class="stat-item">
            <div class="label">Ditolak</div>
            <div class="value" style="color: #dc2626;">{{ $statistics['rejected'] }}</div>
        </div>
    </div>

    @if($borrowings->count() > 0)
        <table>
            <thead>
                <tr>
                    <th style="width: 5%;">No</th>
                    <th style="width: 20%;">Peminjam</th>
                    <th style="width: 25%;">Judul Buku</th>
                    <th style="width: 12%;">Tgl Pinjam</th>
                    <th style="width: 12%;">Tgl Kembali</th>
                    <th style="width: 12%;">Status</th>
                    <th style="width: 14%;">Disetujui Oleh</th>
                </tr>
            </thead>
            <tbody>
                @foreach($borrowings as $index => $borrowing)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $borrowing->user->full_name }}</td>
                        <td>{{ $borrowing->book->title }}</td>
                        <td>{{ $borrowing->borrow_date->format('d/m/Y') }}</td>
                        <td>{{ $borrowing->return_date->format('d/m/Y') }}</td>
                        <td>
                            <span class="status {{ $borrowing->status }}">
                                {{ ucfirst($borrowing->status) }}
                            </span>
                        </td>
                        <td>{{ $borrowing->approvedBy?->full_name ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-data">
            Tidak ada data peminjaman dalam periode yang dipilih.
        </div>
    @endif

    <div class="footer">
        <div>Laporan di-generate pada: {{ $generatedAt->format('d F Y H:i:s') }}</div>
        <div>Sistem Perpustakaan © {{ date('Y') }}</div>
    </div>
</body>
</html>
