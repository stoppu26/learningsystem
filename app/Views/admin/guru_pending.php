<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="admin-card">
    <h3>Daftar Guru Menunggu Persetujuan</h3>
    <p>Guru di bawah ini belum dapat mengakses fitur mengajar.</p>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="admin-card" style="background:#ecfeff;color:#0369a1;">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="admin-card">

<?php if (empty($teachers)): ?>
    <p>Tidak ada guru yang menunggu persetujuan.</p>
<?php else: ?>

<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Tanggal Daftar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($teachers as $teacher): ?>
            <tr>
                <td><?= esc($teacher['name']) ?></td>
                <td><?= esc($teacher['email']) ?></td>
                <td><?= esc($teacher['created_at']) ?></td>
                <td>
                    <a 
                        href="/admin/guru-approve/<?= $teacher['id'] ?>" 
                        class="btn btn-approve"
                        onclick="return confirm('Setujui guru ini?')"
                    >
                        Setujui
                    </a>

                    <a 
                        href="/admin/guru-reject/<?= $teacher['id'] ?>" 
                        class="btn btn-reject"
                        onclick="return confirm('Tolak guru ini?')"
                    >
                        Tolak
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php endif; ?>

</div>

<?= $this->endSection() ?>
