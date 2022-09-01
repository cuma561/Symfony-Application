<?php

namespace App\Controller\Admin;

use App\Repository\TagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class TagController extends AbstractController
{

	public function tags(TagRepository $tags): Response {

		$tagsList = $tags->findAll($tags);

		return $this->render('admin/tag/tag.html.twig', ['tags' => $tagsList]);
	}
}