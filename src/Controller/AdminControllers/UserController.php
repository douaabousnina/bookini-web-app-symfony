<?php

<<<<<<< HEAD
namespace App\Controller\AdminControllers;
use Doctrine\ORM\EntityManagerInterface;
=======
// specifique à l admin dashboard

namespace App\Controller\AdminControllers;
>>>>>>> feature/iheb

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
<<<<<<< HEAD

    #[Route('/editUser/admin/{id}', name: 'edit_user')]
    public function edit(Request $request, User $user, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(User::class, $user);

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
                $user->setImage($newFilename);
            }

            $em->flush();

            return $this->redirectToRoute('AdminDashboard/editUser.html.twig');
        }

        return $this->render('AdminDashboard/users.html.twig', [
            'form' => $form->createView(),
            'user' => $user,
        ]);
    }

    #[Route('/admin/deleteUser/{id}', name: 'user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $em->remove($user);
            $em->flush();
        }

        return $this->redirectToRoute('AdminDashboard/users.html.twig');
=======
    #[Route('/user', name: 'app_user')]
    public function index(): Response
    {
        return new Response('');

>>>>>>> feature/iheb
    }
}
