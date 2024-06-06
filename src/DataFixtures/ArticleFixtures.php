<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 1; $i <=4 ; $i++ ){ /* on crée 10 articles */
            $article = new Article();
            $article->setTitre("Titre de l'article n°$i")
                    ->setTexte("<p>Contenu de l'article n°$i</p>")        
                    ->setImage("http://placeholder.it/350x150")
                    ->setCreatedAt(new \DateTimeImmutable());
            $manager->persist($article);   
        }
        $manager->flush();
    }
}


