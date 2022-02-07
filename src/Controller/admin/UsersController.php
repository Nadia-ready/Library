<?php

namespace App\Controller\admin;


use App\Entity\Users;
use App\Form\UsersType;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UsersController extends AbstractController
{
//Show list of users

    /**
     * @Route("admin/users", name="users_list")
     */
    public function usersList(UsersRepository $usersRepository)
    {

        $users = $usersRepository->findAll();

        return $this->render('admin/users.html.twig', [
            'users' => $users
        ]);
    }


    // delete users

    /**
     * @Route("admin/users/{id}/delete", name="users_delete")
     */
    public function usersDelete($id, UsersRepository $usersRepository, EntityManagerInterface $entityManager)
    {
        $user = $usersRepository->find($id);
        $entityManager->remove($user);
        $entityManager->flush();

        return $this->redirectToRoute("users_list");
    }

    // Create users

    /**
     * @Route("admin/users/create", name="users_create")
     */
    public function usersCreate(Request $request, EntityManagerInterface $entityManager)
    {
        //creation of the form with the fields of the users table
        $user = new Users();
        $userForm = $this->createForm(UsersType::class, $user);

        $userForm->handleRequest($request);

        //if the form is submitted and valid we send the data
        if ($userForm->isSubmitted() && $userForm->isValid()) {
            $entityManager->persist($user);
            $entityManager->flush();
        }


        return $this->render('admin/users-create.html.twig', [
            'userForm' => $userForm->createView()
        ]);
    }


    //modify list of users

    /**
     * @Route("admin/users/{id}/update", name="users_update")
     */
    public function updateUsers($id, UsersRepository $usersRepository, Request $request, EntityManagerInterface $entityManager)
    {
        $user = $usersRepository->find($id);
        $userForm = $this->createForm(UsersType::class, $user);

        $userForm->handleRequest($request);

        //if the form is submitted and valid we send the data
        if ($userForm->isSubmitted() && $userForm->isValid()) {
            $entityManager->persist($user);
            $entityManager->flush();
        }


        return $this->render('admin/users-create.html.twig', [
            'userForm' => $userForm->createView()
        ]);
    }


}