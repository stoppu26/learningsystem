<nav class="pagination-wrapper">
    <ul class="pagination">

        <?php if ($pager->hasPrevious()): ?>
            <li class="page-item">
                <a href="<?= $pager->getPrevious() ?>" class="page-link">
                    ← Sebelumnya
                </a>
            </li>
        <?php endif; ?>

        <?php foreach ($pager->links() as $link): ?>
            <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                <a href="<?= $link['uri'] ?>" class="page-link">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach; ?>

        <?php if ($pager->hasNext()): ?>
            <li class="page-item">
                <a href="<?= $pager->getNext() ?>" class="page-link">
                    Selanjutnya →
                </a>
            </li>
        <?php endif; ?>

    </ul>
</nav>
