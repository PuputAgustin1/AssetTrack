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
    --bg:#f0f2f5;
    --card:#fff;
    --text:#1a1d23;
    --muted:#6b7280;
    --border:#e5e7eb;
    --accent:#1a56db;
    --accent-light:#eff4ff;
    --success:#0e9f6e;
    --success-light:#f0fdf4;
    --danger:#e02424;
    --danger-light:#fff5f5;
    --warning:#d97706;
    --warning-light:#fffbeb;
    --radius:12px;
    --font:'Plus Jakarta Sans',sans-serif;
}

body {
    font-family:var(--font);
    background:var(--bg);
    color:var(--text);
    font-size:14px;
}

.layout {
    display:flex;
    min-height:100vh;
}

/* SIDEBAR */
.sidebar {
    width:220px;
    background:#fff;
    border-right:1px solid var(--border);
    padding:24px 16px;
    display:flex;
    flex-direction:column;
    gap:4px;
    flex-shrink:0;
    position:sticky;
    top:0;
    height:100vh;
}

.brand {
    display:flex;
    align-items:center;
    gap:10px;
    padding:0 8px 20px;
    border-bottom:1px solid var(--border);
    margin-bottom:8px;
}

.brand-icon {
    width:34px;
    height:34px;
    background:var(--accent);
    border-radius:9px;
    display:flex;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
}

.brand-icon svg {
    width:18px;
    height:18px;
    fill:none;
    stroke:#fff;
    stroke-width:2;
    stroke-linecap:round;
    stroke-linejoin:round;
}

.brand-name {
    font-size:15px;
    font-weight:600;
}

.brand-sub {
    font-size:11px;
    color:var(--muted);
    margin-top:1px;
}

.nav-label {
    font-size:10.5px;
    font-weight:600;
    color:var(--muted);
    letter-spacing:.06em;
    text-transform:uppercase;
    padding:12px 10px 6px;
}

.nav-item {
    display:flex;
    align-items:center;
    gap:10px;
    padding:9px 12px;
    border-radius:9px;
    color:var(--muted);
    font-size:13.5px;
    font-weight:500;
    text-decoration:none;
    transition:.15s;
}

.nav-item:hover {
    background:#f3f4f6;
    color:var(--text);
}

.nav-item.active {
    background:var(--accent-light);
    color:var(--accent);
}

.nav-item svg {
    width:17px;
    height:17px;
    flex-shrink:0;
    fill:none;
    stroke:currentColor;
    stroke-width:1.8;
    stroke-linecap:round;
    stroke-linejoin:round;
}

.nav-divider {
    border:none;
    border-top:1px solid var(--border);
    margin:8px 0;
}

.nav-item.logout {
    color:var(--danger);
    margin-top:auto;
}

.nav-item.logout:hover {
    background:var(--danger-light);
}

/* MAIN */
.main {
    flex:1;
    display:flex;
    flex-direction:column;
    min-width:0;
}

.topbar {
    background:#fff;
    border-bottom:1px solid var(--border);
    padding:0 28px;
    height:60px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    flex-shrink:0;
    position:sticky;
    top:0;
    z-index:10;
}

.topbar h1 {
    font-size:17px;
    font-weight:600;
}

.topbar p {
    font-size:12.5px;
    color:var(--muted);
    margin-top:1px;
}

.topbar-right {
    display:flex;
    align-items:center;
    gap:10px;
}

.avatar {
    width:34px;
    height:34px;
    background:var(--accent);
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:13px;
    font-weight:600;
    color:#fff;
    flex-shrink:0;
}

.user-name {
    font-size:13px;
    font-weight:500;
    max-width:130px;
    overflow:hidden;
    text-overflow:ellipsis;
    white-space:nowrap;
}

.profile-dropdown {
    position: relative;
}

.profile-btn {
    border: none;
    background: none;
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
    font-family: var(--font);
    color: var(--text);
}

.dropdown-menu {
    position: absolute;
    top: 46px;
    right: 0;
    width: 180px;
    background: #fff;
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 10px;
    box-shadow: 0 10px 25px rgba(0,0,0,.08);
    opacity: 0;
    visibility: hidden;
    transform: translateY(10px);
    transition: .2s;
    z-index: 999;
}

.dropdown-menu.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.dropdown-menu a,
.dropdown-menu button {
    width: 100%;
    display: block;
    text-align: left;
    padding: 10px 12px;
    border-radius: 10px;
    text-decoration: none;
    border: none;
    background: none;
    cursor: pointer;
    font-size: 14px;
    color: var(--text);
    font-family: var(--font);
}

.dropdown-menu a:hover,
.dropdown-menu button:hover {
    background: #f3f4f6;
}

.content {
    padding:28px;
    flex:1;
    display:flex;
    justify-content:center;
}

.import-wrap {
    width:100%;
    max-width:700px;
}

.breadcrumb {
    display:flex;
    align-items:center;
    gap:6px;
    font-size:12.5px;
    color:var(--muted);
    margin-bottom:18px;
}

.breadcrumb a {
    color:var(--muted);
    text-decoration:none;
}

.breadcrumb a:hover {
    color:var(--text);
}

.breadcrumb span {
    color:var(--text);
    font-weight:500;
}

.sep {
    color:#d1d5db;
}

.page-head {
    margin-bottom:24px;
}

.page-head h2 {
    font-size:20px;
    font-weight:600;
    margin-bottom:4px;
}

.page-head p {
    font-size:13px;
    color:var(--muted);
}

/* ALERTS */
.alert {
    padding:12px 16px;
    border-radius:8px;
    font-size:13px;
    font-weight:500;
    margin-bottom:16px;
    display:flex;
    align-items:flex-start;
    gap:10px;
}

.alert svg {
    width:16px;
    height:16px;
    flex-shrink:0;
    fill:none;
    stroke:currentColor;
    stroke-width:2;
    stroke-linecap:round;
    margin-top:1px;
}

.alert-success {
    background:var(--success-light);
    color:#065f46;
    border:1px solid #a7f3d0;
}

.alert-danger {
    background:var(--danger-light);
    color:#991b1b;
    border:1px solid #fecaca;
}

/* LAYOUT */
.two-col {
    display:grid;
    grid-template-columns:1fr 260px;
    gap:16px;
    align-items:start;
}

.card {
    background:#fff;
    border:1px solid var(--border);
    border-radius:var(--radius);
    overflow:hidden;
}

.card-hdr {
    padding:14px 20px;
    border-bottom:1px solid var(--border);
    display:flex;
    align-items:center;
    gap:10px;
}

.chi {
    width:32px;
    height:32px;
    border-radius:8px;
    display:flex;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
}

.chi svg {
    width:16px;
    height:16px;
    fill:none;
    stroke-width:1.8;
    stroke-linecap:round;
    stroke-linejoin:round;
}

.ch-blue {
    background:var(--accent-light);
}

.ch-blue svg {
    stroke:var(--accent);
}

.ch-violet {
    background:#f5f3ff;
}

.ch-violet svg {
    stroke:#7c3aed;
}

.card-title {
    font-size:13.5px;
    font-weight:600;
}

.card-body {
    padding:20px;
}

/* DROPZONE */
.dropzone {
    border:2px dashed var(--border);
    border-radius:10px;
    padding:40px 20px;
    text-align:center;
    cursor:pointer;
    transition:.2s;
    background:#fafafa;
}

.dropzone:hover,
.dropzone.dragover {
    border-color:var(--accent);
    background:var(--accent-light);
}

.dz-icon {
    width:52px;
    height:52px;
    background:var(--accent-light);
    border-radius:12px;
    display:flex;
    align-items:center;
    justify-content:center;
    margin:0 auto 14px;
}

.dz-icon svg {
    width:26px;
    height:26px;
    fill:none;
    stroke:var(--accent);
    stroke-width:1.8;
    stroke-linecap:round;
    stroke-linejoin:round;
}

.dz-title {
    font-size:15px;
    font-weight:600;
    margin-bottom:4px;
}

.dz-sub {
    font-size:13px;
    color:var(--muted);
    margin-bottom:14px;
}

.dz-btn {
    display:inline-flex;
    align-items:center;
    gap:6px;
    padding:8px 18px;
    border-radius:8px;
    font-size:13px;
    font-weight:500;
    cursor:pointer;
    border:1px solid var(--border);
    background:#fff;
    color:var(--text);
    font-family:var(--font);
    transition:.15s;
}

.dz-btn:hover {
    background:#f3f4f6;
}

.dz-btn svg {
    width:14px;
    height:14px;
    fill:none;
    stroke:currentColor;
    stroke-width:2;
    stroke-linecap:round;
}

.dz-limit {
    font-size:11.5px;
    color:var(--muted);
    margin-top:10px;
}

/* FILE SELECTED */
.file-selected {
    border:1px solid var(--border);
    border-radius:10px;
    padding:14px 16px;
    display:flex;
    align-items:center;
    gap:12px;
    background:#f9fafb;
    margin-top:12px;
}

.file-icon {
    width:38px;
    height:38px;
    background:var(--success-light);
    border-radius:8px;
    display:flex;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
}

.file-icon svg {
    width:20px;
    height:20px;
    fill:none;
    stroke:var(--success);
    stroke-width:1.8;
    stroke-linecap:round;
}

.file-name {
    font-size:13px;
    font-weight:500;
}

.file-size {
    font-size:12px;
    color:var(--muted);
    margin-top:1px;
}

.file-remove {
    margin-left:auto;
    width:28px;
    height:28px;
    border-radius:6px;
    background:var(--danger-light);
    border:none;
    cursor:pointer;
    display:flex;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
}

.file-remove svg {
    width:13px;
    height:13px;
    fill:none;
    stroke:var(--danger);
    stroke-width:2.2;
    stroke-linecap:round;
}

/* BUTTON */
.card-foot {
    padding:16px 20px;
    border-top:1px solid var(--border);
    background:#fafafa;
    display:flex;
    gap:8px;
    justify-content:flex-end;
}

.btn {
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:6px;
    padding:9px 20px;
    border-radius:8px;
    font-size:13.5px;
    font-weight:500;
    cursor:pointer;
    border:none;
    text-decoration:none;
    transition:.15s;
    font-family:var(--font);
}

.btn svg {
    width:15px;
    height:15px;
    fill:none;
    stroke:currentColor;
    stroke-width:2;
    stroke-linecap:round;
    stroke-linejoin:round;
}

.btn-outline {
    background:#fff;
    color:var(--text);
    border:1px solid var(--border);
}

.btn-outline:hover {
    background:#f9fafb;
}

.btn-accent {
    background:var(--accent);
    color:#fff;
}

.btn-accent:hover {
    background:#1447c0;
}

/* RIGHT GUIDE */
.rc-body {
    padding:16px;
}

.col-list {
    display:flex;
    flex-direction:column;
    gap:6px;
}

.col-row {
    display:flex;
    align-items:center;
    gap:8px;
    padding:7px 10px;
    border-radius:7px;
    background:#f9fafb;
}

.col-num {
    width:20px;
    height:20px;
    border-radius:5px;
    background:var(--accent-light);
    color:var(--accent);
    font-size:10px;
    font-weight:700;
    display:flex;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
}

.col-name {
    font-size:12.5px;
    font-weight:500;
}

.col-req {
    font-size:10px;
    color:var(--danger);
    font-weight:600;
    margin-left:auto;
}

.col-opt {
    font-size:10px;
    color:var(--muted);
    margin-left:auto;
}

.dl-template {
    display:flex;
    align-items:center;
    gap:6px;
    padding:10px 14px;
    border-radius:8px;
    background:var(--success-light);
    border:1px solid #bbf7d0;
    color:var(--success);
    font-size:12.5px;
    font-weight:600;
    cursor:pointer;
    text-decoration:none;
    margin-top:12px;
    justify-content:center;
    transition:.15s;
}

.dl-template:hover {
    background:#dcfce7;
}

.dl-template svg {
    width:14px;
    height:14px;
    fill:none;
    stroke:currentColor;
    stroke-width:2;
    stroke-linecap:round;
}

.warn-box {
    background:var(--warning-light);
    border:1px solid #fde68a;
    border-radius:8px;
    padding:12px;
    margin-top:12px;
}

.warn-title {
    font-size:12px;
    font-weight:600;
    color:#92400e;
    margin-bottom:6px;
    display:flex;
    align-items:center;
    gap:5px;
}

.warn-title svg {
    width:13px;
    height:13px;
    fill:none;
    stroke:#92400e;
    stroke-width:2;
    stroke-linecap:round;
}

.warn-list {
    list-style:none;
    display:flex;
    flex-direction:column;
    gap:4px;
}

.warn-list li {
    font-size:11.5px;
    color:#92400e;
    display:flex;
    align-items:flex-start;
    gap:5px;
    line-height:1.5;
}

.warn-list li::before {
    content:'•';
    flex-shrink:0;
}

/* MOBILE NAV */
.mobile-nav {
    display:none;
}

/* TABLET */
@media(max-width:1024px) {
    .import-wrap {
        max-width:100%;
    }

    .two-col {
        grid-template-columns:1fr;
    }
}

/* HP */
@media(max-width:768px) {
    .sidebar {
        display:none;
    }

    .topbar {
        padding:0 16px;
    }

    .topbar h1 {
        font-size:15px;
    }

    .topbar p {
        font-size:11.5px;
    }

    .user-name {
        display:none;
    }

    .profile-btn .user-name {
    display: none;
    }

    .dropdown-menu {
        top: 44px;
        right: 0;
    }

    .content {
        padding:18px 16px;
        padding-bottom:88px;
        display:block;
    }

    .breadcrumb {
        flex-wrap:wrap;
        margin-bottom:14px;
    }

    .page-head {
        margin-bottom:18px;
    }

    .page-head h2 {
        font-size:18px;
    }

    .page-head p {
        font-size:12.5px;
        line-height:1.6;
    }

    .two-col {
        grid-template-columns:1fr;
        gap:14px;
    }

    .card-hdr {
        padding:14px 16px;
    }

    .card-body,
    .rc-body {
        padding:16px;
    }

    .dropzone {
        padding:28px 16px;
    }

    .dz-icon {
        width:46px;
        height:46px;
    }

    .dz-title {
        font-size:14px;
    }

    .dz-sub {
        font-size:12.5px;
        line-height:1.5;
    }

    .file-selected {
        align-items:flex-start;
    }

    .file-name {
        word-break:break-word;
    }

    .card-foot {
        flex-direction:column-reverse;
        padding:16px;
    }

    .card-foot .btn,
    .card-foot button,
    .card-foot a {
        width:100%;
        justify-content:center;
    }

    .col-row {
        align-items:flex-start;
    }

    .col-name {
        line-height:1.4;
    }

    .warn-list li {
        line-height:1.6;
    }

    .mobile-nav {
        display:flex;
        position:fixed;
        left:0;
        right:0;
        bottom:0;
        background:#fff;
        border-top:1px solid var(--border);
        justify-content:space-around;
        padding:12px 0;
        z-index:999;
    }

    .mobile-nav a {
        font-size:12px;
        color:var(--muted);
        text-decoration:none;
        font-weight:600;
    }

    .mobile-nav a.active {
        color:var(--accent);
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

        <a href="/dashboard" class="nav-item">
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

        <a href="{{ route('assets.import.page') }}" class="nav-item active">
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
        <div class="topbar">
            <div>
                <h1>Import Excel</h1>
                <p>Upload data aset dari file spreadsheet</p>
            </div>

            <div class="topbar-right">
                <div class="profile-dropdown">
                    <button type="button" class="profile-btn" onclick="toggleProfileMenu()">
                        <div class="avatar">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>

                        <span class="user-name">
                            {{ Auth::user()->name }}
                        </span>
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

        <div class="content">
            <div class="import-wrap">

                <div class="breadcrumb">
                    <a href="/dashboard">Dashboard</a>
                    <span class="sep">›</span>
                    <span>Import Excel</span>
                </div>

                <div class="page-head">
                    <h2>Import Data Aset</h2>
                    <p>Upload file Excel (.xlsx / .xls / .csv) untuk menambahkan data aset secara massal.</p>
                </div>

                {{-- ALERTS --}}
                @if(session('success'))
                    <div class="alert alert-success">
                        <svg viewBox="0 0 24 24">
                            <path d="M22 11.08V12a10 10 0 11-5.93-9.14"/>
                            <polyline points="22 4 12 14.01 9 11.01"/>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        <svg viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"/>
                            <line x1="15" y1="9" x2="9" y2="15"/>
                            <line x1="9" y1="9" x2="15" y2="15"/>
                        </svg>
                        <span>{{ session('error') }}</span>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <svg viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"/>
                            <line x1="12" y1="8" x2="12" y2="12"/>
                            <line x1="12" y1="16" x2="12.01" y2="16"/>
                        </svg>

                        <ul style="list-style:none;display:flex;flex-direction:column;gap:3px">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="two-col">

                    {{-- UPLOAD CARD --}}
                    <form action="{{ route('assets.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card">
                            <div class="card-hdr">
                                <div class="chi ch-blue">
                                    <svg viewBox="0 0 24 24">
                                        <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/>
                                        <polyline points="17 8 12 3 7 8"/>
                                        <line x1="12" y1="3" x2="12" y2="15"/>
                                    </svg>
                                </div>
                                <span class="card-title">Upload File</span>
                            </div>

                            <div class="card-body">
                                <div class="dropzone" id="dropzone" onclick="document.getElementById('fileInput').click()">
                                    <div class="dz-icon">
                                        <svg viewBox="0 0 24 24">
                                            <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/>
                                            <polyline points="17 8 12 3 7 8"/>
                                            <line x1="12" y1="3" x2="12" y2="15"/>
                                        </svg>
                                    </div>

                                    <div class="dz-title">Drag & drop file di sini</div>
                                    <div class="dz-sub">atau klik untuk memilih file dari komputer</div>

                                    <span class="dz-btn">
                                        <svg viewBox="0 0 24 24">
                                            <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/>
                                            <polyline points="17 8 12 3 7 8"/>
                                            <line x1="12" y1="3" x2="12" y2="15"/>
                                        </svg>
                                        Pilih File Excel
                                    </span>

                                    <div class="dz-limit">Format: .xlsx, .xls, .csv — Maks. 5 MB</div>
                                </div>

                                <input type="file" id="fileInput" name="file" accept=".xlsx,.xls,.csv" style="display:none" required>

                                <div class="file-selected" id="fileInfo" style="display:none">
                                    <div class="file-icon">
                                        <svg viewBox="0 0 24 24">
                                            <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                                            <polyline points="14 2 14 8 20 8"/>
                                        </svg>
                                    </div>

                                    <div>
                                        <div class="file-name" id="fileName">-</div>
                                        <div class="file-size" id="fileSize">-</div>
                                    </div>

                                    <button type="button" class="file-remove" onclick="clearFile()">
                                        <svg viewBox="0 0 24 24">
                                            <line x1="18" y1="6" x2="6" y2="18"/>
                                            <line x1="6" y1="6" x2="18" y2="18"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="card-foot">
                                <a href="/assets" class="btn btn-outline">
                                    <svg viewBox="0 0 24 24">
                                        <path d="M19 12H5M12 19l-7-7 7-7"/>
                                    </svg>
                                    Kembali
                                </a>

                                <button type="submit" class="btn btn-accent">
                                    <svg viewBox="0 0 24 24">
                                        <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/>
                                        <polyline points="17 8 12 3 7 8"/>
                                        <line x1="12" y1="3" x2="12" y2="15"/>
                                    </svg>
                                    Import Sekarang
                                </button>
                            </div>
                        </div>
                    </form>

                    {{-- RIGHT GUIDE --}}
                    <div>
                        <div class="card">
                            <div class="card-hdr">
                                <div class="chi ch-violet">
                                    <svg viewBox="0 0 24 24">
                                        <line x1="8" y1="6" x2="21" y2="6"/>
                                        <line x1="8" y1="12" x2="21" y2="12"/>
                                        <line x1="8" y1="18" x2="21" y2="18"/>
                                        <line x1="3" y1="6" x2="3.01" y2="6"/>
                                    </svg>
                                </div>
                                <span class="card-title">Format Kolom</span>
                            </div>

                            <div class="rc-body">
                                <div class="col-list">
                                    @php
                                        $cols = [
                                            ['A','Kode Barang',true],
                                            ['B','Nama Aset',true],
                                            ['C','Kategori',true],
                                            ['D','Lokasi',true],
                                            ['E','Kondisi',true],
                                            ['F','Merk',false],
                                            ['G','Penanggung Jawab',false],
                                            ['H','Tanggal Masuk',false],
                                            ['I','Harga',false],
                                        ];
                                    @endphp

                                    @foreach($cols as [$letter,$name,$req])
                                        <div class="col-row">
                                            <div class="col-num">{{ $letter }}</div>
                                            <span class="col-name">{{ $name }}</span>

                                            @if($req)
                                                <span class="col-req">WAJIB</span>
                                            @else
                                                <span class="col-opt">Opsional</span>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>

                                <a href="{{ route('assets.template') }}" class="dl-template">
                                    <svg viewBox="0 0 24 24">
                                        <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/>
                                        <polyline points="7 10 12 15 17 10"/>
                                        <line x1="12" y1="15" x2="12" y2="3"/>
                                    </svg>
                                    Unduh Template Excel
                                </a>

                                <div class="warn-box">
                                    <div class="warn-title">
                                        <svg viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="10"/>
                                            <line x1="12" y1="8" x2="12" y2="12"/>
                                            <line x1="12" y1="16" x2="12.01" y2="16"/>
                                        </svg>
                                        Perhatian
                                    </div>

                                    <ul class="warn-list">
                                        <li>Kode barang harus unik dan belum terdaftar.</li>
                                        <li>Kondisi isi: <strong>baik</strong> / <strong>rusak</strong> / <strong>perbaikan</strong></li>
                                        <li>Tanggal format: <strong>YYYY-MM-DD</strong></li>
                                        <li>Harga isi angka saja tanpa titik/koma.</li>
                                        <li>Baris pertama adalah header, bukan data.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

{{-- MOBILE NAV --}}
<div class="mobile-nav">
    <a href="/dashboard">Dashboard</a>
    <a href="/assets">Aset</a>
    <a href="{{ route('assets.import.page') }}" class="active">Import</a>
</div>

<script>
const fileInput = document.getElementById('fileInput');
const fileInfo  = document.getElementById('fileInfo');
const fileName  = document.getElementById('fileName');
const fileSize  = document.getElementById('fileSize');
const dropzone  = document.getElementById('dropzone');

if (fileInput) {
    fileInput.addEventListener('change', function() {
        if (this.files[0]) showFile(this.files[0]);
    });
}

function showFile(file) {
    const kb = (file.size / 1024).toFixed(1);

    fileName.textContent = file.name;
    fileSize.textContent = kb + ' KB · Siap diimport';

    fileInfo.style.display = 'flex';
    dropzone.style.display = 'none';
}

function clearFile() {
    fileInput.value = '';
    fileInfo.style.display = 'none';
    dropzone.style.display = 'block';
}

if (dropzone) {
    dropzone.addEventListener('dragover', function(e) {
        e.preventDefault();
        dropzone.classList.add('dragover');
    });

    dropzone.addEventListener('dragleave', function() {
        dropzone.classList.remove('dragover');
    });

    dropzone.addEventListener('drop', function(e) {
        e.preventDefault();
        dropzone.classList.remove('dragover');

        const file = e.dataTransfer.files[0];

        if (file) {
            const dt = new DataTransfer();
            dt.items.add(file);
            fileInput.files = dt.files;
            showFile(file);
        }
    });
}
</script>

<script>
function toggleProfileMenu() {
    const menu = document.getElementById('profileMenu');

    if (menu) {
        menu.classList.toggle('show');
    }
}

window.addEventListener('click', function(e) {
    const dropdown = document.querySelector('.profile-dropdown');
    const menu = document.getElementById('profileMenu');

    if (dropdown && menu && !dropdown.contains(e.target)) {
        menu.classList.remove('show');
    }
});
</script>

</x-app-layout>