<?php

namespace App\Controller;

use App\Entity\Blog;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\BlogType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class BlogController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }
    #[Route('/blog', name: 'app_blog')]
    public function index(): Response
    {
        $notification = null;

        $blog = new Blog();

        /*
        $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $plaintextPassword
        );
        $user->setPassword($hashedPassword); 
        */



        $form = $this->createForm(BlogType::class, $blog);

    
    
        return $this->render('blog/index.html.twig',[
            'form' => $form->createView(),
            'notification' => $notification
        ]);
    
}
}