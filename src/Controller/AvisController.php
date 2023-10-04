<?php

namespace App\Controller;

use App\Entity\Avis;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\AvisType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class AvisController extends AbstractController


{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    #[Route('/avis', name: 'app_avis')]
    public function index(Request $request): Response
    {

        $notification = null;

        $avis = new Avis();

        $form = $this->createForm(AvisType::class, $avis);
        $form->handleRequest($request);

        if ($request->isMethod('POST')) {
            if ($form->isSubmitted() && $form->isValid()) {
                // code pour inserer un avis en BDD

                $user = $this->getUser();
                $avis->setAuteur($user->getFullName());

                $this->entityManager->persist($avis);
                $this->entityManager->flush();

            }
        }
        return $this->render('avis/index.html.twig', [
            'form' => $form->createView(),
            'notification' => $notification
        ]);

       
    }
}


