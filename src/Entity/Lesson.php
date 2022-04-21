<?php

namespace App\Entity;

use App\Entity\Trait\SlugTrait;
use App\Repository\LessonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LessonRepository::class)]
class Lesson
{
    use SlugTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'string', length: 255)]
    private $video;

    #[ORM\Column(type: 'text')]
    private $explication;

    #[ORM\Column(type: 'string', length: 255)]
    private $resource;

    #[ORM\ManyToOne(targetEntity: Section::class, inversedBy: 'lessons')]
    #[ORM\JoinColumn(nullable: false)]
    private $section;

    #[ORM\ManyToOne(targetEntity: Learn::class, inversedBy: 'lesson')]
    private $learn;

    #[ORM\Column(type: 'boolean')]
    private $is_finished;

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

    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function setVideo(string $video): self
    {
        $this->video = $video;

        return $this;
    }

    public function getExplication(): ?string
    {
        return $this->explication;
    }

    public function setExplication(string $explication): self
    {
        $this->explication = $explication;

        return $this;
    }

    public function getResource(): ?string
    {
        return $this->resource;
    }

    public function setResource(string $resource): self
    {
        $this->resource = $resource;

        return $this;
    }

    public function getSection(): ?Section
    {
        return $this->section;
    }

    public function setSection(?Section $section): self
    {
        $this->section = $section;

        return $this;
    }

    public function getLearn(): ?Learn
    {
        return $this->learn;
    }

    public function setLearn(?Learn $learn): self
    {
        $this->learn = $learn;

        return $this;
    }

    public function getIsFinished(): ?bool
    {
        return $this->is_finished;
    }

    public function setIsFinished(bool $is_finished): self
    {
        $this->is_finished = $is_finished;

        return $this;
    }
}
