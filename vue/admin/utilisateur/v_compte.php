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

<div class="carteAdmin">
    <div class="carteAdminEntete">
        <h1>Compte</h1>
    </div>

    <div class="carteContent">

        <form action="#" method="post">

            <label for="photo">Photo :</label>
            
            <?php if(!empty($_SESSION['utilisateur']->getPhoto())) : ?>
                <img src="./assets/img/compte/<?= $_SESSION['utilisateur']->getPhoto() ?>" alt="<?= $_SESSION['utilisateur']->getPrenom() ?>">
            <?php endif; ?>

            <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
            <input id="photo" type="hidden" name="photo" value="<?= $_SESSION['utilisateur']->getPhoto() ?>">
            <input type="file" accept="image/png, image/jpeg" onchange="upload(this, 'compte')"></br>

            <label for="nom">Nom :</label>
            <input type="text" name="nom" value="<?= $_SESSION['utilisateur']->getNom() ?>"></br>

            <label for="prenom">Prenom :</label>
            <input type="text" name="prenom" value="<?= $_SESSION['utilisateur']->getPrenom() ?>"></br>

            <label for="mel">Adresse-mél :</label>
            <input type="text" name="mel" value="<?= $_SESSION['utilisateur']->getMel() ?>"></br>

            <label for="mel">Biographie :</label>
            <textarea name="biographie" id="biographie" cols="30" rows="10"><?= $_SESSION['utilisateur']->getBiographie() ?></textarea></br>

            <button type="submit">Mettre à jour</button>

        </form>

        <hr/>

        <form action="#" method="post">
            <label for="motDePasse">Mot de passe actuel :</label>
            <input type="password" name="motDePasseActuel" required></br>

            <label for="motDePasse">Nouveau mot de passe :</label>
            <input type="password" name="motDePasseNouveau" required></br>

            <label for="motDePasse">Vérification nouveau mot de passe :</label>
            <input type="password" name="motDePasseVerif" required></br>

            <button type="submit">Mettre à jour</button>

        </form>

    </div>
</div>
<script src="./node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
<script src="./assets/js/ajax/admin/upload.js"></script>