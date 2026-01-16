<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kelola Item Camping</title>

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
            margin-bottom: 30px;
        }

        input, select {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
            font-size: 14px;
        }

        button {
            padding: 12px 18px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            font-weight: 600;
        }

        .add {
            background: #28a745;
            color: #fff;
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
            font-size: 13px;
            color: #555;
            text-transform: uppercase;
        }

        tr:not(:last-child) {
            border-bottom: 1px solid #eee;
        }

        img {
            border-radius: 8px;
        }

        .delete {
            background: #dc3545;
            color: #fff;
            padding: 8px 14px;
            border-radius: 8px;
            font-size: 13px;
        }

        .delete:hover {
            background: #c82333;
        }

        .back {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>
<body>

<h2>Kelola Item Camping</h2>

@if(session('success'))
    <div class="card" style="background:#d4edda;color:#155724">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <form method="POST" action="/admin/items" enctype="multipart/form-data">
        @csrf

        <input type="text" name="name" placeholder="Nama Item" required>

        <select name="category_id" required>
            @foreach($categories as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>

        <input type="number" name="price" placeholder="Harga" required>
        <input type="number" name="stock" placeholder="Stok" required>

        <input type="file" name="image">

        <button class="add" type="submit">Tambah Item</button>
    </form>
</div>

<div class="card">
    <table>
        <tr>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        @foreach($items as $item)
        <tr>
            <td>
                @if($item->image)
                    <img src="{{ asset('storage/'.$item->image) }}" width="70">
                @endif
            </td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->category->name }}</td>
            <td>Rp {{ number_format($item->price) }}</td>
            <td>{{ $item->stock }}</td>
            <td>
                <form method="POST" action="/admin/items/{{ $item->id }}"
                      onsubmit="return confirm('Yakin hapus item ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="delete">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

<a class="back" href="/admin/dashboard">← Dashboard</a>

</body>
</html>
