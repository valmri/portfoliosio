<?php
// Importation des fichiers
require_once './modele/manager/PageManager.php';
require_once './modele/entite/Page.php';

use manager\PageManager;

// Récupération des données
$pageManager = new PageManager();
$liens = $pageManager->getLiens();

require_once './vue/elements/menu.php';