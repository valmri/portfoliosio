<div class="carte">
    <div class="carteEntete">
        <h1>Gestion pages</h1>
    </div>
    <div class="carteContent">

        <table id="tableauGestion" class="tableauGestion">
            <thead class="tableauGestion_entete">

            <th class="tableauGestion_titre">Id</th>
            <th class="tableauGestion_titre">Nom</th>
            <th class="tableauGestion_titre">Page</th>
            <th class="tableauGestion_titre">Gestion</th>

            </thead>
            <tbody>

            <?php foreach ($lesPages as $unepage):?>
                <tr>
                    <td class="tableauGestion_contenu"><?php echo $unepage['id'] ?></td>
                    <td class="tableauGestion_contenu"><?php echo $unepage['titre'] ?></td>
                    <td class="tableauGestion_contenu"><?php echo $unepage['cle'] ?></td>
                    <td class="tableauGestion_contenu listeBouton">
                        <a class="boutonBarreAdmin" href="?admin=modifPage&id=<?php echo $unepage['id'] ?>">
                            <i class="las la-edit"></i>
                            Editer
                        </a>

                        <a class="boutonBarreAdmin" onclick="requeteSupprContenu(<?php echo $unepage['id'] ?>,'page')">
                            <i class="las la-trash"></i>
                            Supprimer
                        </a>

                    </td>
                </tr>
            <?php endforeach;?>

            </tbody>
        </table>
    </div>
</div>
<script src="./node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="./assets/js/ajax/supprContenu.js"></script>

