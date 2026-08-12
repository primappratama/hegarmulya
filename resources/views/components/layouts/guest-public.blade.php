<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Desa Hegarmulya' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root{
            --teal:#1D4A43; --teal-deep:#123430; --cream:#F6E6D8;
            --gold:#CC9966; --olive:#669966; --ink:#1a1a1a;
        }
        body{
            font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,sans-serif;
            background:var(--cream); color:var(--ink);
        }
        nav.site-nav{
            position:fixed;top:0;left:0;right:0;z-index:100;
            display:flex;align-items:center;justify-content:space-between;
            padding:28px 6vw; transition:all .4s cubic-bezier(.4,0,.2,1);
        }
        nav.site-nav.scrolled{
            padding:16px 6vw; background:rgba(29,74,67,0.92); backdrop-filter:blur(12px);
        }
        .logo{font-size:15px;font-weight:600;letter-spacing:.5px;color:var(--cream);display:flex;align-items:center;gap:10px;}
        .logo-mark{width:32px;height:32px;border-radius:50%;background:var(--teal);display:flex;align-items:center;justify-content:center;}
        .logo-mark svg{width:18px;height:18px;}
        .nav-links{display:flex;gap:36px;}
        .nav-links a{font-size:13px;font-weight:500;color:rgba(246,230,216,.75);letter-spacing:.3px;transition:color .3s;}
        .nav-links a:hover, .nav-links a.active{color:var(--cream);}

        section{padding:120px 6vw;}
        .section-head{max-width:640px;margin-bottom:64px;}
        .eyebrow{font-size:12px;font-weight:600;letter-spacing:1.5px;text-transform:uppercase;color:var(--olive);margin-bottom:16px;display:block;}
        .section-head h2{font-size:clamp(28px,3.4vw,44px);font-weight:600;letter-spacing:-.02em;line-height:1.15;color:var(--teal);}
        .section-head p{margin-top:18px;font-size:16px;line-height:1.7;color:#5a5a56;max-width:520px;}
        .reveal-up{opacity:0;transform:translateY(32px);transition:all .8s cubic-bezier(.4,0,.2,1);}
        .reveal-up.in{opacity:1;transform:translateY(0);}

        .btn{padding:15px 30px;font-size:14px;font-weight:600;border-radius:2px;transition:all .35s cubic-bezier(.4,0,.2,1);display:inline-flex;align-items:center;gap:8px;}
        .btn-solid{background:var(--gold);color:var(--teal-deep);}
        .btn-solid:hover{background:var(--cream);transform:translateY(-2px);}
        .btn-ghost{border:1px solid rgba(246,230,216,.35);color:var(--cream);}
        .btn-ghost:hover{border-color:var(--cream);background:rgba(246,230,216,.08);}
        .btn-outline-dark{border:1px solid rgba(29,74,67,.3);color:var(--teal);}
        .btn-outline-dark:hover{background:var(--teal);color:var(--cream);}

        .facts{display:grid;grid-template-columns:repeat(4,1fr);background:var(--teal-deep);border-top:1px solid rgba(246,230,216,.08);}
        .fact{padding:36px 24px;text-align:center;border-right:1px solid rgba(246,230,216,.08);}
        .fact:last-child{border-right:none;}
        .fact-num{font-size:26px;font-weight:600;color:var(--cream);margin-bottom:6px;letter-spacing:-.01em;}
        .fact-label{font-size:11.5px;color:rgba(246,230,216,.55);letter-spacing:.4px;}

        .pesan{background:var(--teal);color:var(--cream);position:relative;overflow:hidden;}
        .pesan::before{content:'';position:absolute;inset:0;background:radial-gradient(circle at 85% 20%, rgba(204,153,102,.10) 0%, transparent 45%);}
        .pesan-inner{position:relative;z-index:2;max-width:880px;margin:0 auto;}
        .pesan .eyebrow{color:var(--gold);}
        .pesan-quote{font-size:clamp(24px,3.2vw,38px);font-style:italic;font-weight:400;line-height:1.42;color:var(--cream);margin:32px 0 40px;letter-spacing:-.01em;}
        .pesan-quote .mark{color:var(--gold);font-style:normal;font-weight:600;font-size:1.1em;}
        .pesan-body{font-size:16px;line-height:1.85;color:rgba(246,230,216,.78);max-width:680px;}
        .pesan-body p{margin-bottom:20px;}
        .pesan-sign{margin-top:44px;padding-top:28px;border-top:1px solid rgba(246,230,216,.15);display:flex;align-items:center;gap:14px;}
        .pesan-sign-line{width:36px;height:1px;background:var(--gold);}
        .pesan-sign span{font-size:13px;color:rgba(246,230,216,.6);letter-spacing:.3px;}

        .grid-cards{display:grid;grid-template-columns:repeat(4,1fr);gap:1px;background:rgba(29,74,67,.1);}
        .card{background:var(--cream);padding:40px 32px;min-height:280px;display:flex;flex-direction:column;justify-content:space-between;transition:background .4s cubic-bezier(.4,0,.2,1);cursor:pointer;}
        .card:hover{background:#efe0cf;}
        .card-num{font-size:12px;color:var(--olive);font-weight:600;letter-spacing:1px;}
        .card h3{font-size:21px;font-weight:600;color:var(--teal);margin:20px 0 10px;letter-spacing:-.01em;}
        .card p{font-size:14px;line-height:1.6;color:#6b6b64;}
        .card-arrow{margin-top:24px;width:32px;height:32px;border-radius:50%;border:1px solid rgba(29,74,67,.25);display:flex;align-items:center;justify-content:center;transition:all .35s cubic-bezier(.4,0,.2,1);}
        .card:hover .card-arrow{background:var(--teal);border-color:var(--teal);transform:translateX(4px);}
        .card:hover .card-arrow svg{stroke:var(--cream);}
        .card-arrow svg{width:14px;height:14px;stroke:var(--teal);transition:stroke .3s;}

        .berita-list{display:flex;flex-direction:column;}
        .berita-item{display:flex;align-items:center;justify-content:space-between;padding:28px 0;border-bottom:1px solid rgba(29,74,67,.12);transition:padding-left .35s cubic-bezier(.4,0,.2,1);}
        .berita-item:hover{padding-left:12px;}
        .berita-left{display:flex;align-items:baseline;gap:28px;}
        .berita-date{font-size:12.5px;color:var(--olive);font-weight:600;letter-spacing:.3px;min-width:90px;}
        .berita-title{font-size:18px;font-weight:500;color:var(--teal);}
        .berita-item svg{width:16px;height:16px;stroke:#8a8a82;flex-shrink:0;transition:stroke .3s;}
        .berita-item:hover svg{stroke:var(--gold);}

        .cta{background:var(--teal-deep);color:var(--cream);text-align:center;padding:140px 6vw;}
        .cta .eyebrow{color:var(--gold);justify-content:center;display:flex;}
        .cta h2{font-size:clamp(28px,4vw,48px);font-weight:600;letter-spacing:-.02em;max-width:640px;margin:20px auto 36px;line-height:1.18;}

        footer.site-footer{background:var(--teal-deep);color:rgba(246,230,216,.5);padding:36px 6vw;border-top:1px solid rgba(246,230,216,.08);display:flex;justify-content:space-between;align-items:center;font-size:12.5px;}

        @media(max-width:860px){
            .nav-links{display:none;}
            .facts{grid-template-columns:repeat(2,1fr);}
            .fact:nth-child(2){border-right:none;}
            .grid-cards{grid-template-columns:repeat(2,1fr);}
            section{padding:80px 6vw;}
            .berita-left{gap:16px;}
            .berita-title{font-size:15px;}
            footer.site-footer{flex-direction:column;gap:12px;text-align:center;}
        }
    </style>
</head>
<body>

<nav class="site-nav" id="siteNav">
    <a href="{{ route('home') }}" class="logo">
        <div class="logo-mark">
            <svg viewBox="0 0 24 24" fill="none" stroke="#F6E6D8" stroke-width="1.6"><path d="M12 3c2 3 5 4 5 8a5 5 0 01-10 0c0-4 3-5 5-8z"/></svg>
        </div>
        Desa Hegarmulya
    </a>
    <div class="nav-links">
        <a href="{{ route('profil') }}" class="{{ request()->routeIs('profil') ? 'active' : '' }}">Profil</a>
        <a href="{{ route('wisata') }}" class="{{ request()->routeIs('wisata') ? 'active' : '' }}">Wisata</a>
        <a href="{{ route('struktur') }}" class="{{ request()->routeIs('struktur') ? 'active' : '' }}">Struktur</a>
        <a href="{{ route('umkm') }}" class="{{ request()->routeIs('umkm') ? 'active' : '' }}">UMKM</a>
        <a href="{{ route('galeri') }}" class="{{ request()->routeIs('galeri') ? 'active' : '' }}">Galeri</a>
        <a href="{{ route('berita') }}" class="{{ request()->routeIs('berita') ? 'active' : '' }}">Berita</a>
        <a href="{{ route('kontak') }}" class="{{ request()->routeIs('kontak') ? 'active' : '' }}">Kontak</a>
    </div>
</nav>

{{ $slot }}

<footer class="site-footer">
    <span>&copy; {{ date('Y') }} Desa Hegarmulya, Kabupaten Sukabumi</span>
    <span>KKN Reguler UMMI &middot; Kelompok 10</span>
</footer>

<script>
    const nav = document.getElementById('siteNav');
    window.addEventListener('scroll', () => {
        nav.classList.toggle('scrolled', window.scrollY > 60);
    });
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('in'); });
    }, { threshold: 0.15 });
    document.querySelectorAll('.reveal-up').forEach(el => observer.observe(el));
</script>

</body>
</html>