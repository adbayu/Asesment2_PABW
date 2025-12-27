<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pesanan</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700" rel="stylesheet" />
    <style>
    :root {
        --primary: #9F1521;
        --primary-soft: #c22632;
        --bg: #f9fafb;
        --card: #fff;
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
        background: #fff;
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

    @media (max-width:640px) {
        body {
            padding: 16px;
        }

        th:nth-child(3),
        td:nth-child(3) {
            display: none;
        }
    }
    </style>
</head>

<body>
    <div class="shell">
        <div class="header">
            <div>
                <h1 class="title">Kelola Pesanan</h1>
                <p class="muted">Pantau dan perbarui status pesanan.</p>
            </div>
            <div class="actions">
                <a class="btn secondary" href="{{ route('seller.dashboard') }}">← Kembali</a>
                <a class="btn" href="{{ route('seller.orders.create') }}">+ Tambah Pesanan</a>
            </div>
        </div>

        @if (session('success'))
        <div class="alert">{{ session('success') }}</div>
        @endif

        <div style="overflow-x:auto;">
            <table>
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                    <tr>
                        <td>{{ $order->product_name }}</td>
                        <td>Rp {{ number_format($order->product_price, 0, ',', '.') }}</td>
                        <td><span class="badge">{{ ucfirst($order->status) }}</span></td>
                        <td>
                            <div class="actions">
                                <a class="btn secondary" href="{{ route('seller.orders.edit', $order) }}">Edit</a>
                                <form method="POST" action="{{ route('seller.orders.destroy', $order) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn"
                                        onclick="return confirm('Hapus pesanan ini?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="muted">Belum ada pesanan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>