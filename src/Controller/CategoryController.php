<?php

namespace App\Controller;

use App\Classe\Search;
use App\Entity\Category;
use App\Form\SearchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/category', name: 'app_category')]

    public function index()
    {
  
        $category = $this->entityManager->getRepository(Category::class)->findAll();
        $search = new Search();
        $form = $this->createForm( SearchType::class, $search);
       
    

        return $this->render('category/index.html.twig', [
            'category' => $category,
            'form' => $form->createView()
        ]);
    }
}
    
   