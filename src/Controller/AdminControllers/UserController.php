<?php

namespace App\Controller\AdminControllers;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/deleteUser', name: 'delete_user')]
    public function delete(): Response
    {


        return $this->render('AdminDashboard/users.html.twig');
    }

    #[Route('/editUser/{id}', name: 'edit_user')]
    public function edit(Request $request, $id): Response
    {
        $user = $this->entityManager->getRepository(User::class)->find($id);

        if (!$user) {
            throw $this->createNotFoundException('No user found for id ' . $id);
        }

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($user);
            $this->entityManager->flush();
            $this->addFlash('success', 'User updated successfully!');

            return $this->redirectToRoute('edit_user', ['id' => $id]);
        }

        return $this->render('AdminDashboard/editUser.html.twig', [
            'form' => $form->createView(),
            'user' => $user,
        ]);
    }


}
