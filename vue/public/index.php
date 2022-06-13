<?php
require_once './modele/manager/ManagerPrincipal.php';
require_once './controleur/public/controleurPublic.php';

if(isset($_GET['page'])) {
    $controller = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
} else {
    $controller = "accueil";
}

$direction = controleurPublic($controller);

// Configuration de l'entête
$moi = array(
    'nom' => 'Nom',
    'prenom' => 'Prenom',
    'status' => 'Étudiant en informatique'
);

// Chargement des vues principales
require_once './vue/public/elements/head.php';

if(isset($_SESSION['utilisateur'])) {
    require_once './vue/admin/elements/toolbar.php';
}

require_once './vue/public/elements/header.php';

// Chargement de "moi"
if($_GET['page'] !== 'projet') {
    require_once './controleur/public/elements/c_moi.php';
}

// Chargement du menu de façon automatique
require_once './controleur/elements/c_menu.php';

// Chargement du contrôleur qui chargera la vue
require_once './controleur/public/'.$direction['chemin'];

// Chargement du pied de page
require_once './vue/public/elements/footer.php';