<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SubscriptionController extends AbstractController
{
    #[Route('/subscriptions', name: 'subscriptions')]
    public function abonnements(): Response
    {
        return $this->render('subscription/subscription.html.twig', [
        ]);
    }
}
