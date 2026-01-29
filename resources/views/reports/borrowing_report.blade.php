<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Peminjaman Buku</title>
    <style>
        /* 1. SETUP HALAMAN & MARGIN (Kunci agar tidak terpotong saat print) */
        @page {
            margin: 2.5cm 2cm; /* Atas-Bawah 2.5cm, Kiri-Kanan 2cm */
            size: A4;
        }

        body {
            font-family: 'DejaVu Sans', Helvetica, Arial, sans-serif;
            font-size: 10pt;
            line-height: 1.5;
            color: #2d3748; /* Abu-abu gelap (Professional standard) */
        }

        /* 2. HEADER MINIMALIS */
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #059669; /* Hijau Emerald */
            padding-bottom: 10px;
        }

        .header h1 {
            font-size: 18pt;
            color: #064e3b; /* Hijau yang sangat gelap */
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

        /* 3. INFO PERIODE (Dibuat list rapi, bukan kotak warna-warni) */
        .meta-info {
            margin-bottom: 25px;
            font-size: 10pt;
        }
        
        .meta-info table {
            width: auto; /* Agar tidak memakan lebar penuh jika tidak perlu */
            border: none;
        }
        
        .meta-info td {
            padding: 4px 10px 4px 0;
            border: none;
        }

        /* 4. STATISTIK (Menggunakan Tabel Layout agar kokoh di PDF) */
        .stats-container {
            width: 100%;
            margin-bottom: 30px;
            border-collapse: separate;
            border-spacing: 5px 0; /* Jarak antar kotak */
        }

        .stat-box {
            background-color: #f0fdf4; /* Hijau sangat muda */
            border: 1px solid #bbf7d0;
            padding: 10px;
            text-align: center;
            border-radius: 4px;
            width: 20%; /* Membagi 5 kolom sama rata */
        }

        .stat-label {
            font-size: 7pt;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #64748b;
            margin-bottom: 5px;
        }

        .stat-value {
            font-size: 14pt;
            font-weight: bold;
            color: #059669;
        }

        /* 5. TABEL DATA (Clean Style - Horizontal Lines Only) */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .data-table thead th {
            background-color: #065f46; /* Hijau Tua */
            color: #ffffff;
            padding: 10px 8px;
            text-align: left;
            font-size: 9pt;
            text-transform: uppercase;
            font-weight: 600;
        }

        .data-table tbody td {
            padding: 8px;
            border-bottom: 1px solid #e2e8f0; /* Garis tipis */
            font-size: 9pt;
            vertical-align: middle;
        }

        .data-table tbody tr:nth-child(even) {
            background-color: #f8fafc; /* Zebra striping halus */
        }

        /* 6. STATUS BADGES (Pill Shape) */
        .status-badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 12px; /* Dibuat bulat lonjong */
            font-size: 8pt;
            font-weight: bold;
            text-transform: capitalize;
        }

        .status-pending { background: #fffbeb; color: #b45309; border: 1px solid #fcd34d; }
        .status-approved { background: #eff6ff; color: #1d4ed8; border: 1px solid #bfdbfe; }
        .status-returned { background: #f0fdf4; color: #15803d; border: 1px solid #86efac; }
        .status-rejected { background: #fef2f2; color: #b91c1c; border: 1px solid #fca5a5; }

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
        <h2>Laporan Peminjaman Buku</h2>
    </div>

    <div class="meta-info">
        <table>
            <tr>
                <td style="font-weight: bold; width: 100px;">Periode</td>
                <td>: {{ $startDate->format('d F Y') }} - {{ $endDate->format('d F Y') }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Total Data</td>
                <td>: {{ $statistics['total'] }} Transaksi</td>
            </tr>
        </table>
    </div>

    <table class="stats-container">
        <tr>
            <td class="stat-box">
                <div class="stat-label">Total Pinjam</div>
                <div class="stat-value">{{ $statistics['total'] }}</div>
            </td>
            <td class="stat-box">
                <div class="stat-label">Pending</div>
                <div class="stat-value" style="color: #d97706;">{{ $statistics['pending'] }}</div>
            </td>
            <td class="stat-box">
                <div class="stat-label">Disetujui</div>
                <div class="stat-value" style="color: #2563eb;">{{ $statistics['approved'] }}</div>
            </td>
            <td class="stat-box">
                <div class="stat-label">Kembali</div>
                <div class="stat-value" style="color: #059669;">{{ $statistics['returned'] }}</div>
            </td>
            <td class="stat-box">
                <div class="stat-label">Ditolak</div>
                <div class="stat-value" style="color: #dc2626;">{{ $statistics['rejected'] }}</div>
            </td>
        </tr>
    </table>

    @if($borrowings->count() > 0)
        <table class="data-table">
            <thead>
                <tr>
                    <th style="width: 5%;" class="text-center">No</th>
                    <th style="width: 20%;">Peminjam</th>
                    <th style="width: 25%;">Judul Buku</th>
                    <th style="width: 12%;" class="text-center">Tgl Pinjam</th>
                    <th style="width: 12%;" class="text-center">Tgl Kembali</th>
                    <th style="width: 13%;" class="text-center">Status</th>
                    <th style="width: 13%;">Validator</th>
                </tr>
            </thead>
            <tbody>
                @foreach($borrowings as $index => $borrowing)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>
                            <strong>{{ $borrowing->user->full_name }}</strong>
                        </td>
                        <td>{{ $borrowing->book->title }}</td>
                        <td class="text-center">{{ $borrowing->borrow_date->format('d/m/y') }}</td>
                        <td class="text-center">{{ $borrowing->return_date->format('d/m/y') }}</td>
                        <td class="text-center">
                            <span class="status-badge status-{{ $borrowing->status }}">
                                {{ ucfirst($borrowing->status) }}
                            </span>
                        </td>
                        <td style="font-size: 8pt; color: #64748b;">
                            {{ $borrowing->approvedBy?->full_name ?? '-' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div style="text-align: center; padding: 30px; color: #64748b; border: 1px dashed #cbd5e1; border-radius: 4px;">
            Tidak ada data peminjaman dalam periode yang dipilih.
        </div>
    @endif

    <div class="footer">
        Dicetak pada: {{ $generatedAt->format('d F Y, H:i') }} WIB <br>
        Halaman <span class="page-number"></span>
    </div>

</body>
</html>