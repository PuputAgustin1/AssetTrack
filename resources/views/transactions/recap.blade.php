<x-app-layout>
    <div class="recap-container">
        <div class="page-head">
            <div>
                <h2>Rekap Stok Barang</h2>
                <p>Rekap total barang masuk, barang keluar, dan stok saat ini.</p>
            </div>

            <div class="button-row">
                <a href="{{ route('scan') }}" class="btn btn-dark">
                    Scan Inventory
                </a>

                <a href="{{ route('transactions.history') }}" class="btn btn-light">
                    Riwayat Scan
                </a>
            </div>
        </div>

        <div class="table-card">
            <div class="table-scroll">
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
                                <td class="code-cell">
                                    {{ $asset->code }}
                                </td>

                                <td>
                                    {{ $asset->name }}
                                </td>

                                <td>
                                    {{ $asset->merk ?? '-' }}
                                </td>

                                <td>
                                    {{ $asset->warna ?? '-' }}
                                </td>

                                <td>
                                    {{ $asset->ukuran ?? '-' }}
                                </td>

                                <td>
                                    {{ $asset->stok_awal ?? 0 }} {{ $asset->satuan ?? 'pcs' }}
                                </td>

                                <td class="total-in">
                                    {{ $asset->total_in ?? 0 }} {{ $asset->satuan ?? 'pcs' }}
                                </td>

                                <td class="total-out">
                                    {{ $asset->total_out ?? 0 }} {{ $asset->satuan ?? 'pcs' }}
                                </td>

                                <td>
                                    <span class="stock-badge {{ ($asset->stok_saat_ini ?? 0) <= 0 ? 'stock-empty' : 'stock-available' }}">
                                        {{ $asset->stok_saat_ini ?? 0 }} {{ $asset->satuan ?? 'pcs' }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="empty-row">
                                    Belum ada data barang.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="pagination-wrap">
            {{ $assets->onEachSide(1)->links() }}
        </div>
    </div>

    <style>
        .recap-container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
        }

        .page-head {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .page-head h2 {
            font-size: 24px;
            font-weight: 800;
            margin: 0;
        }

        .page-head p {
            color: #6b7280;
            margin-top: 6px;
        }

        .button-row {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 10px 14px;
            border-radius: 10px;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            line-height: 1.2;
        }

        .btn-dark {
            background: #111827;
            color: white;
        }

        .btn-light {
            background: #e5e7eb;
            color: #111827;
        }

        .table-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0,0,0,.08);
            overflow: hidden;
        }

        .table-scroll {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        table {
            width: 100%;
            min-width: 1000px;
            border-collapse: collapse;
        }

        thead {
            background: #f3f4f6;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-top: 1px solid #e5e7eb;
            vertical-align: middle;
        }

        th {
            border-top: none;
            font-weight: 700;
            white-space: nowrap;
        }

        .code-cell {
            font-weight: 700;
            font-family: monospace;
        }

        .total-in {
            color: #166534;
            font-weight: 700;
        }

        .total-out {
            color: #991b1b;
            font-weight: 700;
        }

        .stock-badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-weight: 800;
            white-space: nowrap;
        }

        .stock-available {
            background: #dcfce7;
            color: #166534;
        }

        .stock-empty {
            background: #fee2e2;
            color: #991b1b;
        }

        .empty-row {
            padding: 22px !important;
            text-align: center !important;
            color: #6b7280;
        }



        /* FIX PAGINATION LARAVEL */
        .pagination-wrap {
            margin-top: 20px;
            overflow-x: auto;
            display: flex;
            justify-content: flex-end;
        }

        .pagination-wrap nav,
        .pagination-wrap nav[role="navigation"] {
            width: auto !important;
            max-width: 100%;
            display: flex !important;
            align-items: center !important;
            justify-content: flex-end !important;
        }

        .pagination-wrap nav > div,
        .pagination-wrap nav[role="navigation"] > div {
            width: auto !important;
            display: flex !important;
            align-items: center !important;
            gap: 6px !important;
        }

        .pagination-wrap svg,
        .pagination-wrap nav svg,
        .pagination-wrap nav[role="navigation"] svg,
        nav[role="navigation"] svg {
            width: 18px !important;
            height: 18px !important;
            max-width: 18px !important;
            max-height: 18px !important;
            display: inline-block !important;
            vertical-align: middle !important;
        }

        .pagination-wrap a,
        .pagination-wrap span,
        .pagination-wrap p {
            font-size: 13px !important;
            line-height: 1.4 !important;
        }

        .pagination-wrap a,
        .pagination-wrap span {
            align-items: center !important;
        }

        @media (max-width: 768px) {
            .recap-container {
                margin: 18px auto;
                padding: 14px;
            }

            .page-head h2 {
                font-size: 21px;
            }

            .button-row {
                width: 100%;
            }

            .button-row .btn {
                flex: 1 1 100%;
                text-align: center;
            }

            .pagination-wrap {
                justify-content: flex-start;
                padding-bottom: 8px;
            }

            .pagination-wrap nav,
            .pagination-wrap nav[role="navigation"] {
                justify-content: flex-start !important;
                min-width: max-content;
            }

        }
    </style>
</x-app-layout>