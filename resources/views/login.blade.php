<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Telcopedia</title>
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
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 32px;
    }

    .page {
        width: min(960px, 100%);
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        box-shadow: 0 20px 60px rgba(15, 23, 42, 0.08);
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 24px;
        padding: 32px;
    }

    .brand {
        display: grid;
        gap: 12px;
        align-content: start;
    }

    .logo {
        font-size: 24px;
        font-weight: 700;
        color: var(--primary);
        letter-spacing: -0.01em;
    }

    .subtitle {
        color: var(--muted);
        line-height: 1.5;
    }

    .note {
        background: #f3f4f6;
        border: 1px solid var(--border);
        border-radius: 10px;
        padding: 12px 14px;
        color: var(--muted);
        font-size: 14px;
        line-height: 1.5;
    }

    .card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 20px;
        display: grid;
        gap: 16px;
    }

    .title {
        font-size: 22px;
        font-weight: 700;
    }

    label {
        display: block;
        font-size: 14px;
        color: var(--muted);
        margin-bottom: 6px;
    }

    input {
        width: 100%;
        background: #ffffff;
        border: 1px solid var(--border);
        border-radius: 10px;
        padding: 12px 14px;
        color: var(--text);
        font-size: 15px;
        transition: border 150ms ease, box-shadow 150ms ease;
    }

    input:focus {
        outline: none;
        border-color: var(--primary-soft);
        box-shadow: 0 0 0 3px rgba(159, 21, 33, 0.12);
    }

    form {
        display: grid;
        gap: 14px;
    }

    .actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-top: 4px;
        flex-wrap: wrap;
    }

    button {
        border: none;
        border-radius: 10px;
        padding: 12px 18px;
        font-weight: 700;
        cursor: pointer;
        color: #ffffff;
        background: var(--primary);
        transition: transform 120ms ease, box-shadow 120ms ease, background 120ms ease;
        flex: 1;
    }

    button:hover {
        background: var(--primary-soft);
        transform: translateY(-1px);
        box-shadow: 0 12px 30px rgba(159, 21, 33, 0.18);
    }

    .link {
        color: var(--muted);
        text-decoration: none;
        font-size: 14px;
    }

    .link:hover {
        color: var(--primary);
    }

    .error {
        background: #fef2f2;
        border: 1px solid #fecdd3;
        color: #b91c1c;
        padding: 12px 14px;
        border-radius: 10px;
        font-size: 14px;
    }

    @media (max-width: 640px) {
        body {
            padding: 18px;
        }

        .page {
            padding: 24px;
        }
    }
    </style>
</head>

<body>
    <div class="page">
        <section class="brand">
            <div class="logo">Telcopedia</div>
            <div>
                <p class="subtitle">Masuk untuk melanjutkan transaksi dan kelola toko atau pesanan Anda.</p>
            </div>
            <div class="note">
                Seller: kelola produk dan penjualan. <br>
                <ul style="margin-left : 20px;">
                    <li>
                        NIM : 5646699332
                    </li>
                    <li>
                        Password : password
                    </li>
                </ul>
                <br>
                <p>
                    Buyer: -
                </p>

            </div>
        </section>
        <section class="card">
            <h1 class="title">Login</h1>
            @if ($errors->any())
            <div class="error">{{ $errors->first() }}</div>
            @endif
            <form method="POST" action="{{ route('login.process') }}">
                @csrf
                <div>
                    <label for="username">NIM</label>
                    <input id="username" name="nim" type="text" autocomplete="username" placeholder="" required>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" placeholder=""
                        required>
                </div>
                <div class="actions">
                    <button type="submit">Masuk</button>
                </div>
            </form>
        </section>
    </div>
</body>

</html>