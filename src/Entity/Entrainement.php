<?php

namespace App\Entity;

use App\Repository\EntrainementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntrainementRepository::class)]
class Entrainement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $jour = null;

    #[ORM\Column(nullable: true)]
    private ?int $heureDebut = null;

    #[ORM\Column(nullable: true)]
    private ?int $heureFin = null;





    #[ORM\ManyToOne]
    private ?Terrain $terrain = null;

    #[ORM\ManyToOne]
    private ?Categorie $categorie = null;

    #[ORM\ManyToMany(targetEntity: StaffPersonnel::class, inversedBy: 'entrainements')]
    private Collection $staffPersonnel;

    public function __construct()
    {
        $this->categorie = new ArrayCollection();
        $this->terrain = new ArrayCollection();
        $this->staffPersonnel = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?int
    {
        return $this->jour;
    }

    public function setJour(?int $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    public function getHeureDebut(): ?int
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(?int $heureDebut): self
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    public function getHeureFin(): ?int
    {
        return $this->heureFin;
    }

    public function setHeureFin(?int $heureFin): self
    {
        $this->heureFin = $heureFin;

        return $this;
    }


    /**
     * @return Collection<int, Categorie>
     */
    public function getCategorie(): Collection
    {
        return $this->categorie;
    }

    public function addCategorie(Categorie $categorie): self
    {
        if (!$this->categorie->contains($categorie)) {
            $this->categorie->add($categorie);
        }

        return $this;
    }

    public function removeCategorie(Categorie $categorie): self
    {
        $this->categorie->removeElement($categorie);

        return $this;
    }

    /**
     * @return Collection<int, Terrain>
     */
    public function getTerrain(): Collection
    {
        return $this->terrain;
    }

    public function addTerrain(Terrain $terrain): self
    {
        if (!$this->terrain->contains($terrain)) {
            $this->terrain->add($terrain);
        }

        return $this;
    }

    public function removeTerrain(Terrain $terrain): self
    {
        $this->terrain->removeElement($terrain);

        return $this;
    }

    /**
     * @return Collection<int, StaffPersonnel>
     */
    public function getStaffPersonnel(): Collection
    {
        return $this->staffPersonnel;
    }

    public function addStaffPersonnel(StaffPersonnel $staffPersonnel): self
    {
        if (!$this->staffPersonnel->contains($staffPersonnel)) {
            $this->staffPersonnel->add($staffPersonnel);
        }

        return $this;
    }

    public function removeStaffPersonnel(StaffPersonnel $staffPersonnel): self
    {
        $this->staffPersonnel->removeElement($staffPersonnel);

        return $this;
    }

    public function setTerrain(?Terrain $terrain): self
    {
        $this->terrain = $terrain;

        return $this;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
}
