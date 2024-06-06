<?php

namespace App\Controller\Admin;

use App\Entity\Plat;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PlatCrudController extends AbstractCrudController
{   
    public static function getEntityFqcn(): string
    {
        return Plat::class;
    }
   
    public function configureFields(string $pageName): iterable
    {
        return [
            /* IdField::new('id'), */
            TextField::new('titre'),
            TextEditorField::new('texte'),
            MoneyField::new('price')
            ->setCurrency('EUR'),
            /* NumberField::new('price'), */
            ImageField::new('image')
            ->setBasePath("assets/images")
            ->setUploadDir("public/assets/images"),
        ];
    }
   
}


