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
    min-width: 0;
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
    flex-shrink: 0;
}

.user-name {
    font-size: 13px;
    font-weight: 500;
    max-width: 130px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.content {
    padding: 20px 24px;
    overflow-y: auto;
    flex: 1;
}

.back-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 13px;
    color: var(--muted);
    text-decoration: none;
    margin-bottom: 16px;
    font-weight: 500;
    transition: .15s;
}

.back-btn:hover {
    color: var(--text);
}

.back-btn svg {
    width: 15px;
    height: 15px;
    fill: none;
    stroke: currentColor;
    stroke-width: 2;
    stroke-linecap: round;
    stroke-linejoin: round;
}

/* DETAIL LAYOUT */
.page-grid {
    display: grid;
    grid-template-columns: minmax(0, 1fr) 290px;
    gap: 16px;
    align-items: start;
}

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
    gap: 12px;
}

.card-header-left {
    display: flex;
    align-items: center;
    gap: 10px;
    min-width: 0;
}

.asset-icon {
    width: 38px;
    height: 38px;
    background: var(--accent-light);
    border-radius: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.asset-icon svg {
    width: 19px;
    height: 19px;
    fill: none;
    stroke: var(--accent);
    stroke-width: 1.8;
    stroke-linecap: round;
    stroke-linejoin: round;
}

.card-title {
    font-size: 15px;
    font-weight: 600;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.card-code {
    font-size: 12px;
    color: var(--muted);
    font-family: monospace;
    margin-top: 2px;
}

.badge {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 11.5px;
    font-weight: 500;
    padding: 4px 10px;
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

.info-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
}

.info-item {
    padding: 14px 20px;
    border-bottom: 1px solid #f3f4f6;
}

.info-item:nth-child(odd) {
    border-right: 1px solid #f3f4f6;
}

.info-label {
    font-size: 11px;
    font-weight: 600;
    color: var(--muted);
    text-transform: uppercase;
    letter-spacing: .04em;
    margin-bottom: 4px;
}

.info-value {
    font-size: 13.5px;
    font-weight: 500;
    color: var(--text);
    word-break: break-word;
}

.info-value.mono {
    font-family: monospace;
    font-size: 13px;
    background: #f3f4f6;
    padding: 2px 7px;
    border-radius: 5px;
    display: inline-block;
}

/* ACTION BUTTONS */
.action-row {
    display: flex;
    gap: 8px;
    margin-top: 12px;
    flex-wrap: wrap;
}

.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    padding: 9px 16px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
    text-decoration: none;
    border: none;
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
}

.btn-edit {
    background: #fffbeb;
    color: var(--warning);
    border: 1px solid #fde68a;
}

.btn-edit:hover {
    background: #fef3c7;
}

.btn-delete {
    background: var(--danger-light);
    color: var(--danger);
    border: 1px solid #fca5a5;
}

.btn-delete:hover {
    background: #fee2e2;
}

/* QR CARD */
.qr-card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    overflow: hidden;
}

.qr-card-header {
    padding: 14px 16px;
    border-bottom: 1px solid var(--border);
    font-size: 14px;
    font-weight: 600;
}

.qr-body {
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
}

.qr-frame {
    width: 190px;
    height: 190px;
    border: 2px dashed var(--border);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fafafa;
}

.qr-frame svg {
    max-width: 160px;
    max-height: 160px;
}

.qr-name {
    font-size: 14px;
    font-weight: 600;
    text-align: center;
    max-width: 100%;
    word-break: break-word;
}

.qr-code-label {
    font-family: monospace;
    font-size: 12px;
    color: var(--muted);
    background: #f3f4f6;
    padding: 4px 12px;
    border-radius: 6px;
}

.qr-actions {
    display: flex;
    flex-direction: column;
    gap: 8px;
    width: 100%;
}

.btn-block {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    padding: 10px 14px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
    text-decoration: none;
    border: none;
    width: 100%;
    font-family: var(--font);
    transition: .15s;
}

.btn-block svg {
    width: 15px;
    height: 15px;
    fill: none;
    stroke: currentColor;
    stroke-width: 2;
    stroke-linecap: round;
    stroke-linejoin: round;
}

.btn-print {
    background: var(--accent);
    color: #fff;
}

.btn-print:hover {
    background: #1447c0;
}

.btn-print svg {
    stroke: #fff;
}

.btn-download {
    background: #fff;
    color: var(--text);
    border: 1px solid var(--border);
}

.btn-download:hover {
    background: #f9fafb;
}

/* MOBILE NAV */
.mobile-nav {
    display: none;
}

/* PRINT */
@media print {
    .sidebar,
    .topbar,
    .back-btn,
    .action-row,
    .qr-actions,
    .mobile-nav {
        display: none !important;
    }

    .page-grid {
        grid-template-columns: 1fr;
    }

    .print-area {
        text-align: center;
    }
}

/* RESPONSIVE TABLET */
@media (max-width: 1024px) {
    .page-grid {
        grid-template-columns: 1fr;
    }

    .qr-card {
        max-width: 420px;
        width: 100%;
    }
}

/* RESPONSIVE HP */
@media (max-width: 768px) {
    .sidebar {
        display: none;
    }

    .topbar {
        padding: 0 16px;
    }

    .topbar h1 {
        font-size: 15px;
    }

    .topbar p {
        font-size: 11.5px;
    }

    .user-name {
        display: none;
    }

    .content {
        padding: 16px;
        padding-bottom: 88px;
    }

    .page-grid {
        grid-template-columns: 1fr;
        gap: 14px;
    }

    .card-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .info-grid {
        grid-template-columns: 1fr;
    }

    .info-item {
        border-right: none !important;
        border-bottom: 1px solid #f3f4f6;
        padding: 13px 16px;
    }

    .info-item:last-child {
        border-bottom: none;
    }

    .action-row {
        flex-direction: column;
    }

    .action-row .btn,
    .action-row form,
    .action-row form button {
        width: 100%;
    }

    .qr-card {
        width: 100%;
        max-width: 100%;
    }

    .qr-frame {
        width: 170px;
        height: 170px;
    }

    .qr-frame svg {
        max-width: 145px;
        max-height: 145px;
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
                <h1>Detail Aset</h1>
                <p>Informasi lengkap aset</p>
            </div>

            <div class="topbar-right">
                <div class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</div>
                <span class="user-name">{{ Auth::user()->name }}</span>
            </div>
        </div>

        <div class="content">

            <a href="/assets" class="back-btn">
                <svg viewBox="0 0 24 24">
                    <polyline points="15 18 9 12 15 6"/>
                </svg>
                Kembali ke Master Data
            </a>

            <div class="page-grid">

                {{-- INFO CARD --}}
                <div>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-header-left">
                                <div class="asset-icon">
                                    <svg viewBox="0 0 24 24">
                                        <path d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"/>
                                        <path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/>
                                    </svg>
                                </div>

                                <div>
                                    <div class="card-title">{{ $asset->name }}</div>
                                    <div class="card-code">{{ $asset->code }}</div>
                                </div>
                            </div>

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
                        </div>

                        <div class="info-grid">
                            <div class="info-item">
                                <div class="info-label">Kode Barang</div>
                                <div class="info-value mono">{{ $asset->code }}</div>
                            </div>

                            <div class="info-item">
                                <div class="info-label">Nama Aset</div>
                                <div class="info-value">{{ $asset->name }}</div>
                            </div>

                            <div class="info-item">
                                <div class="info-label">Kategori</div>
                                <div class="info-value">{{ $asset->category }}</div>
                            </div>

                            <div class="info-item">
                                <div class="info-label">Merk</div>
                                <div class="info-value">{{ $asset->merk ?? '-' }}</div>
                            </div>

                            <div class="info-item">
                                <div class="info-label">Lokasi</div>
                                <div class="info-value">{{ $asset->location }}</div>
                            </div>

                            <div class="info-item">
                                <div class="info-label">Penanggung Jawab</div>
                                <div class="info-value">{{ $asset->penanggungjawab ?? '-' }}</div>
                            </div>

                            <div class="info-item">
                                <div class="info-label">Tanggal Masuk</div>
                                <div class="info-value">
                                    {{ $asset->tanggal_masuk ? \Carbon\Carbon::parse($asset->tanggal_masuk)->isoFormat('D MMMM Y') : '-' }}
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-label">Harga Perolehan</div>
                                <div class="info-value">
                                    Rp {{ is_numeric($asset->harga) ? number_format($asset->harga, 0, ',', '.') : $asset->harga }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="action-row">
                        <a href="{{ route('assets.edit', $asset->code) }}" class="btn btn-edit">
                            <svg viewBox="0 0 24 24">
                                <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/>
                                <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                            </svg>
                            Edit Aset
                        </a>

                        <form action="{{ route('assets.destroy', $asset->code) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus aset ini?')">
                                <svg viewBox="0 0 24 24">
                                    <polyline points="3 6 5 6 21 6"/>
                                    <path d="M19 6l-1 14H6L5 6"/>
                                    <path d="M10 11v6M14 11v6"/>
                                </svg>
                                Hapus Aset
                            </button>
                        </form>
                    </div>
                </div>

                {{-- QR CARD --}}
                <div class="qr-card">
                    <div class="qr-card-header">QR Code Aset</div>

                    <div class="qr-body">
                        <div class="qr-frame print-area" id="print-area">
                            {!! QrCode::size(160)->generate(route('assets.show', $asset->code)) !!}
                        </div>

                        <div class="qr-name">{{ $asset->name }}</div>
                        <div class="qr-code-label">{{ $asset->code }}</div>

                        <div class="qr-actions">
                            <button class="btn-block btn-print" onclick="printQR()">
                                <svg viewBox="0 0 24 24">
                                    <polyline points="6 9 6 2 18 2 18 9"/>
                                    <path d="M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2"/>
                                    <rect x="6" y="14" width="12" height="8"/>
                                </svg>
                                Print QR Code
                            </button>

                            <button type="button" class="btn-block btn-download" onclick="downloadQRDetail()">
                                <svg viewBox="0 0 24 24">
                                    <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/>
                                    <polyline points="7 10 12 15 17 10"/>
                                    <line x1="12" y1="15" x2="12" y2="3"/>
                                </svg>
                                Unduh QR Code
                            </button>
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
    <a href="/assets" class="active">Aset</a>
    <a href="/scan">Scan</a>
</div>

<script>
function printQR() {
    let printContents = document.getElementById('print-area').innerHTML;

    document.body.innerHTML = `
        <div style="text-align:center;padding:40px;font-family:Arial, sans-serif;">
            <h2 style="margin-bottom:16px;">{{ $asset->name }}</h2>
            ${printContents}
            <p style="margin-top:12px;font-family:monospace;">{{ $asset->code }}</p>
        </div>
    `;

    window.print();
    location.reload();
}

function downloadQRDetail() {
    const qrBox = document.getElementById('print-area');

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

    canvas.width = 300;
    canvas.height = 300;

    const img = new Image();

    img.onload = function () {
        ctx.fillStyle = '#ffffff';
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        // Disamakan dengan QR download dari tabel aset
        ctx.drawImage(img, 30, 30, 240, 240);

        const link = document.createElement('a');
        link.download = '{{ $asset->code }}-qrcode.png';
        link.href = canvas.toDataURL('image/png');
        link.click();
    };

    img.src = 'data:image/svg+xml;base64,' + btoa(unescape(encodeURIComponent(svgData)));
}
</script>

</x-app-layout>