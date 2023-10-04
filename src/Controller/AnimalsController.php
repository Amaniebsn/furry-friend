<?php

namespace App\Controller;

use App\Classe\Search;
use App\Entity\Animals;
use App\Form\SearchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AnimalsController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/animals', name: 'app_animals')]
    public function index(Request $request)
    {
  
        $animals = $this->entityManager->getRepository(Animals::class)->findAll();
        $search = new Search();
        $form = $this->createForm( SearchType::class, $search);
        $form->handleRequest($request);

        if ($request->isMethod('POST')) {
            if ($form->isSubmitted() && $form->isValid()) {
                $animals = $this->entityManager->getRepository(Animals::class)->findWithSearch($search);
            }
        }

        return $this->render('Animals/index.html.twig', [
            'animals' => $animals,
            'form' => $form->createView()
        ]);
    }

    #[Route('/animal/{id}', name: 'app_animal_details')]
    public function details($id): Response
    {
       $animal = $this->entityManager->getRepository(Animals::class)->find($id);

        return $this->render('animals/animal.html.twig',[
            'animal' => $animal
        ]);

    }

}
    
   