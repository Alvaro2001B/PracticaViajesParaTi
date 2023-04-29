<?php

namespace App\Entity;

use App\Repository\ProveedorRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProveedorRepository::class)
 */
class Proveedor
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=9, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $active;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $create_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $update_date;

    /**
     * @param $name
     * @param $mail
     * @param $telephone
     * @param $type
     * @param $active
     * @param $update_date
     */
    public function __construct($name=null, $mail=null, $telephone=null, $type=null, $active=null)
    {
        $this->name = $name;
        $this->mail = $mail;
        $this->telephone = $telephone;
        $this->type = $type;
        $this->active = $active;
        $date = new DateTime('now');
        $this->update_date = $date;
        $this->create_date = $date;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return false|string
     */
    public function getCreateDate()
    {
        return $this->create_date;
    }

    /**
     * @param false|string $create_date
     */
    public function setCreateDate(): void
    {
        $date = new DateTime('now');
        $this->create_date = $date;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getUpdateDate(): ?\DateTimeInterface
    {
        return $this->update_date;
    }

    public function setUpdateDate(): self
    {
        $date = new DateTime('now');
        $this->update_date = $date;

        return $this;
    }
}
