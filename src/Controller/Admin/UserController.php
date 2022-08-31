<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class UserController extends AbstractController
{
	public function users(UserRepository $users): Response {

		$userList = $users->findAll($users);

		return $this->render('admin/user/user.html.twig', ['users' => $userList]);
	}

	public function show(User $user): Response {

		return $this->render('admin/user/show.html.twig', ['user' => $user]);
	}

	public function new() {

	}

	public function edit(Request $request, User $user): Response {

		$form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'user.updated_successfully');

            return $this->redirectToRoute('admin_user_edit', ['id' => $user->getId()]);
        }

        return $this->render('admin/user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
	}

	public function delete() {

	}
}