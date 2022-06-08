<?php
require_once './controleur/authentification/controleurAuth.php';

if(isset($_GET['auth'])) {
    $controleur = filter_input(INPUT_GET, 'auth', FILTER_SANITIZE_STRING);
} else {
    $controleur = "connexion";
}

$direction = controleurAuth($controleur);

// Chargement du contrôleur qui chargera la vue
 require_once './controleur/authentification/'.$direction;

