<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- HERO -->
<section class="home-hero">
    <h1>Materi Pembelajaran SMK</h1>
    <p>
        Kumpulan mata pelajaran produktif, adaptif, dan normatif<br>
        untuk guru dan siswa SMK.
    </p>

    <a href="/courses" class="btn-primary">
        Lihat Semua Mata Pelajaran
    </a>
</section>

<!-- KATEGORI -->
<section class="home-categories">
    <a href="/courses?category=produktif" class="category-card produktif">
        <h3>Produktif</h3>
        <p>Mata pelajaran kejuruan</p>
        <span class="category-action">Lihat →</span>
    </a>

    <a href="/courses?category=adaptif" class="category-card adaptif">
        <h3>Adaptif</h3>
        <p>Penunjang kompetensi</p>
        <span class="category-action">Lihat →</span>
    </a>

    <a href="/courses?category=normatif" class="category-card normatif">
        <h3>Normatif</h3>
        <p>Pendidikan umum</p>
        <span class="category-action">Lihat →</span>
    </a>
</section>

<!-- PREVIEW COURSE -->
<section class="home-courses">
    <div class="section-header">
        <h2>Mata Pelajaran Tersedia</h2>
        <a href="/courses">Lihat semua →</a>
    </div>

    <div class="course-grid">
        <?php foreach ($courses as $course): ?>
            <div class="course-card">
                <div class="thumbnail">
                    <img
                        src="<?= esc($course['thumbnail'] ?: '/img/default-course.png') ?>"
                        alt=""
                    >
                    <span class="badge badge-<?= esc($course['category']) ?>">
                        <?= ucfirst($course['category']) ?>
                    </span>
                </div>

                <div class="course-body">
                    <h3><?= esc($course['title']) ?></h3>
                    <a href="/courses/<?= $course['id_course'] ?>">
                        Lihat Materi
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?= $this->endSection() ?>
