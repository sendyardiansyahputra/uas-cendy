<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f3f4f6;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: #ffffff;
            width: 360px;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .card h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
            box-sizing: border-box;
        }

        input:focus {
            outline: none;
            border-color: #2563eb;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 6px;
            background: #2563eb;
            color: white;
            font-size: 15px;
            cursor: pointer;
        }

        button:hover {
            background: #1e40af;
        }

        .login-link {
            margin-top: 15px;
            text-align: center;
            font-size: 14px;
        }

        .login-link a {
            color: #2563eb;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Register</h2>

    <form method="POST" action="/register">
        @csrf

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit">Register</button>
    </form>

    <div class="login-link">
        Sudah punya akun? <a href="/login">Login</a>
    </div>
</div>

</body>
</html>
