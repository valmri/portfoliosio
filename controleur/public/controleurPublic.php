<?php
require_once './modele/manager/PageManager.php';

use manager\PageManager;

function controleurPublic(string $page){

    $pageManager = new PageManager();

    $lesCles = $pageManager->getCles();

    $lesPages = array();

    foreach ($lesCles as $uneCle) {

        $lesPages[$uneCle['cle']] =  "c_page.php";

    }

    $lesPages['projets'] =  "c_projets.php";
    $lesPages['projet'] =  "c_projet.php";

    // Vérification de l'existence de la clé saisie
    if (array_key_exists($page , $lesPages )){
        $cle = $page;
        $chemin = $lesPages[$page];
    } else {
        $cle = 'accueil';
        $chemin = $lesPages['accueil'];
    }

    return ['cle' => $cle, 'chemin' => $chemin];

}

