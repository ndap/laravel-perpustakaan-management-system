<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Pengguna</title>
    <style>
        /* 1. SETUP HALAMAN & MARGIN */
        @page {
            margin: 2.5cm 2cm; /* Atas-Bawah 2.5cm, Kiri-Kanan 2cm */
            size: A4;
        }

        body {
            font-family: 'DejaVu Sans', Helvetica, Arial, sans-serif;
            font-size: 10pt;
            line-height: 1.5;
            color: #2d3748; /* Abu-abu gelap professional */
        }

        /* 2. HEADER MINIMALIS (Tema Ungu) */
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #9333ea; /* Purple-600 */
            padding-bottom: 10px;
        }

        .header h1 {
            font-size: 18pt;
            color: #6b21a8; /* Purple-800 (Lebih gelap biar kontras) */
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

        /* 3. INFO FILTER */
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

        /* 4. STATISTIK (Tabel Layout agar aman di PDF) */
        .stats-container {
            width: 100%;
            margin-bottom: 30px;
            border-collapse: separate;
            border-spacing: 10px 0;
        }

        .stat-box {
            background-color: #faf5ff; /* Purple-50 */
            border: 1px solid #d8b4fe; /* Purple-300 */
            padding: 15px;
            text-align: center;
            border-radius: 4px;
            width: 33.33%;
        }

        .stat-label {
            font-size: 8pt;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #6b7280;
            margin-bottom: 5px;
        }

        .stat-value {
            font-size: 16pt;
            font-weight: bold;
            color: #9333ea;
        }

        /* 5. TABEL DATA (Clean Style) */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .data-table thead th {
            background-color: #7e22ce; /* Purple-700 */
            color: #ffffff;
            padding: 10px 8px;
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
            background-color: #f8fafc;
        }

        /* 6. ROLE BADGES (Pill Shape) */
        .role-badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 8pt;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Admin = Merah, Librarian = Biru, User = Hijau (Standar UI) */
        .role-admin { background: #fef2f2; color: #b91c1c; border: 1px solid #fca5a5; }
        .role-librarian { background: #eff6ff; color: #1d4ed8; border: 1px solid #bfdbfe; }
        .role-user { background: #f0fdf4; color: #15803d; border: 1px solid #86efac; }

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
        <h2>Laporan Pengguna</h2>
    </div>

    <div class="meta-info">
        <table>
            <tr>
                <td style="font-weight: bold; width: 100px;">Filter Role</td>
                <td>: {{ $roleName }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Dicetak Oleh</td>
                <td>: {{ auth()->user()->full_name ?? 'Admin' }}</td>
            </tr>
        </table>
    </div>

    <table class="stats-container">
        <tr>
            <td class="stat-box">
                <div class="stat-label">Total Pengguna</div>
                <div class="stat-value">{{ $statistics['total_users'] }}</div>
            </td>
            <td class="stat-box">
                <div class="stat-label">Total Peminjaman</div>
                <div class="stat-value" style="color: #059669;">{{ $statistics['total_borrowings'] }}</div>
            </td>
            <td class="stat-box">
                <div class="stat-label">User Aktif</div>
                <div class="stat-value" style="color: #d97706;">{{ $statistics['users_with_active_borrowing'] }}</div>
            </td>
        </tr>
    </table>

    @if($users->count() > 0)
        <table class="data-table">
            <thead>
                <tr>
                    <th style="width: 5%;" class="text-center">No</th>
                    <th style="width: 25%;">Nama Lengkap</th>
                    <th style="width: 25%;">Email</th>
                    <th style="width: 15%;">No. Telepon</th>
                    <th style="width: 10%;" class="text-center">Role</th>
                    <th style="width: 10%;" class="text-center">Total Pinjam</th>
                    <th style="width: 10%;" class="text-center">Aktif Pinjam</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>
                            <strong>{{ $user->full_name }}</strong>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone_number ?? '-' }}</td>
                        <td class="text-center">
                            <span class="role-badge role-{{ $user->role }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="text-center">{{ $user->borrowing_count }}</td>
                        <td class="text-center" style="color: #d97706; font-weight: bold;">
                            {{ $user->active_borrowing_count }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div style="text-align: center; padding: 40px; color: #64748b; border: 1px dashed #cbd5e1; border-radius: 4px;">
            Tidak ada data pengguna ditemukan untuk kriteria ini.
        </div>
    @endif

    <div class="footer">
        Dicetak pada: {{ $generatedAt->format('d F Y, H:i') }} WIB <br>
        Sistem Perpustakaan V1.0
    </div>

</body>
</html>