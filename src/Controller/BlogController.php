<?php

namespace App\Controller;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class BlogController extends AbstractController
{
    #[Route('/blog', name: 'app_blog')]
    public function index(ArticleRepository $repository ): Response
    {

        return $this->render('blog/blog.html.twig', [
            // 'controller_blog' => 'BlogController',
            "articles" => $repository->findAll(),
        ]);
    }

}
