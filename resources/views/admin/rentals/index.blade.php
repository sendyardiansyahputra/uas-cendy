<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kelola Rental</title>

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
        }

        h2 {
            color: #fff;
            margin-bottom: 25px;
            font-size: 32px;
        }

        .card {
            background: #fff;
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.35);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 14px 16px;
            text-align: left;
        }

        th {
            background: #f4f6f8;
            font-size: 13px;
            color: #555;
            text-transform: uppercase;
        }

        tr:not(:last-child) {
            border-bottom: 1px solid #eee;
        }

        .status {
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 600;
            display: inline-block;
        }

        .pending {
            background: #fff3cd;
            color: #856404;
        }

        .approved {
            background: #d4edda;
            color: #155724;
        }

        .rejected {
            background: #f8d7da;
            color: #721c24;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        button {
            border: none;
            padding: 8px 14px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .approve {
            background: #28a745;
            color: #fff;
        }

        .approve:hover {
            background: #218838;
        }

        .reject {
            background: #dc3545;
            color: #fff;
        }

        .reject:hover {
            background: #c82333;
        }

        .back {
            display: inline-block;
            margin-top: 25px;
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }

        .back:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h2>Kelola Rental</h2>

<div class="card">
    <table>
        <tr>
            <th>User</th>
            <th>Item</th>
            <th>Quanitity</th>
            <th>Total</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        @foreach($rentals as $r)
        <tr>
            <td>{{ $r->user->name }}</td>
            <td>{{ $r->item->name }}</td>
            <td>{{ $r->qty }}</td>
            <td>Rp {{ number_format($r->total_price) }}</td>
            <td>
                @if($r->status === 'pending')
                    <span class="status pending">Pending</span>
                @elseif($r->status === 'approved')
                    <span class="status approved">Approved</span>
                @else
                    <span class="status rejected">Rejected</span>
                @endif
            </td>
            <td>
                @if($r->status === 'pending')
                <div class="actions">
                    <form method="POST" action="/admin/rentals/{{ $r->id }}/approve">
                        @csrf
                        <button class="approve">Approve</button>
                    </form>
                    <form method="POST" action="/admin/rentals/{{ $r->id }}/reject">
                        @csrf
                        <button class="reject">Reject</button>
                    </form>
                </div>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
</div>

<a class="back" href="/admin/dashboard">← Kembali ke Dashboard</a>

</body>
</html>
