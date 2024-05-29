<?php

namespace App\Controller\ClientControllers;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function home(BookRepository $bookRepository): Response
    {
        $books = $bookRepository->findBy([], null, 4); 

        return $this->render('UserInterface/home.html.twig', [
            'books' => $books,
        ]);
    }

    #[Route('/books', name: 'app_books')]
    public function books(BookRepository $bookRepository): Response
    {
        $books = $bookRepository->findAll(); 

        return $this->render('UserInterface/books.html.twig', [
            'books' => $books,
        ]);
    }

    #[Route('/book', name: 'app_book')]
    public function index(): Response
    {
        return new Response('<div>Hello World</div>');
    }
}
