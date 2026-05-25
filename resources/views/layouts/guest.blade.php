<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'AssetTrack') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f8;
            color: #111827;
        }

        .guest-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .guest-card {
            width: 100%;
            max-width: 430px;
            background: #ffffff;
            border-radius: 18px;
            padding: 28px;
            box-shadow: 0 20px 45px rgba(15, 23, 42, 0.12);
            border: 1px solid #e5e7eb;
        }

        .guest-logo {
            text-align: center;
            margin-bottom: 22px;
        }

        .guest-logo h1 {
            margin: 0;
            font-size: 26px;
            font-weight: 800;
            color: #111827;
        }

        .guest-logo p {
            margin: 6px 0 0;
            font-size: 14px;
            color: #6b7280;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 6px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            height: 44px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            padding: 10px 12px;
            font-size: 14px;
            outline: none;
            background: #ffffff;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #111827;
            box-shadow: 0 0 0 3px rgba(17, 24, 39, 0.12);
        }

        input[type="checkbox"] {
            width: 16px;
            height: 16px;
        }

        button,
        .primary-button {
            background: #111827 !important;
            color: white !important;
            border: none !important;
            border-radius: 10px !important;
            padding: 10px 18px !important;
            font-size: 14px !important;
            font-weight: 700 !important;
            cursor: pointer;
        }

        button:hover,
        .primary-button:hover {
            background: #374151 !important;
        }

        a {
            color: #374151;
            font-size: 14px;
        }

        a:hover {
            color: #111827;
        }

        .mt-1 { margin-top: 4px; }
        .mt-2 { margin-top: 8px; }
        .mt-4 { margin-top: 16px; }
        .mb-4 { margin-bottom: 16px; }
        .ms-2 { margin-left: 8px; }
        .ms-3 { margin-left: 12px; }
        .ms-4 { margin-left: 16px; }

        .flex {
            display: flex;
        }

        .items-center {
            align-items: center;
        }

        .justify-end {
            justify-content: flex-end;
        }

        .inline-flex {
            display: inline-flex;
        }

        .block {
            display: block;
        }

        .w-full {
            width: 100%;
        }

        .text-sm {
            font-size: 14px;
        }

        .text-red-600 {
            color: #dc2626;
        }

        @media(max-width: 480px) {
            .guest-page {
                padding: 16px;
            }

            .guest-card {
                padding: 22px;
                border-radius: 16px;
            }

            .guest-logo h1 {
                font-size: 23px;
            }
        }
    </style>
</head>
<body>
    <div class="guest-page">
        <div class="guest-card">
            <div class="guest-logo">
                <h1>AssetTrack</h1>
                <p>Sistem Monitoring Aset Berbasis QR Code</p>
            </div>

            {{ $slot }}
        </div>
    </div>
</body>
</html>