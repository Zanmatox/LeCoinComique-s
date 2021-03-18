<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\AdresseType;
use App\Entity\Adresse;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Classe\Cart;

class AdresseController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/compte/adresses", name="adresse")
     */
    public function index(): Response
    {
        return $this->render('account/adresse.html.twig');
    }


    /**
     * @Route("/compte/ajouter-une-adresse", name="adresse_add")
     */
    public function add(Cart $cart, Request $request): Response
    {
        $adresse = new Adresse();

        $form=$this->createForm(AdresseType::class, $adresse);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $adresse->setUser($this->getuser());
            $this->entityManager->persist($adresse);
            $this->entityManager->flush();
            if ($cart->get()) {
                return $this->redirectToRoute('commande');
            } else {
                return $this->redirectToRoute('adresse');
            }
        }

        return $this->render('account/adresse_add.html.twig', [
            'form' => $form->createView()
        ]);
    }

     /**
     * @Route("/compte/modifier-une-adresse/{id}", name="adresse_edit")
     */
    public function edit(Request $request, $id): Response
    {
        $adresse = $this->entityManager->getRepository(Adresse::class)->findOneById($id);

        if (!$adresse || $adresse->getUser() != $this->getUser()) {
            return $this->redirectToRoute('adresse');
        }

        $form=$this->createForm(AdresseType::class, $adresse);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();
            return $this->redirectToRoute('adresse');
        }

        return $this->render('account/adresse_add.html.twig', [
            'form' => $form->createView()
        ]);
    }

     /**
     * @Route("/compte/supprimer-une-adresse/{id}", name="adresse_delete")
     */
    public function delete($id): Response
    {
        $adresse = $this->entityManager->getRepository(Adresse::class)->findOneById($id);

        if ($adresse && $adresse->getUser() == $this->getUser()) {
            $this->entityManager->remove($adresse);
            $this->entityManager->flush();
        }
        return $this->redirectToRoute('adresse');
    }
}
