<?php

function controleurAuth(string $page){

    $lesPages['connexion'] =  "c_connexion.php";
    $lesPages['deconnexion'] =  "c_deconnexion.php";

    // Vérification de l'existence de la clé saisie
    if (array_key_exists($page , $lesPages )){
        $chemin = $lesPages[$page];
    } else {
        $chemin = $lesPages['connexion'];
    }

    return $chemin;

}

