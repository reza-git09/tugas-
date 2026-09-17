<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laporan Penjualan</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f6f9;
            padding: 40px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        h1 {
            margin-bottom: 10px;
            color: #1f2937;
        }

        .subtitle {
            color: #6b7280;
            margin-bottom: 30px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .card h3 {
            color: #6b7280;
            font-size: 16px;
            margin-bottom: 12px;
        }

        .card p {
            color: #111827;
            font-size: 28px;
            font-weight: bold;
        }

        .terlaris {
            margin-top: 20px;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .terlaris h3 {
            margin-bottom: 10px;
            color: #6b7280;
        }

        .terlaris p {
            font-size: 22px;
            font-weight: bold;
            color: #2563eb;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Rekap Laporan Penjualan</h1>

        <p class="subtitle">
            Statistik penjualan berdasarkan data laporan.
        </p>

        <div class="cards">

            <div class="card">
                <h3>Total Transaksi</h3>
                <p>{{ $laporan['total_transaksi'] }}</p>
            </div>

            <div class="card">
                <h3>Total Produk Terjual</h3>
                <p>{{ $laporan['total_produk_terjual'] }}</p>
            </div>

            <div class="card">
                <h3>Total Pendapatan</h3>
                <p>
                    Rp {{ number_format($laporan['total_pendapatan'], 0, ',', '.') }}
                </p>
            </div>

            <div class="card">
                <h3>Produk Terlaris</h3>
                <p>{{ $laporan['produk_terlaris'] }}</p>
            </div>

        </div>

    </div>

</body>

</html>