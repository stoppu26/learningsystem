<?= $this->extend('layouts/auth') ?>
<?= $this->section('content') ?>

<div class="auth-wrapper">
    <div class="auth-card">

        <h2>Buat Akun</h2>
        <p class="subtitle">
            Daftar untuk mulai belajar atau mengajar
        </p>

        <form method="post" action="/register">

            <label class="form-label">Daftar sebagai</label>
            <select name="role" required>
                <option value="siswa">Siswa</option>
                <option value="guru">Guru</option>
            </select>

            <input
                type="text"
                name="name"
                placeholder="Nama lengkap"
                required
            >

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

            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert-error">
                    <?= session()->getFlashdata('errors')['email'] ?? 'Terjadi kesalahan' ?>
                </div>
            <?php endif; ?>

            <button class="btn-primary" type="submit">
                Daftar
            </button>

            <div class="divider">atau</div>

            <a href="/auth/google" class="btn-google">
                <img src="/img/google.svg" alt="">
                Daftar dengan Google
            </a>

            <div class="auth-footer">
                Sudah punya akun?
                <a href="/login"><strong>Masuk</strong></a>
            </div>

        </form>



    </div>
</div>


<?= $this->endSection() ?>
