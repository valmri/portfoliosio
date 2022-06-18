<?php

// Récupération des pages
require_once './modele/manager/PageManager.php';
require_once './modele/exception/PageInvalide.php';

use manager\PageManager;

$pageManager = new PageManager();
$lesPages = $pageManager->getPagesAdmin();

include_once "./vue/admin/page/v_gestionPages.php";
