<?php

namespace App\Form;

use App\Classe\Search;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options){ 
    $builder
    ->add('string', TextType::class, [
        'label' => false,
        'required' => false,
        'attr' => [
            'placeholder' => 'Rechercher...',
            'class' => 'form-control'
                  ]
    ])
    ->add('categories', EntityType::class, [
        'label' => false,
        'required' => false,
        'class' => Category::class,
        'multiple' => true,
        'expanded' => true,
        'attr' => [
            'class' => 'text-white'
        ]
    ])
    -> add('submit', SubmitType::class,[
        'label' => 'Filtrer',
        'attr' => [
            'class' => 'btn btn-lg btn-primary'
        ]
    ])
        ;
}
public function configureOptions(OptionsResolver $resolver): void
{
    $resolver->setDefaults([
        'data_class' => Search::class,
        'method' => 'POST',
        'crsf_protection' => false,
    ]);
}

public function getBlockPrefix()
{
    return '';
}

}