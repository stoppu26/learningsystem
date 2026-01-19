<!DOCTYPE html>
<html>
<head>
    <style>
        .site-header {
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
        }

        .header-container {
            max-width: 1200px;
            margin: auto;
            padding: 12px 24px;
            display: grid;
            grid-template-columns: auto 1fr auto;
            align-items: center;
            gap: 24px;
        }

        .header-search input {
            width: 100%;
            max-width: 420px;
            padding: 8px 14px;
            border-radius: 999px;
            border: 1px solid #e5e7eb;
            font-size: 14px;
        }

        .header-nav a {
            margin-left: 12px;
            text-decoration: none;
            color: #4b5563;
            font-size: 14px;
        }

        .header-nav a:hover {
            color: #2563eb;
        }
    </style>

<header class="site-header">
    <div class="header-container">

        <!-- Logo -->
        <div class="logo">
            <a href="/">
                <img src="/img/logo.png" alt="SMK Bisa" height="32">
            </a>
        </div>

        <!-- Search -->
        <form method="get" action="/courses" class="header-search">
            <input
                type="text"
                name="q"
                placeholder="Cari"
                value="<?= esc($q ?? '') ?>"
            >
        </form>

        <!-- Menu -->
        <nav class="header-nav">
            <a href="/">Beranda</a>
            <a href="/login">Masuk</a>
            <span>/</span>
            <a href="/register">Daftar</a>
        </nav>

    </div>
</header>

</body>
</html>
