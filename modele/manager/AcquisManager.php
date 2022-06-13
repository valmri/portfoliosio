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
            $sql = "insert into acquis(id_projet, id_competence, description) values(:id_projet, :id_competence, :description);";
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
     * @param int $id
     * @return Acquis|Exception
     */
    public function read(int $id) {

        try {

            $pdo = $this->getPDO();
            $sql = "select * from acquis where id = :id;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':id', $id, PDO::PARAM_INT);
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
            $sql = "update acquis set id_projet = :projet, id_competence = :competence, description = :description where id = :id;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':projet', $acquis->getIdProjet(), PDO::PARAM_INT);
            $requete->bindValue(':competence', $acquis->getIdCompetence(), PDO::PARAM_INT);
            $requete->bindValue(':description', $acquis->getDescription(), PDO::PARAM_STR);
            $requete->bindValue(':id', $acquis->getId(), PDO::PARAM_INT);
            $resultat = $requete->execute();

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Suppression d'un acquis
     * @param int $id
     * @return bool|Exception
     */
    public function delete(int $id) {

        try {

            $pdo = $this->getPDO();
            $sql = "delete from acquis where id = :id limit 1;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':id', $id, PDO::PARAM_INT);
            $resultat = $requete->execute();

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * @return bool|Exception
     */
    public function getAcquisAdmin()
    {

        try {

            $pdo = $this->getPDO();
            $sql = "select ac.id, p.titre as projet, a.intitule as activite, c.intitule as competence from acquis ac
                    join projet p on p.id = ac.id_projet
                    join competence c on c.id = ac.id_competence
                    join activite a on a.id = c.id_activite 
                    order by ac.id ";
            $requete = $pdo->prepare($sql);
            $requete->execute();
            $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

}