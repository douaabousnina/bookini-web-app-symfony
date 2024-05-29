<?php

namespace App\Controller\AdminControllers;

use App\Repository\OrderRepository;
use Doctrine\ORM\EntityManager;
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
        return $this->render('AdminDashboard/orders.html.twig', [
            'orders' => $orders
        ]);
    }

    #[Route('/editOrder/{id}', name: 'app_edit_order_admin')]
    public function edit(OrderRepository $orderRepository, int $id): Response
    {
        $order = $orderRepository->find($id);
        return $this->render('AdminDashboard/editOrder.html.twig', [
            'order' => $order
        ]);
    }

    

    #[Route('/deleteOrder/{id}', name: 'app_delete_order_admin')]
    public function delete(OrderRepository $orderRepository, EntityManager $entityManager, int $id): Response
    {
        $order = $orderRepository->find($id);
        $entityManager->remove($order);
        $entityManager->flush();
        return $this->redirect('/adminOrder');
    }
}
