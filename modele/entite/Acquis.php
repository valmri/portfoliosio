<?php

namespace entite;

class Acquis
{

    /**
     * @var $id_projet int Identifiant du projet
     */
    private $id_projet;

    /**
     * @var $id_competence int Identifiant de la compétence
     */
    private $id_competence;

    /**
     * @var $description string Description de l'acquis
     */
    private $description;

    public function __construct()
    {

    }

    /**
     * @return int
     */
    public function getIdProjet(): int
    {
        return $this->id_projet;
    }

    /**
     * @param int $id_projet
     */
    public function setIdProjet(int $id_projet): void
    {
        $this->id_projet = $id_projet;
    }

    /**
     * @return int
     */
    public function getIdCompetence(): int
    {
        return $this->id_competence;
    }

    /**
     * @param int $id_competence
     */
    public function setIdCompetence(int $id_competence): void
    {
        $this->id_competence = $id_competence;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

}