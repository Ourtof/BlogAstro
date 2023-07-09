<?php

namespace App\Entity;

use App\Repository\IllustrationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IllustrationRepository::class)]
class Illustration
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_illustration = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_fichier = null;

    #[ORM\Column]
    private ?int $id_article = null;

    #[ORM\ManyToOne(inversedBy: 'illustrations')]
    private ?article $article_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdIllustration(): ?int
    {
        return $this->id_illustration;
    }

    public function setIdIllustration(int $id_illustration): self
    {
        $this->id_illustration = $id_illustration;

        return $this;
    }

    public function getNomFichier(): ?string
    {
        return $this->nom_fichier;
    }

    public function setNomFichier(string $nom_fichier): self
    {
        $this->nom_fichier = $nom_fichier;

        return $this;
    }

    public function getIdArticle(): ?int
    {
        return $this->id_article;
    }

    public function setIdArticle(int $id_article): self
    {
        $this->id_article = $id_article;

        return $this;
    }

    public function getArticleId(): ?article
    {
        return $this->article_id;
    }

    public function setArticleId(?article $article_id): self
    {
        $this->article_id = $article_id;

        return $this;
    }
}
