<?php
require_once './modele/manager/UtilisateurManager.php';
require_once './modele/entite/Utilisateur.php';
// Récupération des données

use entite\Utilisateur;
use manager\UtilisateurManager;

$utilisateurManager = new UtilisateurManager();

// Cas des informations globales
if(
    isset($_POST['photo']) &&
    isset($_POST['nom']) &&
    isset($_POST['prenom']) &&
    isset($_POST['mel']) &&
    isset($_POST['biographie'])
) {

    $photo = $_POST['photo'];
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
    $mel = filter_input(INPUT_POST, 'mel', FILTER_SANITIZE_EMAIL);
    $bio = filter_input(INPUT_POST, 'biographie', FILTER_SANITIZE_STRING);

    // Mise à jour des données en base de données
    $utilisateur = new Utilisateur();
    $utilisateur->setId($_SESSION['utilisateur']->getId());
    $utilisateur->setPhoto($photo);
    $utilisateur->setNom($nom);
    $utilisateur->setPrenom($prenom);
    $utilisateur->setMel($mel);
    $utilisateur->setBiographie($bio);

    $majSucces = $utilisateurManager->update($utilisateur);

    // Mise à jour des données en locale
    $_SESSION['utilisateur']->setPhoto($photo);
    $_SESSION['utilisateur']->setNom($nom);
    $_SESSION['utilisateur']->setPrenom($prenom);
    $_SESSION['utilisateur']->setMel($mel);
    $_SESSION['utilisateur']->setBiographie($bio);

    if($majSucces) {
        $msgInfo = "Informations modifiées avec succès !";
    } else {
        $msgErreur = "Erreur lors de la modification des informations.";
    }

} elseif(
    isset($_POST['motDePasseActuel']) &&
    !empty($_POST['motDePasseActuel']) &&
    isset($_POST['motDePasseNouveau']) &&
    !empty($_POST['motDePasseNouveau']) &&
    isset($_POST['motDePasseVerif']) &&
    !empty($_POST['motDePasseVerif'])
) {

    $mdpActuel = $_POST['motDePasseActuel'];
    $mdpNouveau = $_POST['motDePasseNouveau'];
    $mdpVerif = $_POST['motDePasseVerif'];

    // Verification de l'ancien mdp

    if( password_verify($mdpActuel, $_SESSION['utilisateur']->getMotDePasse()) ) {

        if($mdpNouveau === $mdpVerif) {

            $mdpHache = password_hash($mdpNouveau, PASSWORD_BCRYPT);

            $majSucces = $utilisateurManager->updateMdp($_SESSION['utilisateur']->getId(), $mdpHache);

            if($majSucces) {
                $_SESSION['utilisateur']->setMotDePasse($mdpHache);
                $msgInfo = "Mot de passe mis à jour avec succès !";
            } else {
                $msgErreur = "Erreur lors de la mise à jour du mot de passe.";
            }
        } else {
            $msgErreur = "Le mot de passe de vérification est différent du nouveau mot de passe.";
        }

    } else {
        $msgErreur = "Mot de passe actuel incorrect.";
    }

}

require_once './vue/admin/utilisateur/v_compte.php';