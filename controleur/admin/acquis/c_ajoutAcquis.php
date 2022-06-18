<?php
require_once './modele/manager/ProjetManager.php';
require_once './modele/manager/ActiviteManager.php';
require_once './modele/manager/AcquisManager.php';
require_once './modele/manager/CompetenceManager.php';
require_once './modele/entite/Acquis.php';
require_once './modele/exception/AcquisInvalide.php';

use entite\Acquis;
use manager\AcquisManager;
use manager\ActiviteManager;
use manager\CompetenceManager;
use manager\ProjetManager;

$projetManager = new ProjetManager();
$activiteManager = new ActiviteManager();
$competenceManager = new CompetenceManager();
$acquisManager =  new AcquisManager();

$lesProjets = $projetManager->getProjetsListe();
$lesActivites = $activiteManager->getActivitesListe();

// Initialisation de la liste des compétences
$lesCompetences = $competenceManager->getCompetencesListe(1);

if (isset($_POST['projetId']) && isset($_POST['competenceId']) && isset($_POST['contenu'])
    && !empty($_POST['projetId']) && !empty($_POST['competenceId']) && !empty($_POST['contenu'])) {

    $projetId = filter_input(INPUT_POST, 'projetId', FILTER_SANITIZE_NUMBER_INT);
    $competenceId = filter_input(INPUT_POST, 'competenceId', FILTER_SANITIZE_NUMBER_INT);
    $contenu = htmlspecialchars($_POST['contenu'], ENT_QUOTES);

    // Mise à jour des données
    $acquis = new Acquis();
    $acquis->setIdProjet($projetId);
    $acquis->setIdCompetence($competenceId);
    $acquis->setDescription($contenu);

    try {

        $modifSucces = $acquisManager->create($acquis);

        if ($modifSucces) {
            $msgInfo = "Competence ajouté avec succès !";
        } else {
            $msgErreur = "Erreur lors de l'ajout de la compétence.";
        }

    } catch (Exception $e) {

        $msgErreur = $e->getMessage();

    }

}

require_once "./vue/admin/acquis/v_ajoutAcquis.php";
