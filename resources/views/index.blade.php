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
    flex-shrink: 0;
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
    padding: 0 24px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-shrink: 0;
    position: sticky;
    top: 0;
    z-index: 10;
}

.topbar h1 {
    font-size: 16px;
    font-weight: 600;
}

.topbar p {
    font-size: 12px;
    color: var(--muted);
    margin-top: 1px;
}

.topbar-right {
    display: flex;
    align-items: center;
    gap: 10px;
}

.avatar {
    width: 32px;
    height: 32px;
    background: var(--accent);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: 600;
    color: #fff;
}

.content {
    padding: 20px 24px;
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

/* TOOLBAR */
.toolbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 16px;
    gap: 12px;
    flex-wrap: wrap;
}

.toolbar-left {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 14px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
    text-decoration: none;
    border: 1px solid transparent;
    transition: .15s;
    font-family: var(--font);
}

.btn svg {
    width: 14px;
    height: 14px;
    fill: none;
    stroke: currentColor;
    stroke-width: 2;
    stroke-linecap: round;
    stroke-linejoin: round;
    flex-shrink: 0;
}

.btn-primary {
    background: var(--accent);
    color: #fff;
}

.btn-primary:hover {
    background: #1447c0;
}

.btn-success {
    background: var(--success);
    color: #fff;
}

.btn-success:hover {
    background: #0a7d57;
}

.btn-outline {
    background: #fff;
    color: var(--text);
    border-color: var(--border);
}

.btn-outline:hover {
    background: #f9fafb;
}

.import-row {
    display: flex;
    align-items: center;
    gap: 8px;
}

.import-file {
    font-size: 12px;
    padding: 6px 10px;
    border: 1px solid var(--border);
    border-radius: 7px;
    background: #fff;
    font-family: var(--font);
    cursor: pointer;
}

/* FILTER */
.filter-bar {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 14px 16px;
    margin-bottom: 16px;
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    align-items: flex-end;
}

.filter-group {
    display: flex;
    flex-direction: column;
    gap: 5px;
    flex: 1;
    min-width: 140px;
}

.filter-label {
    font-size: 11px;
    font-weight: 600;
    color: var(--muted);
    text-transform: uppercase;
    letter-spacing: .04em;
}

input, select {
    width: 100%;
    padding: 8px 10px;
    border: 1px solid var(--border);
    border-radius: 7px;
    font-size: 13px;
    font-family: var(--font);
    color: var(--text);
    background: #fff;
    outline: none;
    transition: .15s;
}

input:focus, select:focus {
    border-color: var(--accent);
    box-shadow: 0 0 0 3px rgba(26,86,219,.08);
}

.search-wrap {
    position: relative;
    flex: 2;
    min-width: 180px;
}

.search-wrap svg {
    position: absolute;
    left: 9px;
    top: 50%;
    transform: translateY(-50%);
    width: 14px;
    height: 14px;
    stroke: var(--muted);
    fill: none;
    stroke-width: 2;
    stroke-linecap: round;
    pointer-events: none;
}

.search-wrap input {
    padding-left: 30px;
}

.btn-filter {
    background: var(--accent);
    color: #fff;
    border: none;
    padding: 8px 20px;
    border-radius: 7px;
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
    white-space: nowrap;
    font-family: var(--font);
    transition: .15s;
}

.btn-filter:hover {
    background: #1447c0;
}

/* TABLE */
.table-card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    overflow: hidden;
}

.table-top {
    padding: 14px 18px;
    border-bottom: 1px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.table-top span {
    font-size: 14px;
    font-weight: 600;
}

.table-meta {
    font-size: 12px;
    color: var(--muted);
}

.table-scroll {
    width: 100%;
    overflow-x: auto;
}

.table-scroll table {
    min-width: 1200px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

thead th {
    font-size: 11px;
    font-weight: 600;
    color: var(--muted);
    text-transform: uppercase;
    letter-spacing: .05em;
    padding: 10px 14px;
    text-align: left;
    background: #fafafa;
    border-bottom: 1px solid var(--border);
    white-space: nowrap;
}

tbody td {
    padding: 11px 14px;
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

.asset-code {
    font-family: monospace;
    font-size: 11.5px;
    background: #f3f4f6;
    padding: 2px 7px;
    border-radius: 5px;
    color: var(--muted);
}

.cat-badge {
    display: inline-block;
    font-size: 11px;
    font-weight: 500;
    padding: 2px 8px;
    border-radius: 6px;
    background: #f3f4f6;
    color: var(--muted);
    white-space: nowrap;
}

.badge {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 11px;
    font-weight: 500;
    padding: 3px 8px;
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

.badge-good {
    background: var(--success-light);
    color: var(--success);
}

.badge-good::before {
    background: var(--success);
}

.badge-broken {
    background: var(--danger-light);
    color: var(--danger);
}

.badge-broken::before {
    background: var(--danger);
}

.badge-repair {
    background: var(--warning-light);
    color: var(--warning);
}

.badge-repair::before {
    background: var(--warning);
}

.action-btns {
    display: flex;
    align-items: center;
    gap: 5px;
}

.btn-xs {
    padding: 5px 10px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 500;
    cursor: pointer;
    text-decoration: none;
    border: none;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-family: var(--font);
    transition: .15s;
    white-space: nowrap;
}

.btn-xs svg {
    width: 12px;
    height: 12px;
    fill: none;
    stroke: currentColor;
    stroke-width: 2;
    stroke-linecap: round;
    stroke-linejoin: round;
}

.btn-detail {
    background: var(--accent-light);
    color: var(--accent);
}

.btn-edit {
    background: #fffbeb;
    color: var(--warning);
}

.btn-del {
    background: var(--danger-light);
    color: var(--danger);
}

.name-cell {
    font-weight: 500;
    max-width: 160px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.harga-cell {
    font-weight: 500;
    white-space: nowrap;
}

.pagination-wrap {
    padding: 12px 18px;
    border-top: 1px solid var(--border);
    overflow-x: auto;
}

.pagination-wrap nav {
    display: flex;
    justify-content: flex-end;
}

.pagination-wrap nav > div {
    width: auto;
}

.qr-box {
    display: flex;
    justify-content: center;
    margin-bottom: 6px;
}

.btn-download {
    background: #f3f4f6;
    color: var(--text);
    border: 1px solid var(--border);
}

.btn-download:hover {
    background: #e5e7eb;
}

/* MOBILE NAV */
.mobile-nav {
    display: none;
}

/* MOBILE */
@media(max-width:768px) {
    .sidebar {
        display: none;
    }

    .main {
        width: 100%;
        overflow: visible;
    }

    .topbar {
        padding: 0 14px;
    }

    .topbar h1 {
        font-size: 15px;
    }

    .topbar p {
        font-size: 11.5px;
    }

    .profile-info {
        display: none;
    }

    .content {
        padding: 14px;
        padding-bottom: 88px;
    }

    .toolbar {
        width: 100%;
        flex-direction: column;
        align-items: stretch;
        gap: 10px;
    }

    .toolbar-left,
    .action-btns {
        width: 100%;
        display: grid;
        grid-template-columns: 1fr;
        gap: 8px;
    }

    .toolbar-left .btn,
    .action-btns .btn {
        width: 100%;
        justify-content: center;
        min-height: 42px;
    }

    .filter-bar {
        padding: 12px;
        gap: 8px;
    }

    .filter-group,
    .search-wrap {
        min-width: 100%;
    }

    .btn-filter {
        width: 100%;
        justify-content: center;
        min-height: 40px;
    }

    .table-top {
        flex-direction: column;
        align-items: flex-start;
        gap: 4px;
    }

    .table-scroll {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .table-scroll table {
        min-width: 1200px;
    }

    .dropdown-menu {
        top: 45px;
        right: 0;
    }

    .mobile-nav {
        display: flex;
        position: fixed;
        left: 0;
        right: 0;
        bottom: 0;
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
    .pagination-wrap {
    padding: 12px;
}

.pagination-wrap nav {
    justify-content: flex-start;
    min-width: max-content;
}
.qr-box svg {
    width: 70px;
    height: 70px;
    display: block;
}

@media (max-width: 768px) {
    .qr-box svg {
        width: 95px;
        height: 95px;
    }
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

        <a href="/assets" class="nav-item active">
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
            <button type="submit" class="nav-item logout" style="border:none; background:transparent; width:100%; text-align:left; cursor:pointer; font-family:inherit;">
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
                <h1>Master Data Aset</h1>
                <p>Kelola seluruh aset perusahaan</p>
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

        <div class="content">

            {{-- TOOLBAR --}}
            <div class="toolbar">
                <div class="toolbar-left">
                    <a href="/assets/create" class="btn btn-primary">
                        <svg viewBox="0 0 24 24">
                            <line x1="12" y1="5" x2="12" y2="19"/>
                            <line x1="5" y1="12" x2="19" y2="12"/>
                        </svg>
                        Tambah Aset
                    </a>

                    
                </div>

                <div class="action-btns">

                    <a href="{{ route('assets.export.page') }}" class="btn btn-success">
                        <svg viewBox="0 0 24 24">
                            <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/>
                            <polyline points="7 10 12 15 17 10"/>
                            <line x1="12" y1="15" x2="12" y2="3"/>
                        </svg>
                        Export Excel
                    </a>

                    <a href="{{ route('assets.import.page') }}" class="btn btn-success">
                        <svg viewBox="0 0 24 24">
                            <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/>
                            <polyline points="17 8 12 3 7 8"/>
                            <line x1="12" y1="3" x2="12" y2="15"/>
                        </svg>
                        Import Excel
                    </a>
                </div>
            </div>

            {{-- FILTER --}}
            <form action="/assets" method="GET" class="filter-bar">

                <div class="search-wrap">
                    <svg viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"/>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                    <input type="text" name="search" placeholder="Cari nama atau kode aset..." value="{{ request('search') }}">
                </div>

                <div class="filter-group">
                    <div class="filter-label">Kategori</div>
                    <select name="category">
                        <option value="">Semua Kategori</option>
                        <option value="Elektronik" {{ request('category') == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                        <option value="Mesin Produksi" {{ request('category') == 'Mesin Produksi' ? 'selected' : '' }}>Mesin Produksi</option>
                        <option value="Furniture" {{ request('category') == 'Furniture' ? 'selected' : '' }}>Furniture</option>
                        <option value="Inventaris Kantor" {{ request('category') == 'Inventaris Kantor' ? 'selected' : '' }}>Inventaris Kantor</option>
                        <option value="Peralatan Gudang" {{ request('category') == 'Peralatan Gudang' ? 'selected' : '' }}>Peralatan Gudang</option>
                        <option value="Kendaraan" {{ request('category') == 'Kendaraan' ? 'selected' : '' }}>Kendaraan</option>
                    </select>
                </div>

                <div class="filter-group">
                    <div class="filter-label">Kondisi</div>
                    <select name="condition">
                        <option value="">Semua Kondisi</option>
                        <option value="baik" {{ request('condition') == 'baik' ? 'selected' : '' }}>Baik</option>
                        <option value="rusak" {{ request('condition') == 'rusak' ? 'selected' : '' }}>Rusak</option>
                        <option value="perbaikan" {{ request('condition') == 'perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                    </select>
                </div>

                <div class="filter-group">
                    <div class="filter-label">Tanggal Masuk</div>
                    <input type="date" name="tanggal_masuk" value="{{ request('tanggal_masuk') }}">
                </div>

                <button type="submit" class="btn-filter">Cari</button>
            </form>

            {{-- TABLE --}}
            <div class="table-card">
                <div class="table-top">
                    <span>Daftar Aset</span>
                    <span class="table-meta">{{ $assets->total() }} total aset</span>
                </div>

                <div class="table-scroll">
                    <table>
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Aset</th>
                                <th>Kategori</th>
                                <th>Lokasi</th>
                                <th>Merk</th>
                                <th>Penanggung Jawab</th>
                                <th>Tgl Masuk</th>
                                <th>Harga</th>
                                <th style="text-align:center">QR Code</th>
                                <th>Kondisi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($assets as $asset)
                                <tr>
                                    <td><span class="asset-code">{{ $asset->code }}</span></td>
                                    <td class="name-cell">{{ $asset->name }}</td>
                                    <td><span class="cat-badge">{{ $asset->category }}</span></td>
                                    <td style="color:var(--muted); font-size:12px">{{ $asset->location }}</td>
                                    <td style="font-size:12px">{{ $asset->merk }}</td>
                                    <td style="font-size:12px; color:var(--muted)">{{ $asset->penanggungjawab }}</td>
                                    <td style="font-size:12px; color:var(--muted); white-space:nowrap">{{ $asset->tanggal_masuk }}</td>
                                    
                                        @php
                                            $harga = $asset->harga;

                                            if (str_contains($harga, '.')) {
                                                $hargaTampil = $harga;
                                            } elseif (is_numeric($harga)) {
                                                $hargaTampil = number_format($harga, 0, ',', '.');
                                            } else {
                                                $hargaTampil = $harga;
                                            }
                                        @endphp

                                        <td class="harga-cell">Rp {{ $hargaTampil }}</td>
                                    </td>

                                    <td style="text-align:center">
                                        <div class="qr-box" id="qr-{{ $asset->code }}">
                                            {!! QrCode::size(180)->margin(2)->generate(route('assets.show', $asset->code)) !!}
                                        </div>

                                        <button type="button"
                                            class="btn-xs btn-download"
                                            onclick="downloadQR('{{ $asset->code }}')">
                                            Unduh
                                        </button>
                                    </td>

                                    <td>
                                        @php
                                            $badgeClass = match($asset->condition) {
                                                'baik' => 'badge-good',
                                                'rusak' => 'badge-broken',
                                                'perbaikan' => 'badge-repair',
                                                default => 'badge-good',
                                            };
                                        @endphp

                                        <span class="badge {{ $badgeClass }}">
                                            {{ ucfirst($asset->condition) }}
                                        </span>
                                    </td>

                                    <td>
                                        <div class="action-btns">
                                            <a href="{{ route('assets.show', $asset->code) }}" class="btn-xs btn-detail">
                                                <svg viewBox="0 0 24 24">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                                    <circle cx="12" cy="12" r="3"/>
                                                </svg>
                                                Detail
                                            </a>

                                            <a href="{{ route('assets.edit', $asset->code) }}" class="btn-xs btn-edit">
                                                <svg viewBox="0 0 24 24">
                                                    <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/>
                                                    <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                                </svg>
                                                Edit
                                            </a>

                                            <form action="{{ route('assets.destroy', $asset->code) }}" method="POST" style="display:inline">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn-xs btn-del" onclick="return confirm('Yakin ingin menghapus aset ini?')">
                                                    <svg viewBox="0 0 24 24">
                                                        <polyline points="3 6 5 6 21 6"/>
                                                        <path d="M19 6l-1 14H6L5 6"/>
                                                        <path d="M10 11v6M14 11v6"/>
                                                    </svg>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11" style="text-align:center; color:var(--muted); padding:48px 16px">
                                        Data aset tidak ditemukan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="pagination-wrap">
                    {{ $assets->onEachSide(1)->links() }}
                </div>
            </div>

        </div>
    </div>
</div>

{{-- MOBILE NAV --}}
<div class="mobile-nav">
    <a href="/dashboard">Dashboard</a>
    <a href="/assets" class="active">Aset</a>
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

<script>
function downloadQR(code) {
    const qrBox = document.getElementById('qr-' + code);

    if (!qrBox) {
        alert('QR Code tidak ditemukan.');
        return;
    }

    const svg = qrBox.querySelector('svg');

    if (!svg) {
        alert('QR Code belum tersedia.');
        return;
    }

    const svgData = new XMLSerializer().serializeToString(svg);
    const canvas = document.createElement('canvas');
    const ctx = canvas.getContext('2d');

    canvas.width = 800;
    canvas.height = 800;

    const img = new Image();

    img.onload = function () {
        ctx.fillStyle = '#ffffff';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        ctx.drawImage(img, 80, 80, 640, 640);

        const link = document.createElement('a');
        link.download = code + '-qrcode.png';
        link.href = canvas.toDataURL('image/png');
        link.click();
    };

    img.src = 'data:image/svg+xml;base64,' + btoa(unescape(encodeURIComponent(svgData)));
}
</script>

</x-app-layout>