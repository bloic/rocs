<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\OfficeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/history", name="history_")
 */
class HistoryController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param CategoryRepository $categoryRepository
     * @param OfficeRepository $officeRepository
     * @return Response
     */
    public function index(CategoryRepository $categoryRepository, OfficeRepository $officeRepository): Response
    {

        return $this->render('history/index.html.twig', [
            'categories'=>$categoryRepository->findAll(),
            'offices'=>$officeRepository->findBy([],[],1),
            'members'=>$categoryRepository->findCountSkaters(),

        ]);
    }
}
