<?php

namespace App\Controller;

use App\Entity\Publication;
use App\Repository\PictureRepository;
use App\Repository\PublicationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home_index")
     * @param PictureRepository $pictureRepository
     * @param PublicationRepository $publicationRepository
     * @return Response
     */
    public function index(PictureRepository $pictureRepository, PublicationRepository $publicationRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'pictures'=>$pictureRepository->findAll(),
            'publications'=>$publicationRepository->findAll()
        ]);
    }


}
