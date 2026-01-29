<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Koleksi Buku</title>
    <style>
        /* 1. SETUP HALAMAN & MARGIN KERTAS */
        @page {
            /* Margin standar dokumen formal (Atas Bawah 2.5cm, Kiri Kanan 2cm) */
            margin: 2.5cm 2cm;
            size: A4;
        }

        body {
            font-family: 'DejaVu Sans', Helvetica, Arial, sans-serif;
            font-size: 10pt; /* Ukuran standar surat resmi */
            line-height: 1.5;
            color: #2d3748; /* Abu-abu gelap, lebih lembut di mata daripada hitam pekat */
        }

        /* 2. HEADER YANG LEBIH BERSIH */
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #2563eb;
            padding-bottom: 10px;
        }

        .header h1 {
            font-size: 18pt;
            color: #1e3a8a; /* Biru tua yang lebih formal */
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

        /* 3. INFO SECTION (FILTER) */
        .meta-info {
            margin-bottom: 20px;
            font-size: 10pt;
        }
        
        .meta-info table {
            width: 100%;
            border: none;
        }
        
        .meta-info td {
            padding: 5px 0;
            border: none;
        }

        /* 4. STATISTIK (Dibuat minimalis tanpa kotak-kotak tebal) */
        .stats-container {
            width: 100%;
            margin-bottom: 30px;
            border-collapse: separate;
            border-spacing: 10px 0; /* Memberi jarak antar kolom */
        }

        .stat-box {
            background-color: #f8fafc;
            border: 1px solid #cbd5e1;
            padding: 15px;
            text-align: center;
            border-radius: 4px;
        }

        .stat-label {
            font-size: 8pt;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #64748b;
            margin-bottom: 5px;
        }

        .stat-value {
            font-size: 16pt;
            font-weight: bold;
            color: #2563eb;
        }

        /* 5. TABEL DATA (Formal Style) */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .data-table thead th {
            background-color: #1e40af; /* Biru lebih gelap */
            color: #ffffff;
            padding: 10px 8px;
            text-align: left;
            font-size: 9pt;
            text-transform: uppercase;
            font-weight: 600;
        }

        .data-table tbody td {
            padding: 8px;
            border-bottom: 1px solid #e2e8f0; /* Garis horizontal tipis */
            font-size: 9pt;
            vertical-align: middle;
        }

        /* Zebra striping yang sangat halus agar mudah dibaca */
        .data-table tbody tr:nth-child(even) {
            background-color: #f8fafc;
        }

        /* Stok Indicators */
        .badge {
            display: inline-block;
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 8pt;
            font-weight: bold;
        }
        .stock-safe { color: #047857; background-color: #d1fae5; }
        .stock-warn { color: #b45309; background-color: #fef3c7; }
        .stock-danger { color: #b91c1c; background-color: #fee2e2; }

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
        <h2>Laporan Koleksi Buku</h2>
    </div>

    <div class="meta-info">
        <table style="width: auto;">
            <tr>
                <td style="width: 100px; font-weight: bold;">Kategori</td>
                <td>: {{ $categoryName }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Dicetak Oleh</td>
                <td>: {{ auth()->user()->name ?? 'Admin' }}</td> </tr>
        </table>
    </div>

    <table class="stats-container">
        <tr>
            <td class="stat-box" width="33%">
                <div class="stat-label">Total Judul</div>
                <div class="stat-value">{{ $statistics['total_books'] }}</div>
            </td>
            <td class="stat-box" width="33%">
                <div class="stat-label">Total Fisik</div>
                <div class="stat-value">{{ $statistics['total_stock'] }}</div>
            </td>
            <td class="stat-box" width="33%">
                <div class="stat-label">Sedang Dipinjam</div>
                <div class="stat-value" style="color: #d97706;">{{ $statistics['total_borrowed'] }}</div>
            </td>
        </tr>
    </table>

    @if($books->count() > 0)
        <table class="data-table">
            <thead>
                <tr>
                    <th style="width: 5%;" class="text-center">No</th>
                    <th style="width: 30%;">Judul Buku</th>
                    <th style="width: 20%;">Penulis</th>
                    <th style="width: 15%;">Penerbit</th>
                    <th style="width: 10%;" class="text-center">Tahun</th>
                    <th style="width: 10%;" class="text-center">Stok</th>
                    <th style="width: 10%;" class="text-center">Pinjam</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $index => $book)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>
                            <strong>{{ $book->title }}</strong><br>
                            <span style="font-size: 8pt; color: #64748b;">
                                Kat: {{ $book->categories->pluck('category_name')->join(', ') ?: '-' }}
                            </span>
                        </td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->publisher }}</td>
                        <td class="text-center">{{ $book->publication_year }}</td>
                        <td class="text-center">
                            @php
                                $stockClass = $book->stock > 5 ? 'stock-safe' : ($book->stock > 0 ? 'stock-warn' : 'stock-danger');
                            @endphp
                            <span class="badge {{ $stockClass }}">
                                {{ $book->stock }}
                            </span>
                        </td>
                        <td class="text-center">
                            {{ $book->borrowings()->whereIn('status', ['approved', 'pending'])->count() }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div style="text-align: center; padding: 40px; color: #64748b; border: 1px dashed #cbd5e1; border-radius: 4px;">
            Tidak ada data buku ditemukan untuk kategori ini.
        </div>
    @endif

    <div class="footer">
        Dicetak pada: {{ $generatedAt->format('d F Y, H:i') }} WIB <br>
        Sistem Perpustakaan V1.0
    </div>

</body>
</html>