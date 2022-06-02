<?php

namespace entite;

class Utilisateur
{
    /**
     * @var $id int Identifiant de l'utilisateur
     */
    private $id;

    /**
     * @var $photo string Photo de l'utilisateur
     */
    private $photo;

    /**
     * @var $mel string Adresse-mél de l'utilisateur
     */
    private $mel;

    /**
     * @var $prenom string Prenom de l'utilisateur
     */
    private $prenom;

    /**
     * @var $nom string Nom de l'utilisateur
     */
    private $nom;

    /**
     * @var $motDePasse string Mot de passe de l'utilisateur
     */
    private $motDePasse;

    /**
     * @var $date_connexion string Date de la dernière connexion de l'utilisateur
     */
    private $date_connexion;

    /**
     * @param int $id
     * @param string $photo
     * @param string $mel
     * @param string $prenom
     * @param string $nom
     * @param string $motDePasse
     * @param string $date_connexion
     */
    public function __construct(int $id, string $photo, string $mel, string $prenom, string $nom, string $motDePasse, string $date_connexion)
    {
        $this->id = $id;
        $this->photo = $photo;
        $this->mel = $mel;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->motDePasse = $motDePasse;
        $this->date_connexion = $date_connexion;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getPhoto(): string
    {
        return $this->photo;
    }

    /**
     * @param string $photo
     */
    public function setPhoto(string $photo): void
    {
        $this->photo = $photo;
    }

    /**
     * @return string
     */
    public function getMel(): string
    {
        return $this->mel;
    }

    /**
     * @param string $mel
     */
    public function setMel(string $mel): void
    {
        $this->mel = $mel;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getMotDePasse(): string
    {
        return $this->motDePasse;
    }

    /**
     * @param string $motDePasse
     */
    public function setMotDePasse(string $motDePasse): void
    {
        $this->motDePasse = $motDePasse;
    }

    /**
     * @return string
     */
    public function getDateConnexion(): string
    {
        return $this->date_connexion;
    }

    /**
     * @param string $date_connexion
     */
    public function setDateConnexion(string $date_connexion): void
    {
        $this->date_connexion = $date_connexion;
    }

    /**
     * Identité de l'utilisateur (prénom et nom)
     * @return string
     */
    public function getIdentite() {
        return $this->prenom.' '.$this->nom;
    }

}