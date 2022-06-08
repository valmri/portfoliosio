<?php
require_once './modele/manager/ManagerPrincipal.php';
require_once './controleur/admin/controleurAdmin.php';

if(isset($_GET['admin'])) {
    $controleur = filter_input(INPUT_GET, 'admin', FILTER_SANITIZE_STRING);
} else {
    $controleur = "connexion";
}

$direction = controleurAdmin($controleur);

// Chargement des vues principales
require_once './vue/admin/elements/head.php';
require_once './vue/admin/elements/header.php';

// Chargement du contrôleur qui chargera la vue
if(isset($_SESSION['utilisateur'])) {
    require_once './vue/admin/elements/toolbar.php';
    require_once './vue/admin/elements/menu.php';
    require_once './controleur/admin/'.$direction;
} else {
    header('Location:?auth=connexion');
}


// Chargement du pied de page
require_once './vue/admin/elements/footer.php';