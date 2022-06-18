<?php
require_once './modele/manager/ProjetManager.php';
require_once './modele/exception/ProjetInvalide.php';

use manager\ProjetManager;

// Récupération des projets
$projetManager = new ProjetManager();
$lesProjets = $projetManager->getProjetsAdmin();

include_once "./vue/admin/projet/v_gestionProjets.php";
