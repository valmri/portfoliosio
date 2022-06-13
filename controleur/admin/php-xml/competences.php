<?php
require_once '../../../modele/manager/ManagerPrincipal.php';
require_once '../../../modele/manager/CompetenceManager.php';
use manager\CompetenceManager;

$idProjet = $_POST['idProjet'];

$competenceManager = new CompetenceManager();

$lesCompetences = $competenceManager->getCompetencesListe($idProjet);

header("Cache-Control: no-cache, must-revalidate");
header('Content-Type: text/xml; charset=UTF-8');
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<lesCompetences>';

foreach ($lesCompetences as $competence) {
    echo '<competence>';
    echo '<id>' . $competence['id'] . '</id>';
    echo '<nom>' . $competence['intitule'] . '</nom>';
    echo '</competence>';
}

echo '</lesCompetences>';
