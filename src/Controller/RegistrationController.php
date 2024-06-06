<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\InscriptionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
        #[Route(path: '/inscription', name: 'app_inscription')]
    public function inscription(Request $request, UserPasswordHasherInterface $userPasswordHasher, 
                                EntityManagerInterface $manager,): Response
    {
        $user = new User();
        $user->setRoles(['ROLE_USER']);
        $form = $this->createForm(InscriptionType::class, $user);/*  on relie les champs du formulaire aux champs de l'utilisateur */

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid() ) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('password')->getData()
                )
            );
            $manager->persist($user);
            $manager->flush();
            return $this->redirectToRoute('app_login');
        }
        return $this->render('registration/inscription.html.twig', [
            'inscriptionForm' => $form->createView()
        ]);
    }     
}
