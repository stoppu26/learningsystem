<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'SMK Bisa') ?></title>

    <!-- CSS global -->
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/layout.css">
    <link rel="stylesheet" href="/css/course.css">
</head>
<body>

<?= $this->include('layouts/header') ?>

<main class="container">
    <?= $this->renderSection('content') ?>
</main>

<?= $this->include('layouts/footer') ?>

</body>
</html>
