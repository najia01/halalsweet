<?php

namespace App\Entity;

use App\Repository\ArticlesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticlesRepository::class)]
class Articles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 50)]
    private ?string $type = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column(length: 255)]
    private ?string $thumbnail = null;

    #[ORM\ManyToMany(targetEntity: Categories::class, mappedBy: 'categoryId')]
    private Collection $categories;

    #[ORM\OneToMany(mappedBy: 'ArticleId', targetEntity: OrdersArticles::class)]
    private Collection $ordersArticles;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->ordersArticles = new ArrayCollection();
    }

    
   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(string $thumbnail): static
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * @return Collection<int, Categories>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categories $category): static
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
            $category->addCategoryId($this);
        }

        return $this;
    }

    public function removeCategory(Categories $category): static
    {
        if ($this->categories->removeElement($category)) {
            $category->removeCategoryId($this);
        }

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
            $ordersArticle->setArticleId($this);
        }

        return $this;
    }

    public function removeOrdersArticle(OrdersArticles $ordersArticle): static
    {
        if ($this->ordersArticles->removeElement($ordersArticle)) {
            // set the owning side to null (unless already changed)
            if ($ordersArticle->getArticleId() === $this) {
                $ordersArticle->setArticleId(null);
            }
        }

        return $this;
    }

    
    

   
    
    
}
