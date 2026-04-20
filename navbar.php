<style>
  /* ───── SIDE NAV ───── */
        .nav-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0);
            z-index: 100;
            pointer-events: none;
            transition: background 0.4s ease;
        }
        .nav-overlay.open {
            background: rgba(0,0,0,0.45);
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
            padding: 0;
            transform: translateX(100%);
            transition: transform 0.45s cubic-bezier(0.77, 0, 0.175, 1);
            box-shadow: -8px 0 40px rgba(0,0,0,0.6);
            overflow: hidden;
        }
        .side-nav.open {
            transform: translateX(0);
        }

        .side-nav::before {
            content: '';
            display: block;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--accent), var(--accent2));
            flex-shrink: 0;
        }

        .nav-header {
            padding: 30px 30px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
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
        .nav-profile-mini .nav-name {
            font-family: 'Cinzel', serif;
            font-size: 13px;
            font-weight: 600;
            color: var(--text);
            line-height: 1.3;
            letter-spacing: 0.5px;
        }
        .nav-profile-mini .nav-role {
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
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s, transform 0.2s;
            color: var(--text-muted);
            font-size: 18px;
            line-height: 1;
        }
        .nav-close:hover {
            background: rgba(255,255,255,0.15);
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
            transition: opacity 0.35s ease, transform 0.35s ease;
        }
        .side-nav.open .nav-links li:nth-child(1) { opacity:1; transform:translateX(0); transition-delay: 0.10s; }
        .side-nav.open .nav-links li:nth-child(2) { opacity:1; transform:translateX(0); transition-delay: 0.15s; }
        .side-nav.open .nav-links li:nth-child(3) { opacity:1; transform:translateX(0); transition-delay: 0.20s; }
        .side-nav.open .nav-links li:nth-child(4) { opacity:1; transform:translateX(0); transition-delay: 0.25s; }
        .side-nav.open .nav-links li:nth-child(5) { opacity:1; transform:translateX(0); transition-delay: 0.30s; }
        .side-nav.open .nav-links li:nth-child(6) { opacity:1; transform:translateX(0); transition-delay: 0.35s; }

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
            transition: color 0.2s, border-color 0.2s, background 0.2s, padding-left 0.2s;
        }
        .nav-links a:hover,
        .nav-links a.active {
            color: var(--text);
            border-left-color: var(--accent);
            background: rgba(0,188,212,0.07);
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
            background: rgba(255,255,255,0.07);
            margin: 8px 30px;
        }

        .nav-footer {
            padding: 20px 30px;
            border-top: 1px solid rgba(255,255,255,0.08);
        }
        .nav-socials {
            display: flex;
            gap: 12px;
        }
        .nav-socials a {
            width: 36px;
            height: 36px;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 15px;
            transition: background 0.2s, color 0.2s, border-color 0.2s;
        }
        .nav-socials a:hover {
            background: var(--accent);
            border-color: var(--accent);
            color: white;
        }
        .nav-footer-note {
            margin-top: 14px;
            font-size: 11px;
            color: rgba(255,255,255,0.25);
            letter-spacing: 0.5px;
        }

</style>
<!-- Side Nav Overlay -->
<div class="nav-overlay" id="navOverlay"></div>

<!-- Side Navigation -->
<nav class="side-nav" id="sideNav">
    <button class="nav-close" id="navClose" aria-label="Close menu">&#x2715;</button>

    <div class="nav-header">
        <div class="nav-profile-mini">
            <img src="profile.jpg" alt="Profile">
            <div>
                <div class="nav-name">Dikna Berliana<br>Putri</div>
                <div class="nav-role">Web Developer</div>
            </div>
        </div>
    </div>

    <ul class="nav-links">
        <li>
            <a href="landing.blade.php" class="nav-item-link <?php echo basename($_SERVER['PHP_SELF']) == 'Landing.blade.php' ? 'active' : ''; ?>">
                <span class="nav-icon">🏠</span> Home
            </a>
        </li>
        <li>
            <a href="about.php" class="nav-item-link <?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>">
                <span class="nav-icon">👤</span> About Me
            </a>
        </li>

        <div class="nav-divider"></div>

        <li>
            <a href="skills.php" class="nav-item-link <?php echo basename($_SERVER['PHP_SELF']) == 'skills.php' ? 'active' : ''; ?>">
                <span class="nav-icon">⚡</span> Skills
            </a>
        </li>
        <li>
            <a href="portfolio.php" class="nav-item-link <?php echo basename($_SERVER['PHP_SELF']) == 'portfolio.php' ? 'active' : ''; ?>">
                <span class="nav-icon">🗂️</span> Portfolio
            </a>
        </li>
        <li>
            <a href="experience." class="nav-item-link <?php echo basename($_SERVER['PHP_SELF']) == 'experience.php' ? 'active' : ''; ?>">
                <span class="nav-icon">📋</span> Experience
            </a>
        </li>
    </ul>

    <div class="nav-footer">
        <div class="nav-socials">
            <a href="https://wa.me/6285786186094" target="_blank" title="WhatsApp">💬</a>
            <a href="https://www.instagram.com/diknaputri4" target="_blank" title="Instagram">📸</a>
            <a href="https://mail.google.com/mail/?view=cm&to=diknaputri122@gmail.com" 
            target="_blank" rel="noopener noreferrer">📧 </a>
        </div>
        <p class="nav-footer-note">© 2025 Dikna Berliana Putri</p>
    </div>
</nav>