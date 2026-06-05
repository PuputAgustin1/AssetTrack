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
}

.action-row {
    display: flex;
    gap: 8px;
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

.card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    overflow: hidden;
}

.table-wrapper {
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

table {
    width: 100%;
    min-width: 1000px;
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

.grade-badge {
    background: var(--accent-light);
    color: var(--accent);
}

.total-in {
    color: var(--success);
    font-weight: 600;
}

.total-out {
    color: var(--danger);
    font-weight: 600;
}

.stock-available {
    background: var(--success-light);
    color: var(--success);
}

.stock-empty {
    background: var(--danger-light);
    color: var(--danger);
}

.empty-row {
    text-align: center;
    color: var(--muted);
    padding: 32px 16px !important;
}

.pagination-wrap {
    margin-top: 16px;
}

/* MOBILE NAV */
.mobile-nav {
    display: none;
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

    .action-row {
        width: 100%;
        flex-direction: column;
    }

    .action-row .btn {
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

        <a href="/scan" class="nav-item">
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

        <a href="{{ route('transactions.stockRecap') }}" class="nav-item active">
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
                <h1>Rekap Stok</h1>
                <p>Ringkasan stok awal, barang masuk, barang keluar, dan stok saat ini</p>
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
                    <h1 class="page-title">Rekap Stok Barang</h1>
                    <p class="page-subtitle">Ringkasan total barang masuk, barang keluar, dan stok saat ini.</p>
                </div>

                <div class="action-row">
                    <a href="{{ route('scan') }}" class="btn btn-primary">Scan Inventory</a>
                    <a href="{{ route('transactions.history') }}" class="btn btn-light">Riwayat Scan</a>
                </div>
            </div>

            <div class="card">
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama Barang</th>
                                <th>Buyer</th>
                                <th>Style</th>
                                <th>Grade</th>
                                <th>Stok Awal</th>
                                <th>Total IN</th>
                                <th>Total OUT</th>
                                <th>Stok Saat Ini</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($assets as $asset)
                                <tr>
                                    <td>
                                        <span class="asset-code">{{ $asset->code }}</span>
                                    </td>
                                    <td style="font-weight:500">{{ $asset->name }}</td>
                                    <td>{{ $asset->merk ?? '-' }}</td>
                                    <td>{{ $asset->warna ?? '-' }}</td>
                                    <td>
                                        <span class="badge grade-badge">{{ $asset->ukuran ?? '-' }}</span>
                                    </td>
                                    <td>{{ $asset->stok_awal ?? 0 }} {{ $asset->satuan ?? 'pcs' }}</td>
                                    <td class="total-in">{{ $asset->total_in ?? 0 }} {{ $asset->satuan ?? 'pcs' }}</td>
                                    <td class="total-out">{{ $asset->total_out ?? 0 }} {{ $asset->satuan ?? 'pcs' }}</td>
                                    <td>
                                        <span class="badge {{ ($asset->stok_saat_ini ?? 0) <= 0 ? 'stock-empty' : 'stock-available' }}">
                                            {{ $asset->stok_saat_ini ?? 0 }} {{ $asset->satuan ?? 'pcs' }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="empty-row">Belum ada data barang.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="pagination-wrap">
                {{ $assets->links() }}
            </div>
        </div>
    </div>
</div>

<div class="mobile-nav">
    <a href="/dashboard">Dashboard</a>
    <a href="/assets">Aset</a>
    <a href="/scan">Scan</a>
    <a href="{{ route('transactions.report') }}">Report</a>
</div>

<script>
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
</script>
</x-app-layout>