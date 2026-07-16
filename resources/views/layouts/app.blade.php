<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Aplikasi Wisata XYZ' }}</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            color: #1f2937;
            font-family: Arial, Helvetica, sans-serif;
            background: #f3f6f8;
            line-height: 1.5;
        }

        header {
            background: #17494d;
            color: #fff;
            padding: 18px 0;
        }

        .container {
            width: min(1100px, calc(100% - 32px));
            margin: 0 auto;
        }

        .nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .brand {
            margin: 0;
            font-size: 22px;
        }

        .nav a {
            color: #fff;
            text-decoration: none;
            font-weight: 700;
        }

        main {
            padding: 32px 0;
        }

        h1, h2, h3 {
            margin-top: 0;
            color: #17324d;
        }

        .hero {
            padding: 26px;
            margin-bottom: 24px;
            background: #fff;
            border: 1px solid #d8e0e6;
            border-radius: 8px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .card {
            overflow: hidden;
            background: #fff;
            border: 1px solid #d8e0e6;
            border-radius: 8px;
        }

        .card img {
            display: block;
            width: 100%;
            aspect-ratio: 3 / 2;
            object-fit: cover;
            background: #e5e7eb;
        }

        .card-body {
            padding: 16px;
        }

        .price {
            color: #0f766e;
            font-weight: 700;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border: 1px solid #d8e0e6;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 14px;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
        }

        th {
            background: #e8f3f1;
            color: #17324d;
        }

        tr:last-child td {
            border-bottom: 0;
        }

        .actions {
            margin-top: 22px;
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .btn {
            display: inline-block;
            border: 0;
            border-radius: 6px;
            padding: 11px 16px;
            color: #fff;
            background: #0f766e;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
        }

        .btn.secondary {
            background: #475569;
        }

        .form-card {
            background: #fff;
            border: 1px solid #d8e0e6;
            border-radius: 8px;
            padding: 22px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 700;
        }

        input, select {
            width: 100%;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            padding: 10px 12px;
            font: inherit;
            background: #fff;
        }

        input[readonly] {
            background: #f1f5f9;
        }

        .full {
            grid-column: 1 / -1;
        }

        .check {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-weight: 400;
        }

        .check input {
            width: auto;
            margin-top: 5px;
        }

        .errors {
            margin-bottom: 18px;
            padding: 14px 18px;
            border: 1px solid #fecaca;
            border-radius: 8px;
            color: #991b1b;
            background: #fef2f2;
        }

        .receipt {
            max-width: 760px;
            margin: 0 auto;
            background: #fff;
            border: 1px solid #d8e0e6;
            border-radius: 8px;
            padding: 24px;
        }

        .receipt-row {
            display: grid;
            grid-template-columns: 220px 1fr;
            gap: 12px;
            padding: 10px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .receipt-row:last-child {
            border-bottom: 0;
        }

        @media (max-width: 760px) {
            .grid,
            .form-grid {
                grid-template-columns: 1fr;
            }

            .receipt-row {
                grid-template-columns: 1fr;
                gap: 2px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container nav">
            <p class="brand">Aplikasi Wisata </p>
            <nav>
                <a href="{{ route('wisata.index') }}">Beranda</a>
                <a href="{{ route('pemesanan.create') }}" style="margin-left: 14px;">Pesan Tiket</a>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
</body>
</html>
