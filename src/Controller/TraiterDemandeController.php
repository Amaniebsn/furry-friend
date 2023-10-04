<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\TraiterDemandeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\Request;

class TraiterDemandeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    #[Route('/traiter/demande', name: 'app_traiter_demande')]
    public function index(): Response

    {

        /*
        $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $plaintextPassword
        );
        $user->setPassword($hashedPassword); 
        */

        $user = new User();
        $notification = null;

        $form = $this->createForm(TraiterDemandeType::class, $user);

    
        return $this->render('traiter_demande/index.html.twig',[
            'form' => $form->createView(),
            'notification' => $notification
        ]);
    }


}






