<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Desa Hegarmulya') }} &middot; Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body{
            font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,sans-serif;
            min-height:100vh;
            display:flex;align-items:center;justify-content:center;
            background:
                radial-gradient(circle at 20% 20%, rgba(204,153,102,0.10) 0%, transparent 45%),
                radial-gradient(circle at 80% 80%, rgba(102,153,102,0.12) 0%, transparent 50%),
                linear-gradient(135deg, #2a5c53 0%, #1D4A43 55%, #123430 100%);
            padding:24px;
        }
        .auth-wrap{width:100%;max-width:400px;}
        .auth-logo{
            display:flex;flex-direction:column;align-items:center;gap:14px;
            margin-bottom:36px;
        }
        .auth-logo-mark{
            width:52px;height:52px;border-radius:50%;background:rgba(246,230,216,0.08);
            border:1px solid rgba(246,230,216,0.15);
            display:flex;align-items:center;justify-content:center;
        }
        .auth-logo-text{font-size:15px;font-weight:600;color:#F6E6D8;letter-spacing:.3px;}
        .auth-logo-sub{font-size:12px;color:rgba(246,230,216,0.5);letter-spacing:.5px;}
        .auth-card{
            background:#F6E6D8;
            border-radius:6px;
            padding:40px 36px;
        }
    </style>
</head>
<body>
    <div class="auth-wrap">
        <div class="auth-logo">
            <div class="auth-logo-mark">
                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="#CC9966" stroke-width="1.6"><path d="M12 3c2 3 5 4 5 8a5 5 0 01-10 0c0-4 3-5 5-8z"/></svg>
            </div>
            <div style="text-align:center;">
                <div class="auth-logo-text">Desa Hegarmulya</div>
                <div class="auth-logo-sub">PANEL ADMINISTRASI</div>
            </div>
        </div>

        <div class="auth-card">
            {{ $slot }}
        </div>
    </div>
</body>
</html>