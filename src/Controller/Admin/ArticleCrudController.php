<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            /* IdField::new('id'), */
            TextField::new('titre'),
            TextEditorField::new('texte'), 
            DateTimeField::new('created_at'),
            ImageField::new('image')
            ->setBasePath("assets/images")
            ->setUploadDir("public/assets/images"),
           /*  DateTimeField::new("createdAt") */
            /* DateTimeField::new('DateTimeImmutable') */
        ];
    }
    
}
