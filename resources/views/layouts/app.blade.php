<!DOCTYPE html>
<html lang='id'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>@yield('title', 'Profil App')</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: Arial, sans-serif; background: #f4f8fa; color: #262626; }
        .navbar { background: #0B1F3A; color: white; padding: 14px 24px;
                  display: flex; justify-content: space-between; align-items: center; }
        .navbar a { color: #21B0A7; text-decoration: none; font-weight: bold; }
        .container { max-width: 760px; margin: 30px auto; padding: 0 16px; }
        footer { text-align: center; padding: 20px; color: #888; font-size: 13px; }
    </style>
</head>
<body>
    <nav class='navbar'>
        <span>Pemrograman Web – UNTIRTA</span>
        <a href="{{ route('profil') }}">Profil Saya</a>
    </nav>

    <div class='container'>

    {{-- Flash message sukses --}}
    @if(session('success'))
        <div style='background:#dcfce7;color:#166534;
                    border:1px solid #86efac;padding:14px;
                    border-radius:8px;margin-bottom:16px;
                    display:flex;align-items:center;gap:8px;'>
            <span style='font-size:18px;'>✓</span>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    {{-- Flash message error --}}
    @if(session('error'))
        <div style='background:#fee2e2;color:#991b1b;
                    border:1px solid #fca5a5;padding:14px;
                    border-radius:8px;margin-bottom:16px;'>
            ⚠️ {{ session('error') }}
        </div>
    @endif

    @yield('content')
</div>

    <footer>
        &copy; {{ date('Y') }} – Royan Habibie Sukarna
    </footer>
</body>
</html>
