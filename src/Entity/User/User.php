<?php

namespace App\Entity\User;


use Doctrine\DBAL\Types\DateType;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Product\Product;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;



#[ORM\Entity]
#[ORM\Table(name: "user_app")]
class User implements PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(name: "user_app_id", type: "integer")]
    private int $id;
    #[ORM\Column(name: "user_app_email", type: "string", length: 50)]
    private string $email;
    #[ORM\Column(name: "user_app_firstname", type: "string", length: 30)]
    private string $firstName;
    #[ORM\Column(name: "user_app_lastname", type: "string", length: 30)]
    private string $lastName;
    #[ORM\Column(name: "user_app_birthday", type: "date")]
    private DateType $birthday;
    #[ORM\Column(name: "user_app_password", type: "string", length: 50)]
    private string $password;
    #[ORM\Column(name: "user_app_img", type: "string")]
    private string $img;
    #[ORM\JoinTable(name: "search_product")]
    #[ORM\JoinColumn(name: "product_code", referencedColumnName: "product_code")]
    #[ORM\InverseJoinColumn(name:"user_app_id", referencedColumnName: "user_app_id")]
    #[ORM\ManyToMany(targetEntity: Product::class, fetch: "LAZY")]
    private array $search_product; 
    // Getters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }


    public function getLastName(): ?string
    {
        return $this->lastName;
    }


    public function getBirthday(): ?DateType
    {
        return $this->birthday;
    }


    public function getPassword(): ?string
    {
        return $this->password;
    }


    public function getImg(): ?string
    {
        return $this->img;
    }

    // Setters

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function setBirthday(DateType $birthday): self
    {
        $this->birthday = $birthday;
        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;
        return $this;
    }
}