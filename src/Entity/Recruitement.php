<?php

namespace App\Entity;

use App\Repository\RecruitementRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=RecruitementRepository::class)
 */
class Recruitement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Votre nom doit contenir {{ limit }} de caractère minimum ",
     *      maxMessage = "Votre nom doit contenir {{ limit }} de caractère maximum ",
     *      )
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Votre nom ne peut pas contenir de nom"
     *     )
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Votre prénom doit contenir {{ limit }} de caractère minimum ",
     *      maxMessage = "Votre prénom doit contenir {{ limit }} de caractère maximum ",
     *     )
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Votre prénom ne peut pas contenir de prénom"
     *     )
     */
    private $surname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(
     *     message = "L'eMail '{{ value }}' n'est pas valide."
     * )
     */
    private $mail;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Length(
     *     min = 8,
     *     max = 20,
     *     minMessage = "Numéro trop court",
     *     maxMessage = "Numéro trop long"
     *     )
     */
    private $phone;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(
     *      min = 10,
     *      minMessage = " Votre texte doit contenir au minium {{ limit }} caractères",
     *      )
     */
    private $message;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\File(
     *     mimeTypes = {"application/pdf", "application/x-pdf"},
     *     mimeTypesMessage = "Seul le format pdf est accepté"
     * )
     */
    private $document;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(?int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDocument()
    {
        return $this->document;
    }

    public function setDocument( $document): self
    {
        $this->document = $document;

        return $this;
    }

    public function setImg($filename)
    {
    }
}
