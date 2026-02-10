<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Kategori - {{ $kategori->nama }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h2 {
            margin: 0;
            color: #333;
        }
        .kategori-info {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f5f5f5;
            border-left: 4px solid #007bff;
        }
        .kategori-info table {
            width: 100%;
            border-collapse: collapse;
        }
        .kategori-info td {
            padding: 5px;
        }
        .kategori-info td:first-child {
            font-weight: bold;
            width: 150px;
        }
        table.items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table.items-table th,
        table.items-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table.items-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        table.items-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 10px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        .no-data {
            text-align: center;
            padding: 20px;
            font-style: italic;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>LAPORAN KATEGORI ITEMS</h2>
    </div>

    <div class="kategori-info">
        <table>
            <tr>
                <td>Kode Kategori:</td>
                <td>{{ $kategori->kode }}</td>
            </tr>
            <tr>
                <td>Nama Kategori:</td>
                <td>{{ $kategori->nama }}</td>
            </tr>
        </table>
    </div>

    <h3>Items dalam Kategori "{{ $kategori->nama }}"</h3>
    
    @if($kategori->masterItems->count() > 0)
        <table class="items-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Item</th>
                    <th>Nama Item</th>
                    <th>Jenis</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Supplier</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kategori->masterItems as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->kode }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jenis }}</td>
                        <td>Rp {{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($item->harga_beli + ($item->harga_beli * $item->laba / 100), 0, ',', '.') }}</td>
                        <td>{{ $item->supplier }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-data">
            <strong>Belum ada item dalam kategori ini.</strong>
        </div>
    @endif

    <div class="footer">
        <strong>Dicetak pada:</strong> {{ $tanggal_cetak }}<br>
        Sistem Inventory Medify
    </div>
</body>
</html>
