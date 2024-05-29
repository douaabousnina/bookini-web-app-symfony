<?php

namespace App\Controller\AdminControllers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BookAdminController extends AbstractController
<<<<<<< HEAD
{    #[Route('/addBook/admin', name: 'add_book')]

    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $book = new Book();
        $form = $this->createForm(Book::class, $book);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $imageFile */
            $imageFile = $form->get('image')->getData();

            if ($imageFile) {
                $newFilename = uniqid().'.'.$imageFile->guessExtension();
                try {
                    $imageFile->move(
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // Handle exception
                }
                $book->setImage($newFilename);
            }

            $em->persist($book);
            $em->flush();

            return $this->redirectToRoute('AdminDashboard/books.html.twig');
        }

        return $this->render('AdminDashboard/addBook.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/editBook/admin/{id}', name: 'edit_book_admin')]
    public function edit(Request $request, Book $book, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(Book::class, $book);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $imageFile */
            $imageFile = $form->get('image')->getData();

            if ($imageFile) {
                $newFilename = uniqid().'.'.$imageFile->guessExtension();
                try {
                    $imageFile->move(
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // Handle exception
                }
                $book->setImage($newFilename);
            }

            $em->flush();

            return $this->redirectToRoute('AdminDashboard/books.html.twig');
        }

        return $this->render('AdminDashboard/editBook.html.twig', [
            'form' => $form->createView(),
            'book' => $book,
        ]);
    }

    #[Route('/admin/deleteBook/{id}', name: 'book_delete', methods: ['POST'])]
    public function delete(Request $request, Book $book, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete'.$book->getId(), $request->request->get('_token'))) {
            $em->remove($book);
            $em->flush();
        }

        return $this->redirectToRoute('AdminDashboard/books.html.twig');
    }
}


=======
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
>>>>>>> feature/iheb
