<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\UserRepository;

class UserController extends AbstractController
{
	public function users(UserRepository $users) {

		$userList = $users->findAll($users);

		return $this->render('admin/user/user.html.twig', ['users' => $userList]);
	}

	public function show() {

	}

	public function new() {

	}

	public function edit(){

	}

	public function delete() {

	}
}