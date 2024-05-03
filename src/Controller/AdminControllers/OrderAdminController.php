<?php

namespace App\Controller\AdminControllers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class OrderAdminController extends AbstractController
{
    #[Route('/order/admin', name: 'app_order_admin')]
    public function index(): Response
    {
        return $this->render('');
    }
}
