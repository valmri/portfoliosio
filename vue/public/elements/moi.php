<div class="biographie">
    <div class="biographieEntete">
        <img src="./assets/img/compte/<?= $utilisateur['photo'] ?>" alt="<?= $utilisateur['prenom'] ?>" />
    </div>
    <div class="biographieContenu">
        <h1><?= $utilisateur['prenom'].' '.$utilisateur['nom'] ?></h1>
        <p><?= $utilisateur['biographie'] ?></p>
    </div>
</div>