<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        referrerpolicy="no-referrer" />
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
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 32px;
    }

    .container {
        width: min(1080px, 100%);
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        box-shadow: 0 20px 60px rgba(15, 23, 42, 0.08);
        padding: 28px;
        display: grid;
        gap: 18px;
    }

    .header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
    }

    .title {
        font-size: 24px;
        letter-spacing: -0.01em;
    }

    .muted {
        color: var(--muted);
    }

    .grid {
        display: grid;
        gap: 16px;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    }

    .card {
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 16px;
        display: grid;
        gap: 8px;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 14px;
        border-radius: 10px;
        border: 1px solid transparent;
        text-decoration: none;
        font-weight: 700;
        color: #ffffff;
        background: var(--primary);
        transition: transform 120ms ease, box-shadow 120ms ease, background 120ms ease;
    }

    .btn:hover {
        background: var(--primary-soft);
        transform: translateY(-1px);
        box-shadow: 0 12px 30px rgba(159, 21, 33, 0.18);
    }

    .link {
        text-decoration: none;
        color: var(--primary);
        font-weight: 600;
    }

    .pill {
        display: inline-flex;
        align-items: center;
        padding: 6px 10px;
        border-radius: 999px;
        background: #f3f4f6;
        color: var(--muted);
        font-size: 13px;
        border: 1px solid var(--border);
    }

    .actions {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .logout {
        padding: 10px 12px;
        border-radius: 10px;
        border: 1px solid var(--border);
        background: #ffffff;
        color: var(--primary);
        font-weight: 600;
        cursor: pointer;
    }

    .logout:hover {
        border-color: var(--primary);
    }

    .card h3 {
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .link i {
        margin-left: 6px;
    }

    @media (max-width: 640px) {
        body {
            padding: 18px;
        }

        .header {
            flex-direction: column;
            align-items: flex-start;
        }
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div>
                <div class="pill">Seller</div>
                <h1 class="title">Dashboard</h1>
                <p class="muted">Kelola produk dan pesanan toko Anda.</p>
            </div>
            <div class="actions">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout">Logout</button>
                </form>
            </div>
        </div>

        <div class="grid">
            <div class="card">
                <h3><i class="fa-solid fa-box-open"></i>Produk</h3>
                <p class="muted">Tambah, ubah, atau hapus produk yang dijual.</p>
                <a class="link" href="{{ route('seller.products.index') }}">
                    Buka Kelola Produk
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
            <div class="card">
                <h3><i class="fa-solid fa-receipt"></i>Pesanan</h3>
                <p class="muted">Pantau status pesanan dan perbarui progres pengiriman.</p>
                <a class="link" href="{{ route('seller.orders.index') }}">
                    Buka Kelola Pesanan
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</body>

</html>