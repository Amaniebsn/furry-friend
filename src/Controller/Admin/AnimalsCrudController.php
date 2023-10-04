<?php

namespace App\Controller\Admin;

use App\Entity\Animals;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AnimalsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Animals::class;
    }

    
   public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            ImageField::new('illustration')
                ->setBasePath('assets/pictures')
                ->setUploadDir('public/assets/pictures')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            TextareaField::new('description'),
           

        ];
    }
    
}
