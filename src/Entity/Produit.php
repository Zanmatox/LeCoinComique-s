<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
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
    private $ref_bd;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $heros;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="float")
     */
    private $prix_public;

    /**
     * @ORM\ManyToOne(targetEntity=Fournisseur::class, inversedBy="produits")
     */
    private $fournisseur;

    /**
     * @ORM\Column(type="float")
     */
    private $prix_editeur;

    /**
     * @ORM\ManyToOne(targetEntity=Auteur::class, inversedBy="produits")
     */
    private $auteur;

    /**
     * @ORM\ManyToOne(targetEntity=Genre::class, inversedBy="produits")
     */
    private $genre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $resume;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ref_fournisseur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ref_editeur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $illustration;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isBest;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefBd(): ?string
    {
        return $this->ref_bd;
    }

    public function setRefBd(string $ref_bd): self
    {
        $this->ref_bd = $ref_bd;

        return $this;
    }

    public function getHeros(): ?string
    {
        return $this->heros;
    }

    public function setHeros(?string $heros): self
    {
        $this->heros = $heros;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getPrixPublic(): ?float
    {
        return $this->prix_public;
    }

    public function setPrixPublic(float $prix_public): self
    {
        $this->prix_public = $prix_public;

        return $this;
    }

    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getPrixEditeur(): ?float
    {
        return $this->prix_editeur;
    }

    public function setPrixEditeur(float $prix_editeur): self
    {
        $this->prix_editeur = $prix_editeur;

        return $this;
    }

    public function getAuteur(): ?Auteur
    {
        return $this->auteur;
    }

    public function setAuteur(?Auteur $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getGenre(): ?Genre
    {
        return $this->genre;
    }

    public function setGenre(?Genre $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(?string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getRefFournisseur(): ?string
    {
        return $this->ref_fournisseur;
    }

    public function setRefFournisseur(?string $ref_fournisseur): self
    {
        $this->ref_fournisseur = $ref_fournisseur;

        return $this;
    }

    public function getRefEditeur(): ?string
    {
        return $this->ref_editeur;
    }

    public function setRefEditeur(?string $ref_editeur): self
    {
        $this->ref_editeur = $ref_editeur;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getIllustration(): ?string
    {
        return $this->illustration;
    }

    public function setIllustration(?string $illustration): self
    {
        $this->illustration = $illustration;

        return $this;
    }

    public function getIsBest(): ?bool
    {
        return $this->isBest;
    }

    public function setIsBest(bool $isBest): self
    {
        $this->isBest = $isBest;

        return $this;
    }
}
