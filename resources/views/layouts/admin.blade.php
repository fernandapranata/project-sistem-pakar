<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tambahkan ikon FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e3f2fd; /* Warna biru muda */
            font-family: 'Arial', sans-serif;
        }
        .sidebar {
            background-color: #1565c0; /* Warna biru tua */
            color: #ffffff;
            padding: 20px;
            height: 100vh;
            position: fixed;
        }
        .sidebar a {
            color: #d1d1d1;
            text-decoration: none;
            display: block;
            padding: 10px 0;
            transition: color 0.3s ease;
        }
        .sidebar a:hover {
            color: #ffffff;
        }
        .sidebar h4 {
            color: #ffffff;
            margin-bottom: 20px;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        footer {
            text-align: center;
            background-color: #1565c0;
            color: #ffffff;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4>Menu</h4>
        <a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
        <a href="{{ route('admin.gejala') }}"><i class="fas fa-stethoscope"></i> Gejala</a>
        <a href="{{ route('admin.kerusakan') }}"><i class="fas fa-tools"></i> Kerusakan</a>
        <a href="{{ route('admin.solusi') }}"><i class="fas fa-lightbulb"></i> Solusi</a>
        <form action="{{ route('logout') }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="btn btn-danger w-100"><i class="fas fa-sign-out-alt"></i> Logout</button>
        </form>
    </div>

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        &copy; 2024 Sistem Pakar Diagnosa Kerusakan Smartphone 
    </footer>

    <!-- Tambahkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>