<?php

namespace App\Controller\AdminControllers;

use App\Entity\Book;
use App\Form\BookType;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class BookAdminController extends AbstractController
{
    #[Route('/Books/admin', name: 'books')]

    public function index(BookRepository $bookRepository): Response
    {
        $books = $bookRepository->findAll();
        return $this->render('AdminDashboard/books.html.twig', [
            'books' => $books
        ]);
    }
    #[Route('/addBook/admin', name: 'app_add_book_admin')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $book = new Book();
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $book->setBookPrice($form->get('book_price')->getData());
            $book->setBookTitle($form->get('book_title')->getData());
            $book->setBookAuthor($form->get('book_author')->getData());
            $book->setBookImage($form->get('book_image')->getData());
            $book->setBookDescription($form->get('book_description')->getData());
            $book->setBookStock($form->get('book_stock')->getData());
            
            $em->persist($book);
            $em->flush();

            $this->addFlash('success', 'Book added successfully!');

            return $this->redirect('/Books/admin');
        }

        return $this->render('AdminDashboard/addBook.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/editBook/{id}', name: 'app_edit_book_admin')]
    public function edit(BookRepository $bookRepository, int $id, Request $request, EntityManagerInterface $entityManager): Response
    {
        $book = $bookRepository->find($id);
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $book->setBookPrice($form->get('book_price')->getData());
            $book->setBookTitle($form->get('book_title')->getData());
            $book->setBookAuthor($form->get('book_author')->getData());
            $book->setBookImage($form->get('book_image')->getData());
            $book->setBookDescription($form->get('book_description')->getData());
            $entityManager->flush();

            $this->addFlash('success', 'Book updated successfully!');

            return $this->redirect('/Books/admin');
        }

        return $this->render('AdminDashboard/editBook.html.twig', [
            'form' => $form
        ]);
    }



    #[Route('/deleteBook/{id}', name: 'app_delete_book_admin')]
    public function delete(BookRepository $bookRepository, EntityManagerInterface $entityManager, int $id): Response
    {
        $book = $bookRepository->find($id);
        $entityManager->remove($book);
        $entityManager->flush();
        $this->addFlash('success', 'Book deleted successfully!');
        return $this->redirect('/Books/admin');
    }
}
