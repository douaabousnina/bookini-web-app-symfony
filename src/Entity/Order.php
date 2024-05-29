<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $order_id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $order_date = null;

    #[ORM\Column]
    private float $order_total_amount;

    #[ORM\ManyToOne(inversedBy: 'Order')]
    #[ORM\JoinColumn(nullable: false)]
    private User $user_id;

    /**
     * @var Collection<int, OrderBook>
     */
    #[ORM\OneToMany(targetEntity: OrderBook::class, mappedBy: 'orderId', orphanRemoval: true)]
    private Collection $orderBooks;

    public function __construct()
    {
        $this->orderBooks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->order_id;
    }

    public function getOrderDate(): ?\DateTimeInterface
    {
        return $this->order_date;
    }

    public function setOrderDate(\DateTimeInterface $order_date): static
    {
        $this->order_date = $order_date;

        return $this;
    }

    public function getOrderTotalAmount(): ?float
    {
        return $this->order_total_amount;
    }

    public function setOrderTotalAmount(float $order_total_amount): static
    {
        $this->order_total_amount = $order_total_amount;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * @return Collection<int, OrderBook>
     */
    public function getOrderBooks(): Collection
    {
        return $this->orderBooks;
    }

    public function addOrderBook(OrderBook $orderBook): static
    {
        if (!$this->orderBooks->contains($orderBook)) {
            $this->orderBooks->add($orderBook);
            $orderBook->setOrderId($this);
        }

        return $this;
    }

    public function removeOrderBook(OrderBook $orderBook): static
    {
        if ($this->orderBooks->removeElement($orderBook)) {
            // set the owning side to null (unless already changed)
            if ($orderBook->getOrderId() === $this) {
                $orderBook->setOrderId(null);
            }
        }

        return $this;
    }
}
