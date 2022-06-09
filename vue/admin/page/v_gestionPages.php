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

            <?php foreach ($lesPages as $page):?>
                <tr>
                    <td class="tableauGestion_contenu"><?php echo $page['id'] ?></td>
                    <td class="tableauGestion_contenu"><?php echo $page['titre'] ?></td>
                    <td class="tableauGestion_contenu"><?php echo $page['cle'] ?></td>
                    <td class="tableauGestion_contenu listeBouton">
                        <a class="boutonBarreAdmin" href="?admin=editePage&id=<?php echo $page['id'] ?>">
                            <i class="las la-edit"></i>
                            Editer
                        </a>

                        <button class="boutonBarreAdmin" onclick="suppression(<?php echo $page['id'] ?>,'page')">
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
<script src="../../../node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
<script src="../../../assets/js/ajax/admin/suppression.js"></script>

