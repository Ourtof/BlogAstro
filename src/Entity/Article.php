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

    #[ORM\Column(length: 50)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contenu = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_article = null;

    #[ORM\OneToMany(mappedBy: 'article_id', targetEntity: Illustration::class)]
    private Collection $illustrations;

    #[ORM\Column(length: 100, nullable: true)]
    private ?array $tag = null;

    public function __construct()
    {
        $this->illustrations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTag(): ?array
    {
        return $this->tag;
    }

    public function setTag(?array $tag): self
    {
        $this->tag = $tag;

        return $this;
    }
}
