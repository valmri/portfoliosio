<?php
require_once './modele/manager/AcquisManager.php';
require_once './modele/entite/Acquis.php';

use entite\Acquis;
use manager\AcquisManager;

if(isset($_GET['id']) && is_numeric($_GET['id'])) {

    $acquisManager = new AcquisManager();
    $idCompetence = filter_var((int)$_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    if (isset($_POST['projetId']) && isset($_POST['competenceId']) && isset($_POST['contenu'])
        && !empty($_POST['projetId']) && !empty($_POST['competenceId']) && !empty($_POST['contenu'])) {

        $projetId = filter_input(INPUT_POST, 'projetId', FILTER_SANITIZE_NUMBER_INT);
        $competenceId = filter_input(INPUT_POST, 'competenceId', FILTER_SANITIZE_NUMBER_INT);
        $contenu = htmlspecialchars($_POST['contenu'], ENT_QUOTES);

        // Mise à jour des données
        $acquis = new Acquis();
        $acquis->setId($idCompetence);
        $acquis->setIdProjet($projetId);
        $acquis->setIdCompetence($competenceId);
        $acquis->setDescription($contenu);

        $modifSucces = $acquisManager->update($acquis);

        if ($modifSucces) {
            $msgInfo = "Competence ajouté avec succès !";
        } else {
            $msgErreur = "Erreur lors de l'ajout de la compétence.";
        }

    }

    // Récupération des données
    $donneesCompetences = $acquisManager->getAcquisEdit($idCompetence);

    require_once "./vue/admin/acquis/v_editeAcquis.php";

} else {
    header('Location:?admin=pages');
}