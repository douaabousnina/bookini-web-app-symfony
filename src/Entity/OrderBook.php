<?php

namespace App\Entity;

use App\Repository\OrderBookRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderBookRepository::class)]
class OrderBook
{


    #[ORM\Column]
    private int $quantity ;

    #[ORM\Column]
    private float $price ;
    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'orderBooks')]
    #[ORM\JoinColumn(nullable: false)]
    private Order $order_id;
    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'orderBooks')]
    #[ORM\JoinColumn(nullable: false)]
    private Book $book_id ;

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getOrderId(): ?Order
    {
        return $this->order_id;
    }

    public function setOrderId(?Order $order_id): static
    {
        $this->order_id = $order_id;

        return $this;
    }

    public function getBookID(): ?Book
    {
        return $this->book_id;
    }

    public function setBookID(?Book $book_id): static
    {
        $this->book_id = $book_id;

        return $this;
    }
}
