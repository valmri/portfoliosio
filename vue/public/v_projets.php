<div class="carte">
    <div class="carteEntete carteTitre">
        <h1>Mes projets</h1>
    </div>

    <?php
    $ligne = 1;
    foreach ($lesProjets as $leProjet):
        ?>
        <?php if ($ligne === 1): ?>
        <div class="ensemble">
    <?php endif; ?>

        <div class="carte">
        <?php if(!empty($leProjet['logo'])) : ?>
        <div class="carteEntete carteImgProjet">
            <img src="./assets/img/projets/<?php echo $leProjet['logo'] ?>"
                 alt="<?php echo $leProjet['organisation'] ?>"
                 width="50%">
        </div>
        <?php endif; ?>
        <div class="carteContent">
            <h2><?php echo $leProjet['titre'] ?></h2>

            <ul class="listeDesciption">
                <li>
                    <i class="las la-map-pin"></i>
                    <?php echo $leProjet['lieu'] ?> - <?php echo $leProjet['organisation'] ?>
                </li>
                <li>
                    <i class="las la-calendar"></i>
                    <?php echo $leProjet['annee'] ?>
                </li>
            </ul>

            <a class="bouton" href="?page=projet&id=<?php echo $leProjet['id'] ?>">
                <i class="las la-plus"></i>
                Voir plus
            </a>

        </div>
        <?php $ligne++; ?>
        <?php if ($ligne === 3): ?>

        </div>
    <?php $ligne = 1; ?>


    <?php endif; ?>


        </div>
    <?php endforeach; ?>


</div>
</div>