<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Peminjaman</title>
    <style>
        /* Pengaturan Kertas A4 */
        @page {
            size: A4;
            margin: 2cm;
        }

        body {
            font-family: 'Times New Roman', Times, serif; /* Font Serif untuk kesan formal */
            color: #000;
            line-height: 1.4;
            background-color: #fff;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 210mm; /* Lebar A4 */
            margin: 0 auto;
            background: #fff;
        }

        /* Kop Surat */
        .header {
            text-align: center;
            border-bottom: 4px double #000; /* Garis ganda khas surat resmi */
            padding-bottom: 15px;
            margin-bottom: 30px;
            position: relative;
        }

        .header h1 {
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 0 0 5px 0;
            font-weight: bold;
        }

        .header p {
            margin: 2px 0;
            font-size: 14px;
        }

        .document-title {
            text-align: center;
            margin-bottom: 30px;
        }

        .document-title h2 {
            text-decoration: underline;
            font-size: 18px;
            margin: 0;
            text-transform: uppercase;
        }

        .document-title p {
            margin: 5px 0 0 0;
            font-size: 14px;
        }

        /* Tabel Data */
        .content-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .content-table td {
            padding: 6px 0;
            vertical-align: top;
        }

        .label {
            width: 180px;
            font-weight: bold;
        }

        .separator {
            width: 20px;
            text-align: center;
        }

        /* Section dividers */
        .section-header {
            font-weight: bold;
            text-transform: uppercase;
            font-size: 14px;
            margin-top: 20px;
            margin-bottom: 10px;
            border-bottom: 1px solid #000;
            display: inline-block;
            padding-bottom: 2px;
        }

        /* Kotak Syarat & Ketentuan (Clean version) */
        .terms-box {
            border: 1px solid #000;
            padding: 15px;
            margin-top: 30px;
            font-size: 12px;
            text-align: justify;
        }

        .terms-title {
            font-weight: bold;
            margin-bottom: 5px;
            text-decoration: underline;
        }

        .sign-space {
            height: 80px;
        }

        .sign-name {
            font-weight: bold;
            text-decoration: underline;
        }

        /* Utility classes */
        .text-right { text-align: right; }
        .uppercase { text-transform: uppercase; }
        
        /* Barcode Simulation */
        .barcode {
            font-family: 'Courier New', Courier, monospace;
            letter-spacing: 5px;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>BukuHub GunungPutri</h1>
            <p>Jalan Dummy Skiel nomor 123, Kota Dummy, Indonesia</p>
            <p>Telp: 089682949101 | Email: layanan@bukuhub.id</p>
        </div>

        <p style="margin-bottom: 20px;">Berdasarkan data sistem perpustakaan, berikut adalah rincian transaksi peminjaman buku yang telah disetujui:</p>

        <div class="section-header">I. DATA PEMINJAM</div>
        <table class="content-table">
            <tr>
                <td class="label">Nama Lengkap</td>
                <td class="separator">:</td>
                <td class="uppercase">{{ $borrowing->user->full_name }}</td>
            </tr>
            <tr>
                <td class="label">ID Anggota / Username</td>
                <td class="separator">:</td>
                <td>{{ $borrowing->user->username }}</td>
            </tr>
            <tr>
                <td class="label">Kontak (Email/Telp)</td>
                <td class="separator">:</td>
                <td>{{ $borrowing->user->email }} {{ $borrowing->user->phone ? ' / ' . $borrowing->user->phone : '' }}</td>
            </tr>
        </table>

        <div class="section-header">II. DATA BUKU</div>
        <table class="content-table">
            <tr>
                <td class="label">Judul Buku</td>
                <td class="separator">:</td>
                <td style="font-style: italic;">"{{ $borrowing->book->title }}"</td>
            </tr>
            <tr>
                <td class="label">Penulis</td>
                <td class="separator">:</td>
                <td>{{ $borrowing->book->author }}</td>
            </tr>
            <tr>
                <td class="label">Penerbit / Tahun</td>
                <td class="separator">:</td>
                <td>{{ $borrowing->book->publisher }} / {{ $borrowing->book->publication_year }}</td>
            </tr>
        </table>

        <div class="section-header">III. KETERANGAN PEMINJAMAN</div>
        <table class="content-table">
            <tr>
                <td class="label">Tanggal Peminjaman</td>
                <td class="separator">:</td>
                <td>{{ $borrowing->borrow_date->format('d F Y') }}</td>
            </tr>
            <tr>
                <td class="label">Batas Pengembalian</td>
                <td class="separator">:</td>
                <td style="font-weight: bold; color: #000;">{{ $borrowing->return_date->format('d F Y') }}</td>
            </tr>
            <tr>
                <td class="label">Status</td>
                <td class="separator">:</td>
                <td>DISETUJUI ({{ $borrowing->approved_at ? $borrowing->approved_at->format('d/m/Y H:i') : '-' }})</td>
            </tr>
            @if($borrowing->approvedBy)
            <tr>
                <td class="label">Petugas Verifikasi</td>
                <td class="separator">:</td>
                <td>{{ $borrowing->approvedBy->full_name }}</td>
            </tr>
            @endif
        </table>

        <div class="terms-box">
            <div class="terms-title">PERNYATAAN & KETENTUAN:</div>
            <ol style="margin: 5px 0 0 20px; padding: 0;">
                <li>Bukti ini adalah dokumen sah peminjaman aset perpustakaan.</li>
                <li>Peminjam wajib mengembalikan buku sesuai dengan tanggal "Batas Pengembalian" yang tercantum di atas.</li>
                <li>Keterlambatan pengembalian akan dikenakan denda sesuai dengan peraturan yang berlaku.</li>
                <li>Segala bentuk kerusakan atau kehilangan buku menjadi tanggung jawab penuh peminjam.</li>
            </ol>
        </div>

        <div style="font-size: 10px; color: #666; margin-top: 30px; text-align: center; border-top: 1px solid #ddd; padding-top: 5px;">
            Dicetak otomatis oleh Sistem pada {{ now()->format('d/m/Y H:i:s') }} WIB
        </div>
    </div>
</body>
</html>