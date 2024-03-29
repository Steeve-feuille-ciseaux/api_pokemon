<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user/add', name: 'add_user')]
    public function addUser(
        EntityManagerInterface $entityManagerInterface,
        Request $request,
        UserPasswordHasherInterface $userPasswordHasherInterface
    )
    {
        $user = new User();
        $userForm = $this->createForm(UserType::class, $user);
        $userForm->handleRequest($request);

        if ($userForm->isSubmitted() && $userForm->isValid()) {
            $user->setRoles(["ROLE_USER"]);

            $plainPassword = $userForm->get('password')->getData();
            $hashedPassword = $userPasswordHasherInterface->hashPassword($user, $plainPassword);
            $user->setPassword($hashedPassword);

            $entityManagerInterface->persist($user);
            $entityManagerInterface->flush();

            return $this->redirectToRoute("app_login");
        }

        return $this->render("user/userform.html.twig",['userForm' => $userForm->createView()]);
    }
}
