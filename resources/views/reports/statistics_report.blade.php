<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Statistik</title>
    <style>
        /* 1. SETUP HALAMAN & MARGIN */
        @page {
            margin: 2.5cm 2cm;
            size: A4;
        }

        body {
            font-family: 'DejaVu Sans', Helvetica, Arial, sans-serif;
            font-size: 10pt;
            line-height: 1.5;
            color: #2d3748;
        }

        /* 2. HEADER MINIMALIS (Tema Amber/Gold) */
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #d97706; /* Amber-600 */
            padding-bottom: 10px;
        }

        .header h1 {
            font-size: 18pt;
            color: #92400e; /* Amber-800 (Gelap & Formal) */
            margin: 0 0 5px 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .header h2 {
            font-size: 12pt;
            color: #64748b;
            margin: 0;
            font-weight: normal;
        }

        /* 3. INFO PERIODE */
        .meta-info {
            margin-bottom: 25px;
            font-size: 10pt;
        }
        
        .meta-info table {
            width: auto;
            border: none;
        }
        
        .meta-info td {
            padding: 4px 10px 4px 0;
            border: none;
        }

        /* 4. KEY METRICS (Kotak Statistik Utama) */
        .metrics-table {
            width: 100%;
            margin-bottom: 30px;
            border-collapse: separate;
            border-spacing: 5px 0;
        }

        .metric-box {
            background-color: #fffbeb; /* Amber-50 */
            border: 1px solid #fcd34d; /* Amber-300 */
            padding: 10px;
            text-align: center;
            border-radius: 4px;
            width: 20%;
        }

        .metric-label {
            font-size: 7pt;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #78350f;
            margin-bottom: 5px;
        }

        .metric-value {
            font-size: 14pt;
            font-weight: bold;
            color: #d97706;
        }

        /* 5. HIGHLIGHT SECTION (User Aktif) */
        .highlight-section {
            margin-bottom: 30px;
            padding: 15px;
            background-color: #f8fafc;
            border-left: 4px solid #d97706;
            border-radius: 0 4px 4px 0;
        }
        
        /* 6. JUDUL PER BAGIAN (Section Title) */
        .section-heading {
            font-size: 11pt;
            font-weight: bold;
            color: #2d3748;
            margin: 30px 0 15px 0;
            padding-bottom: 8px;
            border-bottom: 1px solid #e2e8f0;
            text-transform: uppercase;
        }

        /* 7. TABEL DATA (Trend & Top Books) */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .data-table thead th {
            background-color: #b45309; /* Amber-700 */
            color: #ffffff;
            padding: 8px;
            text-align: left;
            font-size: 9pt;
            text-transform: uppercase;
            font-weight: 600;
        }

        .data-table tbody td {
            padding: 8px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 9pt;
            vertical-align: middle;
        }

        .data-table tbody tr:nth-child(even) {
            background-color: #fffbeb; /* Zebra striping warna amber sangat muda */
        }

        /* Ranking Circle */
        .rank-circle {
            display: inline-block;
            width: 20px;
            height: 20px;
            line-height: 20px;
            background-color: #d97706;
            color: white;
            border-radius: 50%;
            text-align: center;
            font-size: 8pt;
            font-weight: bold;
        }

        .footer {
            margin-top: 40px;
            padding-top: 10px;
            border-top: 1px solid #cbd5e1;
            font-size: 8pt;
            color: #94a3b8;
            text-align: right;
        }

        .text-center { text-align: center; }
        .text-right { text-align: right; }
    </style>
</head>
<body>

    <div class="header">
        <h1>Sistem Perpustakaan</h1>
        <h2>Laporan Statistik & Analisa</h2>
    </div>

    <div class="meta-info">
        <table>
            <tr>
                <td style="font-weight: bold; width: 100px;">Nama Periode</td>
                <td>: {{ $periodName }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Rentang Waktu</td>
                <td>: {{ $startDate->format('d F Y') }} s/d {{ $endDate->format('d F Y') }}</td>
            </tr>
        </table>
    </div>

    <table class="metrics-table">
        <tr>
            <td class="metric-box">
                <div class="metric-label">Total Pinjam</div>
                <div class="metric-value">{{ $metrics['total_borrowings'] }}</div>
            </td>
            <td class="metric-box">
                <div class="metric-label">Pending</div>
                <div class="metric-value" style="color: #d97706;">{{ $metrics['pending'] }}</div>
            </td>
            <td class="metric-box">
                <div class="metric-label">Disetujui</div>
                <div class="metric-value" style="color: #2563eb;">{{ $metrics['approved'] }}</div>
            </td>
            <td class="metric-box">
                <div class="metric-label">Kembali</div>
                <div class="metric-value" style="color: #059669;">{{ $metrics['returned'] }}</div>
            </td>
            <td class="metric-box">
                <div class="metric-label">Terlambat</div>
                <div class="metric-value" style="color: #dc2626;">{{ $metrics['late_returns'] }}</div>
            </td>
        </tr>
    </table>

    <div class="highlight-section">
        <table style="width: 100%">
            <tr>
                <td style="width: 70%; vertical-align: middle;">
                    <div style="font-size: 10pt; font-weight: bold; color: #2d3748;">Partisipasi Pengguna</div>
                    <div style="font-size: 9pt; color: #64748b;">Jumlah pengguna unik yang melakukan peminjaman dalam periode ini.</div>
                </td>
                <td style="width: 30%; text-align: right; vertical-align: middle;">
                    <span style="font-size: 20pt; font-weight: bold; color: #d97706;">{{ $activeUsers }}</span>
                    <span style="font-size: 10pt; color: #64748b;">User</span>
                </td>
            </tr>
        </table>
    </div>

    @if($monthlyData->count() > 0)
        <div class="section-heading">Trend Peminjaman Bulanan</div>
        <table class="data-table">
            <thead>
                <tr>
                    <th style="width: 10%;" class="text-center">No</th>
                    <th style="width: 60%;">Bulan</th>
                    <th style="width: 30%;" class="text-center">Volume Transaksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($monthlyData as $index => $data)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $data['month'] }}</td>
                        <td class="text-center" style="font-weight: bold; color: #2d3748;">
                            {{ $data['count'] }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="section-heading">Top 10 Buku Terpopuler</div>
    @if($topBooks->count() > 0)
        <table class="data-table">
            <thead>
                <tr>
                    <th style="width: 10%;" class="text-center">Rank</th>
                    <th style="width: 50%;">Judul Buku</th>
                    <th style="width: 25%;">Penulis</th>
                    <th style="width: 15%;" class="text-center">Dipinjam</th>
                </tr>
            </thead>
            <tbody>
                @foreach($topBooks as $index => $book)
                    <tr>
                        <td class="text-center">
                            @if($index < 3)
                                <span class="rank-circle">{{ $index + 1 }}</span>
                            @else
                                <span style="font-weight: bold; color: #64748b;">#{{ $index + 1 }}</span>
                            @endif
                        </td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td class="text-center" style="font-weight: bold; color: #d97706;">
                            {{ $book->borrowings_count }}x
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div style="text-align: center; padding: 20px; border: 1px dashed #cbd5e1; color: #64748b;">
            Belum ada data peminjaman yang cukup untuk menampilkan peringkat buku.
        </div>
    @endif

    <div class="footer">
        Dicetak pada: {{ $generatedAt->format('d F Y, H:i') }} WIB <br>
        Sistem Perpustakaan V1.0
    </div>

</body>
</html>