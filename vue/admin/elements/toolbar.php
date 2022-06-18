<div class="toolbar">

    <?php if(isset($_GET['admin'])): ?>
    <a class="toolbar_item" href="?page=accueil">
        <i class="las la-home"></i>
        Site
    </a>
    <?php else: ?>
    <a class="toolbar_item" href="?admin=dashboard">
        <i class="las la-tachometer-alt"></i>
        Dashboard
    </a>
    <?php endif; ?>


    <a class="toolbar_item" href="?auth=deconnexion">
        <i class="las la-sign-out-alt"></i>
        Déconnexion
    </a>

</div>