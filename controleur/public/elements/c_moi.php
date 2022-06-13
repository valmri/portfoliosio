<?php
require_once './modele/manager/UtilisateurManager.php';
use manager\UtilisateurManager;

// Récupération des données
$utilisateurManager = new UtilisateurManager();
$utilisateur = $utilisateurManager->getMoi(1);

require_once './vue/public/elements/moi.php';