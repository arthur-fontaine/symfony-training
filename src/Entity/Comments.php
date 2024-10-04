<?php

namespace App\Entity;

use App\Enum\CommentStatusEnum;
use App\Repository\CommentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentsRepository::class)]
class Comments
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

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'parentComment')]
    private ?self $childrenComments = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'childrenComments')]
    private Collection $parentComment;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\Column(enumType: CommentStatusEnum::class)]
    private ?CommentStatusEnum $status = null;

    public function __construct()
    {
        $this->parentComment = new ArrayCollection();
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

    public function getChildrenComments(): ?self
    {
        return $this->childrenComments;
    }

    public function setChildrenComments(?self $childrenComments): static
    {
        $this->childrenComments = $childrenComments;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getParentComment(): Collection
    {
        return $this->parentComment;
    }

    public function addParentComment(self $parentComment): static
    {
        if (!$this->parentComment->contains($parentComment)) {
            $this->parentComment->add($parentComment);
            $parentComment->setChildrenComments($this);
        }

        return $this;
    }

    public function removeParentComment(self $parentComment): static
    {
        if ($this->parentComment->removeElement($parentComment)) {
            // set the owning side to null (unless already changed)
            if ($parentComment->getChildrenComments() === $this) {
                $parentComment->setChildrenComments(null);
            }
        }

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
}
