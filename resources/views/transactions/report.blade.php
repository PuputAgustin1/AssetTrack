<x-app-layout>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<style>
* {
    box-sizing: border-box;
}

body {
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: #f3f4f6;
    color: #111827;
    font-size: 14px;
}

.report-wrap {
    padding: 24px;
}

.page-head {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 16px;
    margin-bottom: 18px;
}

.page-head h1 {
    font-size: 22px;
    font-weight: 700;
    margin: 0;
}

.page-head p {
    margin: 4px 0 0;
    color: #6b7280;
    font-size: 13px;
}

.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 9px 14px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
    border: none;
    cursor: pointer;
}

.btn-primary {
    background: #1a56db;
    color: #fff;
}

.btn-light {
    background: #fff;
    color: #374151;
    border: 1px solid #e5e7eb;
}

.summary-grid {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 12px;
    margin-bottom: 18px;
}

.summary-card {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 14px;
}

.summary-card span {
    display: block;
    color: #6b7280;
    font-size: 12px;
    margin-bottom: 6px;
}

.summary-card strong {
    display: block;
    font-size: 20px;
    font-weight: 700;
}

.filter-card,
.table-card {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    margin-bottom: 18px;
}

.filter-card {
    padding: 16px;
}

.filter-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 12px;
}

.form-group label {
    display: block;
    font-size: 12px;
    font-weight: 600;
    color: #374151;
    margin-bottom: 6px;
}

.form-control {
    width: 100%;
    height: 38px;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    padding: 0 10px;
    font-family: inherit;
    font-size: 13px;
}

.filter-actions {
    display: flex;
    justify-content: flex-end;
    gap: 8px;
    margin-top: 14px;
}

.table-card {
    overflow: hidden;
}

.table-head {
    padding: 16px;
    border-bottom: 1px solid #e5e7eb;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.table-head h2 {
    font-size: 15px;
    margin: 0;
    font-weight: 700;
}

.table-wrap {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    min-width: 1050px;
}

th {
    background: #f9fafb;
    color: #374151;
    font-size: 12px;
    font-weight: 700;
    text-align: left;
    padding: 12px;
    border-bottom: 1px solid #e5e7eb;
    white-space: nowrap;
}

td {
    padding: 12px;
    border-bottom: 1px solid #f3f4f6;
    font-size: 13px;
    white-space: nowrap;
}

.badge {
    display: inline-flex;
    padding: 4px 9px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 700;
    background: #eff6ff;
    color: #1a56db;
}

.text-muted {
    color: #6b7280;
}



/* FIX PAGINATION LARAVEL - khusus halaman Report Stok */
.pagination-wrap {
    padding: 14px 16px;
    border-top: 1px solid #e5e7eb;
    overflow-x: auto;
}

.pagination-wrap nav {
    display: flex !important;
    justify-content: flex-end !important;
    align-items: center !important;
    gap: 8px !important;
    font-size: 13px !important;
}

.pagination-wrap nav > div {
    width: auto !important;
}

.pagination-wrap svg,
.pagination-wrap nav svg,
.pagination-wrap nav[role="navigation"] svg {
    width: 18px !important;
    height: 18px !important;
    max-width: 18px !important;
    max-height: 18px !important;
    display: inline-block !important;
    vertical-align: middle !important;
    flex-shrink: 0 !important;
}

.pagination-wrap a,
.pagination-wrap span,
.pagination-wrap p {
    font-size: 13px !important;
    line-height: 1.4 !important;
}

.pagination-wrap a,
.pagination-wrap span[aria-current="page"] > span,
.pagination-wrap span[aria-disabled="true"] > span {
    min-width: 34px !important;
    min-height: 34px !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    border-radius: 8px !important;
}

.pagination-wrap a {
    text-decoration: none !important;
}

@media(max-width: 640px) {
    .pagination-wrap nav {
        justify-content: flex-start !important;
        min-width: max-content !important;
    }
}


@media(max-width: 1024px) {
    .summary-grid {
        grid-template-columns: repeat(3, 1fr);
    }

    .filter-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media(max-width: 640px) {
    .report-wrap {
        padding: 16px;
    }

    .page-head {
        flex-direction: column;
    }

    .summary-grid,
    .filter-grid {
        grid-template-columns: 1fr;
    }

    .filter-actions {
        flex-direction: column;
    }

    .filter-actions .btn {
        width: 100%;
    }
}
</style>

<div class="report-wrap">

    <div class="page-head">
        <div>
            <h1>Report Stok Barang</h1>
            <p>Laporan perhitungan stok berdasarkan data barang, transaksi IN/OUT, dan hasil scan.</p>
        </div>

        <a href="{{ route('transactions.report.export', request()->query()) }}" class="btn btn-primary">
            Export Report
        </a>
    </div>

    <div class="summary-grid">
        <div class="summary-card">
            <span>Total Barang</span>
            <strong>{{ number_format($summary['total_barang']) }}</strong>
        </div>

        <div class="summary-card">
            <span>Total Stok Awal</span>
            <strong>{{ number_format($summary['total_stok_awal']) }}</strong>
        </div>

        <div class="summary-card">
            <span>Total IN</span>
            <strong>{{ number_format($summary['total_in']) }}</strong>
        </div>

        <div class="summary-card">
            <span>Total OUT</span>
            <strong>{{ number_format($summary['total_out']) }}</strong>
        </div>

        <div class="summary-card">
            <span>Stok Saat Ini</span>
            <strong>{{ number_format($summary['total_stok_saat_ini']) }}</strong>
        </div>

        <div class="summary-card">
            <span>Total Sesi Scan</span>
            <strong>{{ number_format($summary['total_sesi_scan']) }}</strong>
        </div>
    </div>

    <div class="filter-card">
        <form method="GET" action="{{ route('transactions.report') }}">
            <div class="filter-grid">
                <div class="form-group">
                    <label>Cari Barang</label>
                    <input type="text" name="search" class="form-control"
                        value="{{ request('search') }}"
                        placeholder="Kode / nama / buyer / style">
                </div>

                <div class="form-group">
                    <label>Buyer</label>
                    <input type="text" name="buyer" class="form-control"
                        value="{{ request('buyer') }}"
                        placeholder="Nama buyer">
                </div>

                <div class="form-group">
                    <label>Style</label>
                    <input type="text" name="style" class="form-control"
                        value="{{ request('style') }}"
                        placeholder="Kode style">
                </div>

                <div class="form-group">
                    <label>Grade</label>
                    <select name="grade" class="form-control">
                        <option value="">Semua Grade</option>
                        <option value="A" {{ request('grade') == 'A' ? 'selected' : '' }}>A</option>
                        <option value="B" {{ request('grade') == 'B' ? 'selected' : '' }}>B</option>
                        <option value="ED" {{ request('grade') == 'ED' ? 'selected' : '' }}>ED</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Lokasi</label>
                    <input type="text" name="location" class="form-control"
                        value="{{ request('location') }}"
                        placeholder="Contoh: Stockload">
                </div>

                <div class="form-group">
                    <label>Tanggal Awal</label>
                    <input type="date" name="date_from" class="form-control"
                        value="{{ request('date_from') }}">
                </div>

                <div class="form-group">
                    <label>Tanggal Akhir</label>
                    <input type="date" name="date_to" class="form-control"
                        value="{{ request('date_to') }}">
                </div>
            </div>

            <div class="filter-actions">
                <a href="{{ route('transactions.report') }}" class="btn btn-light">Reset</a>
                <button type="submit" class="btn btn-primary">Terapkan Filter</button>
            </div>
        </form>
    </div>

    <div class="table-card">
        <div class="table-head">
            <h2>Detail Perhitungan Stok</h2>
            <span class="text-muted">{{ $assets->total() }} data</span>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Buyer</th>
                        <th>Style</th>
                        <th>Grade</th>
                        <th>Lokasi</th>
                        <th>Stok Awal</th>
                        <th>Total IN</th>
                        <th>Total OUT</th>
                        <th>Pergerakan</th>
                        <th>Stok Saat Ini</th>
                        <th>Satuan</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($assets as $asset)
                        @php
                            $totalIn = $asset->total_in ?? 0;
                            $totalOut = $asset->total_out ?? 0;
                            $pergerakan = $totalIn - $totalOut;
                        @endphp

                        <tr>
                            <td><strong>{{ $asset->code }}</strong></td>
                            <td>{{ $asset->name }}</td>
                            <td>{{ $asset->merk ?? '-' }}</td>
                            <td>{{ $asset->warna ?? '-' }}</td>
                            <td><span class="badge">{{ $asset->ukuran ?? '-' }}</span></td>
                            <td>{{ $asset->location ?? '-' }}</td>
                            <td>{{ number_format($asset->stok_awal ?? 0) }}</td>
                            <td>{{ number_format($totalIn) }}</td>
                            <td>{{ number_format($totalOut) }}</td>
                            <td>{{ number_format($pergerakan) }}</td>
                            <td><strong>{{ number_format($asset->stok_saat_ini ?? 0) }}</strong></td>
                            <td>{{ $asset->satuan ?? 'pcs' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="12" style="text-align:center; padding:24px;">
                                Belum ada data report.
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
</x-app-layout>