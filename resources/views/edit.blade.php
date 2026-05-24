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

.content {
    padding:24px 28px;
    overflow-y:auto;
    flex:1;
}

/* BREADCRUMB */
.breadcrumb {
    display:flex;
    align-items:center;
    gap:6px;
    font-size:12.5px;
    color:var(--muted);
    margin-bottom:18px;
    flex-wrap:wrap;
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

/* PAGE HEAD */
.page-head {
    margin-bottom:22px;
}

.page-head-row {
    display:flex;
    align-items:flex-start;
    justify-content:space-between;
    gap:12px;
    flex-wrap:wrap;
    margin-bottom:4px;
}

.page-head h2 {
    font-size:20px;
    font-weight:600;
}

.page-head p {
    font-size:13px;
    color:var(--muted);
    margin-top:4px;
}

.edit-badge {
    display:inline-flex;
    align-items:center;
    gap:5px;
    padding:5px 12px;
    background:#fef3c7;
    border:1px solid #fde68a;
    border-radius:20px;
    font-size:12px;
    font-weight:600;
    color:#b45309;
    flex-shrink:0;
}

.edit-badge svg {
    width:12px;
    height:12px;
    fill:none;
    stroke:currentColor;
    stroke-width:2;
    stroke-linecap:round;
    stroke-linejoin:round;
}

/* FORM LAYOUT */
.form-layout {
    display:grid;
    grid-template-columns:1fr 300px;
    gap:18px;
    align-items:start;
}

.form-main {
    min-width:0;
}

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

.ch-purple {
    background:#f5f3ff;
}

.ch-purple svg {
    stroke:#7c3aed;
}

.ch-green {
    background:var(--success-light);
}

.ch-green svg {
    stroke:var(--success);
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

.req {
    color:var(--danger);
    margin-left:2px;
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

.ctrl.is-invalid {
    border-color:var(--danger);
    box-shadow:0 0 0 3px rgba(224,36,36,.1);
}

.ctrl[readonly] {
    background:#f9fafb;
    color:var(--muted);
    cursor:not-allowed;
}

select.ctrl {
    appearance:none;
    background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='none' stroke='%236b7280' stroke-width='2' stroke-linecap='round'%3E%3Cpolyline points='2 4 6 8 10 4'/%3E%3C/svg%3E");
    background-repeat:no-repeat;
    background-position:calc(100% - 12px) center;
}

.readonly-note {
    font-size:11.5px;
    color:var(--muted);
    display:flex;
    align-items:center;
    gap:4px;
}

.readonly-note svg {
    width:11px;
    height:11px;
    fill:none;
    stroke:currentColor;
    stroke-width:2;
    stroke-linecap:round;
    flex-shrink:0;
}

.hint {
    font-size:11.5px;
    color:var(--muted);
}

.invalid-msg {
    font-size:11.5px;
    color:var(--danger);
    display:flex;
    align-items:center;
    gap:4px;
}

.invalid-msg svg {
    width:12px;
    height:12px;
    fill:none;
    stroke:currentColor;
    stroke-width:2;
    stroke-linecap:round;
    flex-shrink:0;
}

/* CONDITION VISUAL SELECTOR */
.condition-grid {
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:8px;
}

.cond-opt {
    display:flex;
    align-items:center;
    gap:8px;
    padding:10px 12px;
    border:1.5px solid var(--border);
    border-radius:9px;
    cursor:pointer;
    transition:.15s;
}

.cond-opt input {
    display:none;
}

.cond-dot {
    width:10px;
    height:10px;
    border-radius:50%;
    flex-shrink:0;
    transition:.15s;
}

.cond-lbl {
    font-size:13px;
    font-weight:500;
}

.cond-baik {
    border-color:#a7f3d0;
}

.cond-baik .cond-dot {
    background:var(--success);
}

.cond-baik .cond-lbl {
    color:var(--success);
}

.cond-rusak {
    border-color:#fecaca;
}

.cond-rusak .cond-dot {
    background:var(--danger);
}

.cond-rusak .cond-lbl {
    color:var(--danger);
}

.cond-perbaikan {
    border-color:#fde68a;
}

.cond-perbaikan .cond-dot {
    background:var(--warning);
}

.cond-perbaikan .cond-lbl {
    color:var(--warning);
}

.cond-opt:has(input:checked).cond-baik {
    background:var(--success-light);
    border-color:var(--success);
}

.cond-opt:has(input:checked).cond-rusak {
    background:var(--danger-light);
    border-color:var(--danger);
}

.cond-opt:has(input:checked).cond-perbaikan {
    background:var(--warning-light);
    border-color:var(--warning);
}

/* SIDE PANEL */
.info-panel {
    background:#fff;
    border:1px solid var(--border);
    border-radius:var(--radius);
    padding:16px;
    margin-bottom:14px;
}

.ip-title {
    font-size:12.5px;
    font-weight:600;
    margin-bottom:12px;
    display:flex;
    align-items:center;
    gap:6px;
}

.ip-title svg {
    width:14px;
    height:14px;
    fill:none;
    stroke:var(--accent);
    stroke-width:2;
    stroke-linecap:round;
}

.ip-row {
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:10px;
    padding:8px 0;
    border-bottom:1px solid #f3f4f6;
    font-size:12.5px;
}

.ip-row:last-child {
    border-bottom:none;
}

.ip-label {
    color:var(--muted);
}

.ip-value {
    font-weight:500;
    text-align:right;
}

.asset-code-small {
    font-family:monospace;
    font-size:12px;
    background:#f3f4f6;
    padding:2px 8px;
    border-radius:5px;
}

/* BADGE */
.badge {
    display:inline-flex;
    align-items:center;
    gap:4px;
    font-size:11.5px;
    font-weight:500;
    padding:3px 9px;
    border-radius:20px;
    white-space:nowrap;
}

.badge::before {
    content:'';
    width:5px;
    height:5px;
    border-radius:50%;
    flex-shrink:0;
}

.badge-good {
    background:var(--success-light);
    color:var(--success);
}

.badge-good::before {
    background:var(--success);
}

.badge-broken {
    background:var(--danger-light);
    color:var(--danger);
}

.badge-broken::before {
    background:var(--danger);
}

.badge-repair {
    background:var(--warning-light);
    color:var(--warning);
}

.badge-repair::before {
    background:var(--warning);
}

/* WARNING */
.warn-box {
    background:var(--warning-light);
    border:1px solid #fde68a;
    border-radius:8px;
    padding:12px;
}

.warn-t {
    font-size:12px;
    font-weight:600;
    color:#92400e;
    margin-bottom:5px;
    display:flex;
    align-items:center;
    gap:5px;
}

.warn-t svg {
    width:12px;
    height:12px;
    fill:none;
    stroke:#92400e;
    stroke-width:2;
    stroke-linecap:round;
}

.warn-p {
    font-size:12px;
    color:#92400e;
    line-height:1.6;
}

/* BUTTONS */
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

.btn-warn {
    background:#fef3c7;
    color:#b45309;
    border:1px solid #fde68a;
}

.btn-warn:hover {
    background:#fde68a;
}

/* MOBILE NAV */
.mobile-nav {
    display:none;
}

/* RESPONSIVE TABLET */
@media(max-width:1024px) {
    .form-layout {
        grid-template-columns:1fr;
    }

    .condition-grid {
        grid-template-columns:repeat(3,1fr);
    }
}

/* RESPONSIVE HP */
@media(max-width:768px) {
    .sidebar {
        display:none;
    }

    .main {
        min-width:0;
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

    .content {
        padding:18px 16px;
        padding-bottom:88px;
    }

    .breadcrumb {
        margin-bottom:14px;
        line-height:1.6;
    }

    .page-head {
        margin-bottom:18px;
    }

    .page-head-row {
        flex-direction:column;
        align-items:flex-start;
        gap:8px;
    }

    .page-head h2 {
        font-size:18px;
    }

    .page-head p {
        font-size:12.5px;
        line-height:1.6;
    }

    .form-layout {
        grid-template-columns:1fr;
        gap:14px;
    }

    .form-grid {
        grid-template-columns:1fr;
        gap:14px;
    }

    .fg.full {
        grid-column:auto;
    }

    .card-hdr {
        padding:14px 16px;
    }

    .card-body {
        padding:16px;
    }

    .condition-grid {
        grid-template-columns:1fr;
    }

    .cond-opt {
        width:100%;
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

    .info-panel {
        padding:16px;
    }

    .ip-row {
        align-items:flex-start;
    }

    .ip-value {
        text-align:right;
        word-break:break-word;
    }

    .warn-box {
        margin-bottom:8px;
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
                <h1>Edit Aset</h1>
                <p>Perbarui informasi aset yang sudah terdaftar</p>
            </div>

            <div class="topbar-right">
                <div class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</div>
                <span class="user-name">{{ Auth::user()->name }}</span>
            </div>
        </div>

        <div class="content">

            <div class="breadcrumb">
                <a href="/dashboard">Dashboard</a>
                <span class="sep">›</span>
                <a href="/assets">Master Data</a>
                <span class="sep">›</span>
                <a href="{{ route('assets.show', $asset->code) }}">{{ $asset->name }}</a>
                <span class="sep">›</span>
                <span>Edit</span>
            </div>

            <div class="page-head">
                <div class="page-head-row">
                    <h2>Edit Aset</h2>

                    <span class="edit-badge">
                        <svg viewBox="0 0 24 24">
                            <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/>
                            <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                        </svg>
                        Mode Edit
                    </span>
                </div>

                <p>Perbarui data aset <strong>{{ $asset->name }}</strong> ({{ $asset->code }})</p>
            </div>

            <div class="form-layout">

                {{-- FORM --}}
                <form action="{{ route('assets.update', $asset->code) }}" method="POST" class="form-main">
                    @csrf
                    @method('PUT')

                    {{-- IDENTITAS --}}
                    <div class="card">
                        <div class="card-hdr">
                            <div class="chi ch-blue">
                                <svg viewBox="0 0 24 24">
                                    <path d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"/>
                                    <path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/>
                                </svg>
                            </div>

                            <span class="card-title">Identitas Aset</span>
                        </div>

                        <div class="card-body">
                            <div class="form-grid">

                                <div class="fg">
                                    <label class="lbl">Kode Barang</label>

                                    <input type="text" name="code" class="ctrl" value="{{ $asset->code }}" readonly>

                                    <span class="readonly-note">
                                        <svg viewBox="0 0 24 24">
                                            <rect x="3" y="11" width="18" height="11" rx="2"/>
                                            <path d="M7 11V7a5 5 0 0110 0v4"/>
                                        </svg>
                                        Kode barang tidak dapat diubah
                                    </span>
                                </div>

                                <div class="fg">
                                    <label class="lbl">Nama Aset <span class="req">*</span></label>

                                    <input type="text"
                                        name="name"
                                        class="ctrl {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                        value="{{ old('name', $asset->name) }}"
                                        placeholder="Nama aset">

                                    @error('name')
                                        <span class="invalid-msg">
                                            <svg viewBox="0 0 24 24">
                                                <circle cx="12" cy="12" r="10"/>
                                                <line x1="12" y1="8" x2="12" y2="12"/>
                                                <line x1="12" y1="16" x2="12.01" y2="16"/>
                                            </svg>
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="fg">
                                    <label class="lbl">Kategori <span class="req">*</span></label>

                                    <select name="category" class="ctrl {{ $errors->has('category') ? 'is-invalid' : '' }}">
                                        @foreach(['Elektronik','Mesin Produksi','Furniture','Inventaris Kantor','Peralatan Gudang','Kendaraan'] as $cat)
                                            <option value="{{ $cat }}" {{ old('category', $asset->category) == $cat ? 'selected' : '' }}>
                                                {{ $cat }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('category')
                                        <span class="invalid-msg">
                                            <svg viewBox="0 0 24 24">
                                                <circle cx="12" cy="12" r="10"/>
                                                <line x1="12" y1="8" x2="12" y2="12"/>
                                                <line x1="12" y1="16" x2="12.01" y2="16"/>
                                            </svg>
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="fg">
                                    <label class="lbl">Merk</label>

                                    <input type="text"
                                        name="merk"
                                        class="ctrl"
                                        value="{{ old('merk', $asset->merk) }}"
                                        placeholder="Merk aset">
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- LOKASI & STATUS --}}
                    <div class="card">
                        <div class="card-hdr">
                            <div class="chi ch-purple">
                                <svg viewBox="0 0 24 24">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
                                    <circle cx="12" cy="10" r="3"/>
                                </svg>
                            </div>

                            <span class="card-title">Lokasi & Status</span>
                        </div>

                        <div class="card-body">
                            <div class="form-grid">

                                <div class="fg">
                                    <label class="lbl">Lokasi <span class="req">*</span></label>

                                    <input type="text"
                                        name="location"
                                        class="ctrl {{ $errors->has('location') ? 'is-invalid' : '' }}"
                                        value="{{ old('location', $asset->location) }}"
                                        placeholder="Lokasi aset">

                                    @error('location')
                                        <span class="invalid-msg">
                                            <svg viewBox="0 0 24 24">
                                                <circle cx="12" cy="12" r="10"/>
                                                <line x1="12" y1="8" x2="12" y2="12"/>
                                                <line x1="12" y1="16" x2="12.01" y2="16"/>
                                            </svg>
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="fg">
                                    <label class="lbl">Penanggung Jawab</label>

                                    <input type="text"
                                        name="penanggungjawab"
                                        class="ctrl"
                                        value="{{ old('penanggungjawab', $asset->penanggungjawab) }}"
                                        placeholder="Nama penanggung jawab">
                                </div>

                                <div class="fg full">
                                    <label class="lbl">Kondisi <span class="req">*</span></label>

                                    <div class="condition-grid">
                                        @php
                                            $currentCondition = old('condition', $asset->condition);
                                        @endphp

                                        <label class="cond-opt cond-baik">
                                            <input type="radio" name="condition" value="baik" {{ $currentCondition == 'baik' ? 'checked' : '' }}>
                                            <span class="cond-dot"></span>
                                            <span class="cond-lbl">Baik</span>
                                        </label>

                                        <label class="cond-opt cond-rusak">
                                            <input type="radio" name="condition" value="rusak" {{ $currentCondition == 'rusak' ? 'checked' : '' }}>
                                            <span class="cond-dot"></span>
                                            <span class="cond-lbl">Rusak</span>
                                        </label>

                                        <label class="cond-opt cond-perbaikan">
                                            <input type="radio" name="condition" value="perbaikan" {{ $currentCondition == 'perbaikan' ? 'checked' : '' }}>
                                            <span class="cond-dot"></span>
                                            <span class="cond-lbl">Perbaikan</span>
                                        </label>
                                    </div>

                                    @error('condition')
                                        <span class="invalid-msg" style="margin-top:4px">
                                            <svg viewBox="0 0 24 24">
                                                <circle cx="12" cy="12" r="10"/>
                                                <line x1="12" y1="8" x2="12" y2="12"/>
                                                <line x1="12" y1="16" x2="12.01" y2="16"/>
                                            </svg>
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- DATA PEMBELIAN --}}
                    <div class="card">
                        <div class="card-hdr">
                            <div class="chi ch-green">
                                <svg viewBox="0 0 24 24">
                                    <line x1="12" y1="1" x2="12" y2="23"/>
                                    <path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>
                                </svg>
                            </div>

                            <span class="card-title">Data Pembelian</span>
                        </div>

                        <div class="card-body">
                            <div class="form-grid">

                                <div class="fg">
                                    <label class="lbl">Tanggal Masuk</label>

                                    <input type="date"
                                        name="tanggal_masuk"
                                        class="ctrl"
                                        value="{{ old('tanggal_masuk', $asset->tanggal_masuk) }}">
                                </div>

                                <div class="fg">
                                    <label class="lbl">Harga Perolehan</label>

                                    <input type="text"
                                        name="harga"
                                        class="ctrl"
                                        value="{{ old('harga', $asset->harga) }}"
                                        placeholder="Contoh: 12500000">

                                    <span class="hint">Angka saja, tanpa titik atau koma.</span>
                                </div>

                            </div>
                        </div>

                        <div class="card-foot">
                            <a href="{{ route('assets.show', $asset->code) }}" class="btn btn-outline">
                                <svg viewBox="0 0 24 24">
                                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                                </svg>
                                Batal
                            </a>

                            <button type="submit" class="btn btn-warn">
                                <svg viewBox="0 0 24 24">
                                    <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v14a2 2 0 01-2 2z"/>
                                    <polyline points="17 21 17 13 7 13 7 21"/>
                                </svg>
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>

                </form>

                {{-- RIGHT PANEL --}}
                <div>
                    <div class="info-panel">
                        <div class="ip-title">
                            <svg viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10"/>
                                <line x1="12" y1="16" x2="12" y2="12"/>
                                <line x1="12" y1="8" x2="12.01" y2="8"/>
                            </svg>
                            Info Aset Saat Ini
                        </div>

                        <div class="ip-row">
                            <span class="ip-label">Kode</span>
                            <span class="ip-value asset-code-small">{{ $asset->code }}</span>
                        </div>

                        <div class="ip-row">
                            <span class="ip-label">Kondisi</span>

                            @php
                                $bc = match($asset->condition) {
                                    'baik'      => 'badge-good',
                                    'rusak'     => 'badge-broken',
                                    'perbaikan' => 'badge-repair',
                                    default     => 'badge-good',
                                };
                            @endphp

                            <span class="badge {{ $bc }}">{{ ucfirst($asset->condition) }}</span>
                        </div>

                        <div class="ip-row">
                            <span class="ip-label">Dibuat</span>
                            <span class="ip-value">
                                {{ $asset->created_at ? $asset->created_at->format('d M Y') : '-' }}
                            </span>
                        </div>

                        <div class="ip-row">
                            <span class="ip-label">Diperbarui</span>
                            <span class="ip-value">
                                {{ $asset->updated_at ? $asset->updated_at->format('d M Y') : '-' }}
                            </span>
                        </div>
                    </div>

                    <div class="warn-box">
                        <div class="warn-t">
                            <svg viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10"/>
                                <line x1="12" y1="8" x2="12" y2="12"/>
                                <line x1="12" y1="16" x2="12.01" y2="16"/>
                            </svg>
                            Perhatian
                        </div>

                        <p class="warn-p">
                            Perubahan akan langsung tersimpan dan memengaruhi data aset secara permanen.
                            Pastikan data sudah benar sebelum menyimpan.
                        </p>
                    </div>
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

</x-app-layout>