<?php
require_once './modele/manager/AcquisManager.php';
require_once './modele/entite/Acquis.php';
require_once './modele/exception/AcquisInvalide.php';

use entite\Acquis;
use manager\AcquisManager;

if(isset($_GET['p']) && is_numeric($_GET['p']) && isset($_GET['c']) && is_numeric($_GET['c'])) {

    $acquisManager = new AcquisManager();
    $idProjet = filter_var((int)$_GET['p'], FILTER_SANITIZE_NUMBER_INT);
    $idCompetence = filter_var((int)$_GET['c'], FILTER_SANITIZE_NUMBER_INT);

    if (isset($_POST['contenu']) && !empty($_POST['contenu'])) {

        $contenu = htmlspecialchars($_POST['contenu'], ENT_QUOTES);

        // Mise à jour des données
        $acquis = new Acquis();
        $acquis->setIdProjet($idProjet);
        $acquis->setIdCompetence($idCompetence);
        $acquis->setDescription($contenu);

        $modifSucces = $acquisManager->update($acquis);

        if ($modifSucces) {
            $msgInfo = "Competence ajouté avec succès !";
        } else {
            $msgErreur = "Erreur lors de l'ajout de la compétence.";
        }

    }

    // Récupération des données
    try {

        $donneesCompetences = $acquisManager->getAcquisEdit($idProjet, $idCompetence);
        require_once "./vue/admin/acquis/v_editeAcquis.php";

    } catch (Exception $e) {

        $erreur = $e->getMessage();
        require_once './vue/public/elements/erreur.php';

    }


} else {
    header('Location:?admin=pages');
}