<?php

namespace App\Entity;

use App\Repository\SourceRecipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SourceRecipeRepository::class)]
class SourceRecipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Source>
     */
    #[ORM\ManyToMany(targetEntity: Source::class, inversedBy: 'recipe')]
    private Collection $source;

    /**
     * @var Collection<int, Recipe>
     */
    #[ORM\ManyToMany(targetEntity: Recipe::class, inversedBy: 'sourceRecipes')]
    private Collection $recipe;

    public function __construct()
    {
        $this->source = new ArrayCollection();
        $this->recipe = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Source>
     */
    public function getSource(): Collection
    {
        return $this->source;
    }

    public function addSource(Source $source): static
    {
        if (!$this->source->contains($source)) {
            $this->source->add($source);
        }

        return $this;
    }

    public function removeSource(Source $source): static
    {
        $this->source->removeElement($source);

        return $this;
    }

    /**
     * @return Collection<int, Recipe>
     */
    public function getRecipe(): Collection
    {
        return $this->recipe;
    }

    public function addRecipe(Recipe $recipe): static
    {
        if (!$this->recipe->contains($recipe)) {
            $this->recipe->add($recipe);
        }

        return $this;
    }

    public function removeRecipe(Recipe $recipe): static
    {
        $this->recipe->removeElement($recipe);

        return $this;
    }
}
