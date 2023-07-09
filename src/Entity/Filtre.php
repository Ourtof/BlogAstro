<?php

namespace App\Entity;

use App\Repository\FiltreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FiltreRepository::class)]
class Filtre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: article::class, inversedBy: 'filtre_id')]
    private Collection $id_filtre;

    #[ORM\Column(length: 100)]
    private ?string $contenu = null;

    public function __construct()
    {
        $this->id_filtre = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, article>
     */
    public function getIdFiltre(): Collection
    {
        return $this->id_filtre;
    }

    public function addIdFiltre(article $idFiltre): self
    {
        if (!$this->id_filtre->contains($idFiltre)) {
            $this->id_filtre->add($idFiltre);
        }

        return $this;
    }

    public function removeIdFiltre(article $idFiltre): self
    {
        $this->id_filtre->removeElement($idFiltre);

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }
}
