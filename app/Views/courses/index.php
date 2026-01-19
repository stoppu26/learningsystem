<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mata Pelajaran</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            margin: 0;
            padding: 24px;
        }

        h1 {
            margin-bottom: 24px;
        }

        .course-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .course-card {
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
        }

        .course-card:hover {
            transform: translateY(-4px);
        }

        .course-card a {
            color: inherit;
        }

        .thumbnail {
            position: relative;
        }

        .thumbnail img {
            width: 100%;
            height: 160px;
            object-fit: cover;
        }

        .course-body {
            padding: 14px;
        }

        .course-body h3 {
            margin: 0 0 6px;
            font-size: 16px;
        }

        .course-body p {
            font-size: 14px;
            color: #6b7280;
        }

        .course-footer {
            padding: 12px 14px;
            border-top: 1px solid #e5e7eb;
            font-size: 13px;
        }

        .badge {
            position: absolute;
            top: 12px;
            left: 12px;
            padding: 4px 10px;
            font-size: 12px;
            border-radius: 999px;
            color: #fff;
            font-weight: 600;
        }

        /* Warna kategori */
        .badge-produktif {
            background: #2563eb; /* biru */
        }

        .badge-adaptif {
            background: #16a34a; /* hijau */
        }

        .badge-normatif {
            background: #f59e0b; /* oranye */
        }

        .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin: 40px 0;
    }

    .pagination {
        display: flex;
        list-style: none;
        gap: 8px;
        padding: 0;
    }

    .page-item {
        border-radius: 6px;
    }

    .page-link {
        display: block;
        padding: 8px 14px;
        text-decoration: none;
        border: 1px solid #ddd;
        color: #333;
        background: #fff;
    }

    .page-link:hover {
        background: #f3f4f6;
    }

    .page-item.active .page-link {
        background: #2563eb;
        color: #fff;
        border-color: #2563eb;
        font-weight: 600;
    }

    </style>
</head>
<body>
    <?= view('layout/header') ?>

    <h1>Daftar Mata Pelajaran</h1>

    <form method="get" style="margin-bottom:24px; display:flex; gap:12px;">
        <input 
            type="text" 
            name="q" 
            placeholder="Cari mata pelajaran..."
            value="<?= esc($q ?? '') ?>"

        >

        <select name="category">
            <option value="">Semua Jenis</option>
            <option value="produktif" <?= $category=='produktif'?'selected':'' ?>>Produktif</option>
            <option value="adaptif" <?= $category=='adaptif'?'selected':'' ?>>Adaptif</option>
            <option value="normatif" <?= $category=='normatif'?'selected':'' ?>>Normatif</option>
        </select>

        <button type="submit">Cari</button>
    </form>

    <?php if ($q): ?>
        <p style="margin-bottom:16px;">
            Hasil pencarian untuk <strong><?= esc($q) ?></strong>
        </p>
    <?php endif; ?>


    <?php if (empty($courses)): ?>
        <p>Belum ada mata pelajaran.</p>
    <?php else: ?>
    <div class="course-grid">
            <?php foreach ($courses as $course): ?>
                <div class="course-card">
                    <div class="thumbnail">
                        <?php
                        $thumb = $course['thumbnail']
                            ? $course['thumbnail']
                            : '/img/default-course.png';
                        ?>
                        <img src="<?= esc($thumb) ?>" alt="">
                        <span class="badge badge-<?= esc($course['category']) ?>">
                            <?= ucfirst($course['category']) ?>
                        </span>
                    </div>

                    <div class="content">
                        <h3><?= esc($course['title']) ?></h3>
                        <a href="/courses/<?= $course['id_course'] ?>" class="btn">
                            Lihat Materi
                        </a>
                    </div>
        </div>

            <?php endforeach; ?>
        </div>
        <div style="margin-top:32px;">
            <?php
                // Pertahankan query string (category)
                $pager->setPath('/courses');
            ?>
            <?= $pager->links('courses', 'course_pagination') ?>
        </div>
    <?php endif; ?>

    <?= view('layout/footer') ?>

</body>
</html>
