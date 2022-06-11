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

<div class="carte">
    <div class="carteEntete">
        <h1>Modif projet</h1>
    </div>
    <div class="carteContent">

        <form action="#" enctype="multipart/form-data" method="post">
            <label for="titreProjet">Titre :</label>
            <input type="text" name="titreProjet" value="<?php echo $projet->getTitre(); ?>" required><br/>

            <label for="logoProjet">Logo :</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
            <input id="logoProjet" type="hidden" name="logoProjet">
            <input type="file" accept="image/png, image/jpeg" onchange="upload(this, 'logo')"></br>


            <label for="logoProjet">Image :</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
            <input id="imageProjet" type="hidden" name="imageProjet">
            <input type="file" accept="image/png, image/jpeg" onchange="upload(this, 'image')"></br>

            <label for="lieuProjet">Lieu :</label>
            <input type="text" name="lieuProjet" value="<?php echo $projet->getLieu(); ?>"  required><br/>

            <label for="orgaProjet">Organisation :</label>
            <input type="text" name="orgaProjet" value="<?php echo $projet->getOrganisation(); ?>" required><br/>

            <label for="anneeProjet">Année :</label>
            <input type="text" name="anneeProjet" value="<?php echo $projet->getAnnee(); ?>" required><br/>

            <label for="contexteProjet">Contexte :</label>
            <textarea name="contexteProjet" id="editor1" rows="10" cols="80"><?php echo $projet->getContexte(); ?></textarea><br/>

            <div class="multiInput">
                <label for="technoProjet">Technologies :</label>

                <div id="boiteInputs">
                    <?php
                    if(!empty($lesTechnologies)) :
                        foreach ($lesTechnologies as $technologie): ?>
                            <input type="text" name="technoProjet[]" id="premierInput" value="<?php echo $technologie; ?>"></br>
                        <?php
                        endforeach;
                    else :
                        ?>
                        <input type="text" name="technoProjet[]" id="premierInput">
                    <?php endif; ?>

                </div>
                <input type="button" class="btnInput" onclick="addInput()" value="+"/>
            </div>

            <div class="multiInput">
                <label for="technoProjet">Liens :</label>

                <div id="boiteInputs">
                    <?php
                    if(!empty($lesLiens)) :
                        foreach ($lesLiens as $lien):
                        $compteur =+ 1;
                    ?>
                            <input type="text" name="liensProjet[<?= $compteur ?>]['intitule']" id="premierInput" value="<?php echo $lien->intitule; ?>">
                            <input type="text" name="liensProjet[<?= $compteur ?>]['url']" id="premierInput" value="<?php echo $lien->url; ?>"></br>
                    <?php
                        endforeach;
                    else :
                    ?>
                        <input type="text" name="liensProjet[0]['intitule']" id="premierInput">
                        <input type="text" name="liensProjet[0]['url']" id="premierInput"></br>
                    <?php endif; ?>

                </div>
                <input type="button" class="btnInput" onclick="addInput()" value="+"/>
            </div>

            <input class="bouton btnPost" type="submit">
        </form>

    </div>
</div>
<script src="./node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="./node_modules/ckeditor4/ckeditor.js"></script>
<script src="./assets/js/ajax/admin/upload.js"></script>
<script src="./assets/js/formulaire.js"></script>
<script>
    CKEDITOR.replace( 'editor1' );
</script>
