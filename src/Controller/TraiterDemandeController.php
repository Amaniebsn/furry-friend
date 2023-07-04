<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\TraiterDemandeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class TraiterDemandeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    #[Route('/traiter/demande', name: 'app_traiter_demande')]
    public function index(): Response


    {

        $notification = null;

        $user = new User();

        /*
        $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $plaintextPassword
        );
        $user->setPassword($hashedPassword); 
        */



        $form = $this->createForm(TraiterDemandeType::class, $user);

        

        return $this->render('traiter_demande/index.html.twig',[
            'form' => $form->createView(),
            'notification' => $notification
        ]);
    }


}
