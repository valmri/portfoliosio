<?php

require_once './modele/manager/ProjetManager.php';
use manager\ProjetManager;

// Récupération des projets
$projetManager = new ProjetManager();
$lesProjets = $projetManager->getDescriptionsProjets();

require_once './vue/public/v_projets.php';