<?php

namespace App\Controller;

use App\Entity\Publication;
use App\Form\PublicationType;
use App\Repository\PublicationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/admin/publication", name="admin_publication_")3
 * @IsGranted("ROLE_ADMIN")
 */
class AdminPublicationController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     * @param PublicationRepository $publicationRepository
     * @return Response
     */
    public function index(PublicationRepository $publicationRepository): Response
    {
        return $this->render('publicationAdmin/index.html.twig', [
            'publications' => $publicationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $publication = new Publication();
        $form = $this->createForm(PublicationType::class, $publication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($publication);
            $entityManager->flush();

            return $this->redirectToRoute('admin_publication_index');
        }

        return $this->render('publicationAdmin/new.html.twig', [
            'publication' => $publication,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="show", methods={"GET"})
     * @param Publication $publication
     * @return Response
     */
    public function show(Publication $publication): Response
    {
        return $this->render('publicationAdmin/show.html.twig', [
            'publication' => $publication,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Publication $publication): Response
    {
        $form = $this->createForm(PublicationType::class, $publication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_publication_index');
        }

        return $this->render('publicationAdmin/edit.html.twig', [
            'publication' => $publication,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods={"DELETE"})
     * @param Request $request
     * @param Publication $publication
     * @return Response
     */
    public function delete(Request $request, Publication $publication): Response
    {
        if ($this->isCsrfTokenValid('delete'.$publication->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($publication);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_publication_index');
    }
}
