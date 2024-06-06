<?php

namespace App\Entity;

use App\Repository\RecetteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecetteRepository::class)]
class Recette
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titreBack = null;

    #[ORM\Column(length: 255)]
    private ?string $texte = null;

    #[ORM\Column(length: 255)]
    private ?string $lien = null;

    #[ORM\Column(length: 255)]
    private ?string $soustitre = null;

    #[ORM\Column(length: 255)]
    private ?string $titreFront = null;

    #[ORM\Column(length: 255)]
    private ?string $imageFront = null;

    #[ORM\Column(length: 255)]
    private ?string $imageBack = null;

    #[ORM\ManyToOne(inversedBy: 'recettes')]
    private ?Restaurant $edit = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreBack(): ?string
    {
        return $this->titreBack;
    }

    public function setTitreBack(string $titreBack): self
    {
        $this->titreBack = $titreBack;

        return $this;
    }

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(string $texte): self
    {
        $this->texte = $texte;

        return $this;
    }

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(string $lien): self
    {
        $this->lien = $lien;

        return $this;
    }

    public function getSoustitre(): ?string
    {
        return $this->soustitre;
    }

    public function setSoustitre(string $soustitre): self
    {
        $this->soustitre = $soustitre;

        return $this;
    }

    public function getTitreFront(): ?string
    {
        return $this->titreFront;
    }

    public function setTitreFront(string $titreFront): self
    {
        $this->titreFront = $titreFront;

        return $this;
    }

    public function getImageFront(): ?string
    {
        return $this->imageFront;
    }

    public function setImageFront(string $imageFront): self
    {
        $this->imageFront = $imageFront;

        return $this;
    }

    public function getImageBack(): ?string
    {
        return $this->imageBack;
    }

    public function setImageBack(string $imageBack): self
    {
        $this->imageBack = $imageBack;

        return $this;
    }

    public function getEdit(): ?Restaurant
    {
        return $this->edit;
    }

    public function setEdit(?Restaurant $edit): self
    {
        $this->edit = $edit;

        return $this;
    }
}
