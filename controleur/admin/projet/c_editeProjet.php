<?php
require_once './modele/manager/ProjetManager.php';
require_once './modele/entite/Projet.php';

use entite\Projet;
use manager\ProjetManager;

if(isset($_GET['id']) && is_numeric($_GET['id'])) {

    $projetManager = new ProjetManager();
    $idProjet = (int)filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);


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

            // Nettoyage des liens
            $liensNettoye = array();
            $tableauLiens = array();
            foreach ($liens as $lien) {

                if (!empty($lien)) {


                    $liensNettoye['url'] = filter_var($lien["'url'"], FILTER_SANITIZE_STRING);

                    $liensNettoye['intitule'] = filter_var($lien["'intitule'"], FILTER_SANITIZE_STRING);

                    $tableauLiens[] = $liensNettoye;

                }

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


        $projet->setImage($_FILES['imageProjet']['name']);
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
        $projet->setId($idProjet);

        $modifSucces = $projetManager->update($projet);

        if ($modifSucces) {
            $msgInfo = "Projet modifié avec succès !";
        } else {
            $msgErreur = "Erreur lors de la modification du projet.";
        }


    } elseif (
        !empty($_POST['titreProjet'])
        || !empty($_POST['logoProjet'])
        || !empty($_POST['lieuProjet'])
        || !empty($_POST['orgaProjet'])
        || !empty($_POST['anneeProjet'])
        || !empty($_POST['contexteProjet'])
        || !empty($_POST['technoProjet'])
        || !empty($_POST['liensProjet'])
    ) {
        $msgErreur = "Veuillez saisir tous les champs.";
    }

    // Récupération des données du projets
    $projet = $projetManager->read($idProjet);
    $lesTechnologies = json_decode($projet->getTechnologies());
    $lesLiens = json_decode($projet->getLiens());

    require_once "./vue/admin/projet/v_editeProjet.php";

} else {
    header('Location:?admin=projets');
}

