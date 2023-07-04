<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Category::class;
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
