<?php
require_once './modele/manager/PageManager.php';

use manager\PageManager;

function controleurAdmin(string $page){

    $lesPages['connexion'] =  "c_connexion.php";

    // Vérification de l'existence de la clé saisie
    if (array_key_exists($page , $lesPages )){
        $chemin = $lesPages[$page];
    } else {
        $chemin = $lesPages['connexion'];
    }

    return $chemin;

}

