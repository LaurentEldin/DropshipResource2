<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
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
     *      minMessage = "Votre prénom doit contenir {{ limit }} de caractère minimum ",
     *      maxMessage = "Votre prénom doit contenir {{ limit }} de caractère maximum ",
     *     )
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Votre nom ne peut pas contenir de numéro"
     *     )
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Email(
     *     message = "Votre email n'est pas au bon format"
     * )
     */
    private $mail;

    /**
     * @ORM\Column(type="string")
     * @Assert\Length(
     *     min = 8,
     *     max = 20,
     *     minMessage = "Numéro trop court",
     *     maxMessage = "Numéro trop long"
     *     )
     * @Assert\Regex(pattern="^(?:(?:\+|00)33[\s.-]{0,3}(?:00[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$^",
     *      message="Format incorrect")
     */
    private $phone;

/**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *     min = 0,
     *     max = 50,
     *     minMessage = "Texte trop court",
     *     maxMessage = "Texte trop long"
     *     )
     */
    private $subject;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Length(
     *      min = 0,
     *      minMessage = " Votre texte doit contenir au minium {{ limit }} caractères",
     *      )
     */
    private $message;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

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

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

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

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}
