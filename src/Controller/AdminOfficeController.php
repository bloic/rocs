<?php

namespace App\Controller;

use App\Entity\Office;
use App\Form\OfficeType;
use App\Repository\OfficeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/admin/office", name="admin_office_")
 * @IsGranted("ROLE_ADMIN")
 */
class AdminOfficeController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     * @param OfficeRepository $officeRepository
     * @return Response
     */
    public function index(OfficeRepository $officeRepository): Response
    {
        return $this->render('officeAdmin/index.html.twig', [
            'offices' => $officeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $office = new Office();
        $form = $this->createForm(OfficeType::class, $office);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($office);
            $entityManager->flush();

            return $this->redirectToRoute('admin_office_index');
        }

        return $this->render('officeAdmin/new.html.twig', [
            'office' => $office,
            'form' => $form->createView(),
        ]);
    }



    /**
     * @Route("/{id}/edit", name="edit", methods={"GET","POST"})
     * @param Request $request
     * @param Office $office
     * @return Response
     */
    public function edit(Request $request, Office $office): Response
    {
        $form = $this->createForm(OfficeType::class, $office);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_office_index');
        }

        return $this->render('officeAdmin/edit.html.twig', [
            'office' => $office,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods={"DELETE"})
     * @param Request $request
     * @param Office $office
     * @return Response
     */
    public function delete(Request $request, Office $office): Response
    {
        if ($this->isCsrfTokenValid('delete'.$office->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($office);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_office_index');
    }
}
