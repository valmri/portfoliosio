<?php
require_once './modele/manager/PageManager.php';

use manager\PageManager;

function controleurAdmin(string $page){

    $lesPages['dashboard'] =  "c_dashboard.php";
    $lesPages['pages'] =  "c_gestionPages.php";

    // Vérification de l'existence de la clé saisie
    if (array_key_exists($page , $lesPages )){
        $chemin = $lesPages[$page];
    } else {
        $chemin = 'c_dashboard.php';
    }

    return $chemin;

}

