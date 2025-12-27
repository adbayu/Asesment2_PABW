<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pesanan</title>
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
        width: min(680px, 100%);
        margin: 0 auto;
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        box-shadow: 0 20px 60px rgba(15, 23, 42, 0.08);
        padding: 24px;
        display: grid;
        gap: 16px;
    }

    .title {
        font-size: 22px;
        letter-spacing: -0.01em;
    }

    .muted {
        color: var(--muted);
    }

    form {
        display: grid;
        gap: 12px;
    }

    label {
        font-size: 14px;
        color: var(--muted);
        margin-bottom: 4px;
        display: block;
    }

    input,
    select {
        width: 100%;
        border: 1px solid var(--border);
        border-radius: 10px;
        padding: 12px 14px;
        font-size: 14px;
        color: var(--text);
        background: #fff;
    }

    input:focus,
    select:focus {
        outline: none;
        border-color: var(--primary-soft);
        box-shadow: 0 0 0 3px rgba(159, 21, 33, 0.12);
    }

    .actions {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .btn {
        padding: 11px 14px;
        border-radius: 10px;
        border: 1px solid transparent;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
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

    .error {
        background: #fef2f2;
        border: 1px solid #fecdd3;
        color: #b91c1c;
        padding: 10px 12px;
        border-radius: 10px;
        font-size: 14px;
    }

    @media (max-width:640px) {
        body {
            padding: 16px;
        }
    }
    </style>
</head>

<body>
    <div class="shell">
        <div>
            <h1 class="title">Tambah Pesanan</h1>
            <p class="muted">Input pesanan baru dan pilih status awal.</p>
        </div>

        @if ($errors->any())
        <div class="error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('seller.orders.store') }}">
            @csrf
            <div>
                <label for="product_name">Nama Produk</label>
                <input type="text" id="product_name" name="product_name" value="{{ old('product_name') }}" required>
            </div>
            <div>
                <label for="product_price">Harga Produk</label>
                <input type="number" id="product_price" name="product_price" value="{{ old('product_price') }}" min="0"
                    required>
            </div>
            <div>
                <label for="status">Status Pembayaran</label>
                <select id="status" name="status" required>
                    <option value="">-- Pilih status --</option>
                    <option value="dikemas" @selected(old('status')==='dikemas' )>Dikemas</option>
                    <option value="dalam perjalanan" @selected(old('status')==='dalam perjalanan' )>Dalam perjalanan
                    </option>
                    <option value="sampai" @selected(old('status')==='sampai' )>Sampai</option>
                </select>
            </div>
            <div class="actions">
                <a class="btn secondary" href="{{ route('seller.orders.index') }}">Batal</a>
                <button type="submit" class="btn">Simpan</button>
            </div>
        </form>
    </div>
</body>

</html>