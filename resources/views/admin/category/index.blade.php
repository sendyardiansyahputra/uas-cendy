<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kelola Kategori</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #1f4037, #99f2c8);
            padding: 40px;
        }

        .container {
            max-width: 900px;
            margin: auto;
        }

        h2 {
            color: #fff;
            margin-bottom: 25px;
            font-size: 30px;
        }

        .card {
            background: #fff;
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 20px 45px rgba(0,0,0,0.3);
            margin-bottom: 30px;
        }

        form {
            display: flex;
            gap: 15px;
        }

        input[type="text"] {
            flex: 1;
            padding: 12px 14px;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-size: 15px;
        }

        input:focus {
            outline: none;
            border-color: #1f4037;
        }

        button {
            padding: 12px 22px;
            border-radius: 10px;
            border: none;
            background: #1f4037;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
        }

        button:hover {
            background: #16352e;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 14px;
            text-align: left;
        }

        th {
            background: #f4f6f8;
            text-transform: uppercase;
            font-size: 13px;
            color: #555;
        }

        tr:not(:last-child) {
            border-bottom: 1px solid #e6e6e6;
        }

        .back {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #fff;
            font-weight: 600;
        }

        .back:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>Kelola Kategori</h2>

    <!-- FORM TAMBAH -->
    <div class="card">
        <form method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nama kategori" required>
            <button type="submit">Tambah</button>
        </form>
    </div>

    <!-- LIST -->
    <div class="card">
        <table>
            <tr>
                <th>Nama Kategori</th>
            </tr>

            @foreach($categories as $c)
            <tr>
                <td>{{ $c->name }}</td>
            </tr>
            @endforeach
        </table>
    </div>

    <a class="back" href="/admin/dashboard">← Kembali ke Dashboard</a>

</div>

</body>
</html>
