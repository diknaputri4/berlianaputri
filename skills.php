<?php include 'navbar.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Skills – Dikna Berliana Putri</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Raleway:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <style>
      :root {
        --accent: #00bcd4;
        --accent2: #ffa726;
        --glass: rgba(255, 255, 255, 0.08);
        --glass-border: rgba(255, 255, 255, 0.2);
        --text: #ffffff;
        --text-muted: rgba(255, 255, 255, 0.65);
        --overlay-nav: rgba(10, 20, 30, 0.97);
        --nav-width: 300px;
      }
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      body {
        font-family: "Raleway", sans-serif;
        background: url("https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1920") no-repeat center center;
        background-size: cover;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        position: relative;
      }
      body::before {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.55);
        z-index: 1;
      }

      /* NAV (same as other pages) */
      .nav-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0);
        z-index: 100;
        pointer-events: none;
        transition: background 0.4s;
      }
      .nav-overlay.open {
        background: rgba(0, 0, 0, 0.45);
        pointer-events: all;
      }
      .side-nav {
        position: fixed;
        top: 0;
        right: 0;
        width: var(--nav-width);
        height: 100%;
        background: var(--overlay-nav);
        z-index: 200;
        display: flex;
        flex-direction: column;
        transform: translateX(100%);
        transition: transform 0.45s cubic-bezier(0.77, 0, 0.175, 1);
        box-shadow: -8px 0 40px rgba(0, 0, 0, 0.6);
        overflow: hidden;
      }
      .side-nav.open {
        transform: translateX(0);
      }
      .side-nav::before {
        content: "";
        display: block;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, var(--accent), var(--accent2));
        flex-shrink: 0;
      }
      .nav-header {
        padding: 30px 30px 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
      }
      .nav-profile-mini {
        display: flex;
        align-items: center;
        gap: 14px;
      }
      .nav-profile-mini img {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        border: 2px solid var(--accent);
        object-fit: cover;
      }
      .nav-name {
        font-family: "Cinzel", serif;
        font-size: 13px;
        font-weight: 600;
        color: var(--text);
        line-height: 1.3;
        letter-spacing: 0.5px;
      }
      .nav-role {
        font-size: 11px;
        color: var(--accent2);
        letter-spacing: 1px;
        text-transform: uppercase;
      }
      .nav-close {
        position: absolute;
        top: 18px;
        right: 18px;
        width: 36px;
        height: 36px;
        background: rgba(255, 255, 255, 0.07);
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition:
          background 0.2s,
          transform 0.2s;
        color: var(--text-muted);
        font-size: 18px;
      }
      .nav-close:hover {
        background: rgba(255, 255, 255, 0.15);
        transform: rotate(90deg);
        color: white;
      }
      .nav-links {
        list-style: none;
        padding: 18px 0;
        flex: 1;
      }
      .nav-links li {
        opacity: 0;
        transform: translateX(30px);
        transition:
          opacity 0.35s,
          transform 0.35s;
      }
      .side-nav.open .nav-links li:nth-child(1) {
        opacity: 1;
        transform: translateX(0);
        transition-delay: 0.1s;
      }
      .side-nav.open .nav-links li:nth-child(2) {
        opacity: 1;
        transform: translateX(0);
        transition-delay: 0.15s;
      }
      .side-nav.open .nav-links li:nth-child(3) {
        opacity: 1;
        transform: translateX(0);
        transition-delay: 0.2s;
      }
      .side-nav.open .nav-links li:nth-child(4) {
        opacity: 1;
        transform: translateX(0);
        transition-delay: 0.25s;
      }
      .side-nav.open .nav-links li:nth-child(5) {
        opacity: 1;
        transform: translateX(0);
        transition-delay: 0.3s;
      }
      .side-nav.open .nav-links li:nth-child(6) {
        opacity: 1;
        transform: translateX(0);
        transition-delay: 0.35s;
      }
      .nav-links a {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 14px 30px;
        color: var(--text-muted);
        text-decoration: none;
        font-size: 13px;
        font-weight: 500;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        border-left: 3px solid transparent;
        transition:
          color 0.2s,
          border-color 0.2s,
          background 0.2s,
          padding-left 0.2s;
      }
      .nav-links a:hover,
      .nav-links a.active {
        color: var(--text);
        border-left-color: var(--accent);
        background: rgba(0, 188, 212, 0.07);
        padding-left: 36px;
      }
      .nav-icon {
        width: 18px;
        text-align: center;
        font-size: 16px;
        flex-shrink: 0;
      }
      .nav-divider {
        height: 1px;
        background: rgba(255, 255, 255, 0.07);
        margin: 8px 30px;
      }
      .nav-footer {
        padding: 20px 30px;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
      }
      .nav-socials {
        display: flex;
        gap: 12px;
      }
      .nav-socials a {
        width: 36px;
        height: 36px;
        background: rgba(255, 255, 255, 0.06);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-muted);
        text-decoration: none;
        font-size: 15px;
        transition:
          background 0.2s,
          color 0.2s,
          border-color 0.2s;
      }
      .nav-socials a:hover {
        background: var(--accent);
        border-color: var(--accent);
        color: white;
      }
      .nav-footer-note {
        margin-top: 14px;
        font-size: 11px;
        color: rgba(255, 255, 255, 0.25);
        letter-spacing: 0.5px;
      }
      .menu-btn {
        position: absolute;
        top: 20px;
        right: 20px;
        width: 50px;
        height: 50px;
        background: var(--accent);
        border: none;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        gap: 5px;
        transition:
          transform 0.3s,
          background 0.3s;
        box-shadow: 0 4px 16px rgba(0, 188, 212, 0.4);
        z-index: 10;
      }
      .menu-btn:hover {
        transform: scale(1.1);
        background: #0097a7;
      }
      .menu-btn span {
        width: 20px;
        height: 2px;
        background: white;
        border-radius: 2px;
        transition:
          transform 0.3s,
          opacity 0.3s;
        transform-origin: center;
      }
      .menu-btn.active span:nth-child(1) {
        transform: translateY(7px) rotate(45deg);
      }
      .menu-btn.active span:nth-child(2) {
        opacity: 0;
        transform: scaleX(0);
      }
      .menu-btn.active span:nth-child(3) {
        transform: translateY(-7px) rotate(-45deg);
      }

      /* ── PAGE ── */
      .page-wrapper {
        position: relative;
        z-index: 2;
        max-width: 900px;
        width: 100%;
        animation: fadeUp 0.6s ease both;
      }
      @keyframes fadeUp {
        from {
          opacity: 0;
          transform: translateY(24px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      .page-header {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 28px;
      }
      .back-btn {
        display: flex;
        align-items: center;
        gap: 8px;
        color: var(--text-muted);
        text-decoration: none;
        font-size: 13px;
        letter-spacing: 1px;
        text-transform: uppercase;
        padding: 8px 16px;
        border: 1px solid var(--glass-border);
        border-radius: 30px;
        background: var(--glass);
        backdrop-filter: blur(8px);
        transition:
          color 0.2s,
          border-color 0.2s,
          background 0.2s;
      }
      .back-btn:hover {
        color: white;
        border-color: var(--accent);
        background: rgba(0, 188, 212, 0.1);
      }
      .page-header h1 {
        font-family: "Cinzel", serif;
        font-size: 28px;
        font-weight: 700;
        color: var(--text);
        letter-spacing: 3px;
        text-transform: uppercase;
      }
      .accent-line {
        flex: 1;
        height: 1px;
        background: linear-gradient(90deg, var(--accent), transparent);
      }
      .card {
        background: var(--glass);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
        position: relative;
        overflow: hidden;
      }
      .card::before {
        content: "";
        position: absolute;
        top: -60px;
        right: -60px;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(0, 188, 212, 0.12), transparent 70%);
        pointer-events: none;
      }

      .section-label {
        font-size: 11px;
        color: var(--accent);
        letter-spacing: 2px;
        text-transform: uppercase;
        font-weight: 600;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 8px;
      }
      .section-label::after {
        content: "";
        flex: 1;
        height: 1px;
        background: rgba(0, 188, 212, 0.25);
      }

      /* ── SKILLS GRID ── */
      .skills-columns {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
      }

      /* Progress bar skill */
      .skill-list {
        display: flex;
        flex-direction: column;
        gap: 18px;
      }
      .skill-item {
      }
      .skill-top {
        display: flex;
        justify-content: space-between;
        margin-bottom: 8px;
      }
      .skill-name {
        font-size: 13px;
        color: var(--text);
        font-weight: 500;
        letter-spacing: 0.5px;
      }
      .skill-pct {
        font-size: 12px;
        color: var(--accent);
        font-weight: 600;
      }
      .bar-track {
        height: 6px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        overflow: hidden;
      }
      .bar-fill {
        height: 100%;
        border-radius: 10px;
        background: linear-gradient(90deg, var(--accent), #006978);
        width: 0;
        transition: width 1.2s cubic-bezier(0.25, 0.8, 0.25, 1);
      }

      /* Tool cards */
      .tools-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 12px;
        margin-top: 0;
      }
      .tool-card {
        background: rgba(255, 255, 255, 0.06);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        padding: 14px 12px;
        text-align: center;
        transition:
          background 0.25s,
          border-color 0.25s,
          transform 0.25s;
        cursor: default;
      }
      .tool-card:hover {
        background: rgba(0, 188, 212, 0.12);
        border-color: var(--accent);
        transform: translateY(-3px);
      }
      .tool-icon {
        font-size: 24px;
        margin-bottom: 8px;
      }
      .tool-name {
        font-size: 11px;
        color: var(--text-muted);
        letter-spacing: 0.8px;
        text-transform: uppercase;
      }

      /* Soft skills */
      .soft-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
        margin-top: 28px;
      }
      .soft-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 10px;
        transition: background 0.2s;
      }
      .soft-item:hover {
        background: rgba(255, 165, 38, 0.08);
        border-color: rgba(255, 165, 38, 0.3);
      }
      .soft-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: var(--accent2);
        flex-shrink: 0;
      }
      .soft-text {
        font-size: 13px;
        color: var(--text-muted);
      }

      @media (max-width: 768px) {
        .skills-columns {
          grid-template-columns: 1fr;
        }
        .tools-grid {
          grid-template-columns: repeat(2, 1fr);
        }
        .soft-grid {
          grid-template-columns: 1fr;
        }
        .page-header h1 {
          font-size: 20px;
        }
      }
    </style>
  </head>
  <body>
    <div class="nav-overlay" id="navOverlay"></div>
    <nav class="side-nav" id="sideNav">
      <button class="nav-close" id="navClose">&#x2715;</button>
      <div class="nav-header">
        <div class="nav-profile-mini">
          <img src="{{ asset('images/profile.jpg') }}" alt="Profile" />
          <div>
            <div class="nav-name">Dikna Berliana<br />Putri</div>
            <div class="nav-role">Web Developer</div>
          </div>
        </div>
      </div>
      <ul class="nav-links">
        <li>
          <a href="{{ route('home') }}" class="nav-item-link"><span class="nav-icon">🏠</span> Home</a>
        </li>
        <li>
          <a href="{{ route('about') }}" class="nav-item-link"><span class="nav-icon">👤</span> About Me</a>
        </li>
        <div class="nav-divider"></div>
        <li>
          <a href="{{ route('skills') }}" class="nav-item-link active"><span class="nav-icon">⚡</span> Skills</a>
        </li>
        <li>
          <a href="{{ route('portfolio') }}" class="nav-item-link"><span class="nav-icon">🗂️</span> Portfolio</a>
        </li>
        <li>
          <a href="{{ route('experience') }}" class="nav-item-link"><span class="nav-icon">📋</span> Experience</a>
        </li>
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
        <h1>Skills</h1>
        <div class="accent-line"></div>
        <button class="menu-btn" id="menuBtn"><span></span><span></span><span></span></button>
      </div>

      <div class="card">
        <div class="skills-columns">
          <!-- Technical Skills -->
          <div>
            <div class="section-label">Technical Skills</div>
            <div class="skill-list">
              <div class="skill-item">
                <div class="skill-top"><span class="skill-name">HTML / CSS</span><span class="skill-pct">90%</span></div>
                <div class="bar-track"><div class="bar-fill" data-width="90"></div></div>
              </div>

              <div class="skill-item">
                <div class="skill-top"><span class="skill-name">Laravel / PHP</span><span class="skill-pct">80%</span></div>
                <div class="bar-track"><div class="bar-fill" data-width="80"></div></div>
              </div>
              <div class="skill-item">
                <div class="skill-top"><span class="skill-name">MySQL</span><span class="skill-pct">70%</span></div>
                <div class="bar-track"><div class="bar-fill" data-width="70"></div></div>
              </div>
              <div class="skill-item">
                <div class="skill-top"><span class="skill-name">UI / UX Design</span><span class="skill-pct">65%</span></div>
                <div class="bar-track"><div class="bar-fill" data-width="65"></div></div>
              </div>
              <div class="skill-item">
                <div class="skill-top"><span class="skill-name">Git / GitHub</span><span class="skill-pct">72%</span></div>
                <div class="bar-track"><div class="bar-fill" data-width="72"></div></div>
              </div>
            </div>
          </div>

          <!-- Tools & Frameworks -->
          <div>
            <div class="section-label">Tools & Frameworks</div>
            <div class="tools-grid">
              <div class="tool-card">
                <div class="tool-icon">🔥</div>
                <div class="tool-name">Laravel</div>
              </div>
              <div class="tool-card">
                <div class="tool-icon">⚙️</div>
                <div class="tool-name">Bootstrap</div>
              </div>
              <div class="tool-card">
                <div class="tool-icon">🗄️</div>
                <div class="tool-name">MySQL</div>
              </div>
              <div class="tool-card">
                <div class="tool-icon">🐙</div>
                <div class="tool-name">GitHub</div>
              </div>
              <div class="tool-card">
                <div class="tool-icon">💻</div>
                <div class="tool-name">VS Code</div>
              </div>
              <div class="tool-card">
                <div class="tool-icon">🖌️</div>
                <div class="tool-name">Figma</div>
              </div>
              <div class="tool-card">
                <div class="tool-icon">🐘</div>
                <div class="tool-name">PHP</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Soft Skills -->
        <div style="margin-top: 36px">
          <div class="section-label">Soft Skills</div>
          <div class="soft-grid">
            <div class="soft-item">
              <div class="soft-dot"></div>
              <span class="soft-text">Komunikasi yang Baik</span>
            </div>
            <div class="soft-item">
              <div class="soft-dot"></div>
              <span class="soft-text">Kerja Tim (Teamwork)</span>
            </div>
            <div class="soft-item">
              <div class="soft-dot"></div>
              <span class="soft-text">Pemecahan Masalah</span>
            </div>
            <div class="soft-item">
              <div class="soft-dot"></div>
              <span class="soft-text">Manajemen Waktu</span>
            </div>
            <div class="soft-item">
              <div class="soft-dot"></div>
              <span class="soft-text">Adaptif & Cepat Belajar</span>
            </div>
            <div class="soft-item">
              <div class="soft-dot"></div>
              <span class="soft-text">Kreativitas & Inovasi</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      // Nav
      const menuBtn = document.getElementById("menuBtn"),
        sideNav = document.getElementById("sideNav"),
        navClose = document.getElementById("navClose"),
        navOverlay = document.getElementById("navOverlay");
      const openNav = () => {
        sideNav.classList.add("open");
        navOverlay.classList.add("open");
        menuBtn.classList.add("active");
        document.body.style.overflow = "hidden";
      };
      const closeNav = () => {
        sideNav.classList.remove("open");
        navOverlay.classList.remove("open");
        menuBtn.classList.remove("active");
        document.body.style.overflow = "";
      };
      menuBtn.addEventListener("click", () => (sideNav.classList.contains("open") ? closeNav() : openNav()));
      navClose.addEventListener("click", closeNav);
      navOverlay.addEventListener("click", closeNav);
      document.addEventListener("keydown", (e) => e.key === "Escape" && closeNav());

      // Animate bars on load
      window.addEventListener("load", () => {
        setTimeout(() => {
          document.querySelectorAll(".bar-fill").forEach((bar) => {
            bar.style.width = bar.dataset.width + "%";
          });
        }, 300);
      });
    </script>
  </body>
</html>
