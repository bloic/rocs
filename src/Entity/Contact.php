<?php


namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;


class Contact
{
    private ?int $id;

    /**
     * @Assert\Length(max=255)
     * @Assert\NotBlank
     */
    private ?string $firstname;

    /**
     * @Assert\Length(max=255)
     * @Assert\NotBlank
     */
    private ?string $lastname;

    /**
     * @Assert\Length(max=20)
     * @Assert\NotBlank
     */
    private ?string $phone;

    /**
     * @Assert\Length(max=100)
     * @Assert\Email
     * @Assert\NotBlank
     */
    private string $email;

    /**
     * @Assert\Length(max=255)
     * @Assert\NotBlank
     */
    private string $subject;

    /**
     * @Assert\Length(max=1500)
     * @Assert\NotBlank
     */
    private ?string $message;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

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

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSubject(): string
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
}