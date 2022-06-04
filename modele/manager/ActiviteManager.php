<?php

namespace manager;

use entite\Activite;
use modele\manager\ManagerPrincipal;
use mysql_xdevapi\Exception;
use PDO;

class ActiviteManager extends ManagerPrincipal
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Enregistrement d'une activité
     * @param Activite $activite
     * @return bool|Exception
     */
    public function create(Activite $activite) {

        try {

            $pdo = $this->getPDO();
            $sql = "insert into activite(intitule) values(:intitule);";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':intitule', $activite->getIntitule(), PDO::PARAM_STR);
            $resultat = $requete->execute();

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Lecture d'une activité
     * @param int $id
     * @return Activite|Exception
     */
    public function read(int $id) {

        try {

            $pdo = $this->getPDO();
            $sql = "select * from activite where id = :id;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':id', $id, PDO::PARAM_INT);
            $requete->execute();
            $resultat = $requete->fetchObject('entite\Activite');

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Mise à jour d'une activité
     * @param Activite $activite
     * @return bool|Exception
     */
    public function update(Activite $activite) {

        try {

            $pdo = $this->getPDO();
            $sql = "update activite set intitule = :intitule where id = :id;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':intitule', $activite->getIntitule(), PDO::PARAM_STR);
            $requete->bindValue(':id', $activite->getId(), PDO::PARAM_INT);
            $resultat = $requete->execute();

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Suppression d'une activité
     * @param int $id
     * @return bool|Exception
     */
    public function delete(int $id) {

        try {

            $pdo = $this->getPDO();
            $sql = "delete from activite where id = :id limit 1;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':id', $id, PDO::PARAM_INT);
            $resultat = $requete->execute();

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

}