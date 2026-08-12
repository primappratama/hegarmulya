<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Admin' }} &middot; Desa Hegarmulya</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body{font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,sans-serif;background:#F6E6D8;}
        .admin-shell{display:flex;min-height:100vh;}

        .sidebar{
            width:248px;flex-shrink:0;background:#123430;
            display:flex;flex-direction:column;
            position:fixed;top:0;bottom:0;left:0;
        }
        .sidebar-brand{
            padding:26px 24px;display:flex;align-items:center;gap:12px;
            border-bottom:1px solid rgba(246,230,216,0.08);
        }
        .sidebar-brand-mark{
            width:34px;height:34px;border-radius:50%;background:rgba(246,230,216,0.08);
            display:flex;align-items:center;justify-content:center;flex-shrink:0;
        }
        .sidebar-brand-text{font-size:14px;font-weight:600;color:#F6E6D8;line-height:1.3;}
        .sidebar-brand-sub{font-size:10.5px;color:rgba(246,230,216,0.45);letter-spacing:.4px;}

        .sidebar-nav{flex:1;padding:20px 14px;overflow-y:auto;}
        .nav-group-label{font-size:10.5px;font-weight:600;letter-spacing:.6px;text-transform:uppercase;color:rgba(246,230,216,0.35);padding:8px 12px;margin-top:8px;}
        .nav-item{
            display:flex;align-items:center;gap:11px;
            padding:10px 12px;border-radius:4px;margin-bottom:2px;
            font-size:13.5px;font-weight:500;color:rgba(246,230,216,0.65);
            transition:all .2s;
        }
        .nav-item:hover{background:rgba(246,230,216,0.06);color:#F6E6D8;}
        .nav-item.active{background:#CC9966;color:#123430;font-weight:600;}
        .nav-item svg{width:17px;height:17px;flex-shrink:0;}

        .sidebar-footer{padding:16px 14px;border-top:1px solid rgba(246,230,216,0.08);}
        .user-chip{
            display:flex;align-items:center;gap:10px;padding:10px 12px;border-radius:4px;
        }
        .user-avatar{
            width:32px;height:32px;border-radius:50%;background:#CC9966;
            display:flex;align-items:center;justify-content:center;
            font-size:12px;font-weight:600;color:#123430;flex-shrink:0;
        }
        .user-name{font-size:13px;font-weight:600;color:#F6E6D8;}
        .logout-btn{
            font-size:12px;color:rgba(246,230,216,0.5);background:none;border:none;
            cursor:pointer;padding:0;margin-top:2px;
        }
        .logout-btn:hover{color:#F6E6D8;text-decoration:underline;}

        .main-area{flex:1;margin-left:248px;display:flex;flex-direction:column;min-width:0;}
        .topbar{
            background:#fff;border-bottom:1px solid rgba(29,74,67,0.08);
            padding:22px 32px;display:flex;align-items:center;gap:14px;
            box-shadow:0 4px 12px -8px rgba(29,74,67,0.06);
        }
        .topbar-accent{width:4px;height:22px;border-radius:2px;background:linear-gradient(180deg,#CC9966,#669966);flex-shrink:0;}
        .topbar h1{font-size:20px;font-weight:700;color:#1D4A43;letter-spacing:-.015em;}
        .content{padding:32px;flex:1;}

        @media(max-width:900px){
            .sidebar{width:72px;}
            .sidebar-brand-text,.sidebar-brand-sub,.nav-group-label,.nav-item span,.user-name,.logout-btn{display:none;}
            .nav-item{justify-content:center;}
            .main-area{margin-left:72px;}
            .sidebar-brand{justify-content:center;}
            .user-chip{justify-content:center;}
        }

        /* ============================================
           GLOBAL ADMIN POLISH — otomatis ngefek ke SEMUA
           halaman CRUD tanpa perlu edit tiap view satu-satu
        ============================================ */
        [x-cloak]{display:none !important;}

        @keyframes contentFadeUp{from{opacity:0;transform:translateY(14px);}to{opacity:1;transform:translateY(0);}}
        .content > *{animation:contentFadeUp .5s cubic-bezier(.4,0,.2,1) forwards;}

        /* Card/panel containers */
        .content .bg-white{
            border:1px solid rgba(29,74,67,0.07) !important;
            box-shadow:0 4px 16px -8px rgba(29,74,67,0.10) !important;
            transition:box-shadow .25s cubic-bezier(.4,0,.2,1);
        }
        .content .bg-white:hover{box-shadow:0 8px 24px -8px rgba(29,74,67,0.14) !important;}
        .content .rounded-lg{border-radius:10px !important;}

        /* Table headers — teal + cream instead of flat gray */
        .content thead{background:#1D4A43 !important;}
        .content thead th{
            color:#F6E6D8 !important;
            font-size:11px !important;
            font-weight:600 !important;
            letter-spacing:.5px !important;
            text-transform:uppercase;
            padding-top:14px !important;
            padding-bottom:14px !important;
        }

        /* Table rows */
        .content tbody tr{transition:background .2s;}
        .content tbody tr:hover{background:#faf6f1 !important;}
        .content tbody tr.border-t{border-color:rgba(29,74,67,0.08) !important;}

        /* Category/section header bars (bg-[#1D4A43] used as group labels in tables) */
        .content .bg-\[\#1D4A43\].text-white.px-4.py-2{
            letter-spacing:.4px;
            font-weight:600 !important;
        }

        /* Primary buttons — add lift + shadow on hover */
        .content button[type="submit"],
        .content a.bg-\[\#1D4A43\]{
            transition:all .25s cubic-bezier(.4,0,.2,1) !important;
            box-shadow:0 2px 8px -2px rgba(29,74,67,0.3);
        }
        .content button[type="submit"]:hover,
        .content a.bg-\[\#1D4A43\]:hover{
            transform:translateY(-2px);
            box-shadow:0 8px 16px -4px rgba(29,74,67,0.35) !important;
        }

        /* Form inputs — gold focus ring instead of default blue */
        .content input[type="text"]:focus,
        .content input[type="number"]:focus,
        .content input[type="email"]:focus,
        .content input[type="date"]:focus,
        .content input[type="file"]:focus,
        .content textarea:focus,
        .content select:focus{
            border-color:#CC9966 !important;
            box-shadow:0 0 0 3px rgba(204,153,102,0.15) !important;
            outline:none !important;
        }
        .content input[type="text"],
        .content input[type="number"],
        .content input[type="email"],
        .content input[type="date"],
        .content textarea,
        .content select{
            transition:border-color .2s, box-shadow .2s !important;
        }

        /* Empty state text */
        .content .text-gray-400{
            font-style:italic;
        }

        /* Success/session banners */
        .content .bg-green-100{
            border:1px solid rgba(34,197,94,0.25) !important;
            border-radius:8px !important;
        }
    </style>
</head>
<body>
<div class="admin-shell">

    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="sidebar-brand-mark">
                <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="#CC9966" stroke-width="1.6"><path d="M12 3c2 3 5 4 5 8a5 5 0 01-10 0c0-4 3-5 5-8z"/></svg>
            </div>
            <div>
                <div class="sidebar-brand-text">Hegarmulya</div>
                <div class="sidebar-brand-sub">ADMIN PANEL</div>
            </div>
        </div>

        <nav class="sidebar-nav">
            <div class="nav-group-label">Menu</div>
            <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><rect x="3" y="3" width="7" height="9" rx="1"/><rect x="14" y="3" width="7" height="5" rx="1"/><rect x="14" y="12" width="7" height="9" rx="1"/><rect x="3" y="16" width="7" height="5" rx="1"/></svg>
                <span>Dashboard</span>
            </a>

            <div class="nav-group-label">Data Resmi (ADPUB)</div>
            <a href="{{ route('admin.batas-wilayah.index') }}" class="nav-item {{ request()->routeIs('admin.batas-wilayah.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M3 3h18v18H3z"/><path d="M9 3v18M15 3v18M3 9h18M3 15h18"/></svg>
                <span>Batas Wilayah</span>
            </a>
            <a href="{{ route('admin.perangkat-desa.index') }}" class="nav-item {{ request()->routeIs('admin.perangkat-desa.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 4-6 8-6s8 2 8 6"/></svg>
                <span>Perangkat Desa</span>
            </a>
            <a href="{{ route('admin.lembaga-kemasyarakatan.index') }}" class="nav-item {{ request()->routeIs('admin.lembaga-kemasyarakatan.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><circle cx="7" cy="8" r="3"/><circle cx="17" cy="8" r="3"/><path d="M2 20c0-3 2-5 5-5s5 2 5 5M12 20c0-3 2-5 5-5s5 2 5 5"/></svg>
                <span>Lembaga Kemasyarakatan</span>
            </a>
            <a href="{{ route('admin.ipm.index') }}" class="nav-item {{ request()->routeIs('admin.ipm.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M3 3v18h18"/><path d="M7 15l4-6 3 3 5-8"/></svg>
                <span>IPM</span>
            </a>
            <a href="{{ route('admin.sekolah.index') }}" class="nav-item {{ request()->routeIs('admin.sekolah.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M12 3L2 8l10 5 10-5-10-5z"/><path d="M6 10v6c0 1.5 3 3 6 3s6-1.5 6-3v-6"/></svg>
                <span>Sekolah</span>
            </a>
            <a href="{{ route('admin.sarana-kesehatan.index') }}" class="nav-item {{ request()->routeIs('admin.sarana-kesehatan.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M12 21c-5-4-9-7-9-11a5 5 0 019-3 5 5 0 019 3c0 4-4 7-9 11z"/></svg>
                <span>Sarana Kesehatan</span>
            </a>
            <a href="{{ route('admin.tenaga-kesehatan.index') }}" class="nav-item {{ request()->routeIs('admin.tenaga-kesehatan.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M12 8v8M8 12h8"/><circle cx="12" cy="12" r="9"/></svg>
                <span>Tenaga Kesehatan</span>
            </a>
            <a href="{{ route('admin.usaha-ekonomi.index') }}" class="nav-item {{ request()->routeIs('admin.usaha-ekonomi.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><rect x="2" y="9" width="20" height="12" rx="1"/><path d="M8 9V6a2 2 0 012-2h4a2 2 0 012 2v3"/></svg>
                <span>Usaha Ekonomi</span>
            </a>

            <div class="nav-group-label">Konten Desa</div>
            <a href="{{ route('admin.profil-desa.index') }}" class="nav-item {{ request()->routeIs('admin.profil-desa.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M3 21V8l9-5 9 5v13"/><path d="M9 21v-8h6v8"/></svg>
                <span>Profil Desa</span>
            </a>
            <a href="{{ route('admin.dusun.index') }}" class="nav-item {{ request()->routeIs('admin.dusun.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M3 12l9-9 9 9M5 10v10h14V10"/></svg>
                <span>Dusun</span>
            </a>
            <a href="{{ route('admin.irigasi.index') }}" class="nav-item {{ request()->routeIs('admin.irigasi.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M12 2c3 4 6 7 6 11a6 6 0 01-12 0c0-4 3-7 6-11z"/></svg>
                <span>Irigasi</span>
            </a>
            <a href="{{ route('admin.sungai.index') }}" class="nav-item {{ request()->routeIs('admin.sungai.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M2 12c3-3 5 3 8 0s5 3 8 0 4 3 4 3M2 17c3-3 5 3 8 0s5 3 8 0 4 3 4 3"/></svg>
                <span>Sungai</span>
            </a>
            <a href="{{ route('admin.mata-air.index') }}" class="nav-item {{ request()->routeIs('admin.mata-air.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v4M12 18v4M2 12h4M18 12h4"/></svg>
                <span>Mata Air</span>
            </a>
            <a href="{{ route('admin.wisata.index') }}" class="nav-item {{ request()->routeIs('admin.wisata.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M3 17l6-8 4 5 3-4 5 7H3z"/><circle cx="8" cy="7" r="1.5"/></svg>
                <span>Wisata</span>
            </a>
            <a href="{{ route('admin.sejarah-kepala-desa.index') }}" class="nav-item {{ request()->routeIs('admin.sejarah-kepala-desa.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/></svg>
                <span>Sejarah Kades</span>
            </a>
            <a href="{{ route('admin.statistik-penduduk.index') }}" class="nav-item {{ request()->routeIs('admin.statistik-penduduk.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M3 20V10M10 20V4M17 20v-7"/></svg>
                <span>Statistik Penduduk</span>
            </a>
            <a href="{{ route('admin.struktur.index') }}" class="nav-item {{ request()->routeIs('admin.struktur.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><circle cx="12" cy="5" r="2.5"/><circle cx="5" cy="19" r="2.5"/><circle cx="19" cy="19" r="2.5"/><path d="M12 7.5v5m0 0l-6 4m6-4l6 4"/></svg>
                <span>Struktur</span>
            </a>
            <a href="{{ route('admin.umkm.index') }}" class="nav-item {{ request()->routeIs('admin.umkm.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M3 9l1.5-5h15L21 9"/><path d="M3 9h18v10a1 1 0 01-1 1H4a1 1 0 01-1-1V9z"/><path d="M9 13a3 3 0 006 0"/></svg>
                <span>UMKM</span>
            </a>
            <a href="{{ route('admin.galeri.index') }}" class="nav-item {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><rect x="3" y="4" width="18" height="16" rx="2"/><circle cx="9" cy="10" r="2"/><path d="M21 16l-5.5-5.5L4 21"/></svg>
                <span>Galeri</span>
            </a>
            <a href="{{ route('admin.berita.index') }}" class="nav-item {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><rect x="4" y="4" width="16" height="16" rx="1"/><path d="M8 9h8M8 13h8M8 17h4"/></svg>
                <span>Berita</span>
            </a>
            <a href="{{ route('admin.pesan-kesan.index') }}" class="nav-item {{ request()->routeIs('admin.pesan-kesan.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
                <span>Pesan & Kesan</span>
            </a>

            <div class="nav-group-label">Lainnya</div>
            <a href="{{ route('home') }}" target="_blank" class="nav-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"/><path d="M15 3h6v6M10 14L21 3"/></svg>
                <span>Lihat situs</span>
            </a>
            <a href="{{ route('profile.edit') }}" class="nav-item {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 4-6 8-6s8 2 8 6"/></svg>
                <span>Pengaturan akun</span>
            </a>
        </nav>

        <div class="sidebar-footer">
            <div class="user-chip">
                <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</div>
                <div>
                    <div class="user-name">{{ auth()->user()->name ?? 'Admin' }}</div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout-btn">Keluar</button>
                    </form>
                </div>
            </div>
        </div>
    </aside>

    <div class="main-area">
        @isset($header)
            <div class="topbar">
                <div class="topbar-accent"></div>
                <h1>{!! $header !!}</h1>
            </div>
        @endisset

        <div class="content">
            {{ $slot }}
        </div>
    </div>

</div>
</body>
</html>