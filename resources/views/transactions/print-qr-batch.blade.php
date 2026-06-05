<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak QR Sesi {{ $batch->batch_code }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        :root {
            --bg: #f0f2f5;
            --card: #ffffff;
            --text: #1a1d23;
            --muted: #6b7280;
            --border: #e5e7eb;
            --accent: #1a56db;
            --radius: 12px;
            --font: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            font-family: var(--font);
            background: var(--bg);
            margin: 0;
            padding: 24px;
            color: var(--text);
            font-size: 14px;
        }

        .print-toolbar {
            max-width: 1100px;
            margin: 0 auto 18px;
            background: var(--card);
            padding: 16px;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .toolbar-title h1 {
            font-size: 22px;
            font-weight: 700;
            margin: 0;
        }

        .toolbar-title p {
            margin: 4px 0 0;
            color: var(--muted);
            font-size: 13px;
        }

        .toolbar-actions {
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
            text-decoration: none;
            border: 1px solid transparent;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            font-family: var(--font);
        }

        .btn-light {
            background: #fff;
            color: #374151;
            border-color: var(--border);
        }

        .btn-primary {
            background: var(--accent);
            color: #fff;
        }

        .print-area {
            max-width: 1100px;
            margin: 0 auto;
            background: var(--card);
            padding: 18px;
            border: 1px solid var(--border);
            border-radius: var(--radius);
        }

        .batch-info {
            margin-bottom: 18px;
            padding-bottom: 14px;
            border-bottom: 1px solid var(--border);
            font-size: 13px;
            color: #374151;
            line-height: 1.7;
        }

        .label-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
        }

        .qr-label {
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 12px;
            min-height: 210px;
            display: flex;
            gap: 12px;
            align-items: center;
            break-inside: avoid;
            page-break-inside: avoid;
        }

        .qr-box {
            width: 110px;
            height: 110px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .qr-box svg {
            width: 110px;
            height: 110px;
        }

        .asset-info {
            min-width: 0;
        }

        .asset-code {
            font-size: 14px;
            font-weight: 800;
            margin-bottom: 5px;
            word-break: break-word;
        }

        .asset-name {
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 6px;
            word-break: break-word;
        }

        .asset-meta {
            font-size: 12px;
            color: #4b5563;
            line-height: 1.55;
        }

        .empty {
            text-align: center;
            color: var(--muted);
            padding: 40px 10px;
        }

        @media (max-width: 900px) {
            .label-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            body {
                padding: 14px;
            }

            .print-toolbar {
                align-items: stretch;
            }

            .toolbar-title h1 {
                font-size: 20px;
            }

            .toolbar-actions {
                width: 100%;
                flex-direction: column;
            }

            .toolbar-actions .btn {
                width: 100%;
            }

            .label-grid {
                grid-template-columns: 1fr;
            }

            .qr-label {
                min-height: auto;
            }

            .print-area {
                padding: 14px;
            }
        }

        @media print {
            body {
                background: white;
                padding: 0;
                font-family: Arial, sans-serif;
            }

            .print-toolbar {
                display: none;
            }

            .print-area {
                max-width: none;
                border: none;
                border-radius: 0;
                padding: 0;
            }

            .batch-info {
                font-size: 11px;
                margin-bottom: 10px;
                padding-bottom: 8px;
            }

            .label-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 8px;
            }

            .qr-label {
                border: 1px solid #000;
                border-radius: 6px;
                padding: 8px;
                min-height: 170px;
            }

            .qr-box {
                width: 95px;
                height: 95px;
            }

            .qr-box svg {
                width: 95px;
                height: 95px;
            }

            .asset-code {
                font-size: 12px;
            }

            .asset-name {
                font-size: 11px;
            }

            .asset-meta {
                font-size: 10px;
            }

            @page {
                size: A4;
                margin: 10mm;
            }
        }
    </style>
</head>

<body>
    <div class="print-toolbar">
        <div class="toolbar-title">
            <h1>Cetak QR Sesi Scan</h1>
            <p>
                {{ $batch->batch_code }} |
                {{ $batch->scan_date ? $batch->scan_date->format('d/m/Y H:i') : '-' }} |
                {{ $assets->count() }} barang
            </p>
        </div>

        <div class="toolbar-actions">
            <a href="{{ route('scan-batches.show', $batch->id) }}" class="btn btn-light">Kembali</a>
            <button type="button" onclick="window.print()" class="btn btn-primary">Print / Cetak</button>
        </div>
    </div>

    <div class="print-area">
        <div class="batch-info">
            <strong>Kode Batch:</strong> {{ $batch->batch_code }} <br>
            <strong>Tanggal Scan:</strong> {{ $batch->scan_date ? $batch->scan_date->format('d/m/Y H:i') : '-' }} <br>
            <strong>User:</strong> {{ $batch->user->name ?? '-' }} <br>
            <strong>Keterangan:</strong> {{ $batch->note ?? '-' }}
        </div>

        @if ($assets->count() > 0)
            <div class="label-grid">
                @foreach ($assets as $asset)
                    <div class="qr-label">
                        <div class="qr-box">
                            {!! QrCode::size(110)->generate(route('assets.show', $asset->code)) !!}
                        </div>

                        <div class="asset-info">
                            <div class="asset-code">{{ $asset->code }}</div>
                            <div class="asset-name">{{ $asset->name }}</div>

                            <div class="asset-meta">
                                <strong>Kategori:</strong> {{ $asset->category ?? '-' }} <br>
                                <strong>Buyer:</strong> {{ $asset->merk ?? '-' }} <br>
                                <strong>Style:</strong> {{ $asset->warna ?? '-' }} <br>
                                <strong>Grade:</strong> {{ $asset->ukuran ?? '-' }} <br>
                                <strong>Stok:</strong> {{ $asset->stok_saat_ini ?? 0 }} {{ $asset->satuan ?? 'pcs' }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty">
                Tidak ada barang pada sesi scan ini.
            </div>
        @endif
    </div>
</body>
</html>