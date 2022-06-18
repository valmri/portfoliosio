<?php

namespace manager;

use entite\Acquis;
use modele\manager\ManagerPrincipal;
use mysql_xdevapi\Exception;
use PDO;

class AcquisManager extends ManagerPrincipal
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Enregistrement d'un acquis
     * @param Acquis $acquis
     * @return bool|Exception
     */
    public function create(Acquis $acquis) {

        try {

            $pdo = $this->getPDO();
            $sql = "insert into acquis(id_projet, id_competence, description, dateCreation) values(:id_projet, :id_competence, :description, now());";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':id_projet', $acquis->getIdProjet(), PDO::PARAM_INT);
            $requete->bindValue(':id_competence', $acquis->getIdCompetence(), PDO::PARAM_INT);
            $requete->bindValue(':description', $acquis->getDescription(), PDO::PARAM_STR);
            $resultat = $requete->execute();

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Lecture d'un acquis
     * @param int $idProjet
     * @param int $idCompetence
     * @return Acquis|Exception
     */
    public function read(int $idProjet, int $idCompetence) {

        try {

            $pdo = $this->getPDO();
            $sql = "select * from acquis where id_projet = :idP and id_competence = :idC;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':idP', $idProjet, PDO::PARAM_INT);
            $requete->bindValue(':idC', $idCompetence, PDO::PARAM_INT);
            $requete->execute();
            $resultat = $requete->fetchObject('entite\Acquis');

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Mise à jour d'un acquis
     * @param Acquis $acquis
     * @return bool|Exception
     */
    public function update(Acquis $acquis) {

        try {

            $pdo = $this->getPDO();
            $sql = "update acquis set description = :description, dateModification = now() where id_projet = :projet and id_competence = :competence;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':projet', $acquis->getIdProjet(), PDO::PARAM_INT);
            $requete->bindValue(':competence', $acquis->getIdCompetence(), PDO::PARAM_INT);
            $requete->bindValue(':description', $acquis->getDescription(), PDO::PARAM_STR);
            $resultat = $requete->execute();

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Suppression d'un acquis
     * @param int $idProjet
     * @param int $idCompetence
     * @return bool|Exception
     */
    public function delete(int $idProjet, int $idCompetence) {

        try {

            $pdo = $this->getPDO();
            $sql = "delete from acquis where id_projet = :projet and id_competence = :competence limit 1;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':projet', $idProjet, PDO::PARAM_INT);
            $requete->bindValue(':competence', $idCompetence, PDO::PARAM_INT);
            $resultat = $requete->execute();

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Récupère les acquis pour dashboard
     * @return array|Exception
     */
    public function getAcquisAdmin()
    {

        try {

            $pdo = $this->getPDO();
            $sql = "select ac.id_projet, ac.id_competence, p.titre as projet, a.intitule as activite, c.intitule as competence, ac.dateCreation, ac.dateModification from acquis ac
                    join projet p on p.id = ac.id_projet
                    join competence c on c.id = ac.id_competence
                    join activite a on a.id = c.id_activite 
                    order by a.id ";
            $requete = $pdo->prepare($sql);
            $requete->execute();
            $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Récupère les données d'un acquis
     * @param int $idProjet
     * @param int $idCompetence
     * @return array|Exception
     */
    public function getAcquisEdit(int $idProjet, int $idCompetence) {

        try {

            $pdo = $this->getPDO();
            $sql = "select ac.id_projet, ac.id_competence, p.id as id_projet, p.titre as projet, a.id as id_activite, a.intitule as activite, c.id as id_competence, c.intitule as competence, ac.description from acquis ac
                    join projet p on p.id = ac.id_projet
                    join competence c on c.id = ac.id_competence
                    join activite a on a.id = c.id_activite
                    where ac.id_projet = :idP and ac.id_competence = :idC;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':idP', $idProjet, PDO::PARAM_INT);
            $requete->bindValue(':idC', $idCompetence, PDO::PARAM_INT);
            $requete->execute();
            $resultat = $requete->fetch(PDO::FETCH_ASSOC);

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

}