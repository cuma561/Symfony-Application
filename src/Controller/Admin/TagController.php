<?php

namespace App\Controller\Admin;

use App\Entity\Tag;
use App\Repository\TagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class TagController extends AbstractController
{

	public function tags(TagRepository $tags): Response {

		$tagsList = $tags->findAll($tags);

		return $this->render('admin/tag/tag.html.twig', ['tags' => $tagsList]);
	}

	public function show(Tag $tag): Response {

		return $this->render('admin/tag/show.html.twig', ['tag' => $tag]);
	}
}