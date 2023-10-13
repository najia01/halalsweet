<?php

namespace App\Entity;

use App\Repository\OrdersArticlesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrdersArticlesRepository::class)]
class OrdersArticles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\ManyToOne(inversedBy: 'ArticleId')]
    private ?orders $orderId = null;

    #[ORM\ManyToOne(inversedBy: 'ordersArticles')]
    private ?orders $OrderId = null;

    #[ORM\ManyToOne(inversedBy: 'ordersArticles')]
    private ?articles $ArticleId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getOrderId(): ?orders
    {
        return $this->orderId;
    }

    public function setOrderId(?orders $orderId): static
    {
        $this->orderId = $orderId;

        return $this;
    }

    public function getArticleId(): ?articles
    {
        return $this->ArticleId;
    }

    public function setArticleId(?articles $ArticleId): static
    {
        $this->ArticleId = $ArticleId;

        return $this;
    }
}
