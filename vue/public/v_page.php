<article class="page">
    <h2><?= $page->getTitre(); ?></h2>
    <?= html_entity_decode($page->getContenu()); ?>
</article>
