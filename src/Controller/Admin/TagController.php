<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TagController extends AbstractController
{

	public function index() {

		return $this->render('admin/tag/tag.html.twig');
	}
}