<?php
function controleurPrincipal(string $action){

    $lesActions = array();

    // Liste des chemins
    $lesActions['accueil'] = "public/c_page.php";


    // Vérification de l'existence de la clé saisie
    if (array_key_exists($action , $lesActions )){
        $cle = key($lesActions);
        $chemin = $lesActions[$action];
    } else {
        $cle = 'accueil';
        $chemin = $lesActions['accueil'];
    }

    return ['cle' => $cle, 'chemin' => $chemin];

}

