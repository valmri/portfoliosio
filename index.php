<?php
require_once './modele/manager/ManagerPrincipal.php';
require_once './controleur/controleurPrincipal.php';

if(isset($_GET['page'])) {
    $controller = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
} else {
    $controller = "accueil";
}

$direction = controleurPrincipal($controller);

// Chargement des vues principales
require_once './vue/elements/head.php';
require_once './vue/elements/header.php';

// Chargement du menu de façon automatique
require_once './controleur/elements/c_menu.php';

// Chargement du contrôleur qui chargera la vue
require_once './controleur/'.$direction['chemin'];

// Chargement du pied de page
require_once './vue/elements/footer.php';