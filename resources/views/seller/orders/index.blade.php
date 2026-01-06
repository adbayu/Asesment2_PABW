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

    .alert {
        padding: 12px 16px;
        border-radius: 12px;
        border: 1px solid var(--border);
        background: #f8fafc;
        color: var(--text);
    }

    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        flex-wrap: wrap;
    }

    .button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 16px;
        border-radius: 12px;
        border: 1px solid transparent;
        background: var(--primary);
        color: #fff;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
    }

    .stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 16px;
    }

    .stat-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 16px;
        box-shadow: 0 18px 30px rgba(15, 23, 42, 0.05);
    }

    .stat-card p {
        font-size: 13px;
        color: var(--muted);
        margin-bottom: 6px;
    }

    .stat-card strong {
        font-size: 22px;
    }

    .filters {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 12px;
        display: grid;
        grid-template-columns: 1fr 200px auto;
        gap: 12px;
        align-items: center;
    }

    .filters input,
    .filters select {
        width: 100%;
        padding: 10px 12px;
        border-radius: 10px;
        border: 1px solid var(--border);
        font-family: inherit;
    }

    .filters .search {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 0 10px;
        border: 1px solid var(--border);
        border-radius: 10px;
        background: #fff;
    }

    .filters .search input {
        border: none;
        padding: 10px 0;
        outline: none;
    }

    .table-wrap {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        overflow: hidden;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 14px 16px;
        text-align: left;
        border-bottom: 1px solid var(--border);
        font-size: 14px;
    }

    th {
        background: #f8fafc;
        font-weight: 600;
        color: #475569;
    }

    .badge {
        display: inline-flex;
        align-items: center;
        padding: 6px 12px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
    }

    .status-pack {
        background: #fef3c7;
        color: #b45309;
    }

    .status-ship {
        background: #e0e7ff;
        color: #4338ca;
    }

    .status-done {
        background: #dcfce7;
        color: #15803d;
    }

    .actions {
        display: inline-flex;
        gap: 8px;
    }

    .action-btn {
        padding: 8px 10px;
        border-radius: 10px;
        border: 1px solid var(--border);
        background: #fff;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        color: var(--text);
    }

    .action-danger {
        border-color: #fecaca;
        color: #b91c1c;
    }

    .modal {
        position: fixed;
        inset: 0;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 24px;
        background: rgba(15, 23, 42, 0.45);
        z-index: 50;
    }

    .modal.is-open {
        display: flex;
    }

    .modal-panel {
        width: min(520px, 100%);
        background: var(--card);
        border-radius: var(--radius);
        border: 1px solid var(--border);
        box-shadow: 0 20px 50px rgba(15, 23, 42, 0.2);
        padding: 20px;
        display: grid;
        gap: 16px;
    }

    .modal-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    .modal-title {
        font-size: 18px;
        font-weight: 600;
    }

    .modal-close {
        border: 1px solid var(--border);
        background: #fff;
        border-radius: 10px;
        padding: 6px 10px;
        cursor: pointer;
    }

    .form-grid {
        display: grid;
        gap: 12px;
    }

    .form-grid label {
        font-size: 13px;
        color: var(--muted);
        margin-bottom: 6px;
        display: block;
    }

    .form-grid input,
    .form-grid select {
        width: 100%;
        padding: 10px 12px;
        border-radius: 10px;
        border: 1px solid var(--border);
        font-family: inherit;
    }

    .modal-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .button.ghost {
        background: #fff;
        border-color: var(--border);
        color: var(--text);
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

    .stat-card:nth-child(2) {
        animation-delay: 0.05s;
    }

    .stat-card:nth-child(3) {
        animation-delay: 0.1s;
    }

    .stat-card:nth-child(4) {
        animation-delay: 0.15s;
    }

    form {
        margin: 0;
    }

    @media (max-width: 1080px) {
        .filters {
            grid-template-columns: 1fr;
        }
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
    @php
    $totalOrders = $orders->count();
    $packedOrders = $orders->where('status', 'dikemas')->count();
    $shippedOrders = $orders->where('status', 'dalam perjalanan')->count();
    $doneOrders = $orders->where('status', 'sampai')->count();
    @endphp
    <div class="app">
        <aside class="sidebar">
            <div class="brand">
                <div class="eyebrow">Seller</div>
                <h2>Toko Anda</h2>
            </div>
            <nav class="nav">
                <a class="nav-item" href="{{ route('seller.dashboard') }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                        <path d="M3 11l9-7 9 7v9a2 2 0 0 1-2 2h-4v-6H9v6H5a2 2 0 0 1-2-2z" />
                    </svg>
                    Dashboard
                </a>
                <a class="nav-item is-active" href="{{ route('seller.orders.index') }}">
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
                    <h1>Kelola Pesanan</h1>
                    <p class="muted">Pantau status pesanan dan perbarui progres pengiriman.</p>
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
                <div class="page-header">
                    <div>
                        <h2>Kelola Pesanan</h2>
                        <p class="muted">Lihat ringkasan dan kelola pesanan sesuai kebutuhan.</p>
                    </div>
                    <a class="button" href="{{ route('seller.orders.create') }}">Tambah Pesanan</a>
                </div>

                @if (session('success'))
                <div class="alert">{{ session('success') }}</div>
                @endif

                <div class="stats">
                    <div class="stat-card">
                        <p>Total Pesanan</p>
                        <strong>{{ $totalOrders }}</strong>
                    </div>
                    <div class="stat-card">
                        <p>Dikemas</p>
                        <strong>{{ $packedOrders }}</strong>
                    </div>
                    <div class="stat-card">
                        <p>Dalam Perjalanan</p>
                        <strong>{{ $shippedOrders }}</strong>
                    </div>
                    <div class="stat-card">
                        <p>Sampai</p>
                        <strong>{{ $doneOrders }}</strong>
                    </div>
                </div>

                <form class="filters" method="GET" action="{{ route('seller.orders.index') }}">
                    <div class="search">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" width="18"
                            height="18">
                            <circle cx="11" cy="11" r="7" />
                            <path d="M21 21l-4.35-4.35" />
                        </svg>
                        <input type="text" name="search" placeholder="Cari pesanan..." value="{{ request('search') }}">
                    </div>
                    <select name="status">
                        <option value="">Semua Status</option>
                        <option value="dikemas" @selected(request('status') === 'dikemas')>Dikemas</option>
                        <option value="dalam perjalanan" @selected(request('status') === 'dalam perjalanan')>Dalam
                            Perjalanan</option>
                        <option value="sampai" @selected(request('status') === 'sampai')>Sampai</option>
                    </select>
                    <button class="button" type="submit">Filter</button>
                </form>

                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>No. Pesanan</th>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                            @php
                            $statusClass = match ($order->status) {
                                'dikemas' => 'status-pack',
                                'dalam perjalanan' => 'status-ship',
                                'sampai' => 'status-done',
                                default => 'status-pack',
                            };
                            $orderNumber = 'ORD-' . str_pad((string) $order->id, 3, '0', STR_PAD_LEFT);
                            @endphp
                            <tr>
                                <td>{{ $orderNumber }}</td>
                                <td>{{ $order->product_name }}</td>
                                <td>Rp {{ number_format($order->product_price, 0, ',', '.') }}</td>
                                <td><span class="badge {{ $statusClass }}">{{ ucwords($order->status) }}</span></td>
                                <td>{{ optional($order->created_at)->format('d M Y') }}</td>
                                <td>
                                    <div class="actions">
                                        <button type="button" class="action-btn js-edit-order"
                                            data-update-url="{{ route('seller.orders.update', $order) }}"
                                            data-product-name="{{ $order->product_name }}"
                                            data-product-price="{{ $order->product_price }}"
                                            data-status="{{ $order->status }}">Edit</button>
                                        <form method="POST" action="{{ route('seller.orders.destroy', $order) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-btn action-danger"
                                                onclick="return confirm('Hapus pesanan ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="muted">Belum ada pesanan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>

    <div class="modal" id="editOrderModal" aria-hidden="true">
        <div class="modal-panel" role="dialog" aria-modal="true">
            <div class="modal-header">
                <div class="modal-title">Edit Pesanan</div>
                <button type="button" class="modal-close" data-close-modal="editOrderModal">Tutup</button>
            </div>
            <form method="POST" id="editOrderForm">
                @csrf
                @method('PUT')
                <div class="form-grid">
                    <div>
                        <label for="edit-order-product-name">Nama Produk</label>
                        <input id="edit-order-product-name" type="text" name="product_name" required>
                    </div>
                    <div>
                        <label for="edit-order-product-price">Harga</label>
                        <input id="edit-order-product-price" type="number" name="product_price" min="0" required>
                    </div>
                    <div>
                        <label for="edit-order-status">Status</label>
                        <select id="edit-order-status" name="status" required>
                            <option value="dikemas">Dikemas</option>
                            <option value="dalam perjalanan">Dalam Perjalanan</option>
                            <option value="sampai">Sampai</option>
                        </select>
                    </div>
                </div>
                <div class="modal-actions">
                    <button type="button" class="button ghost" data-close-modal="editOrderModal">Batal</button>
                    <button type="submit" class="button">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    const orderModal = document.getElementById('editOrderModal');
    const orderForm = document.getElementById('editOrderForm');
    const orderProductNameInput = document.getElementById('edit-order-product-name');
    const orderProductPriceInput = document.getElementById('edit-order-product-price');
    const orderStatusSelect = document.getElementById('edit-order-status');

    const openModal = (modal) => {
        modal.classList.add('is-open');
        document.body.style.overflow = 'hidden';
    };

    const closeModal = (modal) => {
        modal.classList.remove('is-open');
        document.body.style.overflow = '';
    };

    document.querySelectorAll('.js-edit-order').forEach((button) => {
        button.addEventListener('click', () => {
            orderForm.action = button.dataset.updateUrl;
            orderProductNameInput.value = button.dataset.productName || '';
            orderProductPriceInput.value = button.dataset.productPrice || '';
            orderStatusSelect.value = button.dataset.status || 'dikemas';
            openModal(orderModal);
        });
    });

    document.querySelectorAll('[data-close-modal="editOrderModal"]').forEach((button) => {
        button.addEventListener('click', () => closeModal(orderModal));
    });

    orderModal.addEventListener('click', (event) => {
        if (event.target === orderModal) {
            closeModal(orderModal);
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && orderModal.classList.contains('is-open')) {
            closeModal(orderModal);
        }
    });
    </script>
</body>

</html>
