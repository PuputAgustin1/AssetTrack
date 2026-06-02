<x-app-layout>
    <div style="max-width: 1100px; margin: 30px auto; padding: 20px;">
        <h2 style="font-size: 24px; font-weight: 700; margin-bottom: 20px;">
            Riwayat Scan / Transaksi
        </h2>

        <div style="background:white; border-radius:16px; box-shadow:0 8px 24px rgba(0,0,0,.08); overflow-x:auto;">
            <table style="width:100%; border-collapse:collapse;">
                <thead style="background:#f3f4f6;">
                    <tr>
                        <th style="padding:12px; text-align:left;">Tanggal</th>
                        <th style="padding:12px; text-align:left;">Kode</th>
                        <th style="padding:12px; text-align:left;">Nama Barang</th>
                        <th style="padding:12px; text-align:left;">Jenis</th>
                        <th style="padding:12px; text-align:left;">Jumlah</th>
                        <th style="padding:12px; text-align:left;">User</th>
                        <th style="padding:12px; text-align:left;">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transactions as $transaction)
                        <tr style="border-top:1px solid #e5e7eb;">
                            <td style="padding:12px;">
                                {{ $transaction->transaction_date?->format('d/m/Y H:i') }}
                            </td>
                            <td style="padding:12px;">{{ $transaction->asset_code }}</td>
                            <td style="padding:12px;">{{ $transaction->asset->name ?? '-' }}</td>
                            <td style="padding:12px;">
                                <strong style="color: {{ $transaction->type === 'IN' ? '#166534' : '#991b1b' }};">
                                    {{ $transaction->type }}
                                </strong>
                            </td>
                            <td style="padding:12px;">{{ $transaction->quantity }}</td>
                            <td style="padding:12px;">{{ $transaction->user->name ?? '-' }}</td>
                            <td style="padding:12px;">{{ $transaction->note ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="padding:20px; text-align:center; color:#6b7280;">
                                Belum ada transaksi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top:20px;">
            {{ $transactions->links() }}
        </div>
    </div>
</x-app-layout>