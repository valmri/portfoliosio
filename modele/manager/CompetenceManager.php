<?php

namespace manager;

use entite\Competence;
use modele\manager\ManagerPrincipal;
use mysql_xdevapi\Exception;
use PDO;
use PDOException;

class CompetenceManager extends ManagerPrincipal
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Enregistrement d'une compétence
     * @param Competence $competence
     * @return bool|Exception
     */
    public function create(Competence $competence) {

        try {

            $pdo = $this->getPDO();
            $sql = "insert into competence(id_activite, intitule) values(:activite, :intitule);";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':activite', $competence->getIdActivite(), PDO::PARAM_INT);
            $requete->bindValue(':intitule', $competence->getIntitule(), PDO::PARAM_STR);
            $resultat = $requete->execute();

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Lecture d'une compétence
     * @param int $id
     * @return Competence|Exception
     */
    public function read(int $id) {

        try {

            $pdo = $this->getPDO();
            $sql = "select * from competence where id = :id;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':id', $id, PDO::PARAM_INT);
            $requete->execute();
            $resultat = $requete->fetchObject('entite\Competence');

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Mise à jour d'une compétence
     * @param Competence $competence
     * @return bool|Exception
     */
    public function update(Competence $competence) {

        try {

            $pdo = $this->getPDO();
            $sql = "update competence set id_activite = :activite, intitule = :intitule where id = :id;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':activite', $competence->getIdActivite(), PDO::PARAM_INT);
            $requete->bindValue(':intitule', $competence->getIntitule(), PDO::PARAM_STR);
            $requete->bindValue(':id', $competence->getId(), PDO::PARAM_INT);
            $resultat = $requete->execute();

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Suppression d'une compétence
     * @param int $id
     * @return bool|Exception
     */
    public function delete(int $id) {

        try {

            $pdo = $this->getPDO();
            $sql = "delete from competence where id = :id limit 1;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':id', $id, PDO::PARAM_INT);
            $resultat = $requete->execute();

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Récupération des compétences d'un projet
     * @param int $idProjet
     * @return array|PDOException
     */
    public function getCompetencesByIdProjet(int $idProjet)
    {

        try {

            $connexion = $this->getPdo();
            $sql = 'select a.id as id_activite, c.intitule as intitule_competence, ac.description as acquis from competence c 
                    join activite a on c.id_activite = a.id
                    join acquis ac on c.id = ac.id_competence  
                    where ac.id_projet = :id 
                    order by a.id';
            $requete = $connexion->prepare($sql);
            $requete->bindValue(':id', $idProjet, PDO::PARAM_INT);
            $requete->execute();
            $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Récupère toutes les compétences par activité
     * @return array|Exception
     */
    public function getCompetencesListe(int $id)
    {

        try {

            $pdo = $this->getPDO();
            $sql = "select id, intitule from competence where id_activite = :id order by id;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':id', $id, PDO::PARAM_INT);
            $requete->execute();
            $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

}