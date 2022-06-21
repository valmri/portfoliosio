<article class="page">

    <h2><?= $leProjet->getTitre() ?></h2>

    <div class="ensemble">

        <!-- Description -->
        <div class="projetGauche">

            <?php if(!empty($leProjet->getContexte())) : ?>
            <h3>Contexte :</h3>

            <?= htmlspecialchars_decode($leProjet->getContexte()) ?>

            <?php endif; ?>

            <?php if($leProjet->getTechnologies() !== 'null') : ?>
            <hr/>
            <h3>Technologies :</h3>
            <ul class="menuSocial">

                <?php foreach (json_decode($leProjet->getTechnologies()) as $technologie) : ?>
                    <?php echo '<li>'.$technologie.'</i>' ?>
                <?php endforeach; ?>

            </ul>
            <?php endif; ?>

            <?php if($leProjet->getLiens() !== 'null'): ?>
            <hr/>
            <h3>Liens :</h3>

            <?php foreach (json_decode($leProjet->getLiens()) as $unLien): ?>

                <a class="bouton" href="<?= $unLien->url;?>" target="_blank"><?= $unLien->intitule;?></a>

            <?php endforeach; ?>


            <?php endif; ?>

        </div>

        <div class="projetDroite">

            <?php if($leProjet->getImage() !== 'null'): ?>
            <h3>Visualisation :</h3>

            <img src="./assets/img/projets/<?php echo $leProjet->getImage() ?>" alt="<?php echo $leProjet->getImage() ?>" width="50%">

            <?php endif; ?>

            <?php if(count($tableauAcquis) > 0): ?>
            <hr/>
            <h3>Compétences :</h3>

            <?php
            $idCompteur = 0;

            foreach($tableauAcquis as $unAcqui):

                ?>

                <div class="competenceEntete">
                    <h3><?php echo $unAcqui['intitule_activite']; ?></h3>
                </div>

                <div class="competenceContenu">

                    <?php foreach ($unAcqui['intitule_competence'] as $uneCompetence) :?>

                        <div>
                            <h4><?php echo $uneCompetence['intitule_competence']; ?></h4>
                        </div>
                        <div>
                            <?php echo htmlspecialchars_decode($uneCompetence['acquis']); ?>
                        </div>

                    <?php endforeach; ?>

                </div>

            <?php endforeach; ?>
            <?php endif; ?>
        </div>

    </div>

</article>