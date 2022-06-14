<div class="carteAdmin">
    <div class="carteAdminEntete">
        <h1>Modif acquis</h1>
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

        <p>Projet : <strong><?php echo $donneesCompetences['projet'] ?></strong></p>
        <p>Activite : <strong><?php echo $donneesCompetences['activite'] ?></strong></p>
        <p>Compétence : <strong><?php echo $donneesCompetences['competence'] ?></strong></p>

        <form action="#" method="post">

            <input type="hidden" name="projetId" value="<?php echo $donneesCompetences['id_projet']; ?>">
            <input type="hidden" name="activiteId" value="<?php echo $donneesCompetences['id_activite']; ?>">
            <input type="hidden" name="competenceId" value="<?php echo $donneesCompetences['id_competence']; ?>">

            <label for="contenu">Contenu :</label>
            <textarea name="contenu" id="editor1" rows="10" cols="80"><?php echo $donneesCompetences['description'] ?></textarea><br/>

            <input class="bouton btnPost" type="submit">
        </form>

    </div>
</div>
<script src="./node_modules/ckeditor4/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor1' );
</script>
