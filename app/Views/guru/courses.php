<?= $this->extend('guru/layout') ?>
<?= $this->section('content') ?>

<h2>Mata Pelajaran</h2>

<div class="table-header">
    <form method="get" class="search-form">
        <input 
            type="text" 
            name="q" 
            placeholder="Cari mata pelajaran..."
            value="<?= esc($q ?? '') ?>"
        >
    </form>

    <a href="/guru/courses/create" class="btn-primary">
        Tambah Mata Pelajaran
    </a>
</div>


<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Kategori</th>
            <th>Thumbnail</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($courses as $i => $c): ?>
        <tr>
            <td><?= $i+1 ?></td>
            <td><?= esc($c['title']) ?></td>
            <td><?= esc($c['kelas']) ?></td>
            <td><?= ucfirst($c['category']) ?></td>
            <td>
                <?php if ($c['thumbnail']): ?>
                    <img src="<?= $c['thumbnail'] ?>" width="50">
                <?php endif ?>
            </td>
            <td>
                <a href="/guru/<?= $c['id_course'] ?>/edit">Edit</a> |
                <a href="/guru/courses/delete/<?= $c['id_course'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection() ?>
