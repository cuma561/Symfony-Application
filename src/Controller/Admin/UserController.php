<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
	public function index() {

		return $this->render('admin/blog/user.html.twig');
	}
}