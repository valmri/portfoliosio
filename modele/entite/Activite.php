<?php

namespace entite;

class Activite
{
    /**
     * @var $id int Identifiant de l'activité
     */
    private $id;

    /**
     * @var $intitule string Intitulé de l'activité
     */
    private $intitule;

    /**
     * @param int $id
     * @param string $intitule
     */
    public function __construct(int $id, string $intitule)
    {
        $this->id = $id;
        $this->intitule = $intitule;
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