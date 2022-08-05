<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/* @Route("/admin/loggedin/home") */
class IndexController extends AbstractController 
{

	/* @Route("/", methods="GET", name="admin_index") */
	public function index(): Response {

		return $this->render('admin/blog/index.html.twig');
	}
}