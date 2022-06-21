<div class="biographie">
    <div class="biographie__entete">
        <img src="./assets/img/compte/<?= $utilisateur['photo'] ?>" alt="<?= $utilisateur['prenom'] ?>" />
    </div>
    <div class="biographie__contenu">
        <h1><?= $utilisateur['prenom'].' '.$utilisateur['nom'] ?></h1>
        <p><?= $utilisateur['biographie'] ?></p>
    </div>
</div>