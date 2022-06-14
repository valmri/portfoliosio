<div class="carteAdmin">
    <div class="carteAdminEntete">
        <h1>Éditeur de page</h1>
    </div>

    <?php if(isset($msgErreur)):?>
        <div class="boiteMessage msgErreur">
            <i class="las la-exclamation-triangle"></i>
            <p><?php echo $msgErreur; ?></p>
        </div>
    <?php endif; ?>

    <?php if(isset($msgInfo)):?>
        <div class="boiteMessage msgInfo">
            <i class="las la-info-circle"></i>
            <p><?php echo $msgInfo; ?></p>
        </div>
    <?php endif; ?>

    <div class="carteContent">

        <form class="formEditer" action="#" method="post">

            <div class="editeur">
                <label for="titrePage">Titre :</label>
                <input class="inputTitre" type="text" id="titrePage" name="titrePage" value="<?php echo $page->getTitre()?>" placeholder="titre" required><br/>

                <label for="editor1">Contenu :</label>
                <textarea name="contenuPage" id="editor1" rows="10" cols="80"><?php echo $page->getContenu()?></textarea><br/>
            </div>

            <div class="parametre">
                <div class="parametreEntete">
                    <h2>Paramètres</h2>
                </div>

                <label for="clePage">Page :</label><br/>
                <input type="text" id="clePage" name="clePage" value="<?php echo $page->getCle()?>" required><br/>

                <label for="iconePage">Icône :</label><br/>
                <input type="text" id="iconePage" name="iconePage" value="<?php echo $page->getIcone()?>" required><br/>

                <button class="btnAdmin btnPost" type="submit">
                    <i class="las la-save"></i>
                    Publier
                </button>

            </div>
        </form>

    </div>
</div>
<script src="../../../node_modules/ckeditor4/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor1' );
</script>
