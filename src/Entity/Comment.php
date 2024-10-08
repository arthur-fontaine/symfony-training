<?php

namespace App\Entity;

use App\Enum\CommentStatusEnum;
use App\Repository\CommentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentsRepository::class)]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'comments')]
    private ?User $commenter = null;

    #[ORM\ManyToOne(inversedBy: 'comments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Media $media = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\Column(enumType: CommentStatusEnum::class)]
    private ?CommentStatusEnum $status = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'childrenComments')]
    private ?self $parentComment = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'parentComment')]
    private Collection $childrenComments;

    public function __construct()
    {
        $this->childrenComments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommenter(): ?User
    {
        return $this->commenter;
    }

    public function setCommenter(?User $commenter): static
    {
        $this->commenter = $commenter;

        return $this;
    }

    public function getMedia(): ?Media
    {
        return $this->media;
    }

    public function setMedia(?Media $media): static
    {
        $this->media = $media;

        return $this;
    }


    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getStatus(): ?CommentStatusEnum
    {
        return $this->status;
    }

    public function setStatus(CommentStatusEnum $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getParentComment(): ?self
    {
        return $this->parentComment;
    }

    public function setParentComment(?self $parentComment): static
    {
        $this->parentComment = $parentComment;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getChildrenComments(): Collection
    {
        return $this->childrenComments;
    }

    public function addChildrenComment(self $childrenComment): static
    {
        if (!$this->childrenComments->contains($childrenComment)) {
            $this->childrenComments->add($childrenComment);
            $childrenComment->setParentComment($this);
        }

        return $this;
    }

    public function removeChildrenComment(self $childrenComment): static
    {
        if ($this->childrenComments->removeElement($childrenComment)) {
            // set the owning side to null (unless already changed)
            if ($childrenComment->getParentComment() === $this) {
                $childrenComment->setParentComment(null);
            }
        }

        return $this;
    }
}
