<?php

namespace App\Entity;

use App\Repository\AlimentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AlimentRepository::class)
 */
class Aliment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom;

    /**
     * @ORM\Column(type="float")
     */
    private $Prix;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Image;

    /**
     * @ORM\Column(type="integer")
     */
    private $Calorie;

    /**
     * @ORM\Column(type="float")
     */
    private $Proteine;

    /**
     * @ORM\Column(type="float")
     */
    private $Glucide;

    /**
     * @ORM\Column(type="float")
     */
    private $Lipide;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->Prix;
    }

    public function setPrix(float $Prix): self
    {
        $this->Prix = $Prix;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(string $Image): self
    {
        $this->Image = $Image;

        return $this;
    }

    public function getCalorie(): ?int
    {
        return $this->Calorie;
    }

    public function setCalorie(int $Calorie): self
    {
        $this->Calorie = $Calorie;

        return $this;
    }

    public function getProteine(): ?float
    {
        return $this->Proteine;
    }

    public function setProteine(float $Proteine): self
    {
        $this->Proteine = $Proteine;

        return $this;
    }

    public function getGlucide(): ?float
    {
        return $this->Glucide;
    }

    public function setGlucide(float $Glucide): self
    {
        $this->Glucide = $Glucide;

        return $this;
    }

    public function getLipide(): ?float
    {
        return $this->Lipide;
    }

    public function setLipide(float $Lipide): self
    {
        $this->Lipide = $Lipide;

        return $this;
    }
}
