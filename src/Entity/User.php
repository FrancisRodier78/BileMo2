<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use ApiPlatform\Core\Annotation\ApiResource;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
  * @ApiResource(
 *  collectionOperations={"GET"={"path"="/v1/users"}, "POST"={"path"="/v1/user"}},
 *  itemOperations={"GET"={"path"="/v1/user/{id}"},"DELETE"={"path"="/v1/user/{id}"}}
 * )

 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le nom de l'utilisateur est obligatoire.")
     * @Assert\Length(min = 2, max = 255, minMessage = "Le nom de l'utilisateur doit êtres compris entre 3 et 255 caractères.", maxMessage = "Le nom de l'utilisateur doit êtres compris entre 3 et 255 caractères.")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le prénom de l'utilisateur est obligatoire.")
     * @Assert\Length(min = 2, max = 255, minMessage = "Le prénom de l'utilisateur doit êtres compris entre 3 et 255 caractères.", maxMessage = "Le prénom de l'utilisateur doit êtres compris entre 3 et 255 caractères.")
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="L'adresse de l'utilisateur est obligatoire.")
     * @Assert\Length(max = 255, maxMessage = "L'adresse de l'utilisateur ne doit pas dépasser 255 caractères.")
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="users")
     * @Assert\NotBlank(message="Le client est obligatoire.")
     */
    private $client;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }
}
