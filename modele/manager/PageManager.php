<?php

namespace manager;
use entite\Page;
use exception\PageInvalide;
use modele\manager\ManagerPrincipal;
use mysql_xdevapi\Exception;
use PDO;

class PageManager extends ManagerPrincipal
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Enregistrement d'une page
     * @param Page $page
     * @return bool|Exception
     */
    public function create(Page $page) {

        try {

            $pdo = $this->getPDO();
            $sql = "insert into page(id_utilisateur, titre, contenu, cle, icone, dateCreation) values(:utilisateur, :titre, :contenu, :cle, :icone, now());";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':utilisateur', $page->getIdUtilisateur(), PDO::PARAM_INT);
            $requete->bindValue(':titre', $page->getTitre(), PDO::PARAM_STR);
            $requete->bindValue(':contenu', $page->getContenu(), PDO::PARAM_STR);
            $requete->bindValue(':cle', $page->getCle(), PDO::PARAM_STR);
            $requete->bindValue(':icone', $page->getIcone(), PDO::PARAM_STR);
            $resultat = $requete->execute();

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Lecture d'une page
     * @param int $id
     * @return Page|Exception
     */
    public function read(int $id) {

        try {

            $pdo = $this->getPDO();
            $sql = "select * from page where id = :id;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':id', $id, PDO::PARAM_INT);
            $requete->execute();
            $resultat = $requete->fetchObject('entite\Page');

            if(!$resultat) {
                throw new PageInvalide('Page inexistante.');
            }

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Mise à jour d'une page
     * @param Page $page
     * @return bool|Exception
     */
    public function update(Page $page) {

        try {

            $pdo = $this->getPDO();
            $sql = "update page set titre = :titre, contenu = :contenu, cle = :cle, icone = :icone, dateModification = now() where id = :id;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':titre', $page->getTitre(), PDO::PARAM_STR);
            $requete->bindValue(':contenu', $page->getContenu(), PDO::PARAM_STR);
            $requete->bindValue(':cle', $page->getCle(), PDO::PARAM_STR);
            $requete->bindValue(':icone', $page->getIcone(), PDO::PARAM_STR);
            $requete->bindValue(':id', $page->getId(), PDO::PARAM_INT);
            $resultat = $requete->execute();

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Suppression d'une page
     * @param int $id
     * @return bool|Exception
     */
    public function delete(int $id) {

        try {

            $pdo = $this->getPDO();
            $sql = "delete from page where id = :id limit 1;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':id', $id, PDO::PARAM_INT);
            $resultat = $requete->execute();

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Récupération des clés de toutes les pages
     * @return array|Exception
     */
    public function getCles() {

        try {

            $pdo = $this->getPDO();
            $sql = "select cle from page;";
            $requete = $pdo->prepare($sql);
            $requete->execute();
            $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Récupération d'une page selon sa clé
     * @param string $cle
     * @return Page|Exception
     */
    public function getPageByCle(string $cle) {

        try {

            $pdo = $this->getPDO();
            $sql = "select * from page where cle = :cle;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':cle', $cle, PDO::PARAM_STR);
            $requete->execute();
            $resultat = $requete->fetchObject('entite\Page');

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Récupération des données pour former les liens dans le menu
     * @return array|Exception
     */
    public function getLiens() {

        try {

            $pdo = $this->getPDO();
            $sql = "select icone, cle from page;";
            $requete = $pdo->prepare($sql);
            $requete->execute();
            $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Récupère les pages pour l'administration
     * @return array|Exception
     */
    public function getPagesAdmin() {

        try {

            $pdo = $this->getPDO();
            $sql = "select id, titre, cle, dateCreation, dateModification from page;";
            $requete = $pdo->prepare($sql);
            $requete->execute();
            $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

}