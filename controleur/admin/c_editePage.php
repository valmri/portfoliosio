<?php
require_once './modele/manager/PageManager.php';
require_once './modele/entite/Page.php';

use entite\Page;
use manager\PageManager;

// Récupération de l'id de la page
if(isset($_GET['id']) && is_numeric($_GET['id'])) {

    $idPage = filter_var((int)$_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $pageManager = new PageManager();

    // Récupération des données du formulaire
    if(isset($_POST['titrePage'])
        && isset($_POST['contenuPage'])
        && isset($_POST['clePage'])
        && isset($_POST['iconePage'])
        && !empty($_POST['titrePage'])
        && !empty($_POST['clePage'])
        && !empty($_POST['contenuPage'])
        && !empty($_POST['iconePage'])
    ) {

        // Nettoyage des variables
        $titre = filter_input(INPUT_POST, 'titrePage', FILTER_SANITIZE_STRING);
        $contenu = htmlspecialchars($_POST['contenuPage'], ENT_QUOTES);
        $cle = strtolower(filter_input(INPUT_POST, 'clePage', FILTER_SANITIZE_STRING));
        $icone = filter_input(INPUT_POST, 'iconePage', FILTER_SANITIZE_STRING);

        // Mise à jour des données
        $pageEdite = new Page();
        $pageEdite->setId($idPage);
        $pageEdite->setIcone($icone);
        $pageEdite->setTitre($titre);
        $pageEdite->setContenu($contenu);
        $pageEdite->setCle($cle);

        $modifSucces = $pageManager->update($pageEdite);

        if($modifSucces) {
            $msgInfo = "Page modifié avec succès !";
        } else {
            $msgErreur = "Erreur lors de la modification de la page.";
        }

    } elseif(
        !empty($_POST['titrePage'])
        || !empty($_POST['clePage'])
        || !empty($_POST['contenuPage'])
    ) {
        $msgErreur = "Veuillez saisir tous les champs.";
    }

    // Récupération des données de la bdd
    try {
        $page = $pageManager->read($idPage);
        require_once './vue/admin/v_editePage.php';
    } catch (Exception $e) {
        $erreur = $e->getMessage();
        require_once './vue/public/elements/erreur.php';
    }

} else {
    header('Location:?admin=pages');
}

