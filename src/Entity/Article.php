<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: Filtre::class, mappedBy: 'id_filtre')]
    private Collection $filtre_id;

    #[ORM\ManyToMany(targetEntity: filtre::class)]
    private Collection $id_article;

    #[ORM\Column(length: 50)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contenu = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_article = null;

    #[ORM\OneToMany(mappedBy: 'article_id', targetEntity: Illustration::class)]
    private Collection $illustrations;

    public function __construct()
    {
        $this->filtre_id = new ArrayCollection();
        $this->id_article = new ArrayCollection();
        $this->illustrations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Filtre>
     */
    public function getFiltreId(): Collection
    {
        return $this->filtre_id;
    }

    public function addFiltreId(Filtre $filtreId): self
    {
        if (!$this->filtre_id->contains($filtreId)) {
            $this->filtre_id->add($filtreId);
            $filtreId->addIdFiltre($this);
        }

        return $this;
    }

    public function removeFiltreId(Filtre $filtreId): self
    {
        if ($this->filtre_id->removeElement($filtreId)) {
            $filtreId->removeIdFiltre($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, filtre>
     */
    public function getIdArticle(): Collection
    {
        return $this->id_article;
    }

    public function addIdArticle(filtre $idArticle): self
    {
        if (!$this->id_article->contains($idArticle)) {
            $this->id_article->add($idArticle);
        }

        return $this;
    }

    public function removeIdArticle(filtre $idArticle): self
    {
        $this->id_article->removeElement($idArticle);

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

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getDateArticle(): ?\DateTimeInterface
    {
        return $this->date_article;
    }

    public function setDateArticle(\DateTimeInterface $date_article): self
    {
        $this->date_article = $date_article;

        return $this;
    }

    /**
     * @return Collection<int, Illustration>
     */
    public function getIllustrations(): Collection
    {
        return $this->illustrations;
    }

    public function addIllustration(Illustration $illustration): self
    {
        if (!$this->illustrations->contains($illustration)) {
            $this->illustrations->add($illustration);
            $illustration->setArticleId($this);
        }

        return $this;
    }

    public function removeIllustration(Illustration $illustration): self
    {
        if ($this->illustrations->removeElement($illustration)) {
            // set the owning side to null (unless already changed)
            if ($illustration->getArticleId() === $this) {
                $illustration->setArticleId(null);
            }
        }

        return $this;
    }
}
