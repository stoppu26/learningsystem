<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'Autentikasi') ?></title>

    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/auth.css">
</head>
<body>

<main>
    <?= $this->renderSection('content') ?>
</main>

</body>
</html>
