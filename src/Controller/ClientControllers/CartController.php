<?php

// namespace App\Controller;
namespace App\Controller\ClientControllers;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CartController extends AbstractController
{
    #[Route('/cart', name: 'app_cart')]
    public function index(): Response
    {
        // return $this->render('');
        return new Response('<div>cart</div>');

    }
}
