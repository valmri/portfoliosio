<?php
require_once './modele/manager/ProjetManager.php';
require_once './modele/entite/Projet.php';

use entite\Projet;
use manager\ProjetManager;

$projetManager = new ProjetManager();

// Récupération des données primaires
if (isset($_POST['titreProjet'])
    && isset($_POST['lieuProjet'])
    && isset($_POST['orgaProjet'])
    && isset($_POST['anneeProjet'])

    && !empty($_POST['titreProjet'])
    && !empty($_POST['lieuProjet'])
    && !empty($_POST['orgaProjet'])
    && !empty($_POST['anneeProjet'])

) {

    $titre = filter_input(INPUT_POST, 'titreProjet', FILTER_SANITIZE_STRING);

    if(isset($_POST['logoProjet']) && !empty($_POST['logoProjet'])) {
        $logo = filter_input(INPUT_POST, 'logoProjet', FILTER_SANITIZE_STRING);
    }

    if(isset($_POST['imageProjet']) && !empty($_POST['imageProjet'])) {
        $image = filter_input(INPUT_POST, 'imageProjet', FILTER_SANITIZE_STRING);
    }

    $lieu = filter_input(INPUT_POST, 'lieuProjet', FILTER_SANITIZE_STRING);
    $organisation = filter_input(INPUT_POST, 'orgaProjet', FILTER_SANITIZE_STRING);
    $annee = filter_input(INPUT_POST, 'anneeProjet', FILTER_SANITIZE_STRING);

    // Récupération des données secondaires
    if( isset($_POST['contexteProjet']) && !empty($_POST['contexteProjet']) ) {
        $contexte = htmlspecialchars($_POST['contexteProjet'], ENT_QUOTES);
    }

    if( isset($_POST['technoProjet']) && !empty($_POST['technoProjet']) ) {
        $technologies = $_POST['technoProjet'];

        // Nettoyage des technologies
        $technosNettoye = array();
        foreach ($technologies as $technologie) {

            if (!empty($technologie)) {

                array_push(
                    $technosNettoye,
                    filter_var($technologie, FILTER_SANITIZE_STRING)
                );

            }

        }

    }

    if( isset($_POST['liensProjet']) && !empty($_POST['liensProjet']) ) {

        $liens = $_POST['liensProjet'];

        $tableauLiens = array();
        $listeIntitule= array();
        $listeUrl = array();

        foreach ($liens as $lien) {

            if (!empty($lien["'url'"])) {

                $listeUrl[] = filter_var($lien["'url'"], FILTER_SANITIZE_STRING);

            } elseif (!empty($lien["'intitule'"])) {

                $listeIntitule[] = filter_var($lien["'intitule'"], FILTER_SANITIZE_STRING);

            }

        }

        $compteur = (count($listeIntitule) + count($listeUrl)) / 2;

        for($i = 0; $i < $compteur; $i++) {

            $unLien = array(
                'url' => $listeUrl[$i],
                'intitule' => $listeIntitule[$i]
            );

            array_push($tableauLiens, $unLien);

        }

    }

    // Mise à jour du projet

    $projet = new Projet();
    $projet->setTitre($titre);

    if(isset($logo)) {
        $projet->setLogo($logo);
    } else {
        $projet->setLogo('null');
    }

    if(isset($image)) {
        $projet->setImage($image);
    } else {
        $projet->setImage('null');
    }

    $projet->setLieu($lieu);
    $projet->setOrganisation($organisation);
    $projet->setAnnee($annee);

    if( isset($contexte) ) {
        $projet->setContexte($contexte);
    } else {
        $projet->setContexte('null');
    }

    if( isset($technosNettoye) ) {
        $projet->setTechnologies(json_encode($technosNettoye));
    } else {
        $projet->setTechnologies('null');
    }

    if( isset($tableauLiens) ) {
        $projet->setLiens(json_encode($tableauLiens));
    } else {
        $projet->setLiens('null');
    }

    $projet->setIdUtilisateur($_SESSION['utilisateur']->getId());

    $ajoutSucces = $projetManager->create($projet);

    if ($ajoutSucces) {
        $msgInfo = "Projet ajouté avec succès !";
    } else {
        $msgErreur = "Erreur lors de l'ajout du projet.";
    }


} elseif (
    !empty($_POST['titreProjet'])
    || !empty($_POST['lieuProjet'])
    || !empty($_POST['orgaProjet'])
    || !empty($_POST['anneeProjet'])
) {
    $msgErreur = "Veuillez saisir tous les champs.";
}


require_once "./vue/admin/projet/v_ajoutProjet.php";

