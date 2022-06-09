<?php
require_once './modele/manager/PageManager.php';
require_once './modele/entite/Page.php';

use entite\Page;
use manager\PageManager;

$pageManager = new PageManager();

if(
    isset($_POST['titrePage'])
    && isset($_POST['contenuPage'])
    && isset($_POST['clePage'])
    && isset($_POST['iconePage'])
    && !empty($_POST['titrePage'])
    && !empty($_POST['clePage'])
    && !empty($_POST['contenuPage'])
    && !empty($_POST['iconePage'])
) {

    // Nettoyage des données
    $titre = filter_input(INPUT_POST, 'titrePage', FILTER_SANITIZE_STRING);
    $contenu = htmlspecialchars($_POST['contenuPage'], ENT_QUOTES);
    $cle = strtolower(filter_input(INPUT_POST, 'clePage', FILTER_SANITIZE_STRING));
    $icone = filter_input(INPUT_POST, 'iconePage', FILTER_SANITIZE_STRING);

    $page = new Page();
    $page->setTitre($titre);
    $page->setIcone($icone);
    $page->setCle($cle);
    $page->setContenu($contenu);
    $page->setIdUtilisateur($_SESSION['utilisateur']->getId());

    $ajoutSucces = $pageManager->create($page);

    if($ajoutSucces) {
        $msgInfo = "Page ajouté avec succès !";
    } else {
        $msgErreur = "Erreur lors de l'ajout de la page.";
    }

} elseif(
    !empty($_POST['titrePage'])
    || !empty($_POST['clePage'])
    || !empty($_POST['contenuPage'])
) {
    $msgErreur = "Veuillez saisir tous les champs.";
}

require_once "./vue/admin/page/v_ajoutPage.php";