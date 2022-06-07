<?php
// Importation des fichiers
require_once './modele/manager/PageManager.php';
require_once './modele/entite/Page.php';

use manager\PageManager;

// Récupération des données
$pageManager = new PageManager();
$page = $pageManager->getPageByCle($direction['cle']);

require_once './vue/public/v_page.php';