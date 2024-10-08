<?php
namespace App\Twig\Components;

use App\Entity\Comment as CommentEntity;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent()]
class Comment
{
  public CommentEntity $comment;
}
