<?php

namespace manager;

use entite\Page;
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
            $sql = "insert into page(id_utilisateur, titre, contenu, cle) values(:utilisateur, :titre, :contenu, :cle);";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':utilisateur', $page->getIdUtilisateur(), PDO::PARAM_INT);
            $requete->bindValue(':titre', $page->getTitre(), PDO::PARAM_STR);
            $requete->bindValue(':contenu', $page->getContenu(), PDO::PARAM_STR);
            $requete->bindValue(':cle', $page->getCle(), PDO::PARAM_STR);
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
            $sql = "update page set titre = :titre, contenu = :contenu, cle = :cle where id = :id;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':titre', $page->getTitre(), PDO::PARAM_STR);
            $requete->bindValue(':contenu', $page->getContenu(), PDO::PARAM_STR);
            $requete->bindValue(':cle', $page->getCle(), PDO::PARAM_STR);
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

}