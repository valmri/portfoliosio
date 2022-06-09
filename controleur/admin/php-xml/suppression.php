<?php
require_once '../../../modele/manager/ManagerPrincipal.php';
require_once '../../../modele/exception/PageInvalide.php';
require_once '../../../modele/exception/ProjetInvalide.php';
use manager\AcquisManager;
use manager\PageManager;
use manager\ProjetManager;

// Initialisation base de données
$listeContenu = array(
    "page" => "page",
    "projet" => "projet",
    "competence" => "acquis",
    "lien" => "lien"
);
$resultat = true;

$id = (int)filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);

// Chargement des managers
switch ($type) {
    case 'page':
        require_once '../../../modele/manager/PageManager.php';
        $pageManager = new PageManager();
        $pageManager->delete($id);
    break;
    case 'projet':
        require_once '../../../modele/manager/ProjetManager.php';
        $projetManager = new ProjetManager();
        $projetManager->delete($id);
    break;
    case 'acquis':
        require_once '../../../modele/manager/AcquisManager.php';
        $acquisManager = new AcquisManager();
        $acquisManager->delete($id);
    break;
    default:
        $resultat = false;
}

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

