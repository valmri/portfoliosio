<?php

namespace entite;

class Projet
{
    /**
     * @var $id int Identifiant du projet
     */
    private $id;

    /**
     * @var $id_utilisateur int Identifiant de l'utilisateur
     */
    private $id_utilisateur;

    /**
     * @var $image string Identifiant de l'image de visualisation du projet
     */
    private $image;

    /**
     * @var $lieu string Lieu de la réalisation du projet
     */
    private $lieu;

    /**
     * @var $logo string Identifiant du logo de l'organisation du projet
     */
    private $logo;

    /**
     * @var $organisation string Nom de l'organisation (entreprise) du projet
     */
    private $organisation;

    /**
     * @var $titre string Nom du projet
     */
    private $titre;

    /**
     * @var $technologies string Tableau des technologies utilisées pour le projet
     */
    private $technologies;

    /**
     * @var $annee string Année de la réalisation du projet
     */
    private $annee;

    /**
     * @var $contexte string Contexte du projet
     */
    private $contexte;

    /**
     * @var $liens string Tableau des liens associés au projet
     */
    private $liens;

    public function __construct()
    {

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
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getIdUtilisateur(): int
    {
        return $this->id_utilisateur;
    }

    /**
     * @param int $id_utilisateur
     */
    public function setIdUtilisateur(int $id_utilisateur)
    {
        $this->id_utilisateur = $id_utilisateur;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image)
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getLieu(): string
    {
        return $this->lieu;
    }

    /**
     * @param string $lieu
     */
    public function setLieu(string $lieu)
    {
        $this->lieu = $lieu;
    }

    /**
     * @return string
     */
    public function getLogo(): string
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     */
    public function setLogo(string $logo)
    {
        $this->logo = $logo;
    }

    /**
     * @return string
     */
    public function getOrganisation(): string
    {
        return $this->organisation;
    }

    /**
     * @param string $organisation
     */
    public function setOrganisation(string $organisation)
    {
        $this->organisation = $organisation;
    }

    /**
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre(string $titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return string
     */
    public function getTechnologies(): string
    {
        return $this->technologies;
    }

    /**
     * @param string $technologies
     */
    public function setTechnologies(string $technologies)
    {
        $this->technologies = $technologies;
    }

    /**
     * @return string
     */
    public function getAnnee(): string
    {
        return $this->annee;
    }

    /**
     * @param string $annee
     */
    public function setAnnee(string $annee)
    {
        $this->annee = $annee;
    }

    /**
     * @return string
     */
    public function getContexte(): string
    {
        return $this->contexte;
    }

    /**
     * @param string $contexte
     */
    public function setContexte(string $contexte)
    {
        $this->contexte = $contexte;
    }

    /**
     * @return string
     */
    public function getLiens(): string
    {
        return $this->liens;
    }

    /**
     * @param string $liens
     */
    public function setLiens(string $liens): void
    {
        $this->liens = $liens;
    }

}