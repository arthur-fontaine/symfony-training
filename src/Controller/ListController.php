<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListController extends AbstractController
{
    #[Route('/lists', name: 'lists')]
    public function lists(): Response
    {
        return $this->render('list/lists.html.twig');
    }

    #[Route('/upload', name: 'upload')]
    public function upload(): Response
    {
        return $this->render('list/upload.html.twig');
    }
}
