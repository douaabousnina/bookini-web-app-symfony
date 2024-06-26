<?php

namespace App\Controller\AdminControllers;

use App\Form\OrderType;
use App\Entity\Order;
use App\Repository\OrderRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class OrderAdminController extends AbstractController
{
     /**
     *
     * @IsGranted("ROLE_ADMIN")
     */
    #[Route('/adminOrders', name: 'app_order_admin')]
    public function index(OrderRepository $orderRepository): Response
    {
        $orders = $orderRepository->findAll();
        return $this->render('AdminDashboard/orders.html.twig', [
            'orders' => $orders
        ]);
    }

     /**
     *
     * @IsGranted("ROLE_ADMIN")
     */
    #[Route('/editOrder/{id}', name: 'app_edit_order_admin')]
    public function edit(OrderRepository $orderRepository, int $id, Request $request, EntityManagerInterface $entityManager): Response
    {
        $order = $orderRepository->find($id);

        $form = $this->createForm(OrderType::class, $order);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $order->setOrderTotalAmount($form->get('order_total_amount')->getData());
            $order->setOrderDate($form->get('order_date')->getData());
            $entityManager->flush();
        
            $this->addFlash('success', 'Order updated successfully!');

            return $this->redirect('/adminOrders');
        }

        return $this->render('AdminDashboard/editOrder.html.twig', [
            'form' => $form
        ]);
    }

     /**
     *
     * @IsGranted("ROLE_ADMIN")
     */
    #[Route('/deleteOrder/{id}', name: 'app_delete_order_admin')]
    public function delete(OrderRepository $orderRepository, EntityManagerInterface $entityManager, int $id): Response
    {
        $order = $orderRepository->find($id);
        $entityManager->remove($order);
        $entityManager->flush();
        $this->addFlash('success', 'Order deleted successfully!');
        return $this->redirect('/adminOrders');
    }
}
