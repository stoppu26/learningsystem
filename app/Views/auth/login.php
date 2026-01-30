<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/auth.css">
</head>
<body>

<div class="auth-wrapper">
    <div class="auth-card">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert-error">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>


        <h2>Masuk</h2>
        <p class="subtitle">Masuk untuk melanjutkan belajar atau mengajar</p>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert-error">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form method="post" action="/login">
            <?= csrf_field() ?>

            <input
                type="email"
                name="email"
                placeholder="Email"
                required
            >

            <input
                type="password"
                name="password"
                placeholder="Password"
                required
            >

            <button type="submit" class="btn-primary">
                Masuk
            </button>
        </form>

        <div class="divider">atau</div>

        <a href="#" class="btn-google">
            <img src="/img/google.svg" alt="Google">
            Masuk dengan Google
        </a>

        <div class="auth-footer">
            Belum punya akun?
            <a href="/register"><strong>Daftar</strong></a>
        </div>

    </div>
</div>

</body>
</html>
