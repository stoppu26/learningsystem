<?= $this->extend('guru/layout') ?>
<?= $this->section('content') ?>

<h2>Tambah Materi</h2>

<div class="card-form">

<form action="/guru/store" method="post" enctype="multipart/form-data">
    <select name="course_id">
        <?php foreach ($courses as $course): ?>
            <option value="<?= $course['id_course'] ?>">
                <?= $course['title'] ?>
            </option>
        <?php endforeach; ?>
    </select>



    <div class="form-group">
        <label>Judul Materi</label>
        <input type="text" name="title" required>
    </div>

    <div class="form-group">
        <label>Tipe Materi</label>
        <select name="type">
            <option value="video">Video</option>
            <option value="file">File</option>
        </select>
    </div>

    <div class="form-group">
        <label>Upload File (ZIP / PDF)</label>
        <input type="file" name="file">
        <small>Untuk ZIP: harus berisi index.html</small>
    </div>

    <div class="form-group">
        <label>Atau Link (YouTube / URL)</label>
        <input type="text" name="content_url">
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">Simpan Materi</button>
    </div>

</form>
</div>

<?= $this->endSection() ?>
