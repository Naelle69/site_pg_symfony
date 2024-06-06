<?php

namespace App\Controller\Admin;

use App\Entity\Recette;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RecetteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Recette::class;
    }

 
    public function configureFields(string $pageName): iterable
    {
        return [
          /* IdField::new('id'), */
          TextField::new('titre_back'),
          TextField::new('titre_front'),
          TextEditorField::new('texte'),
          TextField::new('lien'),
          TextField::new('soustitre'),

          ImageField::new('image_front')
          ->setBasePath("assets/images")
          ->setUploadDir("public/assets/images"),
          
          ImageField::new('image_back')
          ->setBasePath("assets/images")
          ->setUploadDir("public/assets/images"),
        ];
    }
    
}
