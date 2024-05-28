<?php

namespace App\Controller\AdminControllers;

use App\Repository\OrderRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class OrderAdminController extends AbstractController
{
    #[Route('/adminOrder', name: 'app_order_admin')]
    public function index(OrderRepository $orderRepository): Response
    {
        $orders = $orderRepository->findAll();
        return $this->render('AdminDashboard/orders.html.twig');
    }

    #[Route('/addOrder', name: 'app_add_order_admin')]
    public function add(OrderRepository $orderRepository): Response
    {
        $orders = $orderRepository->findAll();
        return $this->render('AdminDashboard/orders.html.twig');
    }
}
