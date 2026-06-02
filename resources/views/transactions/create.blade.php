<x-app-layout>
    <div style="max-width: 700px; margin: 30px auto; padding: 20px;">
        <h2 style="font-size: 24px; font-weight: 700; margin-bottom: 20px;">
            Transaksi Barang
        </h2>

        @if(session('error'))
            <div style="background:#fee2e2; color:#991b1b; padding:12px; border-radius:10px; margin-bottom:15px;">
                {{ session('error') }}
            </div>
        @endif

        <div style="background:white; padding:20px; border-radius:16px; box-shadow:0 8px 24px rgba(0,0,0,.08); margin-bottom:20px;">
            <p><strong>Kode Barang:</strong> {{ $asset->code }}</p>
            <p><strong>Nama Barang:</strong> {{ $asset->name }}</p>
            <p><strong>Merk:</strong> {{ $asset->merk ?? '-' }}</p>
            <p><strong>Warna:</strong> {{ $asset->warna ?? '-' }}</p>
            <p><strong>Ukuran:</strong> {{ $asset->ukuran ?? '-' }}</p>
            <p><strong>Stok Saat Ini:</strong> {{ $asset->stok_saat_ini ?? 0 }} {{ $asset->satuan ?? 'pcs' }}</p>
        </div>

        <form method="POST" action="{{ route('transactions.store', $asset->code) }}" style="background:white; padding:20px; border-radius:16px; box-shadow:0 8px 24px rgba(0,0,0,.08);">
            @csrf

            <div style="margin-bottom:15px;">
                <label style="display:block; font-weight:600; margin-bottom:6px;">Jenis Transaksi</label>
                <select name="type" required style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:10px;">
                    <option value="">-- Pilih Transaksi --</option>
                    <option value="IN" {{ old('type') == 'IN' ? 'selected' : '' }}>Barang Masuk / IN</option>
                    <option value="OUT" {{ old('type') == 'OUT' ? 'selected' : '' }}>Barang Keluar / OUT</option>
                </select>
                @error('type')
                    <small style="color:#dc2626;">{{ $message }}</small>
                @enderror
            </div>

            <div style="margin-bottom:15px;">
                <label style="display:block; font-weight:600; margin-bottom:6px;">Jumlah</label>
                <input type="number" name="quantity" value="{{ old('quantity', 1) }}" min="1" required
                    style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:10px;">
                @error('quantity')
                    <small style="color:#dc2626;">{{ $message }}</small>
                @enderror
            </div>

            <div style="margin-bottom:15px;">
                <label style="display:block; font-weight:600; margin-bottom:6px;">Keterangan</label>
                <textarea name="note" rows="3" placeholder="Opsional"
                    style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:10px;">{{ old('note') }}</textarea>
                @error('note')
                    <small style="color:#dc2626;">{{ $message }}</small>
                @enderror
            </div>

            <div style="display:flex; gap:10px; justify-content:flex-end;">
                <a href="{{ route('assets.show', $asset->code) }}"
                    style="padding:10px 16px; border-radius:10px; background:#e5e7eb; color:#111827; text-decoration:none;">
                    Batal
                </a>

                <button type="submit"
                    style="padding:10px 16px; border-radius:10px; background:#111827; color:white; border:none; cursor:pointer;">
                    Simpan Transaksi
                </button>
            </div>
        </form>
    </div>
</x-app-layout>