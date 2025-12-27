<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Dashboard</title>
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

    .card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 28px;
        width: min(720px, 100%);
        box-shadow: 0 20px 60px rgba(15, 23, 42, 0.08);
        display: grid;
        gap: 10px;
    }

    h1 {
        margin: 0;
        letter-spacing: -0.01em;
        font-size: 24px;
    }

    p {
        margin: 0;
        color: var(--muted);
        line-height: 1.5;
    }

    .actions {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 12px;
    }

    .btn {
        padding: 12px 16px;
        border-radius: 10px;
        border: 1px solid transparent;
        cursor: pointer;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: transform 120ms ease, box-shadow 120ms ease, background 120ms ease, color 120ms ease;
        flex: 1;
    }

    .primary {
        background: var(--primary);
        color: #ffffff;
        box-shadow: 0 12px 30px rgba(159, 21, 33, 0.18);
        border-color: var(--primary);
    }

    .primary:hover {
        background: var(--primary-soft);
        transform: translateY(-1px);
    }

    .ghost {
        background: #ffffff;
        border-color: var(--border);
        color: var(--primary);
    }

    .ghost:hover {
        border-color: var(--primary);
        color: var(--primary-soft);
    }

    form {
        margin: 0;
        flex: 1;
    }

    @media (max-width: 640px) {
        body {
            padding: 18px;
        }
    }
    </style>
</head>

<body>
    <div class="card">
        <h1>Buyer Dashboard</h1>
        <p>Halo, {{ auth()->user()->username }} (role: {{ auth()->user()->role }})</p>
        <p>Area ini hanya bisa diakses role <strong>buyer</strong>. Silakan gunakan akun seller untuk masuk ke halaman
            seller.</p>
        <div class="actions">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn primary">Logout</button>
            </form>
        </div>
    </div>
</body>

</html>