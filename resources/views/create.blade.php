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
    max-width: 140px;
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

/* FORM */
.form-card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    overflow: hidden;
    max-width: 900px;
}

.form-card-header {
    padding: 16px 20px;
    border-bottom: 1px solid var(--border);
    display: flex;
    align-items: center;
    gap: 10px;
}

.form-icon {
    width: 36px;
    height: 36px;
    background: var(--accent-light);
    border-radius: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.form-icon svg {
    width: 18px;
    height: 18px;
    fill: none;
    stroke: var(--accent);
    stroke-width: 1.8;
    stroke-linecap: round;
    stroke-linejoin: round;
}

.form-title {
    font-size: 15px;
    font-weight: 600;
}

.form-subtitle {
    font-size: 12px;
    color: var(--muted);
    margin-top: 1px;
}

.form-body {
    padding: 20px;
}

.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.form-group.full {
    grid-column: 1 / -1;
}

.form-label {
    font-size: 12px;
    font-weight: 600;
    color: var(--muted);
    text-transform: uppercase;
    letter-spacing: .04em;
}

.form-label .req {
    color: var(--danger);
    margin-left: 2px;
}

input, select {
    width: 100%;
    padding: 9px 12px;
    border: 1px solid var(--border);
    border-radius: 8px;
    font-size: 13.5px;
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

input.is-invalid {
    border-color: var(--danger);
}

.form-hint {
    font-size: 11.5px;
    color: var(--muted);
}

.form-error {
    font-size: 12px;
    color: var(--danger);
}

.input-prefix-wrap {
    position: relative;
}

.input-prefix-wrap .prefix {
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 13px;
    color: var(--muted);
    font-weight: 500;
    pointer-events: none;
}

.input-prefix-wrap input {
    padding-left: 36px;
}

.form-footer {
    padding: 16px 20px;
    border-top: 1px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 8px;
}

.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    padding: 9px 18px;
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

.btn-primary {
    background: var(--accent);
    color: #fff;
}

.btn-primary:hover {
    background: #1447c0;
}

.btn-primary svg {
    stroke: #fff;
}

.btn-ghost {
    background: transparent;
    color: var(--muted);
    border: 1px solid var(--border);
}

.btn-ghost:hover {
    background: #f3f4f6;
    color: var(--text);
}

/* MOBILE NAV */
.mobile-nav {
    display: none;
}

/* RESPONSIVE TABLET */
@media (max-width: 1024px) {
    .form-card {
        max-width: 100%;
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

    .form-card-header {
        align-items: flex-start;
    }

    .form-body {
        padding: 16px;
    }

    .form-grid {
        grid-template-columns: 1fr;
        gap: 15px;
    }

    .form-group.full {
        grid-column: auto;
    }

    .form-footer {
        flex-direction: column-reverse;
        align-items: stretch;
        padding: 16px;
    }

    .form-footer .btn,
    .form-footer button,
    .form-footer a {
        width: 100%;
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
                <h1>Tambah Aset Baru</h1>
                <p>Isi formulir di bawah ini</p>
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

            <div class="form-card">
                <div class="form-card-header">
                    <div class="form-icon">
                        <svg viewBox="0 0 24 24">
                            <line x1="12" y1="5" x2="12" y2="19"/>
                            <line x1="5" y1="12" x2="19" y2="12"/>
                        </svg>
                    </div>

                    <div>
                        <div class="form-title">Tambah Aset Baru</div>
                        <div class="form-subtitle">Lengkapi semua informasi aset</div>
                    </div>
                </div>

                <form action="/assets" method="POST">
                    @csrf

                    <div class="form-body">
                        <div class="form-grid">

                            <div class="form-group">
                                <label class="form-label">Kode Barang <span class="req">*</span></label>
                                <input type="text" name="code" value="{{ old('code') }}"
                                    placeholder="Contoh: ELK-001"
                                    class="{{ $errors->has('code') ? 'is-invalid' : '' }}">

                                @error('code')
                                    <span class="form-error">{{ $message }}</span>
                                @enderror

                                <span class="form-hint">Kode unik untuk identifikasi aset</span>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Nama Aset <span class="req">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    placeholder="Masukkan nama aset">

                                @error('name')
                                    <span class="form-error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Kategori <span class="req">*</span></label>
                                <select name="category">
                                    <option value="">— Pilih Kategori —</option>
                                    <option value="Elektronik" {{ old('category') == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                                    <option value="Mesin Produksi" {{ old('category') == 'Mesin Produksi' ? 'selected' : '' }}>Mesin Produksi</option>
                                    <option value="Furniture" {{ old('category') == 'Furniture' ? 'selected' : '' }}>Furniture</option>
                                    <option value="Inventaris Kantor" {{ old('category') == 'Inventaris Kantor' ? 'selected' : '' }}>Inventaris Kantor</option>
                                    <option value="Peralatan Gudang" {{ old('category') == 'Peralatan Gudang' ? 'selected' : '' }}>Peralatan Gudang</option>
                                    <option value="Kendaraan" {{ old('category') == 'Kendaraan' ? 'selected' : '' }}>Kendaraan</option>
                                </select>

                                @error('category')
                                    <span class="form-error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Merk</label>
                                <input type="text" name="merk" value="{{ old('merk') }}"
                                    placeholder="Masukkan merk / brand">

                                @error('merk')
                                    <span class="form-error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Lokasi <span class="req">*</span></label>
                                <input type="text" name="location" value="{{ old('location') }}"
                                    placeholder="Contoh: Ruang IT, Lantai 2">

                                @error('location')
                                    <span class="form-error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Kondisi <span class="req">*</span></label>
                                <select name="condition">
                                    <option value="">— Pilih Kondisi —</option>
                                    <option value="baik" {{ old('condition') == 'baik' ? 'selected' : '' }}>Baik</option>
                                    <option value="rusak" {{ old('condition') == 'rusak' ? 'selected' : '' }}>Rusak</option>
                                    <option value="perbaikan" {{ old('condition') == 'perbaikan' ? 'selected' : '' }}>Dalam Perbaikan</option>
                                </select>

                                @error('condition')
                                    <span class="form-error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Penanggung Jawab</label>
                                <input type="text" name="penanggungjawab" value="{{ old('penanggungjawab') }}"
                                    placeholder="Nama penanggung jawab">

                                @error('penanggungjawab')
                                    <span class="form-error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Tanggal Masuk</label>
                                <input type="date" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}">

                                @error('tanggal_masuk')
                                    <span class="form-error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group full">
                                <label class="form-label">Harga Perolehan</label>

                                <div class="input-prefix-wrap">
                                    <span class="prefix">Rp</span>
                                    <input type="text" name="harga" value="{{ old('harga') }}"
                                        placeholder="0"
                                        oninput="formatRupiah(this)">
                                </div>

                                @error('harga')
                                    <span class="form-error">{{ $message }}</span>
                                @enderror

                                <span class="form-hint">Masukkan angka tanpa titik atau koma</span>
                            </div>

                        </div>
                    </div>

                    <div class="form-footer">
                        <a href="/assets" class="btn btn-ghost">Batal</a>

                        <button type="submit" class="btn btn-primary">
                            <svg viewBox="0 0 24 24">
                                <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/>
                                <polyline points="17 21 17 13 7 13 7 21"/>
                                <polyline points="7 3 7 8 15 8"/>
                            </svg>
                            Simpan Aset
                        </button>
                    </div>
                </form>
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
function formatRupiah(input) {
    let value = input.value.replace(/\D/g, '');

    if (!value) {
        input.value = '';
        return;
    }

    input.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
}
</script>

</x-app-layout>