<?php

namespace App\Form;

use App\Entity\Avis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AvisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('description', TextType::class, [
            'label' => 'Description',
            'constraints' => new  length([
                'min' => 2,
                'max' => 30
            ]),
            'attr' => [
                    'placeholder' => 'Entrer votre avis',
                    'class' => 'form-control'

                ]
            ] )
            ->add('Note', NumberType::class, [
                'attr' => [
                    'placeholder' => 'Entrer votre note',
                    'class' => 'form-control'
                ]
            ])

            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer',
                'attr' => [
                    'class' => '"btn btn-primary'
                ]
                ] )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Avis::class,
        ]);
    }
}
