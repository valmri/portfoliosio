<menu class="carte menu">
    <ul class="menuPrincipal">
        <li>
            <?php foreach ($liens as $lien): ?>
            <a class="boutonMenu" href="?page=<?= $lien['cle'] ?>">
                <i class="<?= $lien['icone'] ?>"></i>
                <?= ucwords($lien['cle']) ?>
            </a>
            <?php endforeach; ?>
        </li>
    </ul>
</menu>