<div class="carteAdmin">
    <div class="carteAdminEntete">
        <h1>Éditeur de projet</h1>
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

        <form class="formEditer" action="#" enctype="multipart/form-data" method="post">

            <div class="editeur">

                <label for="titreProjet">Titre :</label><br/>
                <input class="inputTitre" type="text" id="titreProjet" name="titreProjet" value="<?php echo $projet->getTitre(); ?>" required><br/>

                <label for="contexteProjet">Contexte :</label>
                <textarea name="contexteProjet" id="editor1" rows="10" cols="80"><?php echo $projet->getContexte(); ?></textarea><br/>


                <div class="groupeInput">

                    <div class="multiInput">
                        <label for="technoProjet">Technologies :</label>
                        <input type="button" class="btnInput" onclick="addInput('inputsTechnos')" value="+"/>

                        <div id="inputsTechnos">
                            <?php
                            if(!empty($lesTechnologies)) :
                                foreach ($lesTechnologies as $technologie): ?>
                                    <input class="inputSpe" type="text" name="technoProjet[]" id="premierInput" value="<?php echo $technologie; ?>"></br>
                                <?php
                                endforeach;
                            else :
                                ?>
                                <input class="inputSpe" type="text" name="technoProjet[]" id="premierInput">
                            <?php endif; ?>

                        </div>

                    </div>

                    <div class="multiInput">
                        <label for="technoProjet">Liens :</label>
                        <input type="button" class="btnInput" onclick="addInput('inputsLiens')" value="+"/>


                        <div id="inputsLiens">
                            <?php
                            if(!empty($lesLiens)) :
                                foreach ($lesLiens as $lien):

                                    ?>
                                    <input class="inputSpe" type="text" name="liensProjet[]['intitule']" id="inputLiens" placeholder="Intitulé de l'adresse url" value="<?php echo $lien->intitule; ?>">
                                    <input class="inputSpe" type="text" name="liensProjet[]['url']" id="inputLiens" placeholder="Adresse url" value="<?php echo $lien->url; ?>"></br>
                                <?php
                                endforeach;
                            else :
                                ?>
                                <input class="inputSpe" type="text" name="liensProjet[]['intitule']" id="inputLiens" placeholder="Intitulé de l'adresse url">
                                <input class="inputSpe" type="text" name="liensProjet[]['url']" id="inputLiens" placeholder="Adresse url"></br>
                            <?php endif; ?>

                        </div>

                    </div>

                </div>

            </div>


            <div class="parametre">

                <label for="logoProjet">Logo :</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                <input id="logoProjet" type="hidden" name="logoProjet" value="<?= $projet->getLogo() ?>">
                <input type="file" accept="image/png, image/jpeg" onchange="upload(this, 'logo')"></br>


                <label for="logoProjet">Image :</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                <input id="imageProjet" type="hidden" name="imageProjet" value="<?= $projet->getImage() ?>">
                <input type="file" accept="image/png, image/jpeg" onchange="upload(this, 'image')"></br>

                <label for="lieuProjet">Lieu :</label>
                <input type="text" name="lieuProjet" value="<?php echo $projet->getLieu(); ?>"  required><br/>

                <label for="orgaProjet">Organisation :</label>
                <input type="text" name="orgaProjet" value="<?php echo $projet->getOrganisation(); ?>" required><br/>

                <label for="anneeProjet">Année :</label>
                <input type="text" name="anneeProjet" value="<?php echo $projet->getAnnee(); ?>" required><br/>

                <button class="btnAdmin btnPost" type="submit">
                    <i class="las la-save"></i>
                    Publier
                </button>

            </div>

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
