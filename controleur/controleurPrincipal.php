<?php
require_once './modele/manager/PageManager.php';

use manager\PageManager;

function controleurPrincipal(string $page){

    $pageManager = new PageManager();

    $lesCles = $pageManager->getCles();

    $lesPages = array();

    foreach ($lesCles as $uneCle) {

        $lesPages[$uneCle['cle']] =  "public/c_page.php";

    }

    $lesPages['projets'] =  "public/c_projets.php";
    $lesPages['projet'] =  "public/c_projet.php";
    $lesPages['connexion'] =  "public/c_connexion.php";

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

