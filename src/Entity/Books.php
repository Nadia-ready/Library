<?php

namespace App\Entity;

use App\Repository\BooksRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

#[ORM\Entity(repositoryClass: BooksRepository::class)]
#[ApiResource(
    collectionOperations: ['get'],
    itemOperations: ['get'],
)]

class Books
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'string', length: 255)]
    private $cover;

    #[ORM\Column(type: 'date')]
    private $releasedate;

    #[ORM\Column(type: 'string', length: 255)]
    private $description;

    #[ORM\Column(type: 'string', length: 255)]
    private $author;

    #[ORM\Column(type: 'string', length: 255)]
    private $genre;

    #[ORM\Column(type: 'boolean')]
    private $reserved;

    #[ORM\Column(type: 'boolean')]
    private $borrowed;

    #[ORM\OneToOne(mappedBy: 'bookId', targetEntity: Reservation::class, cascade: ['persist', 'remove'])]
    private $reservation;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCover(): ?string
    {
        return $this->cover;
    }

    public function setCover(string $cover): self
    {
        $this->cover = $cover;

        return $this;
    }

    public function getReleasedate(): ?\DateTimeInterface
    {
        return $this->releasedate;
    }

    public function setReleasedate(\DateTimeInterface $releasedate): self
    {
        $this->releasedate = $releasedate;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getReserved(): ?bool
    {
        return $this->reserved;
    }

    public function setReserved(bool $reserved): self
    {
        $this->reserved = $reserved;

        return $this;
    }

    public function getBorrowed(): ?bool
    {
        return $this->borrowed;
    }

    public function setBorrowed(bool $borrowed): self
    {
        $this->borrowed = $borrowed;

        return $this;
    }

    public function getReservation(): ?Reservation
    {
        return $this->reservation;
    }

    public function setReservation(?Reservation $reservation): self
    {
        // unset the owning side of the relation if necessary
        if ($reservation === null && $this->reservation !== null) {
            $this->reservation->setBookId(null);
        }

        // set the owning side of the relation if necessary
        if ($reservation !== null && $reservation->getBookId() !== $this) {
            $reservation->setBookId($this);
        }

        $this->reservation = $reservation;

        return $this;
    }
}
