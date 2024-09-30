<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin_home')]
    public function admin(): Response
    {
        return $this->render('admin/admin.html.twig');
    }

    #[Route('/admin/films', name: 'admin_films')]
    public function adminFilms(): Response
    {
        return $this->render('admin/admin_films.html.twig');
    }

    #[Route('/admin/films/add', name: 'admin_add_films')]
    public function adminAddFilms(): Response
    {
        return $this->render('admin/admin_add_films.html.twig');
    }

    #[Route('/admin/users', name: 'admin_users')]
    public function adminUsers(): Response
    {
        return $this->render('admin/admin_users.html.twig');
    }
}
