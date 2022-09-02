<?php

namespace App\Controller\Admin;

use App\Entity\Tag;
use App\Form\TagType;
use App\Repository\TagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TagController extends AbstractController
{

	public function tags(TagRepository $tags): Response {

		$tagsList = $tags->findAll($tags);

		return $this->render('admin/tag/tag.html.twig', ['tags' => $tagsList]);
	}

	public function new(Request $request): Response {

		$tag = new Tag();

		$form = $this->createForm(TagType::class, $tag)
            ->add('saveAndCreateNew', SubmitType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tag);
            $em->flush();

            
            $this->addFlash('success', 'tag.created_successfully');

            if ($form->get('saveAndCreateNew')->isClicked()) {
                return $this->redirectToRoute('admin_tags_new');
            }

            return $this->redirectToRoute('admin_tags_index');
        }

        return $this->render('admin/tag/new.html.twig', [
            'tag' => $tag,
            'form' => $form->createView(),
        ]);
	}

	public function show(Tag $tag): Response {

		return $this->render('admin/tag/show.html.twig', ['tag' => $tag]);
	}

    public function edit(Request $request, Tag $tag): Response {

        $form = $this->createForm(TagType::class, $tag);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'tag.updated_successfully');

            return $this->redirectToRoute('admin_tags_edit', ['id' => $tag->getId()]);
        }

        return $this->render('admin/tag/edit.html.twig', [
            'tag' => $tag,
            'form' => $form->createView(),
        ]);
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