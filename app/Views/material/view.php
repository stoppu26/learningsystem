<h2><?= esc($material['title']) ?></h2>

<?php if ($material['type'] === 'zip'): ?>
    <iframe 
        src="/<?= $material['content_url'] ?>" 
        width="100%" 
        height="600" 
        style="border:none">
    </iframe>
<?php endif; ?>

<?php if ($material['type'] === 'video'): ?>
    <iframe 
        src="https://www.youtube.com/embed/<?= extractId($material['content_url']) ?>" 
        width="100%" 
        height="400">
    </iframe>
<?php endif; ?>

<?php if ($material['type'] === 'pdf'): ?>
    <iframe 
        src="/<?= $material['content_url'] ?>" 
        width="100%" 
        height="600">
    </iframe>
<?php endif; ?>
