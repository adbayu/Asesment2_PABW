<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        referrerpolicy="no-referrer" />
    <style>
    :root {
        --primary: #9F1521;
        --primary-soft: #c22632;
        --bg: #f9fafb;
        --card: #F9FAFB;
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
        display: grid;
        place-items: center;
        background: var(--bg);
        font-family: 'Poppins', system-ui, -apple-system, sans-serif;
        color: var(--text);
        padding: 32px;
    }

    .card {
        width: auto;
        background: none;
        border: 1px solid var(--card);
        border-radius: var(--radius);
        padding: 28px;
        text-align: center;
        display: grid;
        gap: 14px;
    }

    .icon {
        width: 70px;
        height: 70px;
        border-radius: 20px;
        display: grid;
        place-items: center;
        margin: 0 auto;
        background: rgba(159, 21, 33, 0.08);
        color: var(--primary);
        font-size: 32px;
    }

    h1 {
        font-size: 28px;
        letter-spacing: -0.01em;
    }

    .muted {
        color: var(--muted);
    }

    .actions {
        display: flex;
        gap: 12px;
        justify-content: center;
        flex-wrap: wrap;
        margin-top: 6px;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 16px;
        border-radius: 12px;
        border: 1px solid transparent;
        font-weight: 700;
        text-decoration: none;
        color: #ffffff;
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
        border: 1px solid var(--border);
        box-shadow: none;
    }

    .btn.secondary:hover {
        border-color: var(--primary);
        background: #fff7f7;
    }
    </style>
</head>

<body>
    <div class="card">
        <div class="icon">
            <i class="fa-solid fa-circle-exclamation"></i>
        </div>
        <h1>Halaman tidak ditemukan</h1>
        <p class="muted">URL yang Anda buka tidak tersedia atau sudah dipindahkan. Periksa kembali alamatnya.</p>
        <div class="actions">
            <a class="btn secondary" href="javascript:history.back()">
                <i class="fa-solid fa-arrow-left"></i>
                Kembali
            </a>
            <a class="btn" href="{{ url('/') }}">
                <i class="fa-solid fa-house"></i>
                Ke Beranda
            </a>
        </div>
    </div>
</body>

</html>