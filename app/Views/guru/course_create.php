<?= $this->extend('guru/layout') ?>
<?= $this->section('content') ?>

<h2 class="page-title">Tambah Mata Pelajaran</h2>

<div class="card-form">
    <form action="/guru/courses/store" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label>Nama Mata Pelajaran</label>
            <input type="text" name="title" required>
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" rows="4"></textarea>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Kelas</label>
                <input type="text" name="kelas">
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="category">
            </div>
        </div>

        <div class="form-group">
            <label>Thumbnail</label>
            <input type="file" name="thumbnail">
        </div>

        <div class="form-actions">
            <a href="/guru/courses" class="btn-secondary">Batal</a>
            <button type="submit" class="btn-primary">Simpan</button>
        </div>

    </form>
</div>

<?= $this->endSection() ?>
