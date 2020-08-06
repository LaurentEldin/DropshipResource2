<?php

namespace App\Entity;

use App\Repository\VisionRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=VisionRepository::class)
 */
class Vision
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Date
     * @var string A "d-m-Y" formatted value
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Votre nom doit contenir {{ limit }} de caractère minimum ",
     *      maxMessage = "Votre nom doit contenir {{ limit }} de caractère maximum ",
     *      )
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     *  @Assert\Length(
     *      min = 10,
     *      minMessage = " Votre texte doit contenir au minium {{ limit }} caractères",
     *      )
     * @Assert\Regex("/^\w+/")
     */
    private $article;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?int
    {
        return $this->date;
    }

    public function setDate(?int $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getArticle(): ?string
    {
        return $this->article;
    }

    public function setArticle(string $article): self
    {
        $this->article = $article;

        return $this;
    }
}
