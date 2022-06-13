<?php
require_once './modele/manager/PageManager.php';

use manager\PageManager;

function controleurAdmin(string $page){

    $lesPages['dashboard'] =  "c_dashboard.php";

    $lesPages['pages'] =  "page/c_gestionPages.php";
    $lesPages['editePage'] =  "page/c_editePage.php";
    $lesPages['ajoutPage'] =  "page/c_ajoutPage.php";

    $lesPages['projets'] =  "projet/c_gestionProjets.php";
    $lesPages['editeProjet'] =  "projet/c_editeProjet.php";
    $lesPages['ajoutProjet'] =  "projet/c_ajoutProjet.php";

    $lesPages['acquis'] =  "acquis/c_gestionAcquis.php";
    $lesPages['editeAcquis'] =  "acquis/c_editeAcquis.php";
    $lesPages['ajoutAcquis'] =  "acquis/c_ajoutAcquis.php";

    // Vérification de l'existence de la clé saisie
    if (array_key_exists($page , $lesPages )){
        $chemin = $lesPages[$page];
    } else {
        $chemin = 'c_dashboard.php';
    }

    return $chemin;

}

