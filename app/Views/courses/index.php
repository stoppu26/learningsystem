<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h1>Daftar Mata Pelajaran</h1>

<form method="get" class="filter-bar">
    <input
        type="text"
        name="q"
        placeholder="Cari mata pelajaran..."
        value="<?= esc($q ?? '') ?>"
        class="filter-input"
    >

    <select name="category" class="filter-select">
        <option value="">Semua Jenis</option>
        <option value="produktif" <?= $category=='produktif'?'selected':'' ?>>Produktif</option>
        <option value="adaptif" <?= $category=='adaptif'?'selected':'' ?>>Adaptif</option>
        <option value="normatif" <?= $category=='normatif'?'selected':'' ?>>Normatif</option>
    </select>

    <button type="submit" class="filter-button">Cari</button>
</form>

<?php if ($total > 0): ?>
    <div class="result-badge">
        Menampilkan <strong><?= count($courses) ?></strong>
        dari <strong><?= $total ?></strong> mata pelajaran
    </div>
<?php endif; ?>

<div class="course-grid">
<?php foreach ($courses as $course): ?>
    <div class="course-card">
        <div class="thumbnail">
            <img src="<?= esc($course['thumbnail'] ?: '/img/default-course.png') ?>">
            <span class="badge badge-<?= esc($course['category']) ?>">
                <?= ucfirst($course['category']) ?>
            </span>
        </div>

        <div class="course-body">
            <h3><?= esc($course['title']) ?></h3>
            <a href="/courses/<?= $course['id_course'] ?>">Lihat Materi</a>
        </div>
    </div>
<?php endforeach ?>
</div>

<div class="pagination-wrapper">
    <?= $pager->links('courses', 'course_pagination') ?>
</div>

<?= $this->endSection() ?>
