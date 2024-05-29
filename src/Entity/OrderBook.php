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
    private Order $orderId;
    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'orderBooks')]
    #[ORM\JoinColumn(nullable: false)]
    private Book $bookID ;

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
        return $this->orderId;
    }

    public function setOrderId(?Order $orderId): static
    {
        $this->orderId = $orderId;

        return $this;
    }

    public function getBookID(): ?Book
    {
        return $this->bookID;
    }

    public function setBookID(?Book $bookID): static
    {
        $this->bookID = $bookID;

        return $this;
    }
}
