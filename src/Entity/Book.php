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

    #[ORM\Column(length: 255)]
    private ?string $book_description = null;

    public function getId(): ?int
    {
        return $this->book_id;
    }

    public function getbook_title(): ?string
    {
        return $this->book_title;
    }

    public function setbook_title(string $book_title): static
    {
        $this->book_title = $book_title;

        return $this;
    }

    public function getbook_author(): ?string
    {
        return $this->book_author;
    }

    public function setbook_author(string $book_author): static
    {
        $this->book_author = $book_author;

        return $this;
    }

    public function getbook_price(): ?float
    {
        return $this->book_price;
    }

    public function setbook_price(float $book_price): static
    {
        $this->book_price = $book_price;

        return $this;
    }

    public function getbook_stock(): ?int
    {
        return $this->book_stock;
    }

    public function setbook_stock(int $book_stock): static
    {
        $this->book_stock = $book_stock;

        return $this;
    }

    public function getbook_image(): ?string
    {
        return $this->book_image;
    }

    public function setbook_image(string $book_image): static
    {
        $this->book_image = $book_image;

        return $this;
    }
    public function getbook_description(): ?string
    {
        return $this->book_description;
    }

    public function setbook_description(string $book_description): static
    {
        $this->book_description = $book_description;

        return $this;
    }
}
