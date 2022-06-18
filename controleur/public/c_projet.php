<?php

require_once './modele/manager/ProjetManager.php';
require_once './modele/manager/AcquisManager.php';
require_once './modele/manager/ActiviteManager.php';
require_once './modele/manager/CompetenceManager.php';
require_once './modele/entite/Projet.php';

use manager\ActiviteManager;
use manager\CompetenceManager;
use manager\ProjetManager;

// Récupération des données
if(isset($_GET['id']) && is_numeric($_GET['id']) && !empty($_GET['id'])) {

    // Nettoyage de la valeur
    $idProjet = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Récupération du projet
    try {

        $projetManager = new ProjetManager();
        $leProjet = $projetManager->read($idProjet);

        // Récupération de la liste des activites et des compétences du projet
        $activiteManager = new ActiviteManager();
        $listeActivites =  $activiteManager->getActivitesByIdProjet($idProjet);

        $competenceManager = new CompetenceManager();
        $listeCompetences = $competenceManager->getCompetencesByIdProjet($idProjet);

        // Création du tableau
        $tableauAcquis = array();
        foreach ($listeActivites as $uneActivite) {
            $lactivite = array();
            $lactivite['intitule_activite'] = $uneActivite['intitule_activite'];

            foreach ($listeCompetences as $uneCompetence) {

                if($uneActivite['id_activite'] === $uneCompetence['id_activite']) {
                    $laCompetence = array();
                    $laCompetence['intitule_competence'] = $uneCompetence['intitule_competence'];
                    $laCompetence['acquis'] = $uneCompetence['acquis'];
                    $lactivite['intitule_competence'][] = $laCompetence;
                }

            }

            $tableauAcquis[] = $lactivite;

        }

        require_once './vue/public/v_projet.php';

    } catch (Exception $e) {
        $erreur = $e->getMessage();
        require_once './vue/public/elements/erreur.php';
    }

} else {

    $erreur = "L'identifiant du projet est incorrect.";
    require_once './vue/elements/erreur.php';

}
