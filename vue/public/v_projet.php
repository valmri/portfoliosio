<div class="carte">
    <div class="carteEntete carteTitre">
        <h1><?= $leProjet->getTitre() ?></h1>
    </div>

    <div class="carteConteneur">

        <!-- Description -->
        <div class="carte carteDesc">
            <div class="carteContent carteSeule">

                <h2>Contexte :</h2>

                <?php echo htmlspecialchars_decode($leProjet->getContexte()) ?>

                <hr>

                <h2>Technologies :</h2>
                <ul class="menuSocial">

                    <?php foreach (json_decode($leProjet->getTechnologies()) as $technologie) : ?>
                        <?php echo '<li>'.$technologie.'</i>' ?>
                    <?php endforeach; ?>

                </ul>

                <?php if($leProjet->getLiens() !== null): ?>
                    <hr>

                    <h2>Liens :</h2>

                    <?php foreach (json_decode($leProjet->getLiens()) as $unLien): ?>

                        <a class="bouton" href="<?= $unLien->url;?>" target="_blank"><?= $unLien->intitule;?></a>

                    <?php endforeach; ?>


                <?php endif; ?>

            </div>
        </div>

        <!-- Compétences -->
        <div class="carte carteCompetences">

            <div class="carteContent carteSeule">
                <h2>Visualisation :</h2>

                <figure class="imagePrevi">
                    <img src="./assets/img/projets/<?php echo $leProjet->getImage() ?>.png" alt="<?php echo $leProjet->getImage() ?>">
                </figure>

                <hr>

                <h2>Compétences :</h2>

                <?php
                $idCompteur = 0;

                foreach($tableauAcquis as $unAcqui):

                    ?>

                    <div id="entete<?php echo $idCompteur; ?>" class="espace" onclick="init('entete<?php echo $idCompteur; ?>', 'chevron<?php echo $idCompteur; ?>', 'body<?php echo $idCompteur; ?>')">
                        <div class="entete<?php echo $idCompteur; ?>">
                            <i class="fas fa-map-marker-alt"></i>
                            <h3><?php echo $unAcqui['intitule_activite']; ?></h3>
                        </div>
                        <i id="chevron<?php echo $idCompteur; ?>" class="las la-chevron-down"></i>
                    </div>



                    <div id="body<?php echo $idCompteur; ?>" class="listeMateriel">


                        <?php foreach ($unAcqui['intitule_competence'] as $uneCompetence) :?>

                            <?php $idCompteur++; ?>
                            <div id="entete<?php echo $idCompteur; ?>" class="unMateriel" onclick="init('entete<?php echo $idCompteur; ?>', 'chevron<?php echo $idCompteur; ?>', 'body<?php echo $idCompteur; ?>')">
                                <div class="entete<?php echo $idCompteur; ?>">
                                    <i class="fas fa-door-closed"></i>
                                    <h4><?php echo $uneCompetence['intitule_competence']; ?></h4>
                                </div>
                                <i id="chevron<?php echo $idCompteur; ?>" class="las la-chevron-down"></i>
                            </div>
                            <div id="body<?php echo $idCompteur; ?>" class="infoMateriel">

                                <?php echo htmlspecialchars_decode($uneCompetence['acquis']); ?>

                            </div>

                        <?php endforeach; ?>


                    </div>


                    <?php
                    $idCompteur++;
                    ?>
                <?php endforeach; ?>

            </div>

        </div>

    </div>

</div>