<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scratchy Nib</title>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { background: #fff; color: #333; font-family: 'Playfair Display', serif; }
        .navbar-brand { font-family: 'Great Vibes', cursive; font-size: 2.8rem; color: #c9a96e !important; }
        .nav-link:hover { color: #c9a96e !important; transition: 0.3s; }
        .ticker { overflow: hidden; white-space: nowrap; animation: scroll 25s linear infinite; font-size: 0.9rem; color: #fff; }
        @keyframes scroll { 0% { transform: translateX(100%); } 100% { transform: translateX(-100%); } }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" width="50" class="d-inline-block align-text-top me-2">
                Scratchy Nib
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Trang chủ</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Phong cách</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#traditional">Truyền thống</a></li>
                            <li><a class="dropdown-item" href="#contemporary">Đương đại</a></li>
                            <li><a class="dropdown-item" href="#hand-lettering">Viết tay & Thiết kế</a></li>
                            <li><a class="dropdown-item" href="#modern">Hiện đại</a></li>
                            <li><a class="dropdown-item" href="#forms-styles">Hình thức & Kiểu chữ</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contribute">Góp ảnh</a></li>
                    <li class="nav-item"><a class="nav-link" href="#feedback">Phản hồi</a></li>
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Đăng nhập</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Đăng ký</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1050;">
        <span class="badge bg-dark">Lượt truy cập: {{ $visitorCount ?? 0 }}</span>
    </div>

    @yield('content')

    <footer class="bg-dark text-white py-3 mt-5 fixed-bottom">
        <div class="container text-center">
            <div id="ticker" class="ticker">Thời gian: ... | Vị trí: ...</div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function updateTicker() {
            const date = new Date().toLocaleString('vi-VN');
            let location = 'Không xác định';
            navigator.geolocation.getCurrentPosition(pos => {
                location = `Vĩ độ: ${pos.coords.latitude}, Kinh độ: ${pos.coords.longitude}`;
            });
            document.getElementById('ticker').innerHTML = `Thời gian: ${date} | Vị trí: ${location}`;
        }
        updateTicker();
        setInterval(updateTicker, 1000);
    </script>
</body>
</html>