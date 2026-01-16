<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Rental</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #141e30, #243b55);
            padding: 40px;
            color: #333;
        }

        h2 {
            text-align: center;
            color: #fff;
            margin-bottom: 35px;
            font-size: 30px;
            letter-spacing: 1px;
        }

        .card {
            max-width: 1000px;
            margin: auto;
            background: #fff;
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 25px 60px rgba(0,0,0,0.35);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: #fff;
        }

        th, td {
            padding: 14px 16px;
            text-align: left;
        }

        th {
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        tbody tr {
            border-bottom: 1px solid #eee;
            transition: 0.2s;
        }

        tbody tr:hover {
            background: #f4f7fb;
        }

        .qty {
            font-weight: 600;
            text-align: center;
        }

        .price {
            font-weight: bold;
            color: #1e3c72;
        }

        .status {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .pending {
            background: #fff3cd;
            color: #856404;
        }

        .approved {
            background: #e6f4ea;
            color: #2e7d32;
        }

        .rejected {
            background: #fdecea;
            color: #c62828;
        }

        .empty {
            text-align: center;
            padding: 40px;
            color: #777;
            font-size: 16px;
        }

        .back {
            text-align: center;
            margin-top: 30px;
        }

        .back a {
            color: #fff;
            text-decoration: none;
            font-size: 14px;
            opacity: 0.85;
        }

        .back a:hover {
            opacity: 1;
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h2>Riwayat Rental Saya</h2>

<div class="card">
@if($rentals->count())
<table>
    <thead>
        <tr>
            <th>Item</th>
            <th>Qty</th>
            <th>Total Harga</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rentals as $r)
        <tr>
            <td>{{ $r->item->name }}</td>
            <td class="qty">{{ $r->qty }}</td>
            <td class="price">Rp {{ number_format($r->total_price) }}</td>
            <td>
                <span class="status {{ $r->status }}">
                    {{ $r->status }}
                </span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
    <div class="empty">
        Belum ada riwayat rental.
    </div>
@endif
</div>

<div class="back">
    <a href="/home">← Kembali ke Dashboard</a>
</div>

</body>
</html>
