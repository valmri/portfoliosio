<?php
require_once './modele/manager/ManagerPrincipal.php';
require_once './controleur/public/controleurPublic.php';

if(isset($_GET['page'])) {
    $controller = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
} else {
    $controller = "accueil";
}

$direction = controleurPublic($controller);

// Chargement des vues principales
require_once './vue/public/elements/head.php';

require_once './vue/public/elements/header.php';

// Chargement du menu de façon automatique
require_once './controleur/public/elements/c_menu.php';

// Chargement de "moi"
if(isset($_GET['page']) && $_GET['page'] !== 'projet' || empty($_GET) ) {
    require_once './controleur/public/elements/c_moi.php';
}

// Chargement du contrôleur qui chargera la vue
require_once './controleur/public/'.$direction['chemin'];

// Chargement du pied de page
require_once './vue/public/elements/footer.php';