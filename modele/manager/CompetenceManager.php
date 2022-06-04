<?php

namespace manager;

use entite\Competence;
use modele\manager\ManagerPrincipal;
use mysql_xdevapi\Exception;
use PDO;

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

}