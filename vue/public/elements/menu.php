<nav class="menuPrincipal">
    <ul>
        <?php foreach ($liens as $lien): ?>
        <li>
            <a class="bouton" href="?page=<?= $lien['cle'] ?>">
                <i class="<?= $lien['icone'] ?>"></i>
                <?= ucwords($lien['cle']) ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</nav>
</header>
<div class="contenuGlobal">