<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use ApiPlatform\Core\Annotation\ApiResource;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
#[ApiResource(
    collectionOperations: ['get'],
    itemOperations: ['get'],
)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    #[Gedmo\Timestampable(on: 'create')]
    private $datereservation;

    #[ORM\Column(type: 'date')]
    #[Gedmo\Timestampable(on: 'create')]
    private $dateborrowed;

    #[ORM\OneToOne(inversedBy: 'reservation', targetEntity: Books::class, cascade: ['persist', 'remove'])]
    private $bookId;

    #[ORM\ManyToOne(targetEntity: Users::class, inversedBy: 'reservations')]
    private $userId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatereservation(): ?\DateTimeInterface
    {
        return $this->datereservation;
    }

    public function setDatereservation(\DateTimeInterface $datereservation): self
    {
        $this->datereservation = $datereservation;

        return $this;
    }

    public function getDateborrowed(): ?\DateTimeInterface
    {
        return $this->dateborrowed;
    }

    public function setDateborrowed(\DateTimeInterface $dateborrowed): self
    {
        $this->dateborrowed = $dateborrowed;

        return $this;
    }

    public function getBookId(): ?Books
    {
        return $this->bookId;
    }

    public function setBookId(?Books $bookId): self
    {
        $this->bookId = $bookId;

        return $this;
    }

    public function getUserId(): ?Users
    {
        return $this->userId;
    }

    public function setUserId(?Users $userId): self
    {
        $this->userId = $userId;

        return $this;
    }
}
