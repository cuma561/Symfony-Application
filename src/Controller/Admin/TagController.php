<?php

namespace App\Controller\Admin;

use App\Entity\Tag;
use App\Repository\TagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class TagController extends AbstractController
{

	public function tags(TagRepository $tags): Response {

		$tagsList = $tags->findAll($tags);

		return $this->render('admin/tag/tag.html.twig', ['tags' => $tagsList]);
	}

	public function show(Tag $tag): Response {

		return $this->render('admin/tag/show.html.twig', ['tag' => $tag]);
	}

	public function delete(Request $request, Tag $tag): Response {
		
		if (!$this->isCsrfTokenValid('delete', $request->request->get('token'))) {
            return $this->redirectToRoute('admin_tags_index');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($tag);
        $em->flush();

        $this->addFlash('success', 'tag.deleted_successfully');

        return $this->redirectToRoute('admin_tags_index');
	}
}