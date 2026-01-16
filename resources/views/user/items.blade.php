<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Peralatan Camping</title>

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
        }

        h2 {
            color: #fff;
            text-align: center;
            margin-bottom: 40px;
            font-size: 32px;
            letter-spacing: 1px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 28px;
            max-width: 1200px;
            margin: auto;
        }

        .card {
            background: #ffffff;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.35);
            transition: 0.35s;
            display: flex;
            flex-direction: column;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 30px 60px rgba(0,0,0,0.45);
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            background: #eee;
        }

        .card-body {
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .card-body h3 {
            margin: 0 0 6px;
            font-size: 20px;
            color: #2c3e50;
        }

        .category {
            font-size: 13px;
            color: #777;
            margin-bottom: 10px;
        }

        .price {
            font-size: 18px;
            font-weight: bold;
            color: #1e3c72;
            margin-bottom: 10px;
        }

        .stock {
            font-size: 14px;
            margin-bottom: 14px;
        }

        .stock span {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .stock .available {
            background: #e8f8f0;
            color: #27ae60;
        }

        .stock .empty {
            background: #fdecea;
            color: #c0392b;
        }

        form {
            margin-top: auto;
        }

        input[type=number] {
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 30px;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            transform: scale(1.03);
            box-shadow: 0 12px 25px rgba(30,60,114,0.4);
        }

        .habis {
            text-align: center;
            font-weight: bold;
            color: #c0392b;
        }

        .back {
            text-align: center;
            margin-top: 40px;
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

<h2>Peralatan Camping</h2>

<div class="grid">
@foreach($items as $item)
    <div class="card">
        @if($item->image)
            <img src="{{ asset('storage/'.$item->image) }}">
        @else
            <img src="https://via.placeholder.com/400x300?text=No+Image">
        @endif

        <div class="card-body">
            <h3>{{ $item->name }}</h3>
            <div class="category">{{ $item->category->name }}</div>

            <div class="price">Rp {{ number_format($item->price) }}</div>

            <div class="stock">
                @if($item->stock > 0)
                    <span class="available">Stok: {{ $item->stock }}</span>
                @else
                    <span class="empty">Habis</span>
                @endif
            </div>

            @if($item->stock > 0)
            <form method="POST" action="{{ route('rent.store') }}">
                @csrf
                <input type="hidden" name="item_id" value="{{ $item->id }}">
                <input type="number" name="qty" min="1" max="{{ $item->stock }}" required>
                <button>Sewa Sekarang</button>
            </form>
            @else
                <div class="habis">Tidak tersedia</div>
            @endif
        </div>
    </div>
@endforeach
</div>

<div class="back">
    <a href="/home">← Kembali ke Dashboard</a>
</div>

</body>
</html>
