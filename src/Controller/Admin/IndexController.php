<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/* @Route("/admin/loggedin/home") */
class IndexController extends AbstractController 
{

	/* @Route("/admin/loggedin/home", methods="GET", name="admin_loggedin_index") */
	public function index() 
	{
		return $this->render('admin/blog/index.html.twig');
	}
}