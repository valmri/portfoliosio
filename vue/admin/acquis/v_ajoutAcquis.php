<div class="carteAdmin">
    <div class="carteAdminEntete">
        <h1 id="test">Ajout acquis</h1>
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

        <form action="#" method="post">
            <label for="projetId">Projet :</label>
            <select class="inputSpe" name="projetId" id="projetSelect" required>
                <?php foreach ($lesProjets as $leProjet): ?>
                    <option value="<?php echo $leProjet['id']; ?>"><?php echo $leProjet['titre']; ?></option>
                <?php endforeach; ?>
            </select><br/>

            <label for="activiteId">Activite :</label>
            <select class="inputSpe" name="activiteId" id="activiteSelect" required>
                <?php foreach ($lesActivites as $uneActivite): ?>
                    <option value="<?php echo $uneActivite['id']; ?>"><?php echo $uneActivite['intitule']; ?></option>
                <?php endforeach; ?>
            </select><br/>

            <label for="competenceId">Competence :</label>
            <select class="inputSpe" name="competenceId" id="competenceSelect" required>


                <?php foreach($lesCompetences as $uneCompetence) : ?>
                    <option value="<?php echo $uneCompetence['id']; ?>"><?php echo $uneCompetence['intitule']; ?></option>
                <?php endforeach; ?>

            </select><br/>

            <label for="contenu">Contenu :</label>
            <textarea name="contenu" id="editor1" rows="10" cols="80"></textarea><br/>

            <button class="btnAdmin btnPost" type="submit">
                <i class="las la-save"></i>
                Publier
            </button>

        </form>

    </div>
</div>
<script src="./assets/js/ajax/admin/competences.js"></script>
<script src="./node_modules/ckeditor4/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor1' );
</script>
