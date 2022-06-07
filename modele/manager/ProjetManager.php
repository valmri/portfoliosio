<?php

namespace manager;

require_once './modele/exception/ProjetInvalide.php';

use entite\Projet;
use exception\ProjetInvalide;
use modele\manager\ManagerPrincipal;
use mysql_xdevapi\Exception;
use PDO;
use PDOException;

class ProjetManager extends ManagerPrincipal
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Enregistrement d'un projet
     * @param Projet $projet
     * @return bool|Exception
     */
    public function create(Projet $projet) {

        try {

            $pdo = $this->getPDO();
            $sql = "insert into projet(id_utilisateur, titre, image, logo, lieu, organisation, annee, contexte, technologies, liens) 
                    values(:utilisateur, :titre, :image, :logo, :lieu, :organisation, :annee, :contexte, :technologies, :liens);";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':utilisateur', $projet->getIdUtilisateur(), PDO::PARAM_INT);
            $requete->bindValue(':titre', $projet->getTitre(), PDO::PARAM_STR);
            $requete->bindValue(':image', $projet->getImage(), PDO::PARAM_STR);
            $requete->bindValue(':logo', $projet->getLogo(), PDO::PARAM_STR);
            $requete->bindValue(':lieu', $projet->getLieu(), PDO::PARAM_STR);
            $requete->bindValue(':organisation', $projet->getOrganisation(), PDO::PARAM_STR);
            $requete->bindValue(':annee', $projet->getAnnee(), PDO::PARAM_STR);
            $requete->bindValue(':contexte', $projet->getContexte(), PDO::PARAM_STR);
            $requete->bindValue(':technologies', $projet->getTechnologies(), PDO::PARAM_STR);
            $requete->bindValue(':liens', $projet->getLiens(), PDO::PARAM_STR);
            $resultat = $requete->execute();

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Lecture d'un projet
     * @param int $id
     * @return Projet|bool
     */
    public function read(int $id) {

        try {

            $pdo = $this->getPDO();
            $sql = "select * from projet where id = :id;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':id', $id, PDO::PARAM_INT);
            $requete->execute();
            $resultat = $requete->fetchObject('entite\Projet');

            if(!$resultat) {
                throw new ProjetInvalide("Ce projet n'existe pas.");
            }

        } catch (PDOException $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Mise à jour d'un projet
     * @param Projet $projet
     * @return bool|Exception
     */
    public function update(Projet $projet) {

        try {

            $pdo = $this->getPDO();
            $sql = "update projet set id_utilisateur = :utilisateur, titre = :titre, image = :image, logo = :logo, lieu = :lieu, 
                    organisation = :organisation, annee = :annee, contexte = :contexte, technologies = :technologies, liens = :liens where id = :id;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':utilisateur', $projet->getIdUtilisateur(), PDO::PARAM_INT);
            $requete->bindValue(':titre', $projet->getTitre(), PDO::PARAM_STR);
            $requete->bindValue(':image', $projet->getImage(), PDO::PARAM_STR);
            $requete->bindValue(':logo', $projet->getLogo(), PDO::PARAM_STR);
            $requete->bindValue(':lieu', $projet->getLieu(), PDO::PARAM_STR);
            $requete->bindValue(':organisation', $projet->getOrganisation(), PDO::PARAM_STR);
            $requete->bindValue(':annee', $projet->getAnnee(), PDO::PARAM_STR);
            $requete->bindValue(':contexte', $projet->getContexte(), PDO::PARAM_STR);
            $requete->bindValue(':technologies', $projet->getTechnologies(), PDO::PARAM_STR);
            $requete->bindValue(':liens', $projet->getLiens(), PDO::PARAM_STR);
            $requete->bindValue(':id', $projet->getId(), PDO::PARAM_INT);
            $resultat = $requete->execute();

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;
    }

    /**
     * Suppression d'un projet
     * @param int $id
     * @return bool|Exception
     */
    public function delete(int $id) {

        try {

            $pdo = $this->getPDO();
            $sql = "delete from projet where id = :id limit 1;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':id', $id, PDO::PARAM_INT);
            $resultat = $requete->execute();

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Récupération des descriptions des projets
     * @return array|Exception
     */
    public function getDescriptionsProjets() {

        try {

            $pdo = $this->getPDO();
            $sql = "select id, logo, titre, lieu, organisation, annee from projet;";
            $requete = $pdo->prepare($sql);
            $requete->execute();
            $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

}