<nav class="menu">

    <div class="menu__web">

        <?php foreach ($liens as $lien): ?>

            <a class="bouton" href="?page=<?= $lien['cle'] ?>">
                <i class="<?= $lien['icone'] ?>"></i>
                <?= ucwords($lien['cle']) ?>
            </a>

        <?php endforeach; ?>

    </div>

    <div class="menu__resp">

        <div class="menu__resp-header">

            <button id="menu__resp-bouton" class="bouton menu__resp-bouton">

                <i class="las la-bars"></i>

            </button>

        </div>

        <div id="menu__resp-body" class="menu__resp-body">

            <?php foreach ($liens as $lien): ?>

                <a class="bouton" href="?page=<?= $lien['cle'] ?>">
                    <i class="<?= $lien['icone'] ?>"></i>
                    <?= ucwords($lien['cle']) ?>
                </a>

            <?php endforeach; ?>

        </div>

    </div>

</nav>
<main class="contenu">