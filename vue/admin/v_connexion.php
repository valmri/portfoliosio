<div class="carte">
    <div class="carteEntete">
        <h1>Page de connexion</h1>
    </div>

    <?php if(isset($erreur)): ?>
    <div class="erreur">
        <strong><?= $erreur ?></strong>
    </div>
    <?php endif; ?>

    <div class="carteContent">

        <div class="carteAuthentification">

            <form action="" method="post">

                <div class="inputFormulaire">
                    <label for="identifiant">
                        <i class="las la-user"></i>
                    </label>
                    <input type="text" name="identifiant" id="identifiant" placeholder="Identifiant" required>
                </div>

                <div class="inputFormulaire">
                    <label for="motDePasse">
                        <i class="las la-lock"></i>
                    </label>
                    <input type="password" name="motDePasse" id="motDePasse" placeholder="Mot de passe" required>
                </div>

                <button type="submit" class="bouton boutonConnexion">
                    Se connecter
                </button>
            </form>
        </div>

    </div>
</div>