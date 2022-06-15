<div class="connexion">
    <div class="connexionEntete">
        <h2>Page de connexion</h2>
    </div>

    <?php if(isset($erreur)): ?>
        <div class="boiteMessage msgErreur">
            <i class="las la-exclamation-triangle"></i>
            <p><?= $erreur ?></p>
        </div>
    <?php endif; ?>

    <div class="connexionContenu">

            <form action="#" method="post">

                <div class="inputConnexion">
                    <label for="identifiant">
                        <i class="las la-user"></i>
                    </label>
                    <input type="text" name="identifiant" id="identifiant" placeholder="Identifiant" required>
                </div>

                <div class="inputConnexion">
                    <label for="motDePasse">
                        <i class="las la-lock"></i>
                    </label>
                    <input type="password" name="motDePasse" id="motDePasse" placeholder="Mot de passe" required>
                </div>

                <button class="btnAdmin btnPost" type="submit" class="bouton boutonConnexion">
                    Se connecter
                </button>

            </form>

    </div>
</div>