<?php
namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent()]
class Tag
{
    public string $data;
    public string $title = '';
    public string $color = 'white/30';
}
