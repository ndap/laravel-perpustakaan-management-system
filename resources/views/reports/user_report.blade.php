<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Pengguna</title>
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
            border-bottom: 3px solid #9333ea;
        }
        
        .header h1 {
            font-size: 20px;
            color: #9333ea;
            margin-bottom: 5px;
        }
        
        .header h2 {
            font-size: 16px;
            color: #333;
            font-weight: normal;
        }
        
        .filter-info {
            text-align: center;
            background: #faf5ff;
            padding: 10px;
            margin: 15px 0;
            border-radius: 5px;
            border: 1px solid #9333ea;
        }
        
        .filter-info strong {
            color: #9333ea;
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
            color: #9333ea;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        
        table thead {
            background: #9333ea;
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
        
        .role {
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 9px;
            font-weight: bold;
            text-transform: uppercase;
        }
        
        .role.admin {
            background: #fee2e2;
            color: #991b1b;
        }
        
        .role.librarian {
            background: #dbeafe;
            color: #1e40af;
        }
        
        .role.user {
            background: #d1fae5;
            color: #065f46;
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
        <h2>Laporan Pengguna</h2>
    </div>

    <div class="filter-info">
        <strong>Filter Role:</strong> {{ $roleName }}
    </div>

    <div class="statistics">
        <div class="stat-item">
            <div class="label">Total Pengguna</div>
            <div class="value">{{ $statistics['total_users'] }}</div>
        </div>
        <div class="stat-item">
            <div class="label">Total Peminjaman</div>
            <div class="value" style="color: #059669;">{{ $statistics['total_borrowings'] }}</div>
        </div>
        <div class="stat-item">
            <div class="label">User Aktif</div>
            <div class="value" style="color: #d97706;">{{ $statistics['users_with_active_borrowing'] }}</div>
        </div>
    </div>

    @if($users->count() > 0)
        <table>
            <thead>
                <tr>
                    <th style="width: 5%;">No</th>
                    <th style="width: 25%;">Nama Lengkap</th>
                    <th style="width: 22%;">Email</th>
                    <th style="width: 15%;">No. Telepon</th>
                    <th style="width: 13%;">Role</th>
                    <th style="width: 10%;">Total Pinjam</th>
                    <th style="width: 10%;">Aktif</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->full_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone_number ?? '-' }}</td>
                        <td>
                            <span class="role {{ $user->role }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td style="text-align: center;">{{ $user->borrowing_count }}</td>
                        <td style="text-align: center;">{{ $user->active_borrowing_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-data">
            Tidak ada data pengguna untuk role yang dipilih.
        </div>
    @endif

    <div class="footer">
        <div>Laporan di-generate pada: {{ $generatedAt->format('d F Y H:i:s') }}</div>
        <div>Sistem Perpustakaan © {{ date('Y') }}</div>
    </div>
</body>
</html>
