<?php

namespace App\Controller;

use App\Entity\Plat;
use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

 #[Route('/panier', name: 'app_panier_')]
class PanierController extends AbstractController
{
    #[Route('/', name: 'index')] 
    public function index(SessionInterface $session, PlatRepository $platRepository): Response
    {   
        /* On récupère le panier actuel */
        $panier = $session->get("panier", []);

       /*  On fabrique notre panier */

        $dataPanier = [];
        $total =0;

        foreach($panier as $id => $quantite){    /* on fait une boucle */
            $plat = $platRepository->find($id);
            $dataPanier[] = [
                "produit" => $plat,
                "quantite" => $quantite
            ];
            $total += $plat->getPrice() * $quantite;
        }

        return $this->render('panier/index.html.twig', [
            'dataPanier' => $dataPanier,
            'total' => $total,   
        ]);
    }

    #[Route('/add/{id}', name: 'add')] /* route d'ajout d'un plat dans panier */
    public function add(Plat $plat, SessionInterface $session)
    {
        // On récupère le panier actuel
        $panier = $session->get("panier", []);
        $id = $plat->getId();

        if(!empty($panier[$id])){
            $panier[$id]++;
        }else{
            $panier[$id] = 1;
        }
        
        // On sauvegarde dans la session
        $session->set("panier", $panier);
    
        return $this->redirectToRoute('app_panier_index'/* , array('_fragment' => 'plats') */);
    }


    #[Route('/remove/{id}', name: 'remove')]/* route de suppression d'un élément du panier */
    public function remove(Plat $plat, SessionInterface $session)
    {
        // On récupère le panier actuel
        $panier = $session->get("panier", []);
        $id = $plat->getId();

        if(!empty($panier[$id])){
            if($panier[$id] > 1){
                $panier[$id]--;
            }else{
                unset($panier[$id]);
            }
        }

        // On sauvegarde dans la session
        $session->set("panier", $panier);

        return $this->redirectToRoute("app_panier_index"); 
    }   


    #[Route('/delete/{id}', name: 'delete')] /* route de suppression du panier */
    public function delete(Plat $plat, SessionInterface $session)
    {
        // On récupère le panier actuel
        $panier = $session->get("panier", []);
        $id = $plat->getId();
    
        if(!empty($panier[$id])){
            unset($panier[$id]);
        }
        
        // On sauvegarde dans la session
        $session->set("panier", $panier);

        return $this->redirectToRoute("app_panier_index");
    }


    #[Route('/delete', name: 'delete_all')] /* route de suppression de tous les paniers */
    public function deleteAll(SessionInterface $session)
    {
        $session->remove("panier");

        return $this->redirectToRoute("app_panier_index");
    }
}
