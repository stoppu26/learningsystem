<!DOCTYPE html>
<html>
<head>
    <title><?= esc($course['title']) ?></title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            padding: 24px;
        }

        a {
            text-decoration: none;
        }

        .course-header {
            margin-bottom: 24px;
        }

        .material-list {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.06);
            overflow: hidden;
        }

        .material-item {
            display: flex;
            align-items: center;
            padding: 16px;
            border-bottom: 1px solid #e5e7eb;
        }

        .material-item:last-child {
            border-bottom: none;
        }

        .material-icon {
            font-size: 24px;
            margin-right: 16px;
            width: 32px;
            text-align: center;
        }

        .material-content {
            flex: 1;
        }

        .material-title {
            font-weight: bold;
            margin-bottom: 4px;
            color: #1f2937;
        }

        .material-meta {
            font-size: 13px;
            color: #6b7280;
        }

        .material-action a {
            background: #2563eb;
            color: #ffffff;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 13px;
        }

        .material-action a:hover {
            background: #1d4ed8;
        }
    </style>
</head>
<body>

<a href="/courses">← Kembali ke daftar</a>

<div class="course-header">
    <h1><?= esc($course['title']) ?></h1>
    <p><?= esc($course['description']) ?></p>
</div>

<h2>Daftar Materi</h2>

<?php if (empty($materials)): ?>
    <p>Belum ada materi.</p>
<?php else: ?>
    <div class="material-list">
        <?php foreach ($materials as $materi): ?>

            <?php
                // Tentukan ikon & label berdasarkan tipe
                switch ($materi['type']) {
                    case 'youtube':
                        $icon = '🎬';
                        $label = 'Video · YouTube';
                        $action = 'Tonton';
                        break;
                    case 'wordwall':
                        $icon = '🧩';
                        $label = 'Latihan · Wordwall';
                        $action = 'Mulai';
                        break;
                    case 'canva':
                        $icon = '📄';
                        $label = 'Materi · Canva';
                        $action = 'Buka';
                        break;
                    default:
                        $icon = '📚';
                        $label = 'Materi';
                        $action = 'Buka';
                }
            ?>

            <div class="material-item">
                <div class="material-icon">
                    <?= $icon ?>
                </div>

                <div class="material-content">
                    <div class="material-title">
                        <?= esc($materi['title']) ?>
                    </div>
                    <div class="material-meta">
                        <?= $label ?>
                    </div>
                </div>

                <div class="material-action">
                    <a href="<?= esc($materi['content_url']) ?>" target="_blank">
                        <?= $action ?>
                    </a>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
<?php endif; ?>

</body>
</html>
