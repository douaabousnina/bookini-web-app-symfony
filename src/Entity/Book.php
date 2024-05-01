<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $book_id = null;


    #[ORM\Column(length: 180)]
    private ?string $book_title = null;

    #[ORM\Column(length: 255)]
    private ?string $book_author = null;

    #[ORM\Column]
    private ?float $book_price = null;

    #[ORM\Column]
    private ?int $book_stock = null;

    #[ORM\Column(length: 255)]
    private ?string $book_image = null;

    public function getId(): ?int
    {
        return $this->book_id;
    }

    public function getBookTitle(): ?string
    {
        return $this->book_title;
    }

    public function setBookTitle(string $book_title): static
    {
        $this->book_title = $book_title;

        return $this;
    }

    public function getBookAuthor(): ?string
    {
        return $this->book_author;
    }

    public function setBookAuthor(string $book_author): static
    {
        $this->book_author = $book_author;

        return $this;
    }

    public function getBookPrice(): ?float
    {
        return $this->book_price;
    }

    public function setBookPrice(float $book_price): static
    {
        $this->book_price = $book_price;

        return $this;
    }

    public function getBookStock(): ?int
    {
        return $this->book_stock;
    }

    public function setBookStock(int $book_stock): static
    {
        $this->book_stock = $book_stock;

        return $this;
    }

    public function getBookImage(): ?string
    {
        return $this->book_image;
    }

    public function setBookImage(string $book_image): static
    {
        $this->book_image = $book_image;

        return $this;
    }
}
