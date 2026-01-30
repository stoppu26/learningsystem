<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<h1 class="page-title">Dashboard Admin</h1>

<div class="stat-grid">
    <div class="stat-card blue">
        <div class="stat-icon">👥</div>
        <div class="stat-info">
            <h2><?= $totalUser ?? 0 ?></h2>
            <p>Total User</p>
        </div>
    </div>

    <div class="stat-card orange">
        <div class="stat-icon">⏳</div>
        <div class="stat-info">
            <h2><?= $guruPending ?? 0 ?></h2>
            <p>Guru Pending</p>
        </div>
    </div>

    <div class="stat-card green">
        <div class="stat-icon">📚</div>
        <div class="stat-info">
            <h2><?= $totalCourse ?? 0 ?></h2>
            <p>Total Course</p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
