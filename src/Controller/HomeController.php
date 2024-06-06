<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\PlatRepository;
use App\Repository\RecetteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(PlatRepository $platRepository, 
                        RecetteRepository $recetteRepository, 
                        Request $request, 
                        EntityManagerInterface $manager): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactFormType::class, $contact);
        $form->handleRequest($request); /* on demande au formulaire d'analyser la requête http qui est ici */
        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();

            $manager->persist($contact);
            $manager->flush();
            return $this->redirectToRoute('app_home');
        }
        return $this->render('home/index.html.twig', [
            "plats" => $platRepository->findAll(), 
            "recettes" => $recetteRepository->findAll(),
            'form' => $form->createView()
        ]);
    }

}