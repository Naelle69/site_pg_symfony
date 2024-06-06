<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Form\AvisType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AvisController extends AbstractController
{
    #[Route('/avis', name: 'app_avis')]
    public function indexAvis(Request $request, EntityManagerInterface $manager): Response
    {
        $avis = new Avis();
        $form = $this->createForm(AvisType::class, $avis);

        $form->handleRequest($request); /* on demande au formulaire d'analyser la requête http qui est ici */
        if ($form->isSubmitted() && $form->isValid()) {
            $avis = $form->getData();

            $manager->persist($avis);
            $manager->flush();
            return $this->redirectToRoute('app_avis');
        }
        return $this->render('avis/avis.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
