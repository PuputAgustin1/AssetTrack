<x-app-layout>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<style>
*,
*::before,
*::after {
    box-sizing: border-box;
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
    --radius: 12px;
    --font: 'Plus Jakarta Sans', sans-serif;
}

body {
    margin: 0;
    font-family: var(--font);
    background: var(--bg);
    color: var(--text);
    font-size: 14px;
}

.app-shell {
    display: flex;
    min-height: 100vh;
    background: var(--bg);
}

.sidebar {
    width: 230px;
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
    width: 36px;
    height: 36px;
    background: var(--accent);
    border-radius: 10px;
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
    font-weight: 800;
}

.brand-sub {
    font-size: 11px;
    color: var(--muted);
    margin-top: 1px;
}

.nav-label {
    font-size: 10.5px;
    font-weight: 800;
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
    font-weight: 700;
    text-decoration: none;
    transition: .15s;
    border: none;
    background: transparent;
    width: 100%;
    cursor: pointer;
    font-family: inherit;
    text-align: left;
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
    flex-shrink: 0;
}

.nav-divider {
    border: none;
    border-top: 1px solid var(--border);
    margin: 8px 0;
}

.logout {
    color: var(--danger);
}

.logout:hover {
    background: var(--danger-light);
}

.main {
    flex: 1;
    min-width: 0;
}

.topbar {
    height: 60px;
    background: var(--card);
    border-bottom: 1px solid var(--border);
    padding: 0 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: sticky;
    top: 0;
    z-index: 30;
}

.topbar h1 {
    font-size: 16px;
    font-weight: 800;
    margin: 0;
}

.topbar p {
    font-size: 12px;
    color: var(--muted);
    margin: 2px 0 0;
}

.user-info {
    display: flex;
    align-items: center;
    gap: 10px;
}

.avatar {
    width: 32px;
    height: 32px;
    background: var(--accent);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: 800;
}

.user-name {
    font-size: 13px;
    font-weight: 700;
    max-width: 140px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.mobile-nav {
    display: none;
}

.page-wrap {
    padding: 24px;
}

.page-container {
    max-width: 1200px;
    margin: 0 auto;
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
    font-weight: 800;
    margin: 0;
}

.page-subtitle {
    color: var(--muted);
    font-size: 13px;
    margin-top: 4px;
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
    font-weight: 700;
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

.table-card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    overflow: hidden;
}

.table-scroll {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

table {
    width: 100%;
    min-width: 950px;
    border-collapse: collapse;
}

th {
    background: #f9fafb;
    color: #374151;
    font-size: 12px;
    font-weight: 800;
    text-align: left;
    padding: 12px;
    border-bottom: 1px solid var(--border);
    white-space: nowrap;
}

td {
    padding: 12px;
    border-bottom: 1px solid #f3f4f6;
    font-size: 13px;
    vertical-align: middle;
    white-space: nowrap;
}

tbody tr:last-child td {
    border-bottom: none;
}

.batch-link {
    color: var(--accent);
    font-weight: 800;
    text-decoration: none;
}

.batch-link:hover {
    text-decoration: underline;
}

.code-cell {
    font-family: monospace;
    font-weight: 800;
}

.badge {
    display: inline-flex;
    padding: 4px 9px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 800;
}

.type-in {
    background: var(--success-light);
    color: var(--success);
}

.type-out {
    background: var(--danger-light);
    color: var(--danger);
}

.empty-row {
    text-align: center;
    color: var(--muted);
    padding: 24px !important;
}

.pagination-wrap {
    margin-top: 16px;
}

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

    .page-wrap {
        padding: 16px;
        padding-bottom: 86px;
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

    th,
    td {
        padding: 10px;
        font-size: 12.5px;
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
        padding: 10px 0;
        z-index: 999;
    }

    .mobile-nav a {
        font-size: 11.5px;
        color: var(--muted);
        text-decoration: none;
        font-weight: 800;
        text-align: center;
        padding: 4px 6px;
    }

    .mobile-nav a.active {
        color: var(--accent);
    }
}

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

@media (max-width: 768px) {
    .profile-info {
        display: none;
    }
}
</style>

<div class="app-shell">
    <aside class="sidebar">
        <div class="brand">
            <div class="brand-icon">
                <svg viewBox="0 0 24 24">
                    <rect x="3" y="3" width="7" height="7" rx="1"/>
                    <rect x="14" y="3" width="7" height="7" rx="1"/>
                    <rect x="3" y="14" width="7" height="7" rx="1"/>
                    <rect x="14" y="14" width="7" height="7" rx="1"/>
                </svg>
            </div>

            <div>
                <div class="brand-name">StockTrack</div>
                <div class="brand-sub">Inventory Stockload</div>
            </div>
        </div>

        <div class="nav-label">Menu</div>

        <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24">
                <rect x="3" y="3" width="7" height="7" rx="1"/>
                <rect x="14" y="3" width="7" height="7" rx="1"/>
                <rect x="3" y="14" width="7" height="7" rx="1"/>
                <rect x="14" y="14" width="7" height="7" rx="1"/>
            </svg>
            Dashboard
        </a>

        <a href="{{ route('assets.index') }}" class="nav-item {{ request()->routeIs('assets.*') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24">
                <path d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"/>
                <path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/>
            </svg>
            Master Data
        </a>

        <a href="{{ route('scan') }}" class="nav-item {{ request()->routeIs('scan') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24">
                <rect x="3" y="3" width="7" height="7"/>
                <rect x="14" y="3" width="7" height="7"/>
                <rect x="14" y="14" width="7" height="7"/>
                <path d="M3 17.5A3.5 3.5 0 006.5 21M3 14v3.5M6.5 14H3"/>
            </svg>
            Scan QR
        </a>

        <hr class="nav-divider">

        <div class="nav-label">Transaksi</div>

        <a href="{{ route('transactions.history') }}" class="nav-item {{ request()->routeIs('transactions.history') || request()->routeIs('scan-batches.show') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24">
                <path d="M3 3v5h5"/>
                <path d="M3.05 13A9 9 0 1020 8.5"/>
                <path d="M12 7v5l3 2"/>
            </svg>
            Riwayat Scan
        </a>

        <a href="{{ route('transactions.stockRecap') }}" class="nav-item {{ request()->routeIs('transactions.stockRecap') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24">
                <path d="M4 19V5"/>
                <path d="M4 19h16"/>
                <rect x="7" y="10" width="3" height="6"/>
                <rect x="12" y="7" width="3" height="9"/>
                <rect x="17" y="12" width="3" height="4"/>
            </svg>
            Rekap Stok
        </a>

        <a href="{{ route('transactions.report') }}" class="nav-item {{ request()->routeIs('transactions.report') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24">
                <path d="M3 3v18h18"/>
                <path d="M7 15l4-4 3 3 5-6"/>
            </svg>
            Report Stok
        </a>

        <hr class="nav-divider">

        <div class="nav-label">Data</div>

        <a href="{{ route('assets.import.page') }}" class="nav-item {{ request()->routeIs('assets.import.page') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24">
                <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/>
                <polyline points="17 8 12 3 7 8"/>
                <line x1="12" y1="3" x2="12" y2="15"/>
            </svg>
            Import Data
        </a>

        <a href="{{ route('assets.export.page') }}" class="nav-item {{ request()->routeIs('assets.export.page') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24">
                <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/>
                <polyline points="7 10 12 15 17 10"/>
                <line x1="12" y1="15" x2="12" y2="3"/>
            </svg>
            Export Data
        </a>

        <form method="POST" action="{{ route('logout') }}" style="margin-top:auto;">
            @csrf
            <button type="submit" class="nav-item logout">
                <svg viewBox="0 0 24 24">
                    <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/>
                    <polyline points="16 17 21 12 16 7"/>
                    <line x1="21" y1="12" x2="9" y2="12"/>
                </svg>
                Logout
            </button>
        </form>
    </aside>

    <main class="main">
        <div class="topbar">
            <div>
                <h1>Riwayat Scan</h1>
                <p>Daftar semua transaksi barang masuk dan keluar</p>
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

        <div class="page-wrap">
            <div class="page-container">
                <div class="page-head">
                    <div>
                        <h1 class="page-title">Riwayat Scan / Transaksi</h1>
                        <div class="page-subtitle">Daftar semua transaksi barang masuk dan keluar.</div>
                    </div>

                    <div class="action-row">
                        <a href="{{ route('scan') }}" class="btn btn-primary">Scan Inventory</a>
                        <a href="{{ route('transactions.stockRecap') }}" class="btn btn-light">Rekap Stok</a>
                    </div>
                </div>

                <div class="table-card">
                    <div class="table-scroll">
                        <table>
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Sesi Scan</th>
                                    <th>Kode</th>
                                    <th>Nama Barang</th>
                                    <th>Jenis</th>
                                    <th>Jumlah</th>
                                    <th>User</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->transaction_date?->format('d/m/Y H:i') }}</td>

                                        <td>
                                            @if ($transaction->batch)
                                                <a href="{{ route('scan-batches.show', $transaction->batch->id) }}" class="batch-link">
                                                    {{ $transaction->batch->batch_code }}
                                                </a>
                                            @else
                                                -
                                            @endif
                                        </td>

                                        <td class="code-cell">{{ $transaction->asset_code }}</td>
                                        <td>{{ $transaction->asset->name ?? '-' }}</td>

                                        <td>
                                            <span class="badge {{ $transaction->type === 'IN' ? 'type-in' : 'type-out' }}">
                                                {{ $transaction->type }}
                                            </span>
                                        </td>

                                        <td>{{ $transaction->quantity }}</td>
                                        <td>{{ $transaction->user->name ?? '-' }}</td>
                                        <td>{{ $transaction->note ?? '-' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="empty-row">Belum ada transaksi.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="pagination-wrap">
                    {{ $transactions->links() }}
                </div>
            </div>
        </div>
    </main>
</div>

<div class="mobile-nav">
    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
    <a href="{{ route('assets.index') }}" class="{{ request()->routeIs('assets.*') ? 'active' : '' }}">Data</a>
    <a href="{{ route('scan') }}" class="{{ request()->routeIs('scan') ? 'active' : '' }}">Scan</a>
    <a href="{{ route('transactions.report') }}" class="{{ request()->routeIs('transactions.report') ? 'active' : '' }}">Report</a>
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