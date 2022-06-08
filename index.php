<?php
require_once './modele/manager/ManagerPrincipal.php';
require_once './controleur/controleurPrincipal.php';

if(key($_GET) === 'page') {

    $index = "page";

} elseif (key($_GET) === 'admin') {

    $index = "admin";

} else {

    $index = "page";

}

$direction = controleurPrincipal($index);

// Chargement du contrôleur
require_once './vue/'.$direction;
