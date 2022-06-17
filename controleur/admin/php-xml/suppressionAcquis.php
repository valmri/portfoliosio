<?php
require_once '../../../modele/manager/ManagerPrincipal.php';
require_once '../../../modele/exception/PageInvalide.php';
require_once '../../../modele/exception/ProjetInvalide.php';
require_once '../../../modele/manager/AcquisManager.php';

use manager\AcquisManager;
use manager\PageManager;
use manager\ProjetManager;

// Initialisation base de données
$resultat = true;

$id = (int)filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$idP = (int)filter_input(INPUT_POST, 'p', FILTER_SANITIZE_NUMBER_INT);
$idC = (int)filter_input(INPUT_POST, 'c', FILTER_SANITIZE_NUMBER_INT);

// Chargement du managers
$acquisManager = new AcquisManager();
$resultat = $acquisManager->delete($idP,$idC);

// Création du fichier XML
header("Cache-Control: no-cache, must-revalidate");
header('Content-Type: text/xml; charset=UTF-8');
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<resultat>';

if($resultat) {


    echo '<id>'. $id .'</id>';
    echo '<reponse>'. $resultat .'</reponse>';


} else {

    echo '<reponse>'. $resultat .'</reponse>';

}

echo '</resultat>';

