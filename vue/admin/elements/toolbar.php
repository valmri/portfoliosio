<div class="barreOutils">

    <div class="menuOutils">
        <?php if(isset($_GET['admin'])): ?>
            <a class="boutonBarreAdmin" href="?page=accueil">
                <i class="las la-home"></i>
                Site
            </a>
        <?php else: ?>
            <a class="boutonBarreAdmin" href="?admin=dashboard">
                <i class="las la-tachometer-alt"></i>
                Dashboard
            </a>
        <?php endif; ?>
    </div>


    <a class="boutonBarreAdmin" href="?auth=deconnexion">
        <i class="las la-sign-out-alt"></i>
        Déconnexion
    </a>
</div>