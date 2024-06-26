<?php

namespace App\Controller\AdminControllers;

use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{

    /**
     *
     * @IsGranted("ROLE_ADMIN")
     */
    #[Route('/adminUsers', name: 'app_user_admin')]
    public function index(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();
        return $this->render('AdminDashboard/users.html.twig', [
            'users' => $users
        ]);
    }


    /**
     *
     * @IsGranted("ROLE_ADMIN")
     */
    #[Route('/editUser/{id}', name: 'app_edit_user_admin')]
    public function edit(userRepository $userRepository, int $id, Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $userRepository->find($id);
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user->setUserFullname($form->get('user_fullname')->getData());
            $user->setUserEmail($form->get('user_email')->getData());
            // $user->setVerified($form->get('isVerified')->getData());

            // $user->setRoles($form->get('roles')->getData());

            $entityManager->flush();

            $this->addFlash('success', 'User updated successfully!');

            return $this->redirect('/adminUsers');
        }

        return $this->render('AdminDashboard/editUser.html.twig', [
            'form' => $form
        ]);
    }


    /**
     *
     * @IsGranted("ROLE_ADMIN")
     */
    #[Route('/deleteUser/{id}', name: 'app_delete_user_admin')]
    public function delete(userRepository $userRepository, EntityManagerInterface $entityManager, int $id): Response
    {
        $user = $userRepository->find($id);
        $entityManager->remove($user);
        $entityManager->flush();
        $this->addFlash('success', 'User deleted successfully!');
        return $this->redirect('/adminUsers');
    }
}
