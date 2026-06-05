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

/* PROFILE */
.profile-dropdown {
    position: relative;
}

.profile-btn {
    border: none;
    background: none;
    display: flex;
    align-items: center;
    gap: 12px;
    cursor: pointer;
    font-family: var(--font);
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

.profile-info span {
    font-size: 13px;
    font-weight: 500;
    max-width: 120px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    display: block;
}

.dropdown-menu {
    position: absolute;
    top: 46px;
    right: 0;
    width: 180px;
    background: white;
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

/* CONTENT */
.content {
    padding: 24px 28px;
    overflow-y: auto;
    flex: 1;
}

.page-head {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 16px;
    margin-bottom: 18px;
}

.page-title {
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 4px;
}

.page-subtitle {
    font-size: 13px;
    color: var(--muted);
    line-height: 1.5;
}

.scan-grid {
    display: grid;
    grid-template-columns: minmax(420px, 1fr) minmax(420px, 1fr);
    gap: 18px;
    align-items: start;
}

.card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    overflow: hidden;
    min-width: 0;
}

.card-header {
    padding: 16px 20px;
    border-bottom: 1px solid var(--border);
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
}

.card-header span {
    font-size: 14px;
    font-weight: 600;
}

.card-body {
    padding: 18px 20px;
}

.form-group {
    margin-bottom: 14px;
}

.form-group label {
    display: block;
    font-size: 12px;
    color: var(--text);
    font-weight: 600;
    margin-bottom: 6px;
}

.form-control,
.form-group input,
.form-group select,
.form-group textarea,
#manualCode {
    width: 100%;
    min-height: 40px;
    border: 1px solid var(--border);
    border-radius: 8px;
    padding: 9px 12px;
    font-size: 13px;
    font-family: var(--font);
    outline: none;
    background: #fff;
}

.form-control:focus,
.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus,
#manualCode:focus {
    border-color: var(--accent);
    box-shadow: 0 0 0 3px rgba(26, 86, 219, .08);
}

textarea {
    resize: vertical;
}

.camera-row {
    display: grid;
    grid-template-columns: minmax(0, 1fr) auto;
    gap: 8px;
    align-items: end;
}

.reader-box {
    width: 100%;
    min-height: 280px;
    border: 1px solid var(--border);
    border-radius: var(--radius);
    overflow: hidden;
    margin-bottom: 14px;
    background: #fafafa;
}

.reader-box video {
    border-radius: var(--radius);
}

.manual-row {
    display: flex;
    gap: 8px;
    margin-bottom: 14px;
}

#manualCode {
    flex: 1;
    min-width: 0;
}

.scan-status {
    background: #f3f4f6;
    color: #374151;
    padding: 12px;
    border-radius: 10px;
    font-size: 13px;
    line-height: 1.5;
}

.table-wrapper {
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

table {
    width: 100%;
    min-width: 720px;
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
    white-space: nowrap;
}

tbody td {
    padding: 12px 16px;
    font-size: 13px;
    border-bottom: 1px solid #f3f4f6;
    vertical-align: middle;
    white-space: nowrap;
}

tbody tr:last-child td {
    border-bottom: none;
}

tbody tr:hover td {
    background: #fafafa;
}

.asset-code {
    font-family: monospace;
    font-size: 12px;
    background: #f3f4f6;
    padding: 3px 8px;
    border-radius: 5px;
    color: var(--muted);
    font-weight: 600;
}

.item-name {
    font-weight: 600;
    margin-bottom: 2px;
}

.item-meta {
    color: var(--muted);
    font-size: 11.5px;
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

.type-in {
    background: var(--success-light);
    color: var(--success);
}

.type-out {
    background: var(--danger-light);
    color: var(--danger);
}

.qty-input {
    width: 78px;
    min-height: 34px;
    border: 1px solid var(--border);
    border-radius: 8px;
    padding: 7px 9px;
    font-family: var(--font);
}

.empty-row {
    text-align: center;
    color: var(--muted);
    padding: 32px 16px !important;
}

.action-row {
    padding: 16px 20px;
    border-top: 1px solid var(--border);
    display: flex;
    gap: 8px;
    justify-content: flex-end;
    flex-wrap: wrap;
}

.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 9px 14px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 500;
    text-decoration: none;
    border: 1px solid transparent;
    cursor: pointer;
    font-family: var(--font);
    line-height: 1.2;
}

.btn-primary {
    background: var(--accent);
    color: #fff;
}

.btn-light {
    background: #fff;
    color: #374151;
    border-color: var(--border);
}

.btn-green {
    background: var(--success);
    color: #fff;
}

.btn-danger-soft {
    background: var(--danger-light);
    color: var(--danger);
}

.btn-warning-soft {
    background: var(--warning-light);
    color: var(--warning);
}

/* MOBILE NAV */
.mobile-nav {
    display: none;
}

@media (max-width: 768px) {
    .scan-grid {
        grid-template-columns: 1fr;
    }

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

    .profile-info {
        display: none;
    }

    .content {
        padding: 16px;
        padding-bottom: 90px;
    }

    .page-head {
        flex-direction: column;
    }

    .page-title {
        font-size: 20px;
    }

    .card-header {
        padding: 14px;
    }

    .card-body {
        padding: 14px;
    }

    .camera-row {
        grid-template-columns: 1fr;
    }

    .camera-row .btn {
        width: 100%;
    }

    .manual-row {
        flex-direction: column;
    }

    .manual-row .btn {
        width: 100%;
    }

    .reader-box {
        min-height: 240px;
    }

    .action-row {
        padding: 14px;
        flex-direction: column;
    }

    .action-row .btn,
    .action-row button {
        width: 100%;
    }

    thead th,
    tbody td {
        padding: 10px 12px;
        font-size: 12.5px;
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

        <a href="/scan" class="nav-item active">
            <svg viewBox="0 0 24 24">
                <rect x="3" y="3" width="7" height="7"/>
                <rect x="14" y="3" width="7" height="7"/>
                <rect x="14" y="14" width="7" height="7"/>
                <path d="M3 17.5A3.5 3.5 0 006.5 21M3 14v3.5M6.5 14H3"/>
            </svg>
            Scan QR
        </a>

        <a href="{{ route('transactions.report') }}" class="nav-item">
            <svg viewBox="0 0 24 24">
                <path d="M3 3v18h18"/>
                <path d="M7 15l4-4 3 3 5-6"/>
            </svg>
            Report Stok
        </a>

        <hr class="nav-divider">

        <div class="nav-label">Transaksi</div>

        <a href="{{ route('transactions.history') }}" class="nav-item">
            <svg viewBox="0 0 24 24">
                <path d="M3 3v5h5"/>
                <path d="M3.05 13A9 9 0 1020 8.5"/>
                <path d="M12 7v5l3 2"/>
            </svg>
            Riwayat Scan
        </a>

        <a href="{{ route('transactions.stockRecap') }}" class="nav-item">
            <svg viewBox="0 0 24 24">
                <path d="M4 19V5"/>
                <path d="M4 19h16"/>
                <rect x="7" y="10" width="3" height="6"/>
                <rect x="12" y="7" width="3" height="9"/>
                <rect x="17" y="12" width="3" height="4"/>
            </svg>
            Rekap Stok
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

    <div class="main">
        <div class="topbar">
            <div class="topbar-left">
                <h1>Scan QR</h1>
                <p>Scan barang masuk dan keluar menggunakan kamera</p>
            </div>

            <div class="profile-dropdown">
                <button class="profile-btn" onclick="toggleProfileMenu()" type="button">
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

        <div class="content">
            <div class="page-head">
                <div>
                    <h1 class="page-title">Scan Inventory Barang</h1>
                    <p class="page-subtitle">
                        Pilih jenis transaksi terlebih dahulu, lalu scan QR barang. Barang yang discan akan masuk ke daftar sementara.
                    </p>
                </div>
            </div>

            <div class="scan-grid">
                <div class="card">
                    <div class="card-header">
                        <span>Scanner QR</span>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label>Jenis Transaksi</label>
                            <select id="transactionType" class="form-control">
                                <option value="IN">Barang Masuk / IN</option>
                                <option value="OUT">Barang Keluar / OUT</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Jumlah Default per Scan</label>
                            <input type="number" id="defaultQuantity" value="1" min="1" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Keterangan Umum</label>
                            <textarea id="transactionNote" rows="3" placeholder="Opsional" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Mode Kamera</label>
                            <div class="camera-row">
                                <select id="cameraMode" class="form-control">
                                    <option value="back" selected>Kamera Belakang</option>
                                    <option value="front">Kamera Depan</option>
                                    <option value="manual">Pilih Kamera Manual</option>
                                </select>

                                <button type="button" onclick="switchCameraMode()" class="btn btn-primary">
                                    Terapkan
                                </button>
                            </div>
                        </div>

                        <div class="form-group" id="manualCameraGroup" style="display:none;">
                            <label>Pilih Kamera Manual</label>
                            <div class="camera-row">
                                <select id="cameraSelect" class="form-control">
                                    <option value="">Mendeteksi kamera...</option>
                                </select>

                                <button type="button" onclick="switchManualCamera()" class="btn btn-primary">
                                    Gunakan
                                </button>
                            </div>
                        </div>

                        <div id="reader" class="reader-box"></div>

                        <div class="manual-row">
                            <input type="text" id="manualCode" placeholder="Input kode barang manual">

                            <button type="button" onclick="submitManualCode()" class="btn btn-primary">
                                Tambah
                            </button>
                        </div>

                        <div id="scanStatus" class="scan-status">
                            Kamera siap digunakan. Arahkan ke QR Code barang.
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <span>Daftar Scan Sementara</span>

                        <button type="button" onclick="clearItems()" class="btn btn-danger-soft">
                            Kosongkan
                        </button>
                    </div>

                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Barang</th>
                                    <th>Jenis</th>
                                    <th>Stok</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody id="scanItemsBody">
                                <tr>
                                    <td colspan="6" class="empty-row">
                                        Belum ada barang yang discan.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="action-row">
                        <a href="{{ route('assets.index') }}" class="btn btn-light">Kembali</a>
                        <a href="{{ route('transactions.history') }}" class="btn btn-primary">Riwayat Scan</a>
                        <button type="button" onclick="saveAllTransactions()" class="btn btn-green">Simpan Semua</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mobile-nav">
    <a href="/dashboard">Dashboard</a>
    <a href="/assets">Aset</a>
    <a href="/scan" class="active">Scan</a>
    <a href="{{ route('transactions.report') }}">Report</a>
</div>

<script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>

<script>
const checkAssetUrlTemplate = "{{ route('assets.checkCode', ':code') }}";
const batchStoreUrl = "{{ route('transactions.batchStore') }}";
const csrfToken = "{{ csrf_token() }}";

let scannedItems = {};
let isProcessingScan = false;
let html5QrCode = null;
let currentCameraId = null;

function toggleProfileMenu() {
    document.getElementById('profileMenu')
        .classList.toggle('show');
}

window.addEventListener('click', function(e) {
    const dropdown = document.querySelector('.profile-dropdown');

    if (dropdown && !dropdown.contains(e.target)) {
        document.getElementById('profileMenu')
            .classList.remove('show');
    }
});

function updateScanStatus(message, type = 'info') {
    const status = document.getElementById('scanStatus');

    let bg = '#f3f4f6';
    let color = '#374151';

    if (type === 'success') {
        bg = '#dcfce7';
        color = '#166534';
    } else if (type === 'error') {
        bg = '#fee2e2';
        color = '#991b1b';
    } else if (type === 'warning') {
        bg = '#fef3c7';
        color = '#92400e';
    }

    status.style.background = bg;
    status.style.color = color;
    status.innerText = message;
}

function normalizeScannedCode(decodedText) {
    let code = decodedText.trim();

    try {
        const url = new URL(code);
        const parts = url.pathname.split('/').filter(Boolean);
        code = parts[parts.length - 1];
    } catch (e) {
        // Kalau bukan URL, berarti memang kode biasa.
    }

    return decodeURIComponent(code).trim();
}

async function addScannedCode(decodedText) {
    const code = normalizeScannedCode(decodedText);

    if (!code) {
        updateScanStatus('Kode QR kosong atau tidak valid.', 'error');
        return;
    }

    if (isProcessingScan) {
        return;
    }

    isProcessingScan = true;

    try {
        const checkUrl = checkAssetUrlTemplate.replace(':code', encodeURIComponent(code));
        const response = await fetch(checkUrl);
        const data = await response.json();

        if (!response.ok || !data.exists) {
            updateScanStatus(data.message || 'Kode barang tidak ditemukan.', 'error');
            return;
        }

        const asset = data.asset;
        const defaultQty = parseInt(document.getElementById('defaultQuantity').value) || 1;
        const type = document.getElementById('transactionType').value;
        const itemKey = asset.code + '-' + type;

        if (scannedItems[itemKey]) {
            scannedItems[itemKey].quantity += defaultQty;
        } else {
            scannedItems[itemKey] = {
                code: asset.code,
                name: asset.name,
                merk: asset.merk || '-',
                warna: asset.warna || '-',
                ukuran: asset.ukuran || '-',
                satuan: asset.satuan || 'pcs',
                stok_saat_ini: asset.stok_saat_ini || 0,
                type: type,
                quantity: defaultQty
            };
        }

        renderItems();
        updateScanStatus(`Barang ${asset.code} (${type}) berhasil ditambahkan ke daftar scan.`, 'success');

    } catch (error) {
        updateScanStatus('Terjadi kesalahan saat mengecek kode barang.', 'error');
    } finally {
        setTimeout(() => {
            isProcessingScan = false;
        }, 1200);
    }
}

function renderItems() {
    const tbody = document.getElementById('scanItemsBody');
    const items = Object.values(scannedItems);

    if (items.length === 0) {
        tbody.innerHTML = `
            <tr>
                <td colspan="6" class="empty-row">
                    Belum ada barang yang discan.
                </td>
            </tr>
        `;
        return;
    }

    tbody.innerHTML = items.map(item => {
        const itemKey = item.code + '-' + item.type;
        const typeClass = item.type === 'IN' ? 'type-in' : 'type-out';

        return `
            <tr>
                <td>
                    <span class="asset-code">${item.code}</span>
                </td>

                <td>
                    <div class="item-name">${item.name}</div>
                    <div class="item-meta">${item.merk} | ${item.warna} | ${item.ukuran}</div>
                </td>

                <td>
                    <span class="badge ${typeClass}">
                        ${item.type}
                    </span>
                </td>

                <td>${item.stok_saat_ini} ${item.satuan}</td>

                <td>
                    <input type="number" min="1" value="${item.quantity}"
                        onchange="updateQuantity('${itemKey}', this.value)"
                        class="qty-input">
                </td>

                <td>
                    <button type="button" onclick="removeItem('${itemKey}')" class="btn btn-danger-soft">
                        Hapus
                    </button>
                </td>
            </tr>
        `;
    }).join('');
}

function updateQuantity(itemKey, value) {
    const qty = parseInt(value);

    if (!scannedItems[itemKey]) return;

    scannedItems[itemKey].quantity = qty > 0 ? qty : 1;
    renderItems();
}

function removeItem(itemKey) {
    delete scannedItems[itemKey];
    renderItems();
}

function clearItems() {
    if (confirm('Kosongkan semua daftar scan?')) {
        scannedItems = {};
        renderItems();
        updateScanStatus('Daftar scan dikosongkan.', 'info');
    }
}

function submitManualCode() {
    const input = document.getElementById('manualCode');
    const code = input.value.trim();

    if (!code) {
        updateScanStatus('Masukkan kode barang terlebih dahulu.', 'warning');
        return;
    }

    addScannedCode(code);
    input.value = '';
}

async function saveAllTransactions() {
    const items = Object.values(scannedItems);

    if (items.length === 0) {
        updateScanStatus('Belum ada barang yang discan.', 'warning');
        return;
    }

    const note = document.getElementById('transactionNote').value;

    const payload = {
        note: note,
        items: items.map(item => ({
            code: item.code,
            type: item.type,
            quantity: item.quantity
        }))
    };

    try {
        const response = await fetch(batchStoreUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify(payload)
        });

        const data = await response.json();

        if (!response.ok) {
            if (data.errors) {
                const firstError = Object.values(data.errors)[0][0];
                updateScanStatus(firstError, 'error');
            } else {
                updateScanStatus(data.message || 'Gagal menyimpan transaksi.', 'error');
            }
            return;
        }

        scannedItems = {};
        renderItems();
        updateScanStatus(data.message || 'Semua transaksi berhasil disimpan.', 'success');

        setTimeout(() => {
            window.location.href = `/scan-batches/${data.batch_id}`;
        }, 900);

    } catch (error) {
        updateScanStatus('Terjadi kesalahan saat menyimpan transaksi.', 'error');
    }
}

async function stopCamera() {
    if (html5QrCode) {
        try {
            const state = html5QrCode.getState();

            if (state === Html5QrcodeScannerState.SCANNING || state === Html5QrcodeScannerState.PAUSED) {
                await html5QrCode.stop();
            }

            await html5QrCode.clear();
        } catch (error) {
            // Abaikan jika kamera memang belum aktif.
        }
    }
}

async function startCameraByConfig(cameraConfig) {
    const readerId = 'reader';
    const qrboxSize = window.innerWidth <= 768 ? 220 : 250;

    await stopCamera();

    html5QrCode = new Html5Qrcode(readerId);

    const config = {
        fps: 10,
        qrbox: {
            width: qrboxSize,
            height: qrboxSize
        },
        aspectRatio: 1.0
    };

    try {
        await html5QrCode.start(
            cameraConfig,
            config,
            function(decodedText) {
                addScannedCode(decodedText);
            },
            function(errorMessage) {
                // Error kecil saat scanner membaca frame tidak perlu ditampilkan.
            }
        );

        updateScanStatus('Kamera aktif. Pilih mode IN/OUT, lalu scan QR barang.', 'info');
        return true;
    } catch (error) {
        return false;
    }
}

async function startBackCamera() {
    updateScanStatus('Membuka kamera belakang...', 'info');

    let success = await startCameraByConfig({
        facingMode: { exact: "environment" }
    });

    if (!success) {
        success = await startCameraByConfig({
            facingMode: { ideal: "environment" }
        });
    }

    if (!success) {
        const cameraSelect = document.getElementById('cameraSelect');

        if (cameraSelect && cameraSelect.value) {
            success = await startCameraByConfig(cameraSelect.value);
        }
    }

    if (!success) {
        updateScanStatus('Kamera belakang tidak tersedia. Coba pilih kamera manual atau gunakan perangkat HP.', 'warning');
    }
}

async function startFrontCamera() {
    updateScanStatus('Membuka kamera depan...', 'info');

    let success = await startCameraByConfig({
        facingMode: { exact: "user" }
    });

    if (!success) {
        success = await startCameraByConfig({
            facingMode: { ideal: "user" }
        });
    }

    if (!success) {
        const cameraSelect = document.getElementById('cameraSelect');

        if (cameraSelect && cameraSelect.value) {
            success = await startCameraByConfig(cameraSelect.value);
        }
    }

    if (!success) {
        updateScanStatus('Kamera depan tidak tersedia. Coba pilih kamera manual.', 'warning');
    }
}

async function loadCameras() {
    const cameraSelect = document.getElementById('cameraSelect');

    if (!cameraSelect || typeof Html5Qrcode === 'undefined') {
        updateScanStatus('Library scanner QR belum terbaca.', 'error');
        return;
    }

    try {
        const cameras = await Html5Qrcode.getCameras();

        if (!cameras || cameras.length === 0) {
            cameraSelect.innerHTML = `<option value="">Kamera tidak ditemukan</option>`;
            updateScanStatus('Kamera tidak ditemukan di perangkat ini.', 'error');
            return;
        }

        cameraSelect.innerHTML = cameras.map((camera, index) => {
            const label = camera.label || `Kamera ${index + 1}`;
            return `<option value="${camera.id}">${label}</option>`;
        }).join('');

        let selectedCamera = cameras[0];

        const backCamera = cameras.find(camera => {
            const label = (camera.label || '').toLowerCase();

            return label.includes('back') ||
                label.includes('rear') ||
                label.includes('environment') ||
                label.includes('belakang');
        });

        if (backCamera) {
            selectedCamera = backCamera;
        } else if (cameras.length > 1) {
            selectedCamera = cameras[cameras.length - 1];
        }

        cameraSelect.value = selectedCamera.id;

    } catch (error) {
        cameraSelect.innerHTML = `<option value="">Kamera belum diizinkan</option>`;
        updateScanStatus('Izinkan akses kamera terlebih dahulu di browser.', 'warning');
    }
}

async function switchCameraMode() {
    const mode = document.getElementById('cameraMode').value;
    const manualGroup = document.getElementById('manualCameraGroup');

    if (mode === 'manual') {
        manualGroup.style.display = 'block';
        updateScanStatus('Silakan pilih kamera manual dari dropdown.', 'info');
        await loadCameras();
        return;
    }

    manualGroup.style.display = 'none';

    if (mode === 'back') {
        await startBackCamera();
    } else if (mode === 'front') {
        await startFrontCamera();
    }
}

async function switchManualCamera() {
    const cameraSelect = document.getElementById('cameraSelect');
    const selectedCameraId = cameraSelect.value;

    if (!selectedCameraId) {
        updateScanStatus('Pilih kamera terlebih dahulu.', 'warning');
        return;
    }

    updateScanStatus('Mengganti kamera...', 'info');
    await startCameraByConfig(selectedCameraId);
}

document.addEventListener('DOMContentLoaded', function () {
    const manualInput = document.getElementById('manualCode');

    if (manualInput) {
        manualInput.addEventListener('keydown', function (event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                submitManualCode();
            }
        });
    }

    loadCameras().then(() => {
        startBackCamera();
    });
});
</script>
</x-app-layout>