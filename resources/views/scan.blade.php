<x-app-layout>

<head>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
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
    --danger:#e02424;
    --danger-light:#fff5f5;
    --success:#0e9f6e;
    --success-light:#f0fdf4;
    --radius:12px;
    --font:'Plus Jakarta Sans',sans-serif;
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
    padding:32px 28px;
    flex:1;
    display:flex;
    justify-content:center;
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

/* SCAN */
.scan-wrap {
    width:100%;
    max-width:840px;
}

.scan-head {
    text-align:center;
    margin-bottom:28px;
}

.scan-head h2 {
    font-size:22px;
    font-weight:600;
    margin-bottom:6px;
}

.scan-head p {
    font-size:14px;
    color:var(--muted);
    line-height:1.6;
}

.scan-grid {
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:20px;
}

/* CAMERA */
.cam-card {
    background:#fff;
    border:1px solid var(--border);
    border-radius:16px;
    overflow:hidden;
}

.cam-viewport {
    background:#0f172a;
    aspect-ratio:1/1;
    display:flex;
    align-items:center;
    justify-content:center;
    position:relative;
    overflow:hidden;
}

#reader {
    width:100% !important;
    height:100% !important;
    border:none !important;
}

#reader video {
    width:100% !important;
    height:100% !important;
    object-fit:cover;
}

#reader img {
    display:none;
}

#reader__dashboard_section {
    padding:8px !important;
}

#reader__dashboard_section_csr button,
#reader__dashboard_section_fsr button {
    border:none !important;
    background:var(--accent) !important;
    color:#fff !important;
    padding:8px 12px !important;
    border-radius:7px !important;
    font-family:var(--font) !important;
    font-size:12px !important;
    cursor:pointer !important;
}

#reader__scan_region {
    display:flex !important;
    align-items:center !important;
    justify-content:center !important;
}

.cam-hint {
    padding:13px 16px;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    font-size:13px;
    color:var(--muted);
    border-top:1px solid var(--border);
}

@keyframes pulse {
    0%,100% { box-shadow:0 0 0 2px #d1fae5; }
    50% { box-shadow:0 0 0 5px #a7f3d0; }
}

.dot {
    width:8px;
    height:8px;
    border-radius:50%;
    background:var(--success);
    animation:pulse 2s infinite;
    flex-shrink:0;
}

/* LOADING */
.loading-box {
    display:none;
    align-items:center;
    justify-content:center;
    gap:10px;
    padding:12px 16px;
    background:var(--accent-light);
    color:var(--accent);
    font-size:13px;
    font-weight:500;
    border-top:1px solid var(--border);
}

.loading-box.show {
    display:flex;
}

.spinner {
    width:16px;
    height:16px;
    border:2px solid #bfdbfe;
    border-top-color:var(--accent);
    border-radius:50%;
    animation:spin .8s linear infinite;
}

@keyframes spin {
    to {
        transform:rotate(360deg);
    }
}

/* INFO */
.info-stack {
    display:flex;
    flex-direction:column;
    gap:14px;
}

.info-card {
    background:#fff;
    border:1px solid var(--border);
    border-radius:var(--radius);
    padding:18px;
}

.ic-title {
    font-size:13px;
    font-weight:600;
    margin-bottom:12px;
    display:flex;
    align-items:center;
    gap:7px;
}

.ic-title svg {
    width:15px;
    height:15px;
    fill:none;
    stroke:var(--accent);
    stroke-width:2;
    stroke-linecap:round;
    stroke-linejoin:round;
}

.steps {
    display:flex;
    flex-direction:column;
    gap:10px;
}

.step {
    display:flex;
    align-items:flex-start;
    gap:10px;
}

.step-n {
    width:22px;
    height:22px;
    border-radius:50%;
    background:var(--accent-light);
    color:var(--accent);
    font-size:11px;
    font-weight:600;
    display:flex;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
    margin-top:1px;
}

.step p {
    font-size:12.5px;
    color:var(--muted);
    line-height:1.5;
}

.step p strong {
    color:var(--text);
    font-weight:500;
}

/* MANUAL & UPLOAD */
.manual-label {
    font-size:12.5px;
    color:var(--muted);
    margin-bottom:8px;
    display:block;
    line-height:1.5;
}

.manual-row,
.upload-row {
    display:flex;
    gap:8px;
}

.manual-row input,
.upload-row input {
    flex:1;
    height:36px;
    border:1px solid var(--border);
    border-radius:7px;
    padding:0 12px;
    font-size:13px;
    font-family:var(--font);
    color:var(--text);
    outline:none;
    transition:.15s;
    min-width:0;
    background:#fff;
}

.upload-row input {
    padding:7px 10px;
    font-size:12.5px;
}

.manual-row input:focus,
.upload-row input:focus {
    border-color:var(--accent);
    box-shadow:0 0 0 3px rgba(26,86,219,.1);
}

.btn-go {
    height:36px;
    padding:0 14px;
    background:var(--accent);
    color:#fff;
    border:none;
    border-radius:7px;
    font-size:13px;
    font-weight:500;
    cursor:pointer;
    font-family:var(--font);
    display:flex;
    align-items:center;
    justify-content:center;
    gap:5px;
    white-space:nowrap;
    transition:.15s;
}

.btn-go:hover {
    background:#1447c0;
}

.btn-go svg {
    width:13px;
    height:13px;
    fill:none;
    stroke:#fff;
    stroke-width:2.2;
    stroke-linecap:round;
    stroke-linejoin:round;
}

.hint {
    font-size:11.5px;
    color:var(--muted);
    margin-top:6px;
    line-height:1.5;
}

.hint.success {
    color:var(--success);
}

.hint.error {
    color:var(--danger);
}

/* MOBILE NAV */
.mobile-nav {
    display:none;
}

/* TABLET */
@media (max-width:1024px) {
    .scan-wrap {
        max-width:900px;
    }

    .scan-grid {
        grid-template-columns:1fr;
    }

    .cam-card {
        max-width:520px;
        width:100%;
        margin:0 auto;
    }
}

/* HP */
@media (max-width:768px) {
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

    .content {
        padding:18px 16px;
        padding-bottom:88px;
        display:block;
    }

    .scan-head {
        text-align:left;
        margin-bottom:18px;
    }

    .scan-head h2 {
        font-size:19px;
    }

    .scan-head p {
        font-size:13px;
    }

    .scan-grid {
        grid-template-columns:1fr;
        gap:14px;
    }

    .cam-card {
        max-width:100%;
    }

    .cam-viewport {
        aspect-ratio:1/1;
        min-height:260px;
    }

    .info-card {
        padding:16px;
    }

    .manual-row,
    .upload-row {
        flex-direction:column;
    }

    .manual-row input,
    .upload-row input,
    .btn-go {
        width:100%;
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

@media (max-width:380px) {
    .cam-viewport {
        min-height:230px;
    }

    .scan-head h2 {
        font-size:18px;
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

        <a href="/scan" class="nav-item active">
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
                <h1>Scan QR Code</h1>
                <p>Identifikasi aset dengan kamera</p>
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
            <div class="scan-wrap">

                <div class="scan-head">
                    <h2>Scan QR Code Aset</h2>
                    <p>Arahkan kamera ke QR code pada label aset untuk melihat detail informasi.</p>
                </div>

                <div class="scan-grid">

                    {{-- CAMERA --}}
                    <div class="cam-card">
                        <div class="cam-viewport">
                            <div id="reader"></div>
                            <div id="qrFileReader" style="display:none"></div>
                        </div>

                        <div class="cam-hint" id="scanStatus">
                            <div class="dot"></div>
                            <span>Kamera aktif — arahkan ke QR Code</span>
                        </div>

                        <div class="loading-box" id="loadingBox">
                            <div class="spinner"></div>
                            <span>QR berhasil terbaca, membuka detail aset...</span>
                        </div>
                    </div>

                    {{-- INFO --}}
                    <div class="info-stack">

                        <div class="info-card">
                            <div class="ic-title">
                                <svg viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10"/>
                                    <line x1="12" y1="16" x2="12" y2="12"/>
                                    <line x1="12" y1="8" x2="12.01" y2="8"/>
                                </svg>
                                Cara Menggunakan
                            </div>

                            <div class="steps">
                                <div class="step">
                                    <div class="step-n">1</div>
                                    <p><strong>Izinkan akses kamera</strong> saat browser meminta izin pertama kali.</p>
                                </div>

                                <div class="step">
                                    <div class="step-n">2</div>
                                    <p><strong>Arahkan kamera</strong> ke QR code yang tertempel pada aset.</p>
                                </div>

                                <div class="step">
                                    <div class="step-n">3</div>
                                    <p><strong>Tahan stabil</strong> beberapa detik hingga QR berhasil terbaca.</p>
                                </div>

                                <div class="step">
                                    <div class="step-n">4</div>
                                    <p>Sistem akan <strong>otomatis membuka</strong> halaman detail aset.</p>
                                </div>
                            </div>
                        </div>

                        <div class="info-card">
                            <div class="ic-title">
                                <svg viewBox="0 0 24 24">
                                    <circle cx="11" cy="11" r="8"/>
                                    <path d="M21 21l-4.35-4.35"/>
                                </svg>
                                Cari Manual
                            </div>

                            <span class="manual-label">
                                Masukkan kode aset secara manual jika kamera tidak tersedia.
                            </span>

                            <div class="manual-row">
                                <input type="text" id="manualCode" placeholder="Contoh: ELK-001">

                                <button type="button" class="btn-go" onclick="goManual()">
                                    <svg viewBox="0 0 24 24">
                                        <path d="M5 12h14M12 5l7 7-7 7"/>
                                    </svg>
                                    Cari
                                </button>
                            </div>

                            <p class="hint" id="manualResult">
                                Masukkan kode barang yang tertera pada label aset.
                            </p>
                        </div>

                        <div class="info-card">
                            <div class="ic-title">
                                <svg viewBox="0 0 24 24">
                                    <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/>
                                    <polyline points="17 8 12 3 7 8"/>
                                    <line x1="12" y1="3" x2="12" y2="15"/>
                                </svg>
                                Upload QR Code
                            </div>

                            <span class="manual-label">
                                Upload gambar QR Code dari galeri atau file.
                            </span>

                            <div class="upload-row">
                                <input type="file" id="qrFile" accept="image/*">

                                <button type="button" class="btn-go" onclick="scanUploadedQR()">
                                    Scan File
                                </button>
                            </div>

                            <p class="hint" id="uploadResult">
                                Pilih gambar QR Code dengan format JPG, PNG, atau sejenisnya.
                            </p>
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
    <a href="/scan" class="active">Scan</a>
</div>

<script>
let scannerInstance = null;
let isScanningDone = false;

const checkAssetUrlTemplate = "{{ route('assets.checkCode', ':code') }}";

function updateScanStatus(message) {
    const scanStatus = document.getElementById('scanStatus');

    if (scanStatus) {
        scanStatus.innerHTML = `
            <div class="dot"></div>
            <span>${message}</span>
        `;
    }
}

function showLoading(message = 'QR berhasil terbaca, membuka detail aset...') {
    const loadingBox = document.getElementById('loadingBox');

    if (loadingBox) {
        loadingBox.classList.add('show');
        loadingBox.innerHTML = `
            <div class="spinner"></div>
            <span>${message}</span>
        `;
    }
}

function hideLoading() {
    const loadingBox = document.getElementById('loadingBox');

    if (loadingBox) {
        loadingBox.classList.remove('show');
    }
}

function setManualMessage(message, type = 'normal') {
    const manualResult = document.getElementById('manualResult');

    if (!manualResult) return;

    manualResult.innerText = message;

    if (type === 'error') {
        manualResult.className = 'hint error';
    } else if (type === 'success') {
        manualResult.className = 'hint success';
    } else {
        manualResult.className = 'hint';
    }
}

function extractAssetCode(decodedText) {
    if (!decodedText) return '';

    decodedText = decodedText.trim();

    try {
        const url = new URL(decodedText);
        const parts = url.pathname.split('/').filter(Boolean);

        if (parts[0] === 'assets' && parts[1]) {
            return decodeURIComponent(parts[1]);
        }

        return decodedText;
    } catch (e) {
        return decodedText;
    }
}

async function checkAndRedirectAsset(code, source = 'manual') {
    if (!code) {
        setManualMessage('Masukkan kode aset terlebih dahulu.', 'error');
        return;
    }

    isScanningDone = true;

    hideLoading();

    if (source === 'manual') {
        setManualMessage('Mengecek kode aset...', 'normal');
    }

    updateScanStatus('Mengecek kode aset...');
    showLoading('Mengecek kode aset...');

    const url = checkAssetUrlTemplate.replace(':code', encodeURIComponent(code));

    try {
        const response = await fetch(url, {
            method: 'GET',
            headers: {
                'Accept': 'application/json'
            }
        });

        const data = await response.json();

        if (!response.ok || !data.exists) {
            isScanningDone = false;
            hideLoading();
            updateScanStatus('Kode aset tidak ditemukan.');

            if (source === 'manual') {
                setManualMessage('Kode aset tidak ditemukan. Periksa kembali kode yang dimasukkan.', 'error');
            } else {
                const uploadResult = document.getElementById('uploadResult');
                if (uploadResult) {
                    uploadResult.innerText = 'QR terbaca, tetapi kode aset tidak ditemukan di database.';
                    uploadResult.className = 'hint error';
                }
            }

            return;
        }

        updateScanStatus('Kode aset ditemukan — membuka detail aset...');

        if (source === 'manual') {
            setManualMessage('Kode aset ditemukan. Membuka detail aset...', 'success');
        }

        showLoading('Kode aset ditemukan, membuka detail aset...');

        setTimeout(function () {
            window.location.href = data.url;
        }, 700);

    } catch (error) {
        isScanningDone = false;
        hideLoading();
        updateScanStatus('Gagal mengecek kode aset.');

        if (source === 'manual') {
            setManualMessage('Terjadi kesalahan saat mengecek kode aset. Coba lagi.', 'error');
        }

        console.error(error);
    }
}

function handleDecodedQR(decodedText) {
    if (isScanningDone) return;

    if (!decodedText) {
        updateScanStatus('QR Code belum terbaca. Coba arahkan kamera lebih dekat.');
        return;
    }

    const code = extractAssetCode(decodedText);

    updateScanStatus('QR terdeteksi — mengecek data aset...');
    checkAndRedirectAsset(code, 'qr');
}

document.addEventListener("DOMContentLoaded", function () {
    const readerEl = document.getElementById("reader");

    if (readerEl && typeof Html5QrcodeScanner !== "undefined") {
        const qrboxSize = window.innerWidth <= 768 ? 210 : 220;

        scannerInstance = new Html5QrcodeScanner("reader", {
            fps: 10,
            qrbox: {
                width: qrboxSize,
                height: qrboxSize
            },
            rememberLastUsedCamera: false,
            supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA],

            // Paksa pakai kamera belakang HP
            videoConstraints: {
                facingMode: { ideal: "environment" }
            }
        });

        scannerInstance.render(function(decodedText) {
            handleDecodedQR(decodedText);
        });

        updateScanStatus('Kamera aktif — arahkan kamera belakang ke QR Code');
    }
});

function goManual() {
    const codeInput = document.getElementById('manualCode');
    const code = codeInput.value.trim();

    if (!code) {
        setManualMessage('Masukkan kode aset terlebih dahulu.', 'error');
        codeInput.focus();
        return;
    }

    checkAndRedirectAsset(code, 'manual');
}

function scanUploadedQR() {
    const fileInput = document.getElementById('qrFile');
    const resultText = document.getElementById('uploadResult');

    if (!fileInput.files || fileInput.files.length === 0) {
        alert('Pilih gambar QR Code terlebih dahulu.');
        return;
    }

    const file = fileInput.files[0];

    if (typeof Html5Qrcode === "undefined") {
        resultText.innerText = 'Library scanner belum siap. Refresh halaman lalu coba lagi.';
        resultText.className = 'hint error';
        return;
    }

    resultText.innerText = 'Membaca QR Code...';
    resultText.className = 'hint';

    const fileScanner = new Html5Qrcode("qrFileReader");

    fileScanner.scanFile(file, true)
        .then(decodedText => {
            resultText.innerText = 'QR berhasil terbaca. Mengecek data aset...';
            resultText.className = 'hint success';

            const code = extractAssetCode(decodedText);
            checkAndRedirectAsset(code, 'upload');
        })
        .catch(err => {
            resultText.innerText = 'QR Code tidak terbaca. Gunakan gambar yang lebih jelas.';
            resultText.className = 'hint error';
            console.log(err);
        });
}

document.addEventListener('DOMContentLoaded', function () {
    const manualInput = document.getElementById('manualCode');

    if (manualInput) {
        manualInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                goManual();
            }
        });
    }
});
</script>

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