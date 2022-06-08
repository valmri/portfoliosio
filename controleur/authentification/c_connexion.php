<?php
require_once './modele/manager/UtilisateurManager.php';
require_once './modele/entite/Utilisateur.php';

use manager\UtilisateurManager;

if(!isset($_SESSION['utilisateur'])) {

    if(isset($_POST['identifiant']) && isset($_POST['motDePasse']) && !empty($_POST['identifiant']) && !empty($_POST['motDePasse'])) {

        // Nettoyage des variables
        $identifiant = filter_input(INPUT_POST, 'identifiant', FILTER_SANITIZE_EMAIL);
        $motDePasse = filter_input(INPUT_POST, 'motDePasse', FILTER_SANITIZE_STRING);

        // Initialisation de la session
        try {
            $utilisateurManager = new UtilisateurManager();
            $utilisateur = $utilisateurManager->connexion($identifiant, $motDePasse);
            $utilisateurManager->updateDerniereConnexion($utilisateur->getId());

            $_SESSION['utilisateur'] = $utilisateur;

            // Chargement du contrôleur
            header('Location:?admin=dashboard');

        } catch (Exception $e) {
            $erreur = $e->getMessage();
        }

    }

    require_once './vue/authentification/v_connexion.php';

} else {

    header('Location:?page=accueil');

}

