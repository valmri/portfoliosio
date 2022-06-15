<?php
require_once './controleur/authentification/controleurAuth.php';

if(isset($_GET['auth'])) {
    $controleur = filter_input(INPUT_GET, 'auth', FILTER_SANITIZE_STRING);
} else {
    $controleur = "connexion";
}

$direction = controleurAuth($controleur);

// Chargement du contrôleur qui chargera la
require_once './vue/admin/elements/head.php';
require_once './vue/admin/elements/header.php';
require_once './controleur/authentification/'.$direction;
require_once './vue/admin/elements/footer.php';
