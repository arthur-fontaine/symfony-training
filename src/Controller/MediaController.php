<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MediaController extends AbstractController
{
    #[Route('/detail/{id}', name: 'detail')]
    public function detail($id): Response
    {
        return $this->render('media/detail.html.twig', ['id' => $id]);
    }

    #[Route('/detail/serie/{id}', name: 'detail_serie')]
    public function detailSerie($id): Response
    {
        return $this->render('media/detail_serie.html.twig', ['id' => $id]);
    }

    #[Route('/discover', name: 'discover')]
    public function discover(): Response
    {
        return $this->render('media/discover.html.twig');
    }
}
