<x-app-layout>
    <div style="max-width: 1100px; margin: 30px auto; padding: 20px;">
        <h2 style="font-size: 26px; font-weight: 800; margin-bottom: 8px;">
            Scan Inventory Barang
        </h2>

        <p style="color:#6b7280; margin-bottom: 24px;">
            Pilih jenis transaksi terlebih dahulu, lalu scan QR barang. Barang yang discan akan masuk ke daftar sementara.
        </p>

        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px;">
            <!-- KIRI: SCANNER -->
            <div style="background:white; padding:20px; border-radius:16px; box-shadow:0 8px 24px rgba(0,0,0,.08);">
                <h3 style="font-size:18px; font-weight:700; margin-bottom:15px;">Scanner QR</h3>

                <div style="margin-bottom:15px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px;">Jenis Transaksi</label>
                    <select id="transactionType" style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:10px;">
                        <option value="IN">Barang Masuk / IN</option>
                        <option value="OUT">Barang Keluar / OUT</option>
                    </select>
                </div>

                <div style="margin-bottom:15px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px;">Jumlah Default per Scan</label>
                    <input type="number" id="defaultQuantity" value="1" min="1"
                        style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:10px;">
                </div>

                <div style="margin-bottom:15px;">
                    <label style="display:block; font-weight:600; margin-bottom:6px;">Keterangan Umum</label>
                    <textarea id="transactionNote" rows="3" placeholder="Opsional"
                        style="width:100%; padding:10px; border:1px solid #d1d5db; border-radius:10px;"></textarea>
                </div>

                <div id="reader" style="width:100%; min-height:260px; border:1px solid #e5e7eb; border-radius:12px; overflow:hidden; margin-bottom:15px;"></div>

                <div style="display:flex; gap:10px; margin-bottom:15px;">
                    <input type="text" id="manualCode" placeholder="Input kode barang manual"
                        style="flex:1; padding:10px; border:1px solid #d1d5db; border-radius:10px;">

                    <button type="button" onclick="submitManualCode()"
                        style="padding:10px 14px; border:none; background:#111827; color:white; border-radius:10px; cursor:pointer;">
                        Tambah
                    </button>
                </div>

                <div id="scanStatus"
                    style="background:#f3f4f6; color:#374151; padding:12px; border-radius:10px; font-size:14px;">
                    Kamera siap digunakan. Arahkan ke QR Code barang.
                </div>
            </div>

            <!-- KANAN: DAFTAR HASIL SCAN -->
            <div style="background:white; padding:20px; border-radius:16px; box-shadow:0 8px 24px rgba(0,0,0,.08);">
                <div style="display:flex; justify-content:space-between; align-items:center; gap:10px; margin-bottom:15px;">
                    <h3 style="font-size:18px; font-weight:700;">Daftar Scan Sementara</h3>

                    <button type="button" onclick="clearItems()"
                        style="padding:8px 12px; border:none; background:#fee2e2; color:#991b1b; border-radius:10px; cursor:pointer;">
                        Kosongkan
                    </button>
                </div>

                <div style="overflow-x:auto;">
                    <table style="width:100%; border-collapse:collapse;">
                        <thead style="background:#f3f4f6;">
                            <tr>
                                <th style="padding:10px; text-align:left;">Kode</th>
                                <th style="padding:10px; text-align:left;">Barang</th>
                                <th style="padding:10px; text-align:left;">Stok</th>
                                <th style="padding:10px; text-align:left;">Jumlah</th>
                                <th style="padding:10px; text-align:left;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="scanItemsBody">
                            <tr>
                                <td colspan="5" style="padding:18px; text-align:center; color:#6b7280;">
                                    Belum ada barang yang discan.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="margin-top:20px; display:flex; gap:10px; justify-content:flex-end;">
                    <a href="{{ route('assets.index') }}"
                        style="padding:10px 16px; background:#e5e7eb; color:#111827; border-radius:10px; text-decoration:none;">
                        Kembali
                    </a>

                    <button type="button" onclick="saveAllTransactions()"
                        style="padding:10px 16px; border:none; background:#166534; color:white; border-radius:10px; cursor:pointer;">
                        Simpan Semua
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>

    <script>
        const checkAssetUrlTemplate = "{{ route('assets.checkCode', ':code') }}";
        const batchStoreUrl = "{{ route('transactions.batchStore') }}";
        const csrfToken = "{{ csrf_token() }}";

        let scannedItems = {};
        let isProcessingScan = false;
        let scannerInstance = null;

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

                // Kalau QR lama berisi /assets/KODE, ambil KODE terakhirnya
                code = parts[parts.length - 1];
            } catch (e) {
                // Kalau bukan URL, berarti memang kode biasa
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

                if (scannedItems[asset.code]) {
                    scannedItems[asset.code].quantity += defaultQty;
                } else {
                    scannedItems[asset.code] = {
                        code: asset.code,
                        name: asset.name,
                        merk: asset.merk || '-',
                        warna: asset.warna || '-',
                        ukuran: asset.ukuran || '-',
                        satuan: asset.satuan || 'pcs',
                        stok_saat_ini: asset.stok_saat_ini || 0,
                        quantity: defaultQty
                    };
                }

                renderItems();
                updateScanStatus(`Barang ${asset.code} berhasil ditambahkan ke daftar scan.`, 'success');

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
                        <td colspan="5" style="padding:18px; text-align:center; color:#6b7280;">
                            Belum ada barang yang discan.
                        </td>
                    </tr>
                `;
                return;
            }

            tbody.innerHTML = items.map(item => `
                <tr style="border-top:1px solid #e5e7eb;">
                    <td style="padding:10px; font-weight:700;">${item.code}</td>
                    <td style="padding:10px;">
                        <div style="font-weight:600;">${item.name}</div>
                        <small style="color:#6b7280;">${item.merk} | ${item.warna} | ${item.ukuran}</small>
                    </td>
                    <td style="padding:10px;">${item.stok_saat_ini} ${item.satuan}</td>
                    <td style="padding:10px;">
                        <input type="number" min="1" value="${item.quantity}"
                            onchange="updateQuantity('${item.code}', this.value)"
                            style="width:75px; padding:7px; border:1px solid #d1d5db; border-radius:8px;">
                    </td>
                    <td style="padding:10px;">
                        <button type="button" onclick="removeItem('${item.code}')"
                            style="padding:7px 10px; border:none; background:#fee2e2; color:#991b1b; border-radius:8px; cursor:pointer;">
                            Hapus
                        </button>
                    </td>
                </tr>
            `).join('');
        }

        function updateQuantity(code, value) {
            const qty = parseInt(value);

            if (!scannedItems[code]) return;

            scannedItems[code].quantity = qty > 0 ? qty : 1;
            renderItems();
        }

        function removeItem(code) {
            delete scannedItems[code];
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

            const type = document.getElementById('transactionType').value;
            const note = document.getElementById('transactionNote').value;

            const payload = {
                type: type,
                note: note,
                items: items.map(item => ({
                    code: item.code,
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
                    window.location.href = "{{ route('transactions.history') }}";
                }, 900);

            } catch (error) {
                updateScanStatus('Terjadi kesalahan saat menyimpan transaksi.', 'error');
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            const readerEl = document.getElementById("reader");

            if (readerEl && typeof Html5QrcodeScanner !== "undefined") {
                const qrboxSize = window.innerWidth <= 768 ? 220 : 250;

                scannerInstance = new Html5QrcodeScanner("reader", {
                    fps: 10,
                    qrbox: {
                        width: qrboxSize,
                        height: qrboxSize
                    },
                    rememberLastUsedCamera: false,
                    supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA],
                    videoConstraints: {
                        facingMode: { ideal: "environment" }
                    }
                });

                scannerInstance.render(function(decodedText) {
                    addScannedCode(decodedText);
                });

                updateScanStatus('Kamera aktif. Pilih mode IN/OUT, lalu scan QR barang.', 'info');
            } else {
                updateScanStatus('Library scanner QR belum terbaca.', 'error');
            }
        });
    </script>

    <style>
        @media (max-width: 768px) {
            div[style*="grid-template-columns"] {
                grid-template-columns: 1fr !important;
            }
        }
    </style>
</x-app-layout>