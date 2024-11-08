<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface 

{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private ?string $email;

    #[ORM\Column(type: 'string')]
    private string $password;

    #[ORM\Column(type: 'json')]
    private array $roles = [];

    #[ORM\Column(type: 'string')]
    private string $pseudo;

    #[ORM\Column(type: 'string', length: 500, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: 'string', length: 500, nullable: true)]
    
    private ?string $avatar = null;

    #[ORM\Column(type: 'string', length: 500, nullable: true)]
    private ?string $emploi = null;


    #[ORM\Column(type: 'string', length: 500, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(type: 'string', length: 500, nullable: true)]
    private ?string $siteURL = null;


    private ?string $confirmPassword = null;

    public function getConfirmPassword(): ?string
    {
        return $this->confirmPassword;
    }

    public function setConfirmPassword(?string $confirmPassword): self
    {
        $this->confirmPassword = $confirmPassword;

        return $this;
    }


    public function getId():int
    {
        return $this->id;
    }

   
    public function setId($id):self
    {
        $this->id = $id;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    
    public function setEmail(?string $email):self
    {
        $this->email = $email;

        return $this;
    }

    public function getUserIdentifier(): string
    {
        return (string) $this -> email; 
    }

 
    public function getPassword(): string
    {
        return $this->password;
    }

  
    public function setPassword($password):self
    {
        $this->password = $password;

        return $this;
    }

    public function getSalt(): ?string {
        return null;
      }

  
     public function eraseCredentials(): void 
    {
    
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }



    public function getPseudo()
    {
        return $this->pseudo;
    }

  
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

   
    public function getDescription()
    {
        return $this->description;
    }

    
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    
    
    public function getAvatar()
    {
        return $this->avatar;
    }

   
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    
    public function getEmploi()
    {
        return $this->emploi;
    }

   
    public function setEmploi($emploi)
    {
        $this->emploi = $emploi;

        return $this;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

   
    public function getSiteURL()
    {
        return $this->siteURL;
    }

    
    public function setSiteURL($siteURL)
    {
        $this->siteURL = $siteURL;

        return $this;
    }
}
