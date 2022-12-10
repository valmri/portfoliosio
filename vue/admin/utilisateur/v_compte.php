<div class="carteAdmin">
    <div class="carteAdminEntete">
        <h1>Compte</h1>
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

                <label for="nom">Nom :</label><br/>
                <input class="inputSpe" type="text" name="nom" value="<?= $utilisateur->getNom() ?>"></br>

                <label for="prenom">Prenom :</label><br/>
                <input class="inputSpe" type="text" name="prenom" value="<?= $utilisateur->getPrenom() ?>"></br>

                <label for="mel">Adresse-mél :</label><br/>
                <input class="inputSpe" type="text" name="mel" value="<?= $utilisateur->getMel() ?>"></br>

                <label for="mel">Biographie :</label><br/>
                <textarea class="inputSpe" name="biographie" id="biographie" cols="30" rows="10"><?= $utilisateur->getBiographie() ?></textarea></br>

                <button class="btnAdmin btnPost" type="submit">
                    <i class="las la-save"></i>
                    Mettre à jour
                </button>

            </div>

            <div class="parametre">
                <label for="photo">Photo :</label><br/>
                <?php if(!empty($utilisateur->getPhoto())) : ?>
                    <img src="./assets/img/compte/<?= $utilisateur->getPhoto() ?>" alt="<?= $utilisateur->getPrenom() ?>" width="35%" id="photoActuelle">
                <?php endif; ?>
                <img src="" alt="<?= $utilisateur->getPrenom() ?>" width="35%" style="display:none" id="photoUpdate">
                <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                <input id="photo" type="hidden" name="photo">
                <input class="inputSpe" type="file" accept="image/png, image/jpeg" onchange="upload(this, 'compte', <?= $utilisateur->getId() ?>)"></br>

            </div>

        </form>

        <hr/>

        <form action="#" method="post">
            <label for="motDePasse">Mot de passe actuel :</label></br>
            <input class="inputSpe" type="password" name="motDePasseActuel" required></br>

            <label for="motDePasse">Nouveau mot de passe :</label></br>
            <input class="inputSpe" type="password" name="motDePasseNouveau" required></br>

            <label for="motDePasse">Vérification nouveau mot de passe :</label></br>
            <input class="inputSpe" type="password" name="motDePasseVerif" required></br>

            <button class="btnAdmin btnPost" type="submit">
                <i class="las la-save"></i>
                Mettre à jour
            </button>

        </form>

    </div>
</div>
<script src="./node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
<script src="./assets/js/ajax/admin/upload.js"></script>