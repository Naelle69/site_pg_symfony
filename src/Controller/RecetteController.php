<?php

namespace App\Controller;

use App\Repository\RecetteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecetteController extends AbstractController
{
    
    #[Route('/recette', name: 'app_recette')]
    public function index(RecetteRepository $repository ): Response
    {
        return $this->render('home/recette.html.twig', [
           
            "recettes" => $repository->findAll(),
        ]);
    }
}
