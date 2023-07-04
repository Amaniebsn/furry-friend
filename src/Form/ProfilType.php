<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class ProfilType extends AbstractType
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

          ->add ('ModeDeVie', TextType::class, [
             'label' => 'Mode de Vie',
             'constraints' => new length([
                 'min' => 2,
                 'max' => 30
                    ]),
            'attr' => [
                 'placeholder' => 'Entrer votre Mode de vie'
                     ]
                    ] )

            ->add ('Connaissances', TextType::class, [
                    'label' => 'Connaissance', 
                    'constraints' => new length([
                        'min' => 2,
                         'max' => 30
                               ]),
                'attr' => [
                     'placeholder' => 'Entrer vos connaissances'
                                ]
                               ] )
             ->add ('Preferences', TextType::class, [
                    'label' => 'Préférences',
                    'constraints' => new length([
                            'min' => 2,
                            'max' => 30
                                       ]),
                        'attr' => [
                         'placeholder' => 'Entrer vos préférences'
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
