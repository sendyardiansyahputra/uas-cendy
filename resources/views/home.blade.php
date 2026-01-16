<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard User</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: radial-gradient(circle at top, #1e3c72, #0f2027);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            width: 100%;
            max-width: 520px;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(8px);
            border-radius: 18px;
            padding: 35px;
            box-shadow: 0 30px 60px rgba(0,0,0,0.35);
            animation: fadeUp 0.6s ease;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h2 {
            margin: 0;
            font-size: 26px;
            color: #0f2027;
            letter-spacing: 0.5px;
        }

        .header p {
            margin-top: 8px;
            font-size: 14px;
            color: #555;
        }

        .header span {
            font-weight: 600;
            color: #1e3c72;
        }

        .menu {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
            margin: 30px 0;
        }

        .menu a {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 20px;
            text-decoration: none;
            border-radius: 14px;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: #fff;
            font-size: 16px;
            box-shadow: 0 10px 25px rgba(30,60,114,0.35);
            transition: 0.35s;
        }

        .menu a span {
            font-size: 20px;
        }

        .menu a:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 18px 35px rgba(30,60,114,0.45);
        }

        .logout {
            text-align: center;
            margin-top: 20px;
        }

        .logout button {
            background: transparent;
            border: 2px solid #c0392b;
            color: #c0392b;
            padding: 12px 28px;
            font-size: 14px;
            border-radius: 30px;
            cursor: pointer;
            transition: 0.3s;
        }

        .logout button:hover {
            background: #c0392b;
            color: #fff;
            box-shadow: 0 10px 25px rgba(192,57,43,0.4);
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="header">
            <h2>Dashboard User</h2>
            <p>Selamat datang, <span>{{ auth()->user()->name }}</span></p>
        </div>

        <div class="menu">
            <a href="/user/items">
                <div>Peralatan Camping</div>
                <span>🧳</span>
            </a>

            <a href="/user/rentals">
                <div>Riwayat Penyewaan</div>
                <span>📜</span>
            </a>
        </div>

        <div class="logout">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>

</body>
</html>
