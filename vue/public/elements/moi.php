<aside class="moi">
    <div class="carte">
        <div class="carteEntete carteEnteteImage">
            <img src="./assets/img/compte/<?= $utilisateur['photo'] ?>" alt="<?= $utilisateur['prenom'] ?>" />
        </div>
        <div class="carteContent carteContentImg">

            <h1><?= $utilisateur['prenom'].' '.$utilisateur['nom'] ?></h1>

            <p>
                <?= $utilisateur['biographie'] ?>
            </p>

        </div>
    </div>
</aside>