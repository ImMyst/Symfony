<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ShoppingCategoryRepository")
 */
class ShoppingCategory
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @ORM\OneToMany(targetEntity="App\Entity\ShoppingItem", mappedBy="id")
     */
     private $id;

     public function __construct()
     {
         $this->id = new ArrayCollection();
     }

    /**
     * @ORM\Column(type="string")
     */

    private $name;


    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param mixed id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of Name
     *
     * @param mixed name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|ShoppingItem[]
     */
    public function getItems(): Collection
    {
        return $this->id;
    }

    public function addItem(ShoppingItem $id): self
    {
        if (!$this->id->contains($id)) {
            $this->id[] = $id;
            $id->setCategory($this);
        }

        return $this;
    }

    public function removeItem(ShoppingItem $id): self
    {
        if ($this->id->contains($id)) {
            $this->id->removeElement($id);
            // set the owning side to null (unless already changed)
            if ($id->getCategory() === $this) {
                $id->setCategory(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
      return $this->name;
    }

}
