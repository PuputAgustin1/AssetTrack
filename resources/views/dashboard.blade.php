<x-app-layout>

<head>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
</head>

<style>
*, *::before, *::after { 
    box-sizing: border-box; 
    margin: 0; 
    padding: 0; 
}

:root {
    --bg: #f0f2f5;
    --sidebar: #ffffff;
    --card: #ffffff;
    --text: #1a1d23;
    --muted: #6b7280;
    --border: #e5e7eb;
    --accent: #1a56db;
    --accent-light: #eff4ff;
    --success: #0e9f6e;
    --success-light: #f0fdf4;
    --danger: #e02424;
    --danger-light: #fff5f5;
    --warning: #d97706;
    --warning-light: #fffbeb;
    --radius: 12px;
    --font: 'Plus Jakarta Sans', sans-serif;
}

body {
    font-family: var(--font);
    background: var(--bg);
    color: var(--text);
    font-size: 14px;
}

.layout {
    display: flex;
    min-height: 100vh;
}

/* SIDEBAR */
.sidebar {
    width: 220px;
    background: var(--sidebar);
    border-right: 1px solid var(--border);
    padding: 24px 16px;
    display: flex;
    flex-direction: column;
    gap: 4px;
    flex-shrink: 0;
    position: sticky;
    top: 0;
    height: 100vh;
}

.brand {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 0 8px 20px;
    border-bottom: 1px solid var(--border);
    margin-bottom: 8px;
}

.brand-icon {
    width: 34px;
    height: 34px;
    background: var(--accent);
    border-radius: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.brand-icon svg {
    width: 18px;
    height: 18px;
    fill: none;
    stroke: #fff;
    stroke-width: 2;
    stroke-linecap: round;
    stroke-linejoin: round;
}

.brand-name {
    font-size: 15px;
    font-weight: 600;
    color: var(--text);
}

.brand-sub {
    font-size: 11px;
    color: var(--muted);
    margin-top: 1px;
}

.nav-label {
    font-size: 10.5px;
    font-weight: 600;
    color: var(--muted);
    letter-spacing: .06em;
    text-transform: uppercase;
    padding: 12px 10px 6px;
}

.nav-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 9px 12px;
    border-radius: 9px;
    color: var(--muted);
    font-size: 13.5px;
    font-weight: 500;
    cursor: pointer;
    transition: .15s;
    text-decoration: none;
}

.nav-item:hover {
    background: #f3f4f6;
    color: var(--text);
}

.nav-item.active {
    background: var(--accent-light);
    color: var(--accent);
}

.nav-item svg {
    width: 17px;
    height: 17px;
    flex-shrink: 0;
    fill: none;
    stroke: currentColor;
    stroke-width: 1.8;
    stroke-linecap: round;
    stroke-linejoin: round;
}

.nav-divider {
    border: none;
    border-top: 1px solid var(--border);
    margin: 8px 0;
}

.nav-item.logout {
    color: var(--danger);
    margin-top: auto;
}

.nav-item.logout:hover {
    background: var(--danger-light);
}

/* MAIN */
.main {
    flex: 1;
    display: flex;
    flex-direction: column;
    overflow: hidden;
}

.topbar {
    background: var(--card);
    border-bottom: 1px solid var(--border);
    padding: 0 28px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-shrink: 0;
    position: sticky;
    top: 0;
    z-index: 10;
}

.topbar-left h1 {
    font-size: 17px;
    font-weight: 600;
}

.topbar-left p {
    font-size: 12.5px;
    color: var(--muted);
    margin-top: 1px;
}

.topbar-right {
    display: flex;
    align-items: center;
    gap: 10px;
}

.avatar {
    width: 34px;
    height: 34px;
    background: var(--accent);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    font-weight: 600;
    color: #fff;
    flex-shrink: 0;
}

.avatar-name {
    font-size: 13px;
    font-weight: 500;
    max-width: 120px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.content {
    padding: 24px 28px;
    overflow-y: auto;
    flex: 1;
}
.profile-dropdown{
    position:relative;
}

.profile-btn{
    border:none;
    background:none;
    display:flex;
    align-items:center;
    gap:12px;
    cursor:pointer;
}

.dropdown-menu{
    position:absolute;
    top:60px;
    right:0;
    width:180px;
    background:white;
    border:1px solid var(--border);
    border-radius:14px;
    padding:10px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);

    opacity:0;
    visibility:hidden;
    transform:translateY(10px);
    transition:.2s;

    z-index:999;
}

.dropdown-menu.show{
    opacity:1;
    visibility:visible;
    transform:translateY(0);
}

.dropdown-menu a,
.dropdown-menu button{
    width:100%;
    display:block;
    text-align:left;
    padding:10px 12px;
    border-radius:10px;
    text-decoration:none;
    border:none;
    background:none;
    cursor:pointer;
    font-size:14px;
    color:var(--text);
}

.dropdown-menu a:hover,
.dropdown-menu button:hover{
    background:#f3f4f6;
}

/* STAT CARDS */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 14px;
    margin-bottom: 22px;
}

.stat-card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 18px 20px;
    position: relative;
    overflow: hidden;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0; 
    left: 0; 
    right: 0;
    height: 3px;
}

.stat-card.total::before { background: var(--accent); }
.stat-card.good::before { background: var(--success); }
.stat-card.broken::before { background: var(--danger); }
.stat-card.repair::before { background: var(--warning); }

.stat-icon {
    width: 38px;
    height: 38px;
    border-radius: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 12px;
}

.stat-icon svg {
    width: 19px;
    height: 19px;
    fill: none;
    stroke-width: 1.8;
    stroke-linecap: round;
    stroke-linejoin: round;
}

.stat-card.total .stat-icon { background: var(--accent-light); }
.stat-card.total .stat-icon svg { stroke: var(--accent); }

.stat-card.good .stat-icon { background: var(--success-light); }
.stat-card.good .stat-icon svg { stroke: var(--success); }

.stat-card.broken .stat-icon { background: var(--danger-light); }
.stat-card.broken .stat-icon svg { stroke: var(--danger); }

.stat-card.repair .stat-icon { background: var(--warning-light); }
.stat-card.repair .stat-icon svg { stroke: var(--warning); }

.stat-label {
    font-size: 12px;
    color: var(--muted);
    font-weight: 500;
    margin-bottom: 4px;
}

.stat-value {
    font-size: 26px;
    font-weight: 600;
    line-height: 1;
}

.stat-card.total .stat-value { color: var(--accent); }
.stat-card.good .stat-value { color: var(--success); }
.stat-card.broken .stat-value { color: var(--danger); }
.stat-card.repair .stat-value { color: var(--warning); }

.stat-badge {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 11px;
    font-weight: 500;
    padding: 3px 8px;
    border-radius: 20px;
    margin-top: 10px;
}

.stat-card.total .stat-badge { background: var(--accent-light); color: var(--accent); }
.stat-card.good .stat-badge { background: var(--success-light); color: var(--success); }
.stat-card.broken .stat-badge { background: var(--danger-light); color: var(--danger); }
.stat-card.repair .stat-badge { background: var(--warning-light); color: var(--warning); }

/* ACTION CARDS */
.section-title {
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 14px;
    color: var(--text);
}

.action-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 14px;
    margin-bottom: 22px;
}

.action-card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 20px;
    cursor: pointer;
    transition: .15s;
    text-decoration: none;
    display: block;
}

.action-card:hover {
    border-color: #9ca3af;
    box-shadow: 0 2px 8px rgba(0,0,0,.06);
}

.action-card-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 14px;
}

.action-card-icon svg {
    width: 20px;
    height: 20px;
    fill: none;
    stroke-width: 1.8;
    stroke-linecap: round;
    stroke-linejoin: round;
}

.ac-blue .action-card-icon { background: var(--accent-light); }
.ac-blue .action-card-icon svg { stroke: var(--accent); }

.ac-teal .action-card-icon { background: #f0fdfa; }
.ac-teal .action-card-icon svg { stroke: #0d9488; }

.ac-violet .action-card-icon { background: #f5f3ff; }
.ac-violet .action-card-icon svg { stroke: #7c3aed; }

.action-card h3 {
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 5px;
    color: var(--text);
}

.action-card p {
    font-size: 12.5px;
    color: var(--muted);
    line-height: 1.5;
    margin-bottom: 14px;
}

.action-btn {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 12.5px;
    font-weight: 500;
    padding: 7px 14px;
    border-radius: 7px;
    transition: .15s;
    color: #fff;
}

.action-btn svg {
    width: 13px;
    height: 13px;
    fill: none;
    stroke: #fff;
    stroke-width: 2.2;
    stroke-linecap: round;
    stroke-linejoin: round;
}

.ac-blue .action-btn { background: var(--accent); }
.ac-teal .action-btn { background: #0d9488; }
.ac-violet .action-btn { background: #7c3aed; }

/* TABLE CARD */
.card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    overflow: hidden;
}

.card-header {
    padding: 16px 20px;
    border-bottom: 1px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.card-header span {
    font-size: 14px;
    font-weight: 600;
}

.view-all {
    font-size: 12px;
    color: var(--accent);
    font-weight: 500;
    cursor: pointer;
    text-decoration: none;
}

.table-wrapper {
    width: 100%;
    overflow-x: auto;
}

.table-wrapper table {
    min-width: 620px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

thead th {
    font-size: 11.5px;
    font-weight: 600;
    color: var(--muted);
    text-transform: uppercase;
    letter-spacing: .04em;
    padding: 10px 16px;
    text-align: left;
    background: #fafafa;
    border-bottom: 1px solid var(--border);
}

tbody td {
    padding: 12px 16px;
    font-size: 13px;
    border-bottom: 1px solid #f3f4f6;
    vertical-align: middle;
}

tbody tr:last-child td {
    border-bottom: none;
}

tbody tr:hover td {
    background: #fafafa;
}

.badge {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 11.5px;
    font-weight: 500;
    padding: 3px 9px;
    border-radius: 20px;
    white-space: nowrap;
}

.badge::before {
    content: '';
    width: 5px;
    height: 5px;
    border-radius: 50%;
    flex-shrink: 0;
}

.badge-good { background: var(--success-light); color: var(--success); }
.badge-good::before { background: var(--success); }

.badge-broken { background: var(--danger-light); color: var(--danger); }
.badge-broken::before { background: var(--danger); }

.badge-repair { background: var(--warning-light); color: var(--warning); }
.badge-repair::before { background: var(--warning); }

.asset-code {
    font-family: monospace;
    font-size: 12px;
    background: #f3f4f6;
    padding: 3px 8px;
    border-radius: 5px;
    color: var(--muted);
}

/* MOBILE NAV */
.mobile-nav {
    display: none;
}

/* RESPONSIVE */
@media (max-width: 1024px) {
    .stats-grid { 
        grid-template-columns: repeat(2, 1fr); 
    }

    .action-grid { 
        grid-template-columns: repeat(2, 1fr); 
    }
}

@media (max-width: 768px) {
    .sidebar { 
        display: none; 
    }

    .topbar {
        padding: 0 16px;
    }

    .topbar-left h1 {
        font-size: 15px;
    }

    .topbar-left p {
        font-size: 11.5px;
    }

    .avatar-name {
        display: none;
    }

    .stats-grid { 
        grid-template-columns: 1fr; 
    }

    .action-grid { 
        grid-template-columns: 1fr; 
    }

    .content { 
        padding: 16px;
        padding-bottom: 90px;
    }

    .mobile-nav {
        display: flex;
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background: #fff;
        border-top: 1px solid var(--border);
        justify-content: space-around;
        padding: 12px 0;
        z-index: 999;
    }

    .mobile-nav a {
        font-size: 12px;
        color: var(--muted);
        text-decoration: none;
        font-weight: 600;
    }

    .mobile-nav a.active {
        color: var(--accent);
    }
}
</style>

<div class="layout">

    {{-- SIDEBAR --}}
    <aside class="sidebar">

        <div class="brand">
            <div class="brand-icon">
                <svg viewBox="0 0 24 24">
                    <rect x="2" y="3" width="20" height="14" rx="2"/>
                    <path d="M8 21h8M12 17v4"/>
                </svg>
            </div>
            <div>
                <div class="brand-name">AssetTrack</div>
                <div class="brand-sub">Monitoring Aset</div>
            </div>
        </div>

        <div class="nav-label">Menu</div>

        <a href="/dashboard" class="nav-item active">
            <svg viewBox="0 0 24 24">
                <rect x="3" y="3" width="7" height="7" rx="1"/>
                <rect x="14" y="3" width="7" height="7" rx="1"/>
                <rect x="3" y="14" width="7" height="7" rx="1"/>
                <rect x="14" y="14" width="7" height="7" rx="1"/>
            </svg>
            Dashboard
        </a>

        <a href="/assets" class="nav-item">
            <svg viewBox="0 0 24 24">
                <path d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"/>
                <path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/>
            </svg>
            Master Data
        </a>

        <a href="/scan" class="nav-item">
            <svg viewBox="0 0 24 24">
                <rect x="3" y="3" width="7" height="7"/>
                <rect x="14" y="3" width="7" height="7"/>
                <rect x="14" y="14" width="7" height="7"/>
                <path d="M3 17.5A3.5 3.5 0 006.5 21M3 14v3.5M6.5 14H3"/>
            </svg>
            Scan QR
        </a>

        <hr class="nav-divider">

        <div class="nav-label">Data</div>

        <a href="{{ route('assets.export.page') }}" class="nav-item">
            <svg viewBox="0 0 24 24">
                <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/>
                <polyline points="7 10 12 15 17 10"/>
                <line x1="12" y1="15" x2="12" y2="3"/>
            </svg>
            Export Excel
        </a>

        <a href="{{ route('assets.import.page') }}" class="nav-item">
            <svg viewBox="0 0 24 24">
                <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/>
                <polyline points="17 8 12 3 7 8"/>
                <line x1="12" y1="3" x2="12" y2="15"/>
            </svg>
            Import Excel
        </a>

        <hr class="nav-divider">

        <form method="POST" action="{{ route('logout') }}" style="margin-top:auto">
            @csrf
            <button type="submit" class="nav-item logout" style="border:none;background:transparent;width:100%;text-align:left;cursor:pointer;font-family:inherit">
                <svg viewBox="0 0 24 24">
                    <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/>
                    <polyline points="16 17 21 12 16 7"/>
                    <line x1="21" y1="12" x2="9" y2="12"/>
                </svg>
                Logout
            </button>
        </form>

    </aside>

    {{-- MAIN --}}
    <div class="main">

        {{-- TOPBAR --}}
        <div class="topbar">
            <div class="topbar-left">
                <h1>Dashboard</h1>
                <p>Selamat datang kembali 👋</p>
            </div>

            <div class="topbar">

                <div class="profile-dropdown">

                    <button class="profile-btn" onclick="toggleProfileMenu()">

                        <div class="avatar">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>

                        <div class="profile-info">
                            <span>{{ Auth::user()->name }}</span>
                        </div>

                    </button>

                    <div class="dropdown-menu" id="profileMenu">

                        <a href="{{ route('profile.edit') }}">
                            Edit Profile
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit">
                                Logout
                            </button>
                        </form>

                    </div>

                </div>

            </div>
        </div>

        {{-- CONTENT --}}
        <div class="content">

            {{-- STAT CARDS --}}
            <div class="stats-grid">

                <div class="stat-card total">
                    <div class="stat-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"/>
                            <path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/>
                        </svg>
                    </div>
                    <div class="stat-label">Total Aset</div>
                    <div class="stat-value">{{ \App\Models\Asset::count() }}</div>
                    <div class="stat-badge">Semua kategori</div>
                </div>

                <div class="stat-card good">
                    <div class="stat-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M22 11.08V12a10 10 0 11-5.93-9.14"/>
                            <polyline points="22 4 12 14.01 9 11.01"/>
                        </svg>
                    </div>
                    <div class="stat-label">Kondisi Baik</div>
                    <div class="stat-value">{{ \App\Models\Asset::where('condition', 'baik')->count() }}</div>
                    <div class="stat-badge">Aset normal</div>
                </div>

                <div class="stat-card broken">
                    <div class="stat-icon">
                        <svg viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"/>
                            <line x1="15" y1="9" x2="9" y2="15"/>
                            <line x1="9" y1="9" x2="15" y2="15"/>
                        </svg>
                    </div>
                    <div class="stat-label">Rusak</div>
                    <div class="stat-value">{{ \App\Models\Asset::where('condition', 'rusak')->count() }}</div>
                    <div class="stat-badge">Perlu tindakan</div>
                </div>

                <div class="stat-card repair">
                    <div class="stat-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/>
                        </svg>
                    </div>
                    <div class="stat-label">Dalam Perbaikan</div>
                    <div class="stat-value">{{ \App\Models\Asset::where('condition', 'perbaikan')->count() }}</div>
                    <div class="stat-badge">Sedang proses</div>
                </div>

            </div>

            {{-- QUICK ACTIONS --}}
            <div class="section-title">Aksi Cepat</div>

            <div class="action-grid">

                <a href="/assets" class="action-card ac-blue">
                    <div class="action-card-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"/>
                            <path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/>
                        </svg>
                    </div>
                    <h3>Kelola Aset</h3>
                    <p>Tambah, edit, dan monitoring seluruh data aset perusahaan.</p>
                    <span class="action-btn">
                        Buka Master Data
                        <svg viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </span>
                </a>

                <a href="/scan" class="action-card ac-teal">
                    <div class="action-card-icon">
                        <svg viewBox="0 0 24 24">
                            <rect x="3" y="3" width="7" height="7"/>
                            <rect x="14" y="3" width="7" height="7"/>
                            <rect x="14" y="14" width="7" height="7"/>
                            <path d="M3 17.5A3.5 3.5 0 006.5 21M3 14v3.5M6.5 14H3"/>
                        </svg>
                    </div>
                    <h3>Scan QR Code</h3>
                    <p>Scan QR code untuk melihat detail lengkap aset secara langsung.</p>
                    <span class="action-btn">
                        Scan Sekarang
                        <svg viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </span>
                </a>

                <a href="{{ route('assets.export.page') }}" class="action-card ac-violet">
                    <div class="action-card-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/>
                            <polyline points="7 10 12 15 17 10"/>
                            <line x1="12" y1="15" x2="12" y2="3"/>
                        </svg>
                    </div>
                    <h3>Export Excel</h3>
                    <p>Unduh seluruh data aset dalam format spreadsheet Excel.</p>
                    <span class="action-btn">
                        Export Data
                        <svg viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </span>
                    
                </a>

                <a href="{{ route('assets.import.page') }}" class="action-card ac-violet">
                    <div class="action-card-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/>
                            <polyline points="17 8 12 3 7 8"/>
                            <line x1="12" y1="3" x2="12" y2="15"/>
                        </svg>
                    </div>
                    <h3>Import Excel</h3>
                    <p>Upload data aset dalam bentuk spreadsheet</p>
                    <span class="action-btn">
                        Import Data
                        <svg viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </span>
                    
                </a>

            </div>

            {{-- RECENT ASSETS --}}
            <div class="section-title">Aset Terbaru</div>

            <div class="card">

                <div class="card-header">
                    <span>Daftar Aset</span>
                    <a href="/assets" class="view-all">Lihat semua →</a>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Kode Aset</th>
                                <th>Nama Aset</th>
                                <th>Lokasi</th>
                                <th>Kondisi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse(\App\Models\Asset::latest()->take(5)->get() as $asset)
                                <tr>
                                    <td>
                                        <span class="asset-code">{{ $asset->code }}</span>
                                    </td>

                                    <td style="font-weight: 500">
                                        {{ $asset->name }}
                                    </td>

                                    <td style="color: var(--muted)">
                                        {{ $asset->location }}
                                    </td>

                                    <td>
                                        @php
                                            $badgeClass = match($asset->condition) {
                                                'baik'      => 'badge-good',
                                                'rusak'     => 'badge-broken',
                                                'perbaikan' => 'badge-repair',
                                                default     => 'badge-good',
                                            };
                                        @endphp

                                        <span class="badge {{ $badgeClass }}">
                                            {{ ucfirst($asset->condition) }}
                                        </span>
                                    </td>

                                    <td>
                                        <a href="{{ route('assets.show', $asset->code) }}" style="font-size: 12px; color: var(--accent); font-weight: 500; text-decoration: none">
                                            Detail →
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" style="text-align:center; color:var(--muted); padding:40px 16px">
                                        Belum ada data aset.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>

{{-- MOBILE NAV --}}
<div class="mobile-nav">
    <a href="/dashboard" class="active">Dashboard</a>
    <a href="/assets">Aset</a>
    <a href="/scan">Scan</a>
</div>

<script>
function toggleProfileMenu(){
    document.getElementById('profileMenu')
        .classList.toggle('show');
}

window.addEventListener('click', function(e){

    const dropdown = document.querySelector('.profile-dropdown');

    if(!dropdown.contains(e.target)){
        document.getElementById('profileMenu')
            .classList.remove('show');
    }

});
</script>

</x-app-layout>