<?php
// Importation des fichiers
require_once './modele/manager/PageManager.php';
require_once './modele/entite/Page.php';

use manager\PageManager;

// Récupération des données
$pageManager = new PageManager();
$liens = $pageManager->getLiens();
array_push($liens, array(
   'icone' => 'las la-briefcase',
    'cle' => 'projets'
));

// Triage par ordre alphabétique
$listeLiens = array();

foreach ($liens as $cle => $ligne) {
    $listeLiens[$cle] = $ligne['cle'];
}

array_multisort($listeLiens, SORT_ASC, $liens);

require_once './vue/public/elements/menu.php';