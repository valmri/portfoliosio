<div class="carteAdmin">
    <div class="carteAdminEntete">
        <h1>Gestion des acquis</h1>
    </div>
    <div class="carteContent">

        <table id="tableauGestion" class="tableauGestion">
            <thead class="tableauGestion_entete">

            <th class="tableauGestion_titre">Id</th>
            <th class="tableauGestion_titre">Projet</th>
            <th class="tableauGestion_titre">Activite</th>
            <th class="tableauGestion_titre">Compétence</th>

            </thead>
            <tbody>

            <?php
            $compteur = 1;
            foreach ($lesCompetences as $uneCompetence):
            ?>
                <tr>
                    <td class="tableauGestion_contenu"><?php echo $compteur ?></td>
                    <td class="tableauGestion_contenu"><?php echo $uneCompetence['projet'] ?></td>
                    <td class="tableauGestion_contenu"><?php echo $uneCompetence['activite'] ?></td>
                    <td class="tableauGestion_contenu"><?php echo $uneCompetence['competence'] ?></td>
                    <td class="tableauGestion_contenu listeBouton">
                        <a class="btnAdmin btnEditer" href="?admin=editeAcquis&p=<?php echo $uneCompetence['id_projet'] ?>&c=<?php echo $uneCompetence['id_competence'] ?>">
                            <i class="las la-edit"></i>
                            Editer
                        </a>

                        <button class="btnAdmin btnSuppr" onclick="suppressionAcquis(<?= $compteur ?>,<?php echo $uneCompetence['id_projet'] ?>,<?php echo $uneCompetence['id_competence'] ?>)">
                            <i class="las la-trash"></i>
                            Supprimer
                        </button>

                    </td>
                </tr>
            <?php
            $compteur++;
            endforeach;
            ?>

            </tbody>
        </table>
    </div>
</div>
<script src="./node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
<script src="./assets/js/ajax/admin/suppression.js"></script>

