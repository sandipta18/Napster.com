<?php

namespace App\Entity;

use App\Repository\PostsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostsRepository::class)]
class Posts
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'posts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Test $Email = null;

    #[ORM\Column(length: 255)]
    private ?string $Post_time = null;

    #[ORM\Column(length: 255)]
    private ?string $Username = null;

    #[ORM\Column(length: 255)]
    private ?string $Content = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Display = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Video = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Audio = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?Test
    {
        return $this->Email;
    }

    public function setEmail(?Test $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getPostTime(): ?string
    {
        return $this->Post_time;
    }

    public function setPostTime(string $Post_time): self
    {
        $this->Post_time = $Post_time;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->Username;
    }

    public function setUsername(string $Username): self
    {
        $this->Username = $Username;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->Content;
    }

    public function setContent(string $Content): self
    {
        $this->Content = $Content;

        return $this;
    }

    public function getDisplay(): ?string
    {
        return $this->Display;
    }

    public function setDisplay(?string $Display): self
    {
        $this->Display = $Display;

        return $this;
    }

    public function getVideo(): ?string
    {
        return $this->Video;
    }

    public function setVideo(?string $Video): self
    {
        $this->Video = $Video;

        return $this;
    }

    public function getAudio(): ?string
    {
        return $this->Audio;
    }

    public function setAudio(?string $Audio): self
    {
        $this->Audio = $Audio;

        return $this;
    }
}
