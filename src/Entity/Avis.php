<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AvisRepository")
 */
class Avis
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DateAvis;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $TextAvis;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\produit", inversedBy="avis")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Produit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateAvis(): ?\DateTimeInterface
    {
        return $this->DateAvis;
    }

    public function setDateAvis(?\DateTimeInterface $DateAvis): self
    {
        $this->DateAvis = $DateAvis;

        return $this;
    }

    public function getTextAvis(): ?string
    {
        return $this->TextAvis;
    }

    public function setTextAvis(?string $TextAvis): self
    {
        $this->TextAvis = $TextAvis;

        return $this;
    }

    public function getProduit(): ?produit
    {
        return $this->Produit;
    }

    public function setProduit(?produit $Produit): self
    {
        $this->Produit = $Produit;

        return $this;
    }
}
