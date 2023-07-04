<?php

namespace App\Form;

use App\Entity\Blog;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BlogType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('title', TextType::class, [
            'label' => 'Titre'
        ])
        ->add('content', TextareaType::class, [
            'label' => 'Contenu'
        ])
        ->add('category', ChoiceType::class, [
            'label' => 'Catégorie',
            'choices' => [
                'Catégorie 1' => 'categorie1',
                'Catégorie 2' => 'categorie2',
                'Catégorie 3' => 'categorie3',
            ]
        ])
        ->add('image', FileType::class, [
            'label' => 'Image',
            'mapped' => false,
            'required' => false
        ])
        ->add('tags', TextType::class, [
            'label' => 'Tags',
            'required' => false
        ])
        ->add('submit', SubmitType::class, [
            'label' => 'Créer l\'article'
        ]);
        ;
    }
        
    

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Blog::class,
        ]);
    
}
}