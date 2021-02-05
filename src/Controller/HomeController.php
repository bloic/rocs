<?php

namespace App\Controller;

use App\Entity\Publication;
use App\Repository\PictureRepository;
use App\Repository\PublicationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/home", name="home_")
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/", name="index")
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

    /**
     * @Route("{id}/", methods={"GET"}, name="publication_show")
     * @param Publication $publication
     * @return Response
     */
    public function publicationShow(Publication $publication): Response
    {
        return $this->render('home/show.html.twig', [
            'publication'=>$publication,
        ]);

    }
}
