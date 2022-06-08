<?php

function controleurPrincipal(string $index){

    $lesIndex['page'] =  "public/index.php";
    $lesIndex['admin'] =  "admin/index.php";

    // Vérification de l'existence de la clé saisie
    if (array_key_exists($index , $lesIndex )){
        $chemin = $lesIndex[$index];
    } else {
        $chemin = $lesIndex['page'];
    }

    return $chemin;

}

