<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700" rel="stylesheet" />
    <style>
    :root {
        --primary: #d81b32;
        --primary-soft: #fde8ea;
        --bg: #f6f7fb;
        --card: #ffffff;
        --text: #0f172a;
        --muted: #64748b;
        --border: #e2e8f0;
        --radius: 16px;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        min-height: 100vh;
        font-family: 'Poppins', system-ui, -apple-system, sans-serif;
        color: var(--text);
        background:
            radial-gradient(circle at top left, #fff1f2 0%, rgba(255, 241, 242, 0) 45%),
            radial-gradient(circle at 20% 20%, #eef2ff 0%, rgba(238, 242, 255, 0) 40%),
            var(--bg);
    }

    .app {
        display: grid;
        grid-template-columns: 260px 1fr;
        min-height: 100vh;
    }

    .sidebar {
        background: var(--card);
        border-right: 1px solid var(--border);
        padding: 28px 22px;
        display: flex;
        flex-direction: column;
        gap: 28px;
    }

    .brand .eyebrow {
        font-size: 12px;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--muted);
    }

    .brand h2 {
        margin-top: 8px;
        font-size: 18px;
        font-weight: 600;
    }

    .nav {
        display: grid;
        gap: 8px;
    }

    .nav-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 14px;
        border-radius: 12px;
        color: var(--muted);
        text-decoration: none;
        font-weight: 500;
        transition: all 160ms ease;
    }

    .nav-item svg {
        width: 18px;
        height: 18px;
    }

    .nav-item:hover {
        background: #f1f5f9;
        color: var(--text);
    }

    .nav-item.is-active {
        background: var(--primary-soft);
        color: var(--primary);
        font-weight: 600;
    }

    .content {
        display: flex;
        flex-direction: column;
    }

    .topbar {
        padding: 28px 32px;
        background: rgba(255, 255, 255, 0.82);
        backdrop-filter: blur(6px);
        border-bottom: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
    }

    .topbar h1 {
        font-size: 22px;
        margin-bottom: 4px;
    }

    .muted {
        color: var(--muted);
        font-size: 14px;
    }

    .logout {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 16px;
        border-radius: 12px;
        border: 1px solid var(--border);
        background: #ffffff;
        color: var(--text);
        font-weight: 600;
        cursor: pointer;
        transition: border 160ms ease, box-shadow 160ms ease;
    }

    .logout:hover {
        border-color: var(--primary);
        box-shadow: 0 10px 24px rgba(15, 23, 42, 0.08);
    }

    .page {
        padding: 32px;
        display: grid;
        gap: 20px;
    }

    .cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 18px;
    }

    .card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 18px;
        display: grid;
        gap: 10px;
        min-height: 160px;
        box-shadow: 0 18px 30px rgba(15, 23, 42, 0.05);
    }

    .card .icon {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        display: grid;
        place-items: center;
        background: var(--primary-soft);
        color: var(--primary);
    }

    .card a {
        color: var(--primary);
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(8px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .page > * {
        animation: fadeUp 0.4s ease both;
    }

    .cards .card {
        animation: fadeUp 0.45s ease both;
    }

    .cards .card:nth-child(2) {
        animation-delay: 0.08s;
    }

    @media (max-width: 900px) {
        .app {
            grid-template-columns: 1fr;
        }

        .sidebar {
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            padding: 18px 22px;
        }

        .nav {
            grid-auto-flow: column;
            gap: 10px;
        }
    }

    @media (max-width: 640px) {
        .topbar {
            flex-direction: column;
            align-items: flex-start;
        }

        .page {
            padding: 22px;
        }

        .sidebar {
            flex-direction: column;
            align-items: flex-start;
        }

        .nav {
            grid-auto-flow: row;
            width: 100%;
        }
    }
    </style>
</head>

<body>
    <div class="app">
        <aside class="sidebar">
            <div class="brand">
                <div class="eyebrow">Seller</div>
                <h2>Toko Anda</h2>
            </div>
            <nav class="nav">
                <a class="nav-item is-active" href="{{ route('seller.dashboard') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                        <path d="M3 11l9-7 9 7v9a2 2 0 0 1-2 2h-4v-6H9v6H5a2 2 0 0 1-2-2z" />
                    </svg>
                    Dashboard
                </a>
                <a class="nav-item" href="{{ route('seller.orders.index') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                        <rect x="3" y="4" width="18" height="16" rx="2" />
                        <path d="M7 8h10M7 12h10M7 16h6" />
                    </svg>
                    Pesanan
                </a>
                <a class="nav-item" href="{{ route('seller.products.index') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                        <path d="M12 2l9 5-9 5-9-5 9-5z" />
                        <path d="M3 7v10l9 5 9-5V7" />
                    </svg>
                    Produk
                </a>
            </nav>
        </aside>

        <main class="content">
            <header class="topbar">
                <div>
                    <h1>Dashboard</h1>
                    <p class="muted">Kelola produk dan pesanan toko Anda.</p>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" width="18"
                            height="18">
                            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                            <path d="M10 17l5-5-5-5" />
                            <path d="M15 12H3" />
                        </svg>
                        Logout
                    </button>
                </form>
            </header>

            <section class="page">
                <div>
                    <p class="muted">Halo, <strong>{{ auth()->user()->username }}</strong>. Gunakan menu di samping untuk
                        navigasi.</p>
                </div>
                <div class="cards">
                    <div class="card">
                        <div class="icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                <path d="M12 2l9 5-9 5-9-5 9-5z" />
                                <path d="M3 7v10l9 5 9-5V7" />
                            </svg>
                        </div>
                        <h3>Produk</h3>
                        <p class="muted">Tambah, ubah, atau hapus produk yang dijual.</p>
                        <a href="{{ route('seller.products.index') }}">Buka Kelola Produk &gt;</a>
                    </div>
                    <div class="card">
                        <div class="icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                <rect x="3" y="4" width="18" height="16" rx="2" />
                                <path d="M7 8h10M7 12h10M7 16h6" />
                            </svg>
                        </div>
                        <h3>Pesanan</h3>
                        <p class="muted">Pantau status pesanan dan perbarui progres pengiriman.</p>
                        <a href="{{ route('seller.orders.index') }}">Buka Kelola Pesanan &gt;</a>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>

</html>
