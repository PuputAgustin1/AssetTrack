<x-app-layout>
    <div style="max-width: 1200px; margin: 30px auto; padding: 20px;">
        <div style="display:flex; justify-content:space-between; align-items:center; gap:12px; margin-bottom:20px; flex-wrap:wrap;">
            <div>
                <h2 style="font-size: 24px; font-weight: 800; margin:0;">
                    Rekap Stok Barang
                </h2>
                <p style="color:#6b7280; margin-top:6px;">
                    Rekap total barang masuk, barang keluar, dan stok saat ini.
                </p>
            </div>

            <div style="display:flex; gap:10px; flex-wrap:wrap;">
                <a href="{{ route('scan') }}"
                   style="padding:10px 14px; background:#111827; color:white; border-radius:10px; text-decoration:none;">
                    Scan Inventory
                </a>

                <a href="{{ route('transactions.history') }}"
                   style="padding:10px 14px; background:#e5e7eb; color:#111827; border-radius:10px; text-decoration:none;">
                    Riwayat Scan
                </a>
            </div>
        </div>

        <div style="background:white; border-radius:16px; box-shadow:0 8px 24px rgba(0,0,0,.08); overflow-x:auto;">
            <table style="width:100%; border-collapse:collapse;">
                <thead style="background:#f3f4f6;">
                    <tr>
                        <th style="padding:12px; text-align:left;">Kode</th>
                        <th style="padding:12px; text-align:left;">Nama Barang</th>
                        <th style="padding:12px; text-align:left;">Merk</th>
                        <th style="padding:12px; text-align:left;">Warna</th>
                        <th style="padding:12px; text-align:left;">Ukuran</th>
                        <th style="padding:12px; text-align:left;">Stok Awal</th>
                        <th style="padding:12px; text-align:left;">Total IN</th>
                        <th style="padding:12px; text-align:left;">Total OUT</th>
                        <th style="padding:12px; text-align:left;">Stok Saat Ini</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($assets as $asset)
                        <tr style="border-top:1px solid #e5e7eb;">
                            <td style="padding:12px; font-weight:700;">{{ $asset->code }}</td>
                            <td style="padding:12px;">{{ $asset->name }}</td>
                            <td style="padding:12px;">{{ $asset->merk ?? '-' }}</td>
                            <td style="padding:12px;">{{ $asset->warna ?? '-' }}</td>
                            <td style="padding:12px;">{{ $asset->ukuran ?? '-' }}</td>
                            <td style="padding:12px;">{{ $asset->stok_awal ?? 0 }} {{ $asset->satuan ?? 'pcs' }}</td>
                            <td style="padding:12px; color:#166534; font-weight:700;">
                                {{ $asset->total_in ?? 0 }} {{ $asset->satuan ?? 'pcs' }}
                            </td>
                            <td style="padding:12px; color:#991b1b; font-weight:700;">
                                {{ $asset->total_out ?? 0 }} {{ $asset->satuan ?? 'pcs' }}
                            </td>
                            <td style="padding:12px;">
                                <span style="display:inline-block; padding:6px 10px; border-radius:999px; background:{{ ($asset->stok_saat_ini ?? 0) <= 0 ? '#fee2e2' : '#dcfce7' }}; color:{{ ($asset->stok_saat_ini ?? 0) <= 0 ? '#991b1b' : '#166534' }}; font-weight:800;">
                                    {{ $asset->stok_saat_ini ?? 0 }} {{ $asset->satuan ?? 'pcs' }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" style="padding:22px; text-align:center; color:#6b7280;">
                                Belum ada data barang.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top:20px;">
            {{ $assets->links() }}
        </div>
    </div>
</x-app-layout>