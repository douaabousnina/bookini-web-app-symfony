<?php

namespace App\Controller\ClientControllers;

use App\Entity\Book;
use App\Entity\Order;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;

use function Symfony\Component\Clock\now;

#[Route('/cart', name: 'cart_')]
class CartController extends AbstractController
{

    #[Route('/', name: 'index')]
    public function index(SessionInterface $session, BookRepository $bookRepository): Response
    {
        $cart = $session->get('cart', []);
        $data = [];
        $total = 0;
        foreach ($cart as $id => $quantity) {
            $book = $bookRepository->find($id);
            $data[] = [
                'book' => $book,
                'quantite' => 1
            ];
            $total += $book->getBookPrice();
        }
        return $this->render('UserInterface/cart.html.twig', compact('data', 'total'));
    }

    #[Route('/add/{id}', name: 'add')]
    public function add(Book $book, SessionInterface $session)
    {
        $id = $book->getId();

        $cart = $session->get('cart', []);

        $cart[$id] = 1;

        $session->set('cart', $cart);

        return $this->redirectToRoute('cart_index');
    }

    #[Route('/remove/{id}', name: 'remove')]
    public function remove(Book $book, SessionInterface $session)
    {
        $id = $book->getId();

        $cart = $session->get('cart', []);

        if (!empty($cart[$id])) {
            unset($cart[$id]);
        }
        $session->set('cart', $cart);

        return $this->redirectToRoute('cart_index');
    }


    #[Route('/buy', name: 'buy')]
    public function buy(SessionInterface $session, EntityManagerInterface $entityManager, BookRepository $bookRepository )
    {
        
        $order = new Order();

        $order->setOrderDate(new \DateTime('today'));

        $cartElements = $session->get('cart');
        
        // foreach ($cartElements as $cartElement) {
        //     $book = $bookRepository->find($cartElement->);
        // }
        
        $session->remove('cart');
        $this->addFlash('success', 'Your order has been placed successfully!');
        return $this->redirectToRoute('cart_index');
    }
}
