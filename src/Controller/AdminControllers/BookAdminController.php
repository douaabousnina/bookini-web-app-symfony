<?php

namespace App\Controller\AdminControllers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BookAdminController extends AbstractController
{
    #[Route('/addBook/admin', name: 'add_book_admin')]
    public function add(): Response
    {
        return $this->render('AdminDashboard/addBook.html.twig');
    }

    #[Route('/deleteBook/admin', name: 'delete_book_admin')]
    public function delete(): Response
    {
        return $this->render('AdminDashboard/books.html.twig');
    }

    #[Route('/editBook/admin', name: 'edit_book_admin')]
    public function edit(): Response
    {
        return $this->render('AdminDashboard/addBook.html.twig');
    }
}
