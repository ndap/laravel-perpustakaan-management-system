<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Statistik</title>
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
            border-bottom: 3px solid #eab308;
        }
        
        .header h1 {
            font-size: 20px;
            color: #eab308;
            margin-bottom: 5px;
        }
        
        .header h2 {
            font-size: 16px;
            color: #333;
            font-weight: normal;
        }
        
        .filter-info {
            text-align: center;
            background: #fefce8;
            padding: 10px;
            margin: 15px 0;
            border-radius: 5px;
            border: 1px solid #eab308;
        }
        
        .filter-info strong {
            color: #eab308;
        }
        
        .metrics {
            display: table;
            width: 100%;
            margin: 15px 0;
        }
        
        .metric-item {
            display: table-cell;
            width: 20%;
            padding: 12px;
            text-align: center;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
        }
        
        .metric-item .label {
            font-size: 8px;
            color: #6b7280;
            text-transform: uppercase;
            margin-bottom: 5px;
        }
        
        .metric-item .value {
            font-size: 18px;
            font-weight: bold;
            color: #eab308;
        }
        
        .section-title {
            font-size: 14px;
            font-weight: bold;
            color: #333;
            margin: 20px 0 10px;
            padding-bottom: 5px;
            border-bottom: 2px solid #eab308;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }
        
        table thead {
            background: #eab308;
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
            padding: 20px;
            color: #6b7280;
            font-style: italic;
            background: #f9fafb;
        }
        
        .trend-table {
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>SISTEM PERPUSTAKAAN</h1>
        <h2>Laporan Statistik Perpustakaan</h2>
    </div>

    <div class="filter-info">
        <strong>Periode:</strong> {{ $periodName }}
        <br>
        <small>{{ $startDate->format('d F Y') }} - {{ $endDate->format('d F Y') }}</small>
    </div>

    <div class="metrics">
        <div class="metric-item">
            <div class="label">Total Peminjaman</div>
            <div class="value">{{ $metrics['total_borrowings'] }}</div>
        </div>
        <div class="metric-item">
            <div class="label">Pending</div>
            <div class="value" style="color: #d97706;">{{ $metrics['pending'] }}</div>
        </div>
        <div class="metric-item">
            <div class="label">Disetujui</div>
            <div class="value" style="color: #2563eb;">{{ $metrics['approved'] }}</div>
        </div>
        <div class="metric-item">
            <div class="label">Dikembalikan</div>
            <div class="value" style="color: #059669;">{{ $metrics['returned'] }}</div>
        </div>
        <div class="metric-item">
            <div class="label">Terlambat</div>
            <div class="value" style="color: #dc2626;">{{ $metrics['late_returns'] }}</div>
        </div>
    </div>

    <div class="section-title">Pengguna Aktif</div>
    <div style="background: #f9fafb; padding: 15px; text-align: center; margin-bottom: 15px;">
        <div style="font-size: 9px; color: #6b7280; text-transform: uppercase; margin-bottom: 5px;">
            Total Pengguna yang Meminjam Buku
        </div>
        <div style="font-size: 24px; font-weight: bold; color: #eab308;">
            {{ $activeUsers }}
        </div>
    </div>

    @if($monthlyData->count() > 0)
        <div class="section-title">Trend Peminjaman per Bulan</div>
        <table class="trend-table">
            <thead>
                <tr>
                    <th style="width: 10%;">No</th>
                    <th style="width: 60%;">Bulan</th>
                    <th style="width: 30%; text-align: center;">Jumlah Peminjaman</th>
                </tr>
            </thead>
            <tbody>
                @foreach($monthlyData as $index => $data)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $data['month'] }}</td>
                        <td style="text-align: center; font-weight: bold;">{{ $data['count'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if($topBooks->count() > 0)
        <div class="section-title">Top 10 Buku Paling Banyak Dipinjam</div>
        <table>
            <thead>
                <tr>
                    <th style="width: 8%;">Rank</th>
                    <th style="width: 45%;">Judul Buku</th>
                    <th style="width: 27%;">Penulis</th>
                    <th style="width: 20%; text-align: center;">Jumlah Peminjaman</th>
                </tr>
            </thead>
            <tbody>
                @foreach($topBooks as $index => $book)
                    <tr>
                        <td style="text-align: center; font-weight: bold;">{{ $index + 1 }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td style="text-align: center; font-weight: bold; color: #eab308;">
                            {{ $book->borrowings_count }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="section-title">Top 10 Buku Paling Banyak Dipinjam</div>
        <div class="no-data">
            Tidak ada data peminjaman dalam periode ini.
        </div>
    @endif

    <div class="footer">
        <div>Laporan di-generate pada: {{ $generatedAt->format('d F Y H:i:s') }}</div>
        <div>Sistem Perpustakaan © {{ date('Y') }}</div>
    </div>
</body>
</html>
