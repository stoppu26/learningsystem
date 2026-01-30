<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="admin-card">
    <h3>Kelola User</h3>
</div>

<div class="admin-card">
    <table width="100%" cellpadding="10" cellspacing="0">
        <thead>
            <tr style="background:#f3f4f6;">
                <th align="left">Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

        <?php foreach ($users as $u): ?>
            <tr>
                <td><?= esc($u['name']) ?></td>
                <td><?= esc($u['email']) ?></td>
                <td>
                    <span class="badge">
                        <?= ucfirst($u['role']) ?>
                    </span>
                </td>
                <td>
                    <span class="badge badge-<?= $u['status'] ?>">
                        <?= ucfirst($u['status']) ?>
                    </span>
                </td>
                <td>
                    <?php if ($u['status'] !== 'active'): ?>
                        <a href="/admin/user/status/<?= $u['id'] ?>/active"
                           class="btn btn-approve">Aktifkan</a>
                    <?php endif; ?>

                    <?php if ($u['status'] !== 'blocked'): ?>
                        <a href="/admin/user/status/<?= $u['id'] ?>/blocked"
                           class="btn btn-reject">Blokir</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach ?>

        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
