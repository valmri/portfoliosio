<?php

namespace entite;

class Page
{
    /**
     * @var $id int Identifiant de la page
     */
    private $id;

    /**
     * @var $id_utilisateur int Identifiant de l'utilisateur
     */
    private $id_utilisateur;

    /**
     * @var $titre string Titre de la page
     */
    private $titre;

    /**
     * @var $contenu string Contenu de la page
     */
    private $contenu;

    /**
     * @var $cle string Clé de la page
     */
    private $cle;

    /**
     * @param int $id
     * @param int $id_utilisateur
     * @param string $titre
     * @param string $contenu
     * @param string $cle
     */
    public function __construct(int $id, int $id_utilisateur, string $titre, string $contenu, string $cle)
    {
        $this->id = $id;
        $this->id_utilisateur = $id_utilisateur;
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->cle = $cle;
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
     * @return int
     */
    public function getIdUtilisateur(): int
    {
        return $this->id_utilisateur;
    }

    /**
     * @param int $id_utilisateur
     */
    public function setIdUtilisateur(int $id_utilisateur): void
    {
        $this->id_utilisateur = $id_utilisateur;
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
    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return string
     */
    public function getContenu(): string
    {
        return $this->contenu;
    }

    /**
     * @param string $contenu
     */
    public function setContenu(string $contenu): void
    {
        $this->contenu = $contenu;
    }

    /**
     * @return string
     */
    public function getCle(): string
    {
        return $this->cle;
    }

    /**
     * @param string $cle
     */
    public function setCle(string $cle): void
    {
        $this->cle = $cle;
    }

}