<?php

namespace App\Entity;

use App\Repository\OrdersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrdersRepository::class)]
class Orders
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'orders')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $uid = null;

    #[ORM\Column]
    private ?int $total_price = null;

    #[ORM\OneToMany(mappedBy: 'orderId', targetEntity: OrdersArticles::class)]
    private Collection $ArticleId;

    #[ORM\OneToMany(mappedBy: 'OrderId', targetEntity: OrdersArticles::class)]
    private Collection $ordersArticles;

    public function __construct()
    {
        $this->ArticleId = new ArrayCollection();
        $this->ordersArticles = new ArrayCollection();
    }

  

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUid(): ?Users
    {
        return $this->uid;
    }

    public function setUid(?Users $uid): static
    {
        $this->uid = $uid;

        return $this;
    }

    public function getTotalPrice(): ?int
    {
        return $this->total_price;
    }

    public function setTotalPrice(int $total_price): static
    {
        $this->total_price = $total_price;

        return $this;
    }

    /**
     * @return Collection<int, OrdersArticles>
     */
    public function getOrdersArticles(): Collection
    {
        return $this->ordersArticles;
    }

    public function addOrdersArticle(OrdersArticles $ordersArticle): static
    {
        if (!$this->ordersArticles->contains($ordersArticle)) {
            $this->ordersArticles->add($ordersArticle);
            $ordersArticle->setOrderId($this);
        }

        return $this;
    }

    public function removeOrdersArticle(OrdersArticles $ordersArticle): static
    {
        if ($this->ordersArticles->removeElement($ordersArticle)) {
            // set the owning side to null (unless already changed)
            if ($ordersArticle->getOrderId() === $this) {
                $ordersArticle->setOrderId(null);
            }
        }

        return $this;
    }


   
}
