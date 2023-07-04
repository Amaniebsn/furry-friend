<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class TraiterDemandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add ('firstname', TextType::class, [
            'label' => 'Prénom',
            'constraints' => new  length([
                'min' => 2,
                'max' => 30
            ]),
            'attr' => [
                'placeholder' => 'Entrer votre prénom'
                ]
                ] )
                ->add ('lastname', TextType::class, [
                    'label' => 'Nom',
                    'constraints' => new length([
                        'min' => 2,
                        'max' => 30
                    ]),
                    'attr' => [
                        'placeholder' => 'Entrer votre nom'
                        ]
                        ] )
        
        ->add('email', EmailType::class, [
            'label' => 'E-mail',
            'constraints' => new  length([
                'min' => 2,
                'max' => 55
            ]),
            'attr' => [
                'placeholder' => 'Entrer votre e-mail'
                ]
                ] )

        ->add('submit', SubmitType::class, [
                    'label' => 'Valider'
                    ] )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
