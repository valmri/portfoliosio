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

    public function __construct()
    {
        // Adresse du serveur de base de données
        $this->serveur = "localhost";

        // Nom de la base de données
        $this->bd = "portfoliosio";

        // Identifiant de la base de données
        $this->identifiant = "root";

        // Mot de passe de la base de données
        $this->mdp = "";
    }

    /**
     * Instanciation de PDO
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