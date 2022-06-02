<?php

namespace manager;

use entite\Utilisateur;
use modele\manager\ManagerPrincipal;
use mysql_xdevapi\Exception;
use PDO;

class UtilisateurManager extends ManagerPrincipal
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Enregistrement d'un utilisateur
     * @param Utilisateur $utilisateur
     * @return bool|Exception
     */
    public function create(Utilisateur $utilisateur) {

        try {

            $pdo = $this->getPDO();
            $sql = "insert into utilisateur(photo, mel, nom, prenom, motDePasse, dateConnexion) values (:photo, :mel, :nom, :prenom, :motDePasse, now());";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':photo', $utilisateur->getPhoto(), PDO::PARAM_STR);
            $requete->bindValue(':mel', $utilisateur->getMel(), PDO::PARAM_STR);
            $requete->bindValue(':nom', $utilisateur->getNom(), PDO::PARAM_STR);
            $requete->bindValue(':prenom', $utilisateur->getPrenom(), PDO::PARAM_STR);
            $requete->bindValue(':motDePasse', $utilisateur->getMotDePasse(), PDO::PARAM_STR);
            $resultat = $requete->execute();

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Lecture d'un utilisateur
     * @param int $id
     * @return Utilisateur|Exception
     */
    public function read(int $id) {

        try {

            $pdo = $this->getPDO();
            $sql = "select * from utilisateur where id = :id;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':id', $id, PDO::PARAM_INT);
            $requete->execute();
            $resultat = $requete->fetchObject('entite\Utilisateur');

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Mise à jour d'un utilisateur
     * @param Utilisateur $utilisateur
     * @return bool|Exception
     */
    public function update(Utilisateur $utilisateur) {

        try {

            $pdo = $this->getPDO();
            $sql = "update utilisateur set photo = :photo, mel = :mel, nom = :nom, prenom = :prenom, motDePasse = :motDePasse where id = :id;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':photo', $utilisateur->getPhoto(), PDO::PARAM_STR);
            $requete->bindValue(':mel', $utilisateur->getMel(), PDO::PARAM_STR);
            $requete->bindValue(':nom', $utilisateur->getNom(), PDO::PARAM_STR);
            $requete->bindValue(':prenom', $utilisateur->getPrenom(), PDO::PARAM_STR);
            $requete->bindValue(':motDePasse', $utilisateur->getMotDePasse(), PDO::PARAM_STR);
            $requete->bindValue(':id', $utilisateur->getId(), PDO::PARAM_INT);
            $resultat = $requete->execute();

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Suppression d'un utilisateur
     * @param int $id
     * @return bool|Exception
     */
    public function delete(int $id) {

        try {

            $pdo = $this->getPDO();
            $sql = "delete from utilisateur where id = :id limit 1;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':id', $id, PDO::PARAM_INT);
            $resultat = $requete->execute();

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }
}