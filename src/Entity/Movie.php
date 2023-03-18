<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\MovieRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
// use ApiPlatform\Metadata\GetCollection;
// use ApiPlatform\Metadata\Post;

#[ORM\Entity(repositoryClass: MovieRepository::class)]
// #[ApiResource(operations: [
//     new GetCollection(),
//     new Post(),

// ])]


#[ApiResource(
    paginationItemsPerPage: 10, // Pagination par rapport aux performances
)]
#[ApiFilter(
    SearchFilter::class,
    properties: [
        'title' => SearchFilter::STRATEGY_PARTIAL
    ]
)]

class Movie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?int $duration = null;

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

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }
}
