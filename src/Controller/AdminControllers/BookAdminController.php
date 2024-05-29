<?php

namespace App\Controller\AdminControllers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BookAdminController extends AbstractController
{
    #[Route('/book/admin', name: 'app_book_admin')]
    public function index(): Response
    {
        return $this->render('AdminDashboard/addBook.html.twig');
    }
}
