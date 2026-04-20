
<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio – Dikna Berliana Putri</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Raleway:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root{--accent:#00bcd4;--accent2:#ffa726;--glass:rgba(255,255,255,0.08);--glass-border:rgba(255,255,255,0.2);--text:#ffffff;--text-muted:rgba(255,255,255,0.65);--overlay-nav:rgba(10,20,30,0.97);--nav-width:300px;}
        *{margin:0;padding:0;box-sizing:border-box;}
        body{font-family:'Raleway',sans-serif;background:url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1920') no-repeat center center;background-size:cover;min-height:100vh;display:flex;align-items:flex-start;justify-content:center;padding:30px 20px;position:relative;}
        body::before{content:'';position:absolute;inset:0;background:rgba(0,0,0,0.55);z-index:1;}

        /* NAV */
        .nav-overlay{position:fixed;inset:0;background:rgba(0,0,0,0);z-index:100;pointer-events:none;transition:background .4s;}
        .nav-overlay.open{background:rgba(0,0,0,0.45);pointer-events:all;}
        .side-nav{position:fixed;top:0;right:0;width:var(--nav-width);height:100%;background:var(--overlay-nav);z-index:200;display:flex;flex-direction:column;transform:translateX(100%);transition:transform .45s cubic-bezier(.77,0,.175,1);box-shadow:-8px 0 40px rgba(0,0,0,.6);overflow:hidden;}
        .side-nav.open{transform:translateX(0);}
        .side-nav::before{content:'';display:block;width:100%;height:4px;background:linear-gradient(90deg,var(--accent),var(--accent2));flex-shrink:0;}
        .nav-header{padding:30px 30px 20px;border-bottom:1px solid rgba(255,255,255,.08);}
        .nav-profile-mini{display:flex;align-items:center;gap:14px;}
        .nav-profile-mini img{width:48px;height:48px;border-radius:50%;border:2px solid var(--accent);object-fit:cover;}
        .nav-name{font-family:'Cinzel',serif;font-size:13px;font-weight:600;color:var(--text);line-height:1.3;letter-spacing:.5px;}
        .nav-role{font-size:11px;color:var(--accent2);letter-spacing:1px;text-transform:uppercase;}
        .nav-close{position:absolute;top:18px;right:18px;width:36px;height:36px;background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.12);border-radius:50%;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:background .2s,transform .2s;color:var(--text-muted);font-size:18px;}
        .nav-close:hover{background:rgba(255,255,255,.15);transform:rotate(90deg);color:white;}
        .nav-links{list-style:none;padding:18px 0;flex:1;}
        .nav-links li{opacity:0;transform:translateX(30px);transition:opacity .35s,transform .35s;}
        .side-nav.open .nav-links li:nth-child(1){opacity:1;transform:translateX(0);transition-delay:.10s}
        .side-nav.open .nav-links li:nth-child(2){opacity:1;transform:translateX(0);transition-delay:.15s}
        .side-nav.open .nav-links li:nth-child(3){opacity:1;transform:translateX(0);transition-delay:.20s}
        .side-nav.open .nav-links li:nth-child(4){opacity:1;transform:translateX(0);transition-delay:.25s}
        .side-nav.open .nav-links li:nth-child(5){opacity:1;transform:translateX(0);transition-delay:.30s}
        .side-nav.open .nav-links li:nth-child(6){opacity:1;transform:translateX(0);transition-delay:.35s}
        .nav-links a{display:flex;align-items:center;gap:16px;padding:14px 30px;color:var(--text-muted);text-decoration:none;font-size:13px;font-weight:500;letter-spacing:1.2px;text-transform:uppercase;border-left:3px solid transparent;transition:color .2s,border-color .2s,background .2s,padding-left .2s;}
        .nav-links a:hover,.nav-links a.active{color:var(--text);border-left-color:var(--accent);background:rgba(0,188,212,.07);padding-left:36px;}
        .nav-icon{width:18px;text-align:center;font-size:16px;flex-shrink:0;}
        .nav-divider{height:1px;background:rgba(255,255,255,.07);margin:8px 30px;}
        .nav-footer{padding:20px 30px;border-top:1px solid rgba(255,255,255,.08);}
        .nav-socials{display:flex;gap:12px;}
        .nav-socials a{width:36px;height:36px;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);border-radius:8px;display:flex;align-items:center;justify-content:center;color:var(--text-muted);text-decoration:none;font-size:15px;transition:background .2s,color .2s,border-color .2s;}
        .nav-socials a:hover{background:var(--accent);border-color:var(--accent);color:white;}
        .nav-footer-note{margin-top:14px;font-size:11px;color:rgba(255,255,255,.25);letter-spacing:.5px;}
        .menu-btn{position:absolute;top:20px;right:20px;width:50px;height:50px;background:var(--accent);border:none;border-radius:50%;cursor:pointer;display:flex;align-items:center;justify-content:center;flex-direction:column;gap:5px;transition:transform .3s,background .3s;box-shadow:0 4px 16px rgba(0,188,212,.4);z-index:10;}
        .menu-btn:hover{transform:scale(1.1);background:#0097a7;}
        .menu-btn span{width:20px;height:2px;background:white;border-radius:2px;transition:transform .3s,opacity .3s;transform-origin:center;}
        .menu-btn.active span:nth-child(1){transform:translateY(7px) rotate(45deg)}
        .menu-btn.active span:nth-child(2){opacity:0;transform:scaleX(0)}
        .menu-btn.active span:nth-child(3){transform:translateY(-7px) rotate(-45deg)}

        /* ── PAGE ── */
        .page-wrapper{position:relative;z-index:2;max-width:960px;width:100%;animation:fadeUp .6s ease both;}
        @keyframes fadeUp{from{opacity:0;transform:translateY(24px)}to{opacity:1;transform:translateY(0)}}
        .page-header{display:flex;align-items:center;gap:16px;margin-bottom:28px;}
        .back-btn{display:flex;align-items:center;gap:8px;color:var(--text-muted);text-decoration:none;font-size:13px;letter-spacing:1px;text-transform:uppercase;padding:8px 16px;border:1px solid var(--glass-border);border-radius:30px;background:var(--glass);backdrop-filter:blur(8px);transition:color .2s,border-color .2s,background .2s;}
        .back-btn:hover{color:white;border-color:var(--accent);background:rgba(0,188,212,.1);}
        .page-header h1{font-family:'Cinzel',serif;font-size:28px;font-weight:700;color:var(--text);letter-spacing:3px;text-transform:uppercase;}
        .accent-line{flex:1;height:1px;background:linear-gradient(90deg,var(--accent),transparent);}

        /* Filter tabs */
        .filter-tabs{display:flex;gap:10px;margin-bottom:24px;flex-wrap:wrap;}
        .tab-btn{padding:7px 20px;border-radius:30px;border:1px solid rgba(255,255,255,.15);background:rgba(255,255,255,.06);color:var(--text-muted);font-size:12px;font-family:'Raleway',sans-serif;font-weight:600;letter-spacing:1px;text-transform:uppercase;cursor:pointer;transition:all .2s;}
        .tab-btn:hover,.tab-btn.active{background:var(--accent);border-color:var(--accent);color:white;box-shadow:0 4px 16px rgba(0,188,212,.3);}

        /* Project grid */
        .project-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px;}

        .project-card{
            background:var(--glass);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);
            border:1px solid var(--glass-border);border-radius:16px;overflow:hidden;
            transition:transform .3s,box-shadow .3s,border-color .3s;
            animation:cardIn .5s ease both;
        }
        @keyframes cardIn{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
        .project-card:hover{transform:translateY(-6px);box-shadow:0 20px 50px rgba(0,0,0,.5);border-color:rgba(0,188,212,.4);}

        .card-thumb{
            height:140px;display:flex;align-items:center;justify-content:center;
            font-size:48px;position:relative;overflow:hidden;
        }
        .card-thumb::after{content:'';position:absolute;inset:0;background:linear-gradient(to bottom,transparent 50%,rgba(0,0,0,.4));}

        .card-body{padding:18px;}
        .card-title{font-family:'Cinzel',serif;font-size:14px;font-weight:600;color:var(--text);margin-bottom:6px;letter-spacing:.5px;}
        .card-desc{font-size:12px;color:var(--text-muted);line-height:1.7;margin-bottom:14px;}
        .card-tags{display:flex;flex-wrap:wrap;gap:6px;margin-bottom:14px;}
        .card-tag{font-size:10px;padding:3px 10px;border-radius:20px;background:rgba(0,188,212,.12);border:1px solid rgba(0,188,212,.25);color:var(--accent);letter-spacing:.5px;}
        .card-footer{display:flex;gap:8px;}
        .btn-demo,.btn-repo{
            flex:1;padding:7px 0;border-radius:8px;font-size:11px;font-family:'Raleway',sans-serif;
            font-weight:600;letter-spacing:1px;text-transform:uppercase;text-align:center;
            text-decoration:none;transition:background .2s,color .2s;
        }
        .btn-demo{background:var(--accent);color:white;}
        .btn-demo:hover{background:#0097a7;}
        .btn-repo{background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.15);color:var(--text-muted);}
        .btn-repo:hover{background:rgba(255,255,255,.15);color:white;}

        .project-card[data-cat].hidden{display:none;}

        @media(max-width:768px){
            .project-grid{grid-template-columns:1fr 1fr}
            .page-header h1{font-size:20px}
        }
        @media(max-width:500px){
            .project-grid{grid-template-columns:1fr}
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
            <li><a href="{{ route('about') }}" class="nav-item-link"><span class="nav-icon">👤</span> About Me</a></li>
            <div class="nav-divider"></div>
            <li><a href="{{ route('skills') }}" class="nav-item-link"><span class="nav-icon">⚡</span> Skills</a></li>
            <li><a href="{{ route('portfolio') }}" class="nav-item-link active"><span class="nav-icon">🗂️</span> Portfolio</a></li>
            <li><a href="{{ route('experience') }}" class="nav-item-link"><span class="nav-icon">📋</span> Experience</a></li>
            <div class="nav-divider"></div>
            
        </ul>
        <div class="nav-footer">
            <div class="nav-socials">
                <a href="https://wa.me/6285786186094" target="_blank">💬</a>
                <a href="https://www.instagram.com/diknaputri4" target="_blank">📸</a>
                <a href="mailto:diknaputri122@gmail.com">📧</a>
            </div>
            <p class="nav-footer-note">© 2025 Dikna Berliana Putri</p>
        </div>
    </nav>

    <div class="page-wrapper">
        <div class="page-header">
            <a href="{{ route('home') }}" class="back-btn">← Back</a>
            <h1>Portfolio</h1>
            <div class="accent-line"></div>
            <button class="menu-btn" id="menuBtn"><span></span><span></span><span></span></button>
        </div>

        <!-- Filter -->
        <div class="filter-tabs">
            <button class="tab-btn active" data-filter="all">Semua</button>
            <button class="tab-btn" data-filter="web">Web App</button>
            <button class="tab-btn" data-filter="ui">UI Design</button>
            <button class="tab-btn" data-filter="backend">Backend</button>
        </div>

        <!-- Projects -->
        <div class="project-grid" id="projectGrid">

            <div class="project-card" data-cat="web" style="animation-delay:.05s">
                <div class="card-thumb" style="background:linear-gradient(135deg,#0d3b47,#006978);">🛒</div>
                <div class="card-body">
                    <div class="card-title">E-Commerce Store</div>
                    <div class="card-desc">Toko banguna online lengkap dengan keranjang belanja.</div>
                    <div class="card-tags">
                        <span class="card-tag">PHP</span>
                        <span class="card-tag">MySQL</span>
                        <span class="card-tag">Bootstrap</span>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn-demo">Demo</a>
                       <a href="https://github.com/diknaputri4/tb3.git" class="btn-repo" target="_blank" rel="noopener noreferrer">GitHub</a>
                    </div>
                </div>
            </div>

            <div class="project-card" data-cat="web" style="animation-delay:.10s">
                <div class="card-thumb" style="background:linear-gradient(135deg,#1a2a3a,#2c4a6e);">📋</div>
                <div class="card-body">
                    <div class="card-title">Sistem Rekomendasi Hotel Wonosobo</div>
                    <div class="card-desc">website yang memberikan rekomendasi hotel di Wonosobo berdasarkan jarak wisata dengan hotel yang disertai dengan MAPS</div>
                    <div class="card-tags">
                        <span class="card-tag">PHP</span>
                        <span class="card-tag">Alpine.js</span>
                        <span class="card-tag">MySQL</span>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn-demo">Demo</a>
                         <a href="https://github.com/diknaputri4/ta_rekomendasi_hotel_wonosobo.git" class="btn-repo" target="_blank" rel="noopener noreferrer">GitHub</a>
                    </div>
                </div>
            </div>

            <div class="project-card" data-cat="ui" style="animation-delay:.15s">
                <div class="card-thumb" style="background:linear-gradient(135deg,#3d1a5c,#7b2d8b);">🎨</div>
                <div class="card-body">
                    <div class="card-title">Design System UI</div>
                    <div class="card-desc">Koleksi komponen UI yang konsisten dan reusable menggunakan Figma untuk aplikasi web modern.</div>
                    <div class="card-tags">
                        <span class="card-tag">Figma</span>
                        <span class="card-tag">CSS</span>
                        <span class="card-tag">Design</span>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn-demo">Preview</a>
                         <a href="https://www.figma.com/design/gPMEkq5ZJJfgOCeMJ4ryaI/BenTor-App?node-id=0-1&m=dev&t=Lublwsy8m7Qdz4yM-1" class="btn-repo" 
                         target="_blank" rel="noopener noreferrer">FIGMA</a>
                    </div>
                </div>
            </div>

            <div class="project-card" data-cat="backend" style="animation-delay:.20s">
                <div class="card-thumb" style="background:linear-gradient(135deg,#1a3a1a,#2d6a2d);">🔌</div>
                <div class="card-body">
                    <div class="card-title">Iklan 3D</div>
                    <div class="card-desc">membuat iklan 3D cara menggunkan Aplikasi pada Rumah Sakit</div>
                    <!-- <div class="card-tags">
                        <span class="card-tag">Laravel</span>
                        <span class="card-tag">JWT</span>
                        <span class="card-tag">API</span>
                    </div> -->
                    <div class="card-footer">
                        <a href="#" class="btn-demo">Docs</a>
                        <a href="#" class="btn-repo">GitHub</a>
                    </div>
                </div>
            </div>

            <div class="project-card" data-cat="web" style="animation-delay:.25s">
                <div class="card-thumb" style="background:linear-gradient(135deg,#3a2010,#8b4513);">📰</div>
                <div class="card-body">
                    <div class="card-title">WEB Profile</div>
                    <div class="card-desc">Website profil pribadi yang menampilkan informasi tentang diri, keahlian, pengalaman, portofolio project, 
                        serta kontak dalam tampilan yang modern, responsif, dan mudah diakses.</div>
                    <div class="card-tags">
                        <span class="card-tag">Laravel</span>
                        <span class="card-tag">MySQL</span>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn-demo">Demo</a>
                       <a href="https://github.com/diknaputri4/web_profile.git" 
                       class="btn-repo" target="_blank" rel="noopener noreferrer">GitHub</a>
                    </div>
                </div>
            </div>

            <div class="project-card" data-cat="ui" style="animation-delay:.30s">
                <div class="card-thumb" style="background:linear-gradient(135deg,#1a1a3a,#2d2d8b);">📱</div>
                <div class="card-body">
                    <div class="card-title">Mobile App Redesign</div>
                    <div class="card-desc">Redesain UI/UX aplikasi mobile banking dengan fokus pada kemudahan navigasi dan aksesibilitas pengguna.</div>
                    <div class="card-tags">
                        <span class="card-tag">Figma</span>
                        <span class="card-tag">UX Research</span>
                        <span class="card-tag">Prototype</span>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn-demo">Preview</a>
                         <a href="https://www.figma.com/proto/HP8mBCmAYnyL7kYPG9HmPU/Untitled?node-id=5-27&t=Z4F6uEqhb7LLfLPm-1" class="btn-repo" target="_blank" rel="noopener noreferrer">FIGMA</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        // Nav
        const menuBtn=document.getElementById('menuBtn'),sideNav=document.getElementById('sideNav'),navClose=document.getElementById('navClose'),navOverlay=document.getElementById('navOverlay');
        const openNav=()=>{sideNav.classList.add('open');navOverlay.classList.add('open');menuBtn.classList.add('active');document.body.style.overflow='hidden'};
        const closeNav=()=>{sideNav.classList.remove('open');navOverlay.classList.remove('open');menuBtn.classList.remove('active');document.body.style.overflow=''};
        menuBtn.addEventListener('click',()=>sideNav.classList.contains('open')?closeNav():openNav());
        navClose.addEventListener('click',closeNav);navOverlay.addEventListener('click',closeNav);
        document.addEventListener('keydown',e=>e.key==='Escape'&&closeNav());

        // Filter
        document.querySelectorAll('.tab-btn').forEach(btn=>{
            btn.addEventListener('click',()=>{
                document.querySelectorAll('.tab-btn').forEach(b=>b.classList.remove('active'));
                btn.classList.add('active');
                const filter=btn.dataset.filter;
                document.querySelectorAll('.project-card').forEach((card,i)=>{
                    const show = filter==='all' || card.dataset.cat===filter;
                    card.style.display = show ? 'block' : 'none';
                    if(show){ card.style.animationDelay = (i*0.05)+'s'; card.style.animation='none'; void card.offsetWidth; card.style.animation='cardIn .4s ease both'; }
                });
            });
        });
    </script>
</body>
</html>
