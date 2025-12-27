<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700" rel="stylesheet" />
    <style>
    :root {
        --primary: #9F1521;
        --primary-soft: #c22632;
        --bg: #f9fafb;
        --card: #ffffff;
        --text: #1f2937;
        --muted: #6b7280;
        --border: #e5e7eb;
        --radius: 14px;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        min-height: 100vh;
        font-family: 'Poppins', system-ui, -apple-system, sans-serif;
        background: var(--bg);
        color: var(--text);
        padding: 28px;
    }

    .shell {
        width: min(1080px, 100%);
        margin: 0 auto;
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        box-shadow: 0 20px 60px rgba(15, 23, 42, 0.08);
        padding: 24px;
        display: grid;
        gap: 16px;
    }

    .header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        flex-wrap: wrap;
    }

    .title {
        font-size: 24px;
        letter-spacing: -0.01em;
    }

    .muted {
        color: var(--muted);
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 11px 14px;
        border-radius: 10px;
        border: 1px solid transparent;
        font-weight: 700;
        text-decoration: none;
        cursor: pointer;
        color: #fff;
        background: var(--primary);
        transition: transform 120ms ease, box-shadow 120ms ease, background 120ms ease;
    }

    .btn:hover {
        background: var(--primary-soft);
        transform: translateY(-1px);
        box-shadow: 0 12px 30px rgba(159, 21, 33, 0.18);
    }

    .btn.secondary {
        background: #ffffff;
        color: var(--primary);
        border-color: var(--border);
        box-shadow: none;
    }

    .btn.secondary:hover {
        border-color: var(--primary);
        color: var(--primary-soft);
    }

    .alert {
        padding: 12px 14px;
        border-radius: 10px;
        border: 1px solid var(--border);
        background: #f3f4f6;
        color: var(--text);
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 12px 10px;
        text-align: left;
        border-bottom: 1px solid var(--border);
    }

    th {
        background: #f8fafc;
        font-weight: 600;
        font-size: 14px;
    }

    td {
        font-size: 14px;
        color: var(--text);
    }

    .actions {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .badge {
        display: inline-flex;
        align-items: center;
        padding: 6px 10px;
        border-radius: 999px;
        border: 1px solid var(--border);
        color: var(--muted);
        font-size: 12px;
    }

    form {
        margin: 0;
    }

    /* .filters {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
            justify-content: space-between;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 12px;
            background: #f8fafc;
        }
        .filters label {
            font-weight: 600;
            font-size: 14px;
        }
        .filter-actions {
            display: flex;
            gap: 10px;
            align-items: center;
            flex-wrap: wrap;
        }
        select {
            padding: 10px 12px;
            border-radius: 10px;
            border: 1px solid var(--border);
            background: #ffffff;
            font-size: 14px;
        } */
    </style>
</head>

<body>
    <div class="shell">
        <div class="header">
            <div>	
                <h1 class="title">Kelola Produk</h1>
                <p class="muted">Tambah, ubah, dan hapus data produk.</p>
            </div>
            <div class="actions">
                <a class="btn secondary" href="{{ route('seller.dashboard') }}">&larr; Kembali</a>
                <a class="btn" href="{{ route('seller.products.create') }}">+ Tambah Produk</a>
            </div>
        </div>

        @if (session('success'))
        <div class="alert">{{ session('success') }}</div>
        @endif

        <form method="GET" action="{{ route('seller.products.search') }}">
            <div style="display:flex; gap:8px; align-items:center; flex-wrap:wrap;">
                <input type="text" id="search" name="search" placeholder="Cari produk..." value="{{ request('search') }}"
                    required
                    style="padding:10px 12px; border-radius:10px; border:1px solid var(--border); min-width:220px;">
                <button type="submit" class="btn">Cari</button>
                @if (request('search'))
                <a class="btn secondary" href="{{ route('seller.products.index') }}">Reset</a>
                @endif
            </div>
        </form>

        <div style="overflow-x:auto;">
            <table>
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Kondisi</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td><span class="badge">{{ ucfirst($product->condition) }}</span></td>
                        <td>{{ \Illuminate\Support\Str::limit($product->description, 60) }}</td>
                        <td>
                            <div class="actions">
                                <a class="btn secondary" href="{{ route('seller.products.edit', $product) }}">Edit</a>
                                <form method="POST" action="{{ route('seller.products.destroy', $product) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn"
                                        onclick="return confirm('Hapus produk ini?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="muted">Belum ada produk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
