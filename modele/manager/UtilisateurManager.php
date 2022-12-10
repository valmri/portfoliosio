<?php

namespace manager;

require_once $_SERVER['DOCUMENT_ROOT'].'/modele/exception/UtilisateurInvalide.php';

use entite\Utilisateur;
use exception\UtilisateurInvalide;
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
            $sql = "insert into utilisateur(photo, mel, nom, prenom, motDePasse, dateConnexion, biographie) values (:photo, :mel, :nom, :prenom, :motDePasse, now(), :bio);";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':photo', $utilisateur->getPhoto(), PDO::PARAM_STR);
            $requete->bindValue(':mel', $utilisateur->getMel(), PDO::PARAM_STR);
            $requete->bindValue(':nom', $utilisateur->getNom(), PDO::PARAM_STR);
            $requete->bindValue(':prenom', $utilisateur->getPrenom(), PDO::PARAM_STR);
            $requete->bindValue(':bio', $utilisateur->getBiographie(), PDO::PARAM_STR);
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
            $sql = "update utilisateur set photo = :photo, mel = :mel, nom = :nom, prenom = :prenom, biographie = :bio where id = :id;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':photo', $utilisateur->getPhoto(), PDO::PARAM_STR);
            $requete->bindValue(':mel', $utilisateur->getMel(), PDO::PARAM_STR);
            $requete->bindValue(':nom', $utilisateur->getNom(), PDO::PARAM_STR);
            $requete->bindValue(':prenom', $utilisateur->getPrenom(), PDO::PARAM_STR);
            $requete->bindValue(':bio', $utilisateur->getBiographie(), PDO::PARAM_STR);
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

    /**
     * Établie la connexion à l'application
     * @param string $mel
     * @param string $motDePasse
     * @return Utilisateur|UtilisateurInvalide
     * @throws \exception\UtilisateurInvalide
     */
    public function connexion(string $mel, string $motDePasse) {

        try {

            $pdo = $this->getPDO();
            $sql = "select * from utilisateur where mel = :mel;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':mel', $mel, PDO::PARAM_STR);
            $requete->execute();
            $resultat = $requete->fetchObject('entite\Utilisateur');

            // Vérification du mot de passe
            if(!$resultat || !password_verify($motDePasse, $resultat->getMotDePasse())) {
                throw new UtilisateurInvalide('Identifiant ou mot de passe incorrect.');
            }

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Mise à jour de la date de connexion
     * @param int $idUtilisateur
     * @return bool|Exception
     */
    public function updateDerniereConnexion(int $idUtilisateur) {

        try {

            $pdo = $this->getPDO();
            $sql = "update utilisateur set dateConnexion = now() where id = :id;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':id', $idUtilisateur, PDO::PARAM_INT);
            $resultat = $requete->execute();

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Mise à jour du mot de passe d'un utilisateur
     * @param int $id
     * @param string $mdpHache
     * @return bool|Exception
     */
    public function updateMdp(int $id, string $mdpHache)
    {

        try {

            $pdo = $this->getPDO();
            $sql = "update utilisateur set motDePasse = :mdp where id = :id;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':mdp', $mdpHache, PDO::PARAM_STR);
            $requete->bindValue(':id', $id, PDO::PARAM_INT);
            $resultat = $requete->execute();

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }

    /**
     * Récupération des informations pour "moi"
     * @param int $id
     * @return array|Exception
     */
    public function getMoi(int $id)
    {

        try {

            $pdo = $this->getPDO();
            $sql = "select prenom, nom, photo, biographie from utilisateur where id = :id;";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':id', $id, PDO::PARAM_INT);
            $requete->execute();
            $resultat = $requete->fetch(PDO::FETCH_ASSOC);

        } catch (Exception $e) {

            $resultat = $e;

        }

        return $resultat;

    }
}