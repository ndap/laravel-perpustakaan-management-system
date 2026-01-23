<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Koleksi Buku</title>
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
            border-bottom: 3px solid #2563eb;
        }
        
        .header h1 {
            font-size: 20px;
            color: #2563eb;
            margin-bottom: 5px;
        }
        
        .header h2 {
            font-size: 16px;
            color: #333;
            font-weight: normal;
        }
        
        .filter-info {
            text-align: center;
            background: #eff6ff;
            padding: 10px;
            margin: 15px 0;
            border-radius: 5px;
            border: 1px solid #2563eb;
        }
        
        .filter-info strong {
            color: #2563eb;
        }
        
        .statistics {
            display: table;
            width: 100%;
            margin: 15px 0;
        }
        
        .stat-item {
            display: table-cell;
            width: 33.33%;
            padding: 15px;
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
            font-size: 20px;
            font-weight: bold;
            color: #2563eb;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        
        table thead {
            background: #2563eb;
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
        
        .stock {
            text-align: center;
            font-weight: bold;
        }
        
        .stock.high {
            color: #059669;
        }
        
        .stock.medium {
            color: #d97706;
        }
        
        .stock.low {
            color: #dc2626;
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
        
        .categories {
            font-size: 9px;
            color: #6b7280;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>SISTEM PERPUSTAKAAN</h1>
        <h2>Laporan Koleksi Buku</h2>
    </div>

    <div class="filter-info">
        <strong>Kategori:</strong> {{ $categoryName }}
    </div>

    <div class="statistics">
        <div class="stat-item">
            <div class="label">Total Buku</div>
            <div class="value">{{ $statistics['total_books'] }}</div>
        </div>
        <div class="stat-item">
            <div class="label">Total Stok</div>
            <div class="value">{{ $statistics['total_stock'] }}</div>
        </div>
        <div class="stat-item">
            <div class="label">Sedang Dipinjam</div>
            <div class="value" style="color: #d97706;">{{ $statistics['total_borrowed'] }}</div>
        </div>
    </div>

    @if($books->count() > 0)
        <table>
            <thead>
                <tr>
                    <th style="width: 4%;">No</th>
                    <th style="width: 25%;">Judul</th>
                    <th style="width: 18%;">Penulis</th>
                    <th style="width: 15%;">Penerbit</th>
                    <th style="width: 6%;">Tahun</th>
                    <th style="width: 17%;">Kategori</th>
                    <th style="width: 7%;">Stok</th>
                    <th style="width: 8%;">Dipinjam</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $index => $book)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->publisher }}</td>
                        <td style="text-align: center;">{{ $book->publication_year }}</td>
                        <td class="categories">
                            {{ $book->categories->pluck('category_name')->join(', ') ?: '-' }}
                        </td>
                        <td class="stock {{ $book->stock > 5 ? 'high' : ($book->stock > 0 ? 'medium' : 'low') }}">
                            {{ $book->stock }}
                        </td>
                        <td style="text-align: center;">
                            {{ $book->borrowings()->whereIn('status', ['approved', 'pending'])->count() }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-data">
            Tidak ada data buku untuk kategori yang dipilih.
        </div>
    @endif

    <div class="footer">
        <div>Laporan di-generate pada: {{ $generatedAt->format('d F Y H:i:s') }}</div>
        <div>Sistem Perpustakaan © {{ date('Y') }}</div>
    </div>
</body>
</html>
