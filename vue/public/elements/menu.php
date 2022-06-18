<nav class="menu">

    <?php foreach ($liens as $lien): ?>

    <a class="bouton" href="?page=<?= $lien['cle'] ?>">
        <i class="<?= $lien['icone'] ?>"></i>
        <?= ucwords($lien['cle']) ?>
    </a>

    <?php endforeach; ?>

</nav>
<main class="contenu">