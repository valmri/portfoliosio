<div class="boiteGauche">
    <div class="carte">
        <div class="carteEntete carteEnteteImage">
            <img src="./assets/img/compte/<?= $utilisateur['photo'] ?>" alt="<?= $utilisateur['prenom'] ?>" />
        </div>
        <div class="carteContent carteContentImg">
            <h1><?= $utilisateur['prenom'].' '.$utilisateur['nom'] ?></h1>
            <p>
                <?= $utilisateur['biographie'] ?>
            </p>
            <hr class="separateur" />

            <ul class="menuSocial">

                <li>
                    <a href="https://fr.linkedin.com/in/valentin-marmi%C3%A9-a5079619b" target="_blank" rel="noreferrer"> <i class="lab la-linkedin-in"></i> </a>
                </li>

                <li>
                    <a href="https://github.com/valmri" target="_blank" rel="noreferrer"> <i class="lab la-github"></i> </a>
                </li>

                <li>
                    <a href="https://codepen.io/val_mri" target="_blank" rel="noreferrer"> <i class="lab la-codepen"></i> </a>
                </li>

                <li>
                    <a href="./documents/portfolio/cv.pdf" target="_blank" rel="noreferrer"> <i class="las la-address-card"></i> </a>
                </li>

            </ul>

        </div>
    </div>
</div>