<?php

namespace App\Controller;

use App\Entity\Media;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MediaController extends AbstractController
{
    #[Route('/medias/{id}', name: 'detail')]
    public function detail(Media $media): Response
    {
        return $this->render('media/detail.html.twig', [
            'media' => $media,
        ]);
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
