<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            padding: 40px;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
        }

        .header h2 {
            color: #fff;
            font-size: 32px;
            margin: 0;
        }

        .header p {
            color: #d0e6ff;
            margin-top: 5px;
        }

        .logout button {
            background: #ff4d4d;
            border: none;
            color: #fff;
            padding: 10px 18px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
        }

        .logout button:hover {
            background: #e63939;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .card {
            background: #fff;
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 20px 45px rgba(0,0,0,0.35);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            margin: 0;
            font-size: 14px;
            color: #777;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .card .number {
            font-size: 36px;
            font-weight: bold;
            margin-top: 10px;
            color: #1e3c72;
        }

        .card.pending .number {
            color: #c47f00;
        }

        .menu {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
        }

        .menu a {
            text-decoration: none;
            background: #fff;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 18px 40px rgba(0,0,0,0.3);
            color: #1e3c72;
            font-size: 18px;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: 0.2s;
        }

        .menu a:hover {
            transform: translateY(-4px);
            background: #f3f7ff;
        }

        .menu span {
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="header">
        <div>
            <h2>Dashboard Admin</h2>
            <p>Halo, {{ auth()->user()->name }}</p>
        </div>

        <form class="logout" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

    <!-- STATISTICS -->
    <div class="stats">
        <div class="card">
            <h3>Total Kategori</h3>
            <div class="number">{{ $categoryCount }}</div>
        </div>

        <div class="card">
            <h3>Total Item</h3>
            <div class="number">{{ $itemCount }}</div>
        </div>

        <div class="card">
            <h3>Total Rental</h3>
            <div class="number">{{ $rentalCount }}</div>
        </div>

        <div class="card pending">
            <h3>Rental Pending</h3>
            <div class="number">{{ $pendingRental }}</div>
        </div>
    </div>

    <!-- MENU -->
    <div class="menu">
        <a href="/admin/category">
            Kelola Kategori
            <span>→</span>
        </a>

        <a href="/admin/items">
            Kelola Item
            <span>→</span>
        </a>

        <a href="/admin/rentals">
            Kelola Rental
            <span>→</span>
        </a>
    </div>

</div>

</body>
</html>
