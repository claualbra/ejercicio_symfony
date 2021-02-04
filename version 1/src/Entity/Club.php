<?php

namespace App\Entity;

use App\Repository\ClubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClubRepository::class)
 */
class Club
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telefono;

    /**
     * @ORM\Column(type="boolean")
     */
    private $borrado;

    /**
     * @ORM\OneToMany(targetEntity=Jugadores::class, mappedBy="club")
     * @ORM\JoinColumn(nullable=true)
     */
    private $jugadores;

    public function __construct()
    {
        $this->jugadores = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getBorrado(): ?bool
    {
        return $this->borrado;
    }

    public function setBorrado(bool $borrado): self
    {
        $this->borrado = $borrado;

        return $this;
    }

    /**
     * @return Collection|Jugadores[]
     */
    public function getJugadores(): Collection
    {
        return $this->jugadores;
    }

    public function addJugadore(Jugadores $jugadore): self
    {
        if (!$this->jugadores->contains($jugadore)) {
            $this->jugadores[] = $jugadore;
            $jugadore->setClub($this);
        }

        return $this;
    }

    public function removeJugadore(Jugadores $jugadore): self
    {
        if ($this->jugadores->removeElement($jugadore)) {
            // set the owning side to null (unless already changed)
            if ($jugadore->getClub() === $this) {
                $jugadore->setClub(null);
            }
        }

        return $this;
    }

}
