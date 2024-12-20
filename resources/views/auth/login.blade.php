<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Styling Global */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #d4f1f4; 
        }

        .container {
            display: flex;
            width: 800px;
            height: 500px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            background-color: #ffffff;
        }

        /* Kolom Kiri - Gambar */
        .left {
            flex: 1;
            background: url('login.jpg') no-repeat center center;
            background-size: cover;
            filter: brightness(0.9); /* Sesuaikan kecerahan */
        }

        /* Kolom Kanan - Form Login */
        .right {
            flex: 1;
            background-color: #f7fcff; 
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        .right h2 {
            text-align: center;
            color: #005b96;
            margin-bottom: 2rem;
            font-size: 1.4rem;
        }

        .right form {
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 300px;
        }

        .right label {
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #333333;
        }

        .right input {
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #dddddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .right input:focus {
            border-color: #005b96;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 91, 150, 0.5);
        }

        .right button {
            padding: 0.8rem;
            background-color: #005b96;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .right button:hover {
            background-color: #004073;
        }

        .right img {
            max-width: 100px;
            margin-bottom: 1rem;
        }

        .right .footer-text {
            text-align: center;
            margin-top: 1rem;
            font-size: 0.9rem;
            color: #666666;
        }

        .right .footer-text a {
            color: #005b96;
            text-decoration: none;
        }

        .right .footer-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Kolom Kiri: Gambar -->
        <div class="left"></div>

        <!-- Kolom Kanan: Form Login -->
        <div class="right">
            <h2>Selamat Datang di Diagnosa Smartphone!</h2>

            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password Anda" required>

                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
