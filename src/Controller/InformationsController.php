<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InformationsController extends AbstractController
{
    #[Route('/informations', name: 'app_informations')]
    public function index(): Response
    {
        return $this->render('informations/index.html.twig',);
    }

    #[Route('/adoption', name: 'app_adoption')]
    public function adoption(): Response

    {

        return $this->render('informations/adoption.html.twig',
        [ ]);

    }

    #[Route('/soins', name: 'app_soins')]
    public function soins(): Response

    {

        return $this->render('informations/soins.html.twig',
        [ ]);

    }

    #[Route('/maltraitance', name: 'app_maltraitance')]
    public function maltraitance(): Response

    {

        return $this->render('informations/maltraitance.html.twig',
        [ ]);

    }
}
