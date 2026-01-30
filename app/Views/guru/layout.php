<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?? 'Guru Panel' ?></title>
    <link rel="stylesheet" href="/css/guru.css">
</head>
<body>

<div class="guru-layout">

    <!-- SIDEBAR -->
    <aside class="guru-sidebar">
        <h2>Guru Panel</h2>

        <nav class="guru-menu">
            <a href="/guru" class="<?= url_is('guru') ? 'active' : '' ?>">Dashboard</a>
            <a href="/guru/courses" class="<?= url_is('guru/courses*') ? 'active' : '' ?>">Mata Pelajaran</a>
            <a href="/guru/create" class="<?= url_is('guru/create') ? 'active' : '' ?>">Materi</a>
        </nav>
    </aside>

    <!-- MAIN -->
    <div class="guru-main">

        <!-- TOPBAR -->
        <header class="guru-topbar">
            <div class="title">
                Halo, <?= session()->get('name') ?>
            </div>
            <a href="/logout">Logout</a>
        </header>

        <!-- CONTENT -->
        <main class="guru-content">
            <?= $this->renderSection('content') ?>
        </main>

    </div>

</div>

</body>
</html>
