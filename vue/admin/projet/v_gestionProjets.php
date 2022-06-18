<div class="carteAdmin">
    <div class="carteAdminEntete">
        <h1>Gestion projets</h1>
    </div>
    <div class="carteContent">

        <table id="tableauGestion" class="tableauGestion">
            <thead class="tableauGestion_entete">

            <th class="tableauGestion_titre">Id</th>
            <th class="tableauGestion_titre">Titre</th>
            <th class="tableauGestion_titre">Création</th>
            <th class="tableauGestion_titre">Modification</th>

            </thead>
            <tbody>

            <?php foreach ($lesProjets as $unProjet):?>
                <tr>
                    <td class="tableauGestion_contenu"><?php echo $unProjet['id'] ?></td>
                    <td class="tableauGestion_contenu"><?php echo $unProjet['titre'] ?></td>
                    <td class="tableauGestion_contenu"><?= date("d/m/Y H:i", strtotime($unProjet['dateCreation'])) ?></td>
                    <td class="tableauGestion_contenu"><?= ($unProjet['dateModification'] != null) ? date("d/m/Y H:i", strtotime($unProjet['dateModification'])) : "Jamais" ?></td>
                    <td class="tableauGestion_contenu listeBouton">
                        <a class="btnAdmin btnEditer" href="?admin=editeProjet&id=<?php echo $unProjet['id'] ?>">
                            <i class="las la-edit"></i>
                            Editer
                        </a>

                        <button class="btnAdmin btnSuppr" onclick="suppression(<?php echo $unProjet['id'] ?>,'projet')">
                            <i class="las la-trash"></i>
                            Supprimer
                        </button>

                    </td>
                </tr>
            <?php endforeach;?>

            </tbody>
        </table>
    </div>
</div>
<script src="./node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
<script src="./assets/js/ajax/admin/suppression.js"></script>

