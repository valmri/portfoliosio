<?php

// Récupération des pages
require_once './modele/manager/PageManager.php';

use manager\PageManager;

$pageManager = new PageManager();
$lesPages = $pageManager->getPagesAdmin();

include_once "./vue/admin/v_gestionPages.php";