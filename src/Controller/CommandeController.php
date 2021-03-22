<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\CommandeType;
use App\Classe\Cart;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Commande;

class CommandeController extends AbstractController
{
    /**
     * @Route("/commande", name="commande")
     */
    public function index(Cart $cart, Request $request): Response
    {
        if (!$this->getUser()->getAdresses()->getValues())
        {
            return $this->redirectToRoute('adresse_add');
        }

        $form = $this->createForm(CommandeType::class, null, [
            'user' => $this->getUser()
        ]);

        return $this->render('commande/index.html.twig', [
            'form' => $form->createView(),
            'cart' => $cart->getFull()
        ]);
    }

    /**
     * @Route("/commande/recapitulatif", name="commande_recap")
     */
    public function add(Cart $cart, Request $request): Response
    {
        $form = $this->createForm(CommandeType::class, null, [
            'user' => $this->getUser()
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $date = new \DateTime();
            $carriers = $form->get('carriers')->getData();
            $delivery = $form->get('adresses')->getData();
            //dd($delivery);

            $commande = new Commande();
            $commande->setUser($this->getUser());
            $commande->setCreatedAt($date);
            $commande->setCarrierName($carriers->getName());
            $commande->setCarrierPrice($carriers->getPrice());

            //Enregistrer  ses produits
        }

        return $this->render('commande/add.html.twig', [
            'cart' => $cart->getFull()
        ]);
    }
}
