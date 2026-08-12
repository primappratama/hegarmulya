<x-app-layout>
    <x-slot name="header">
        <span>Dashboard</span>
    </x-slot>

    <style>
        @keyframes fadeUp{from{opacity:0;transform:translateY(18px);}to{opacity:1;transform:translateY(0);}}

        .welcome-banner{
            background:linear-gradient(135deg, #2a5c53 0%, #1D4A43 60%, #123430 100%);
            border-radius:12px;padding:40px 44px;margin-bottom:36px;position:relative;overflow:hidden;
            opacity:0;animation:fadeUp .7s cubic-bezier(.4,0,.2,1) .05s forwards;
        }
        .welcome-banner::before{
            content:'';position:absolute;inset:0;
            background:radial-gradient(circle at 88% 15%, rgba(204,153,102,0.16) 0%, transparent 45%),
                       radial-gradient(circle at 10% 90%, rgba(102,153,102,0.12) 0%, transparent 50%);
        }
        .welcome-eyebrow{font-size:11px;font-weight:600;letter-spacing:1.4px;text-transform:uppercase;color:#CC9966;position:relative;z-index:2;}
        .welcome-title{font-size:26px;font-weight:600;color:#F6E6D8;margin-top:10px;letter-spacing:-.015em;position:relative;z-index:2;}
        .welcome-sub{font-size:14px;color:rgba(246,230,216,0.6);margin-top:8px;position:relative;z-index:2;font-weight:400;}

        .stat-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-bottom:44px;}
        .stat-card{
            background:#fff;border-radius:10px;padding:26px;
            border:1px solid rgba(29,74,67,0.07);
            transition:transform .3s cubic-bezier(.4,0,.2,1), box-shadow .3s, border-color .3s;
            opacity:0;animation:fadeUp .6s cubic-bezier(.4,0,.2,1) forwards;
        }
        .stat-card:nth-child(1){animation-delay:.12s;}
        .stat-card:nth-child(2){animation-delay:.18s;}
        .stat-card:nth-child(3){animation-delay:.24s;}
        .stat-card:nth-child(4){animation-delay:.30s;}
        .stat-card:hover{transform:translateY(-4px);box-shadow:0 16px 32px -12px rgba(29,74,67,0.18);border-color:rgba(204,153,102,0.3);}
        .stat-icon{
            width:40px;height:40px;border-radius:10px;
            display:flex;align-items:center;justify-content:center;margin-bottom:18px;
            transition:transform .3s cubic-bezier(.4,0,.2,1);
        }
        .stat-card:hover .stat-icon{transform:scale(1.08) rotate(-4deg);}
        .stat-icon svg{width:19px;height:19px;}
        .stat-num{font-size:32px;font-weight:700;color:#1D4A43;letter-spacing:-.02em;font-variant-numeric:tabular-nums;}
        .stat-label{font-size:12.5px;color:#9a9a92;margin-top:5px;font-weight:500;letter-spacing:.1px;}

        .section-label{
            font-size:11.5px;font-weight:600;letter-spacing:.6px;text-transform:uppercase;color:#9a9a92;
            margin-bottom:18px;display:flex;align-items:center;gap:10px;
            opacity:0;animation:fadeUp .6s cubic-bezier(.4,0,.2,1) .38s forwards;
        }
        .section-label::after{content:'';flex:1;height:1px;background:rgba(29,74,67,0.08);}

        .manage-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;}
        .manage-card{
            background:#fff;border-radius:10px;padding:24px;
            border:1px solid rgba(29,74,67,0.07);display:flex;align-items:center;gap:16px;
            transition:all .3s cubic-bezier(.4,0,.2,1);
            opacity:0;animation:fadeUp .6s cubic-bezier(.4,0,.2,1) forwards;
        }
        .manage-card:nth-child(1){animation-delay:.42s;}
        .manage-card:nth-child(2){animation-delay:.47s;}
        .manage-card:nth-child(3){animation-delay:.52s;}
        .manage-card:nth-child(4){animation-delay:.57s;}
        .manage-card:nth-child(5){animation-delay:.62s;}
        .manage-card:nth-child(6){animation-delay:.67s;}
        .manage-card:hover{border-color:#CC9966;transform:translateX(5px);box-shadow:0 8px 20px -10px rgba(29,74,67,0.15);}
        .manage-icon{
            width:44px;height:44px;border-radius:50%;background:#F6E6D8;
            display:flex;align-items:center;justify-content:center;flex-shrink:0;
            transition:background .3s;
        }
        .manage-card:hover .manage-icon{background:#1D4A43;}
        .manage-icon svg{width:19px;height:19px;stroke:#1D4A43;transition:stroke .3s;}
        .manage-card:hover .manage-icon svg{stroke:#F6E6D8;}
        .manage-title{font-size:14.5px;font-weight:600;color:#1D4A43;letter-spacing:-.005em;}
        .manage-sub{font-size:12.5px;color:#9a9a92;margin-top:2px;}
        .manage-arrow{margin-left:auto;opacity:0;transform:translateX(-6px);transition:all .3s;}
        .manage-card:hover .manage-arrow{opacity:1;transform:translateX(0);}
        .manage-arrow svg{width:15px;height:15px;stroke:#CC9966;}

        @media(max-width:1000px){
            .stat-grid{grid-template-columns:repeat(2,1fr);}
            .manage-grid{grid-template-columns:1fr 1fr;}
            .welcome-banner{padding:30px 28px;}
        }
        @media(max-width:640px){
            .stat-grid{grid-template-columns:1fr;}
            .manage-grid{grid-template-columns:1fr;}
        }
    </style>

    <div class="welcome-banner">
        <span class="welcome-eyebrow">Panel Administrasi</span>
        <h2 class="welcome-title">Selamat datang, {{ auth()->user()->name }}</h2>
        <p class="welcome-sub">Kelola seluruh konten Desa Hegarmulya dari satu tempat.</p>
    </div>

    <div class="stat-grid">
        <div class="stat-card">
            <div class="stat-icon" style="background:#1D4A43;">
                <svg viewBox="0 0 24 24" fill="none" stroke="#F6E6D8" stroke-width="1.8" stroke-linecap="round"><path d="M3 9l1.5-5h15L21 9"/><path d="M3 9h18v10a1 1 0 01-1 1H4a1 1 0 01-1-1V9z"/><path d="M9 13a3 3 0 006 0"/></svg>
            </div>
            <div class="stat-num" data-count="{{ \App\Models\Umkm::count() }}">0</div>
            <div class="stat-label">Total UMKM</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:#669966;">
                <svg viewBox="0 0 24 24" fill="none" stroke="#F6E6D8" stroke-width="1.8" stroke-linecap="round"><rect x="3" y="4" width="18" height="16" rx="2"/><circle cx="9" cy="10" r="2"/><path d="M21 16l-5.5-5.5L4 21"/></svg>
            </div>
            <div class="stat-num" data-count="{{ \App\Models\Galeri::count() }}">0</div>
            <div class="stat-label">Foto Galeri</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:#CC9966;">
                <svg viewBox="0 0 24 24" fill="none" stroke="#123430" stroke-width="1.8" stroke-linecap="round"><rect x="4" y="4" width="16" height="16" rx="1"/><path d="M8 9h8M8 13h8M8 17h4"/></svg>
            </div>
            <div class="stat-num" data-count="{{ \App\Models\Berita::count() }}">0</div>
            <div class="stat-label">Berita Dipublikasikan</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:#123430;">
                <svg viewBox="0 0 24 24" fill="none" stroke="#CC9966" stroke-width="1.8" stroke-linecap="round"><circle cx="12" cy="5" r="2.5"/><circle cx="5" cy="19" r="2.5"/><circle cx="19" cy="19" r="2.5"/><path d="M12 7.5v5m0 0l-6 4m6-4l6 4"/></svg>
            </div>
            <div class="stat-num" data-count="{{ \App\Models\StrukturPemerintahan::count() }}">0</div>
            <div class="stat-label">Jabatan Terdaftar</div>
        </div>
    </div>

    <div class="section-label">Kelola Konten</div>

    <div class="manage-grid">
        @php
            $menus = [
                ['route' => 'admin.profil-desa.index', 'title' => 'Profil Desa', 'sub' => 'Sejarah, visi misi, geografis', 'icon' => '<path d="M3 21V8l9-5 9 5v13"/><path d="M9 21v-8h6v8"/>'],
                ['route' => 'admin.struktur.index', 'title' => 'Struktur Pemerintahan', 'sub' => 'Perangkat dan hierarki desa', 'icon' => '<circle cx="12" cy="5" r="2.5"/><circle cx="5" cy="19" r="2.5"/><circle cx="19" cy="19" r="2.5"/><path d="M12 7.5v5m0 0l-6 4m6-4l6 4"/>'],
                ['route' => 'admin.umkm.index', 'title' => 'UMKM', 'sub' => 'Data usaha warga desa', 'icon' => '<path d="M3 9l1.5-5h15L21 9"/><path d="M3 9h18v10a1 1 0 01-1 1H4a1 1 0 01-1-1V9z"/><path d="M9 13a3 3 0 006 0"/>'],
                ['route' => 'admin.galeri.index', 'title' => 'Galeri', 'sub' => 'Foto dokumentasi desa', 'icon' => '<rect x="3" y="4" width="18" height="16" rx="2"/><circle cx="9" cy="10" r="2"/><path d="M21 16l-5.5-5.5L4 21"/>'],
                ['route' => 'admin.berita.index', 'title' => 'Berita', 'sub' => 'Kegiatan dan kabar desa', 'icon' => '<rect x="4" y="4" width="16" height="16" rx="1"/><path d="M8 9h8M8 13h8M8 17h4"/>'],
                ['route' => 'admin.pesan-kesan.index', 'title' => 'Pesan & Kesan', 'sub' => 'Narasi storytelling desa', 'icon' => '<path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/>'],
            ];
        @endphp

        @foreach ($menus as $menu)
            <a href="{{ route($menu['route']) }}" class="manage-card">
                <div class="manage-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round">{!! $menu['icon'] !!}</svg></div>
                <div>
                    <div class="manage-title">{{ $menu['title'] }}</div>
                    <div class="manage-sub">{{ $menu['sub'] }}</div>
                </div>
                <div class="manage-arrow"><svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></div>
            </a>
        @endforeach
    </div>

    <script>
        document.querySelectorAll('.stat-num').forEach(el => {
            const target = parseInt(el.dataset.count, 10) || 0;
            const duration = 900;
            const start = performance.now();
            function tick(now){
                const progress = Math.min((now - start) / duration, 1);
                const eased = 1 - Math.pow(1 - progress, 3);
                el.textContent = Math.round(eased * target);
                if (progress < 1) requestAnimationFrame(tick);
            }
            requestAnimationFrame(tick);
        });
    </script>
</x-app-layout>