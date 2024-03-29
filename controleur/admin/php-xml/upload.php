<?php

use manager\UtilisateurManager;
require_once '../../../modele/entite/Utilisateur.php';
require_once '../../../modele/manager/ManagerPrincipal.php';

// Récupération des données

if(isset($_POST['type'])) {
    $typeImage = $_POST['type'];
}

if(isset($_POST['id'])) {
    $idUtilisateur = $_POST['id'];
}

if(isset($_POST['image'])) {
    $typeImage = $_POST['image'];
}

$typeFichier = $_FILES['image']['type'];
$erreurFichier = $_FILES['image']['error'];
$tailleFichier = $_FILES['image']['size'];
$uploadLogo = false;

if($typeFichier === "image/jpeg" || $typeFichier === "image/png") {

    if ($erreurFichier === 0 && $tailleFichier <= 1000000) {

        $uploadLogo = true;

    } else {

        $msgErreur = "Logo trop lourd !";

    }

} else {

    $msgErreur = "Format du logo non autorisé !";

}

// Chemin d'upload
if($typeImage === 'logo') {
    $_FILES['image']['name'] = 'L'.date('dmYYYHms');
    $uploadImage = '../../../assets/img/projets/'.basename($_FILES['image']['name']);
} elseif ($typeImage === 'image') {
    $_FILES['image']['name'] = 'I'.date('dmYYYHms');
    $uploadImage = '../../../assets/img/projets/'.basename($_FILES['image']['name']);
} elseif($typeImage == 'compte') {
    require_once '../../../modele/manager/UtilisateurManager.php';

    $_FILES['image']['name'] = 'P'.date('dmYYYHms');
    $uploadImage = '../../../assets/img/compte/'.basename($_FILES['image']['name']);

    $utilisateurManager = new UtilisateurManager();
    $utilisateur = $utilisateurManager->read((int)$idUtilisateur);
    $utilisateur->setPhoto(basename($_FILES['image']['name']));
    $utilisateurManager->update($utilisateur);
}

// Téléversement
if($uploadLogo) {

    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadImage)) {

        $uploadSucces = true;

    }

} else {
    $uploadSucces = false;
}

// Création du fichier XML
header("Cache-Control: no-cache, must-revalidate");
header('Content-Type: text/xml; charset=UTF-8');
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<resultat>';

if($uploadSucces) {


    echo '<name>'. basename($_FILES['image']['name']) .'</name>';
    echo '<type>'. $typeImage .'</type>';
    echo '<reponse>'. $uploadSucces .'</reponse>';


} else {

    echo '<reponse>'. $uploadSucces .'</reponse>';

}

echo '</resultat>';
