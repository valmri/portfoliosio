<?php
namespace modele\manager;

use PDO;

class ManagerPrincipal {

    /**
     * @var string $serveur Adresse du serveur de la base de données
     */
    private $serveur;

    /**
     * @var string $bd Nom de la base de données
     */
    private $bd;

    /**
     * @var string $identifiant Identifiant de la base de données
     */
    private $identifiant;

    /**
     * @var string $mdp Mot de passe de la base de données
     */
    private $mdp;

    /**
     * @var PDO Objet PDO
     */
    private $pdo;

    /**
     * @param string $serveur
     * @param string $bd
     * @param string $identifiant
     * @param string $mdp
     * @param PDO $pdo
     */
    public function __construct(string $serveur, string $bd, string $identifiant, string $mdp, PDO $pdo)
    {
        $this->serveur = $serveur;
        $this->bd = $bd;
        $this->identifiant = $identifiant;
        $this->mdp = $mdp;
        $this->pdo = $pdo;
    }

    /**
     * Objet PDO
     * @return PDO
     */
    protected function getPDO() {

        if($this->pdo === null) {

            $connexion = new PDO('mysql:host='. $this->serveur .';dbname='. $this->bd, $this->identifiant, $this->mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $connexion;

        }

        return $this->pdo;
    }

}