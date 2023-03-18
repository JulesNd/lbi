<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\MovieHasTypeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MovieHasTypeRepository::class)]
#[ApiResource]
class MovieHasType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
   


    #[ORM\Column]
    private ?int $Movie_id = null;

    #[ORM\Column]
    private ?int $Type_id = null;



    public function getMovieId(): ?int
    {
        return $this->Movie_id;
    }

    public function setMovieId(int $Movie_id): self
    {
        $this->Movie_id = $Movie_id;

        return $this;
    }

    public function getTypeId(): ?int
    {
        return $this->Type_id;
    }

    public function setTypeId(int $Type_id): self
    {
        $this->Type_id = $Type_id;

        return $this;
    }
}
