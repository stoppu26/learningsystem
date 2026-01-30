<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Admin Panel' ?></title>
    <link rel="stylesheet" href="/css/admin.css">
</head>
<body>

<div class="admin-layout">

    <!-- SIDEBAR -->
    <aside class="admin-sidebar">
        <h2>Admin Panel</h2>

        <nav class="admin-menu">
            <a href="/admin" class="<?= service('uri')->getPath()=='admin'?'active':'' ?>">
                Dashboard
            </a>
            <a href="/admin/guru-pending">
                Guru Pending
            </a>
            <a href="/admin/users">
                User
            </a>
            <a href="/admin/setting">
                Pengaturan
            </a>
        </nav>
    </aside>

    <!-- MAIN -->
    <div class="admin-main">

        <!-- TOPBAR -->
        <header class="admin-topbar">
            <div class="title">
                <?= $title ?? '' ?>
            </div>
            <a href="/logout">Logout</a>
        </header>

        <!-- CONTENT -->
        <main class="admin-content">
            <?= $this->renderSection('content') ?>
        </main>

    </div>

</div>

</body>
</html>
