<div class="carteAdmin">
    <div class="carteAdminEntete">
        <h1>Ajout projet</h1>
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
                <input class="inputTitre" type="text" id="titreProjet" name="titreProjet" required><br/>

                <label for="contexteProjet">Contexte :</label>
                <textarea name="contexteProjet" id="editor1" rows="10" cols="80"></textarea><br/>


                <div class="groupeInput">

                    <div class="multiInput">
                        <label for="technoProjet">Technologies :</label>
                        <input type="button" class="btnInput" onclick="addInput('inputsTechnos')" value="+"/>

                        <div id="inputsTechnos">

                        </div>

                    </div>

                    <div class="multiInput">
                        <label for="technoProjet">Liens :</label>
                        <input type="button" class="btnInput" onclick="addInput('inputsLiens')" value="+"/>


                        <div id="inputsLiens">

                        </div>

                    </div>

                </div>

            </div>


            <div class="parametre">

                <label for="logoProjet">Logo :</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                <input id="logoProjet" type="hidden" name="logoProjet">
                <input type="file" accept="image/png, image/jpeg" onchange="upload(this, 'logo')"></br>


                <label for="logoProjet">Image :</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                <input id="imageProjet" type="hidden" name="imageProjet">
                <input type="file" accept="image/png, image/jpeg" onchange="upload(this, 'image')"></br>

                <label for="lieuProjet">Lieu :</label>
                <input type="text" name="lieuProjet" required><br/>

                <label for="orgaProjet">Organisation :</label>
                <input type="text" name="orgaProjet" required><br/>

                <label for="anneeProjet">Année :</label>
                <input type="text" name="anneeProjet" required><br/>

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
