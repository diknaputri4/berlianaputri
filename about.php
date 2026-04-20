
<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me – Dikna Berliana Putri</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Raleway:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --accent: #00bcd4;
            --accent2: #ffa726;
            --glass: rgba(255,255,255,0.08);
            --glass-border: rgba(255,255,255,0.2);
            --text: #ffffff;
            --text-muted: rgba(255,255,255,0.65);
            --overlay-nav: rgba(10,20,30,0.97);
            --nav-width: 300px;
        }
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            font-family:'Raleway',sans-serif;
            background: url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1920') no-repeat center center;
            background-size:cover;
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:20px;
            position:relative;
        }
        body::before {
            content:'';
            position:absolute;
            inset:0;
            background:rgba(0,0,0,0.55);
            z-index:1;
        }

        /* ── NAV ── */
        .nav-overlay { position:fixed;inset:0;background:rgba(0,0,0,0);z-index:100;pointer-events:none;transition:background .4s; }
        .nav-overlay.open { background:rgba(0,0,0,0.45);pointer-events:all; }
        .side-nav {
            position:fixed;top:0;right:0;width:var(--nav-width);height:100%;
            background:var(--overlay-nav);z-index:200;display:flex;flex-direction:column;
            transform:translateX(100%);transition:transform .45s cubic-bezier(.77,0,.175,1);
            box-shadow:-8px 0 40px rgba(0,0,0,.6);overflow:hidden;
        }
        .side-nav.open { transform:translateX(0); }
        .side-nav::before { content:'';display:block;width:100%;height:4px;background:linear-gradient(90deg,var(--accent),var(--accent2));flex-shrink:0; }
        .nav-header { padding:30px 30px 20px;border-bottom:1px solid rgba(255,255,255,.08); }
        .nav-profile-mini { display:flex;align-items:center;gap:14px; }
        .nav-profile-mini img { width:48px;height:48px;border-radius:50%;border:2px solid var(--accent);object-fit:cover; }
        .nav-name { font-family:'Cinzel',serif;font-size:13px;font-weight:600;color:var(--text);line-height:1.3;letter-spacing:.5px; }
        .nav-role { font-size:11px;color:var(--accent2);letter-spacing:1px;text-transform:uppercase; }
        .nav-close { position:absolute;top:18px;right:18px;width:36px;height:36px;background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.12);border-radius:50%;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:background .2s,transform .2s;color:var(--text-muted);font-size:18px; }
        .nav-close:hover { background:rgba(255,255,255,.15);transform:rotate(90deg);color:white; }
        .nav-links { list-style:none;padding:18px 0;flex:1; }
        .nav-links li { opacity:0;transform:translateX(30px);transition:opacity .35s,transform .35s; }
        .side-nav.open .nav-links li:nth-child(1){opacity:1;transform:translateX(0);transition-delay:.10s}
        .side-nav.open .nav-links li:nth-child(2){opacity:1;transform:translateX(0);transition-delay:.15s}
        .side-nav.open .nav-links li:nth-child(3){opacity:1;transform:translateX(0);transition-delay:.20s}
        .side-nav.open .nav-links li:nth-child(4){opacity:1;transform:translateX(0);transition-delay:.25s}
        .side-nav.open .nav-links li:nth-child(5){opacity:1;transform:translateX(0);transition-delay:.30s}
        .side-nav.open .nav-links li:nth-child(6){opacity:1;transform:translateX(0);transition-delay:.35s}
        .nav-links a { display:flex;align-items:center;gap:16px;padding:14px 30px;color:var(--text-muted);text-decoration:none;font-size:13px;font-weight:500;letter-spacing:1.2px;text-transform:uppercase;border-left:3px solid transparent;transition:color .2s,border-color .2s,background .2s,padding-left .2s; }
        .nav-links a:hover,.nav-links a.active { color:var(--text);border-left-color:var(--accent);background:rgba(0,188,212,.07);padding-left:36px; }
        .nav-icon { width:18px;text-align:center;font-size:16px;flex-shrink:0; }
        .nav-divider { height:1px;background:rgba(255,255,255,.07);margin:8px 30px; }
        .nav-footer { padding:20px 30px;border-top:1px solid rgba(255,255,255,.08); }
        .nav-socials { display:flex;gap:12px; }
        .nav-socials a { width:36px;height:36px;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);border-radius:8px;display:flex;align-items:center;justify-content:center;color:var(--text-muted);text-decoration:none;font-size:15px;transition:background .2s,color .2s,border-color .2s; }
        .nav-socials a:hover { background:var(--accent);border-color:var(--accent);color:white; }
        .nav-footer-note { margin-top:14px;font-size:11px;color:rgba(255,255,255,.25);letter-spacing:.5px; }
        .menu-btn { position:absolute;top:20px;right:20px;width:50px;height:50px;background:var(--accent);border:none;border-radius:50%;cursor:pointer;display:flex;align-items:center;justify-content:center;flex-direction:column;gap:5px;transition:transform .3s,background .3s;box-shadow:0 4px 16px rgba(0,188,212,.4);z-index:10; }
        .menu-btn:hover { transform:scale(1.1);background:#0097a7; }
        .menu-btn span { width:20px;height:2px;background:white;border-radius:2px;transition:transform .3s,opacity .3s;transform-origin:center; }
        .menu-btn.active span:nth-child(1){transform:translateY(7px) rotate(45deg)}
        .menu-btn.active span:nth-child(2){opacity:0;transform:scaleX(0)}
        .menu-btn.active span:nth-child(3){transform:translateY(-7px) rotate(-45deg)}

        /* ── PAGE HEADER ── */
        .page-wrapper {
            position:relative;z-index:2;
            max-width:900px;width:100%;
            animation: fadeUp .6s ease both;
        }
        @keyframes fadeUp { from{opacity:0;transform:translateY(24px)} to{opacity:1;transform:translateY(0)} }

        .page-header {
            display:flex;align-items:center;gap:16px;
            margin-bottom:28px;
        }
        .page-header .back-btn {
            display:flex;align-items:center;gap:8px;
            color:var(--text-muted);text-decoration:none;
            font-size:13px;letter-spacing:1px;text-transform:uppercase;
            padding:8px 16px;border:1px solid var(--glass-border);
            border-radius:30px;background:var(--glass);
            backdrop-filter:blur(8px);
            transition:color .2s,border-color .2s,background .2s;
        }
        .page-header .back-btn:hover { color:white;border-color:var(--accent);background:rgba(0,188,212,.1); }
        .page-header h1 {
            font-family:'Cinzel',serif;font-size:28px;font-weight:700;
            color:var(--text);letter-spacing:3px;text-transform:uppercase;
        }
        .page-header .accent-line { flex:1;height:1px;background:linear-gradient(90deg,var(--accent),transparent); }

        /* ── CARD ── */
        .card {
            background:var(--glass);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);
            border:1px solid var(--glass-border);border-radius:20px;padding:40px;
            box-shadow:0 20px 60px rgba(0,0,0,.4);
            position:relative;overflow:hidden;
        }
        .card::before { content:'';position:absolute;top:-60px;right:-60px;width:200px;height:200px;border-radius:50%;background:radial-gradient(circle,rgba(0,188,212,.12),transparent 70%);pointer-events:none; }

        /* ── ABOUT LAYOUT ── */
        .about-grid { display:grid;grid-template-columns:220px 1fr;gap:40px;align-items:start; }

        .profile-col { display:flex;flex-direction:column;align-items:center;gap:20px; }
        .profile-img-wrap { position:relative; }
        .profile-img-wrap img {
            width:180px;height:180px;border-radius:50%;
            border:4px solid rgba(255,255,255,.35);object-fit:cover;
            box-shadow:0 10px 40px rgba(0,0,0,.5);
        }
        .profile-img-wrap::after {
            content:'';position:absolute;inset:-8px;border-radius:50%;
            border:2px dashed rgba(0,188,212,.4);
            animation:spin 20s linear infinite;
        }
        @keyframes spin { to{transform:rotate(360deg)} }

        .badge {
            background:linear-gradient(135deg,var(--accent),#006978);
            color:white;font-size:11px;font-weight:600;letter-spacing:1.5px;
            text-transform:uppercase;padding:6px 18px;border-radius:30px;
            box-shadow:0 4px 16px rgba(0,188,212,.3);
        }

        .stat-row { display:flex;gap:16px;justify-content:center; }
        .stat-box {
            background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);
            border-radius:12px;padding:12px 16px;text-align:center;min-width:70px;
        }
        .stat-box .num { font-family:'Cinzel',serif;font-size:22px;font-weight:700;color:var(--accent);line-height:1; }
        .stat-box .lbl { font-size:10px;color:var(--text-muted);letter-spacing:1px;text-transform:uppercase;margin-top:4px; }

        /* ── INFO COL ── */
        .info-col { display:flex;flex-direction:column;gap:28px; }

        .section-label {
            font-size:11px;color:var(--accent);letter-spacing:2px;text-transform:uppercase;
            font-weight:600;margin-bottom:10px;
            display:flex;align-items:center;gap:8px;
        }
        .section-label::after { content:'';flex:1;height:1px;background:rgba(0,188,212,.25); }

        .bio-text { color:var(--text-muted);line-height:1.9;font-size:14px; }
        .bio-text strong { color:var(--accent2);font-weight:600; }

        .details-grid { display:grid;grid-template-columns:1fr 1fr;gap:12px; }
        .detail-item { display:flex;flex-direction:column;gap:4px; }
        .detail-label { font-size:11px;color:var(--text-muted);text-transform:uppercase;letter-spacing:1px; }
        .detail-value { font-size:13px;color:var(--text);font-weight:500; }
        .detail-value a { color:var(--accent);text-decoration:none; }
        .detail-value a:hover { text-decoration:underline; }

        .interest-tags { display:flex;flex-wrap:wrap;gap:8px; }
        .tag {
            padding:5px 14px;border-radius:20px;font-size:12px;letter-spacing:.8px;
            background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.15);
            color:var(--text-muted);transition:background .2s,color .2s,border-color .2s;
            cursor:default;
        }
        .tag:hover { background:rgba(0,188,212,.15);border-color:var(--accent);color:white; }

        @media(max-width:768px){
            .about-grid{grid-template-columns:1fr}
            .profile-col{flex-direction:row;align-items:center;text-align:left;flex-wrap:wrap}
            .details-grid{grid-template-columns:1fr}
            .page-header h1{font-size:20px}
        }
    </style>
</head>
<body>
    <div class="nav-overlay" id="navOverlay"></div>
    <nav class="side-nav" id="sideNav">
        <button class="nav-close" id="navClose">&#x2715;</button>
        <div class="nav-header">
            <div class="nav-profile-mini">
                <img src="{{ asset('images/profile.jpg') }}" alt="Profile">
                <div><div class="nav-name">Dikna Berliana<br>Putri</div><div class="nav-role">Web Developer</div></div>
            </div>
        </div>
        <ul class="nav-links">
            <li><a href="{{ route('home') }}" class="nav-item-link"><span class="nav-icon">🏠</span> Home</a></li>
            <li><a href="{{ route('about') }}" class="nav-item-link active"><span class="nav-icon">👤</span> About Me</a></li>
            <div class="nav-divider"></div>
            <li><a href="{{ route('skills') }}" class="nav-item-link"><span class="nav-icon">⚡</span> Skills</a></li>
            <li><a href="{{ route('portfolio') }}" class="nav-item-link"><span class="nav-icon">🗂️</span> Portfolio</a></li>
            <li><a href="{{ route('experience') }}" class="nav-item-link"><span class="nav-icon">📋</span> Experience</a></li>
            
        </ul>
        <div class="nav-footer">
            <div class="nav-socials">
                <a href="https://wa.me/6285786186094" target="_blank">💬</a>
                <a href="https://www.instagram.com/diknaputri4" target="_blank">📸</a>
                <a href="https://mail.google.com/mail/?view=cm&to=diknaputri122@gmail.com" 
                   target="_blank" rel="noopener noreferrer">📧 📧</a>
            </div>
            <p class="nav-footer-note">© 2026 Dikna Berliana Putri</p>
        </div>
    </nav>

    <div class="page-wrapper">
        <div class="page-header">
            <a href="{{ route('home') }}" class="back-btn">← Back</a>
            <h1>About Me</h1>
            <div class="accent-line"></div>
            <button class="menu-btn" id="menuBtn"><span></span><span></span><span></span></button>
        </div>

        <div class="card">
            <div class="about-grid">
                <!-- Left: Profile -->
                <div class="profile-col">
                    <div class="profile-img-wrap">
                        <img src="images/profile.jpg" alt="Dikna Berliana Putri">
                    </div>
                    <span class="badge">Web Developer</span>
                    <div class="stat-row">
                        <div class="stat-box"><div class="num">2+</div><div class="lbl">Years</div></div>
                        <div class="stat-box"><div class="num">5</div><div class="lbl">Projects</div></div>
                    </div>
                </div>

                <!-- Right: Info -->
                <div class="info-col">
                    <div>
                        <div class="section-label">Biodata</div>
                        <p class="bio-text">
                            Halo! Saya <strong>Dikna Berliana Putri</strong>, seorang Web Developer muda yang bersemangat dari
                            <strong>Wonosobo, Jawa Tengah</strong>. Saya memiliki minat besar dalam membangun aplikasi web
                            yang bersih, fungsional, dan mudah digunakan. Dengan latar belakang di bidang teknologi informasi,
                            saya terus belajar dan berkembang untuk menghadapi tantangan industri digital yang terus berubah.
                        </p>
                    </div>

                    <div>
                        <div class="section-label">Detail Pribadi</div>
                        <div class="details-grid">
                            <div class="detail-item">
                                <span class="detail-label">Nama Lengkap</span>
                                <span class="detail-value">Dikna Berliana Putri</span>
                            </div>
                            <!-- <div class="detail-item">
                                <span class="detail-label">Tanggal Lahir</span>
                                <span class="detail-value">1 Januari 2000</span>
                            </div> -->
                            <div class="detail-item">
                                <span class="detail-label">Kota</span>
                                <span class="detail-value">Wonosobo, Jawa Tengah</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Email</span>
                                <span class="detail-value"><a href="https://mail.google.com/mail/?view=cm&to=diknaputri122@gmail.com" 
            target="_blank" rel="noopener noreferrer">diknaputri122@gmail.com</a></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Telepon</span>
                                <span class="detail-value"><a href="https://wa.me/6285786186094">085786186094</a></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Status</span>
                                <span class="detail-value">Terbuka untuk Peluang</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="section-label">Minat & Ketertarikan</div>
                        <div class="interest-tags">
                            <span class="tag">Web Development</span>
                            <span class="tag">UI / UX Design</span>
                            <span class="tag">Laravel</span>
                            <span class="tag">Open Source</span>
                            <span class="tag">Digital Marketing</span>
                            <span class="tag">Fotografi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const menuBtn=document.getElementById('menuBtn'),sideNav=document.getElementById('sideNav'),navClose=document.getElementById('navClose'),navOverlay=document.getElementById('navOverlay');
        const open=()=>{sideNav.classList.add('open');navOverlay.classList.add('open');menuBtn.classList.add('active');document.body.style.overflow='hidden'};
        const close=()=>{sideNav.classList.remove('open');navOverlay.classList.remove('open');menuBtn.classList.remove('active');document.body.style.overflow=''};
        menuBtn.addEventListener('click',()=>sideNav.classList.contains('open')?close():open());
        navClose.addEventListener('click',close);navOverlay.addEventListener('click',close);
        document.addEventListener('keydown',e=>e.key==='Escape'&&close());
    </script>
</body>
</html>
