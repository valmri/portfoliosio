<?php
require_once './modele/manager/ManagerPrincipal.php';
require_once './controleur/controleurPrincipal.php';
require_once './modele/entite/Utilisateur.php';

if(key($_GET) === 'page') {

    $index = "page";

} elseif (key($_GET) === 'admin') {

    $index = "admin";

} elseif (key($_GET) === 'auth') {

    $index = "authentification";

} else {

    $index = "page";

}

$direction = controleurPrincipal($index);

// Paramètre de connexion
if(!isset($_SESSION)) {
    session_start();
}

// Chargement du contrôleur
require_once './vue/'.$direction;