<?php

namespace entite;

class Competence
{
    /**
     * @var $id int Identifiant de la compétence
     */
    private $id;

    /**
     * @var $id_activite int Identifiant de l'activité
     */
    private $id_activite;

    /**
     * @var $intitule string Intitulé de la compétence
     */
    private $intitule;

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
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getIdActivite(): int
    {
        return $this->id_activite;
    }

    /**
     * @param int $id_activite
     */
    public function setIdActivite(int $id_activite): void
    {
        $this->id_activite = $id_activite;
    }

    /**
     * @return string
     */
    public function getIntitule(): string
    {
        return $this->intitule;
    }

    /**
     * @param string $intitule
     */
    public function setIntitule(string $intitule): void
    {
        $this->intitule = $intitule;
    }

}