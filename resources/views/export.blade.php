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

.export-wrap {
    width:100%;
    max-width:680px;
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

/* CARD */
.card {
    background:#fff;
    border:1px solid var(--border);
    border-radius:var(--radius);
    overflow:hidden;
    margin-bottom:16px;
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

/* FORM */
.form-grid {
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:16px;
}

.fg {
    display:flex;
    flex-direction:column;
    gap:6px;
}

.fg.full {
    grid-column:1/-1;
}

.lbl {
    font-size:12px;
    font-weight:600;
    color:var(--text);
}

.ctrl {
    height:38px;
    border:1px solid var(--border);
    border-radius:8px;
    padding:0 12px;
    font-size:13px;
    font-family:var(--font);
    color:var(--text);
    background:#fff;
    outline:none;
    transition:.15s;
    width:100%;
}

.ctrl:focus {
    border-color:var(--accent);
    box-shadow:0 0 0 3px rgba(26,86,219,.1);
}

select.ctrl {
    appearance:none;
    background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='none' stroke='%236b7280' stroke-width='2' stroke-linecap='round'%3E%3Cpolyline points='2 4 6 8 10 4'/%3E%3C/svg%3E");
    background-repeat:no-repeat;
    background-position:calc(100% - 12px) center;
}

/* SUMMARY */
.summary {
    display:flex;
    gap:10px;
    flex-wrap:wrap;
    margin-top:16px;
    padding-top:16px;
    border-top:1px solid var(--border);
}

.sbadge {
    display:inline-flex;
    align-items:center;
    gap:6px;
    padding:6px 12px;
    border-radius:8px;
    font-size:12.5px;
    font-weight:500;
}

.sb-blue {
    background:var(--accent-light);
    color:var(--accent);
}

.sb-green {
    background:var(--success-light);
    color:var(--success);
}

/* COLUMN CHECKBOXES */
.col-grid {
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:8px;
}

.col-item {
    display:flex;
    align-items:center;
    gap:8px;
    padding:9px 12px;
    border:1px solid var(--border);
    border-radius:8px;
    cursor:pointer;
    transition:.15s;
}

.col-item:hover {
    border-color:#9ca3af;
}

.col-item input[type="checkbox"] {
    display:none;
}

.col-cb {
    width:16px;
    height:16px;
    border-radius:4px;
    border:1.5px solid var(--border);
    display:flex;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
    transition:.15s;
}

.col-item:has(input:checked) {
    border-color:var(--accent);
    background:var(--accent-light);
}

.col-item:has(input:checked) .col-cb {
    background:var(--accent);
    border-color:var(--accent);
}

.col-check {
    display:none;
}

.col-item:has(input:checked) .col-check {
    display:block;
}

.col-lbl {
    font-size:12.5px;
    font-weight:500;
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

.btn-green {
    background:#0d9488;
    color:#fff;
}

.btn-green:hover {
    background:#0f766e;
}

/* MOBILE NAV */
.mobile-nav {
    display:none;
}

/* TABLET */
@media(max-width:1024px) {
    .export-wrap {
        max-width:100%;
    }

    .col-grid {
        grid-template-columns:repeat(2,1fr);
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

    .form-grid {
        grid-template-columns:1fr;
        gap:14px;
    }

    .fg.full {
        grid-column:auto;
    }

    .summary {
        flex-direction:column;
    }

    .sbadge {
        width:100%;
        justify-content:flex-start;
    }

    .col-grid {
        grid-template-columns:1fr;
    }

    .card-hdr {
        padding:14px 16px;
    }

    .card-body {
        padding:16px;
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

        <a href="{{ route('assets.export.page') }}" class="nav-item active">
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
        <div class="topbar">
            <div>
                <h1>Export Excel</h1>
                <p>Unduh data aset dalam format spreadsheet</p>
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
            <div class="export-wrap">

                <div class="breadcrumb">
                    <a href="/dashboard">Dashboard</a>
                    <span class="sep">›</span>
                    <span>Export Excel</span>
                </div>

                <div class="page-head">
                    <h2>Export Data Aset</h2>
                    <p>Atur filter terlebih dahulu untuk menentukan data yang akan diekspor ke Excel.</p>
                </div>

                <form action="{{ route('assets.export') }}" method="GET">

                    {{-- FILTER CARD --}}
                    <div class="card">
                        <div class="card-hdr">
                            <div class="chi ch-blue">
                                <svg viewBox="0 0 24 24">
                                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/>
                                </svg>
                            </div>
                            <span class="card-title">Filter Data</span>
                        </div>

                        <div class="card-body">
                            <div class="form-grid">
                                <div class="fg">
                                    <span class="lbl">Kategori</span>
                                    <select name="category" class="ctrl">
                                        <option value="">Semua Kategori</option>
                                        <option value="Elektronik" {{ request('category') == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                                        <option value="Mesin Produksi" {{ request('category') == 'Mesin Produksi' ? 'selected' : '' }}>Mesin Produksi</option>
                                        <option value="Furniture" {{ request('category') == 'Furniture' ? 'selected' : '' }}>Furniture</option>
                                        <option value="Inventaris Kantor" {{ request('category') == 'Inventaris Kantor' ? 'selected' : '' }}>Inventaris Kantor</option>
                                        <option value="Peralatan Gudang" {{ request('category') == 'Peralatan Gudang' ? 'selected' : '' }}>Peralatan Gudang</option>
                                        <option value="Kendaraan" {{ request('category') == 'Kendaraan' ? 'selected' : '' }}>Kendaraan</option>
                                    </select>
                                </div>

                                <div class="fg">
                                    <span class="lbl">Kondisi</span>
                                    <select name="condition" class="ctrl">
                                        <option value="">Semua Kondisi</option>
                                        <option value="baik" {{ request('condition') == 'baik' ? 'selected' : '' }}>Baik</option>
                                        <option value="rusak" {{ request('condition') == 'rusak' ? 'selected' : '' }}>Rusak</option>
                                        <option value="perbaikan" {{ request('condition') == 'perbaikan' ? 'selected' : '' }}>Dalam Perbaikan</option>
                                    </select>
                                </div>

                                <div class="fg">
                                    <span class="lbl">Tanggal Masuk (dari)</span>
                                    <input type="date" name="date_from" class="ctrl" value="{{ request('date_from') }}">
                                </div>

                                <div class="fg">
                                    <span class="lbl">Tanggal Masuk (sampai)</span>
                                    <input type="date" name="date_to" class="ctrl" value="{{ request('date_to') }}">
                                </div>

                                <div class="fg full">
                                    <span class="lbl">Lokasi</span>
                                    <input type="text" name="location" class="ctrl" placeholder="Kosongkan untuk semua lokasi" value="{{ request('location') }}">
                                </div>
                            </div>

                            <div class="summary">
                                <span class="sbadge sb-blue">
                                    📦 Total: {{ \App\Models\Asset::count() }} aset
                                </span>

                                <span class="sbadge sb-green">
                                    ✔ Baik: {{ \App\Models\Asset::where('condition','baik')->count() }} aset
                                </span>

                                <span class="sbadge" style="background:var(--warning-light);color:var(--warning)">
                                    ⚠ Perlu Perhatian: {{ \App\Models\Asset::whereIn('condition',['rusak','perbaikan'])->count() }} aset
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- KOLOM CARD --}}
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
                            <span class="card-title">Pilih Kolom yang Diekspor</span>
                        </div>

                        <div class="card-body">
                            <div class="col-grid">
                                @php
                                    $columns = [
                                        'code'            => 'Kode Barang',
                                        'name'            => 'Nama Aset',
                                        'category'        => 'Kategori',
                                        'location'        => 'Lokasi',
                                        'condition'       => 'Kondisi',
                                        'merk'            => 'Merk',
                                        'penanggungjawab' => 'Penanggung Jawab',
                                        'tanggal_masuk'   => 'Tanggal Masuk',
                                        'harga'           => 'Harga',
                                    ];

                                    $defaultChecked = [
                                        'code',
                                        'name',
                                        'category',
                                        'location',
                                        'condition',
                                        'tanggal_masuk',
                                        'harga'
                                    ];
                                @endphp

                                @foreach($columns as $key => $label)
                                    <label class="col-item">
                                        <input type="checkbox" name="columns[]" value="{{ $key }}"
                                            {{ in_array($key, $defaultChecked) ? 'checked' : '' }}>

                                        <div class="col-cb">
                                            <svg class="col-check" width="10" height="10" viewBox="0 0 12 12" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round">
                                                <polyline points="2 6 5 9 10 3"/>
                                            </svg>
                                        </div>

                                        <span class="col-lbl">{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="card-foot">
                            <a href="/assets" class="btn btn-outline">
                                <svg viewBox="0 0 24 24">
                                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                                </svg>
                                Kembali
                            </a>

                            <button type="submit" class="btn btn-green">
                                <svg viewBox="0 0 24 24">
                                    <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/>
                                    <polyline points="7 10 12 15 17 10"/>
                                    <line x1="12" y1="15" x2="12" y2="3"/>
                                </svg>
                                Download Excel
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

{{-- MOBILE NAV --}}
<div class="mobile-nav">
    <a href="/dashboard">Dashboard</a>
    <a href="/assets">Aset</a>
    <a href="{{ route('assets.export.page') }}" class="active">Export</a>
</div>

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