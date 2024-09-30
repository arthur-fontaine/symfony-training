<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MovieController extends AbstractController
{
    #[Route('/movies/{id}', name: 'movie_show')]
    public function show(string $id)
    {
        return $this->render('movie/show.html.twig', [
            'id' => $id,
            'movie_title' => 'The Godfather',
        ]);
    }
}
