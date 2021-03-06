<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Produit;
use App\Classe\Search;
use App\Form\SearchType;
use Symfony\Component\HttpFoundation\Request;


class ProduitController extends AbstractController
{

    private $entityManager;

    public function __construct(EntitymanagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/nos-produits", name="produits")
     */
    public function index(Request $request): Response
    {
        $search = new Search();
        $form = $this->createForm(SearchType::class, $search);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $produits = $this->entityManager->getRepository(Produit::class)->findWithSearch($search);
        } else {
            $produits = $this->entityManager->getRepository(Produit::class)->findAll();
        }

        return $this->render('produit/index.html.twig', [
            'produits' => $produits, 
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/produit/{titre}", name="produit")
     */
    public function show($titre)
    {
        $produit = $this->entityManager->getRepository(Produit::class)->findOneByTitre($titre);
        $product = $this->entityManager->getRepository(Produit::class)->findByIsBest(1);
          

        if (!$produit) {
            return $this->redirectToRoute('produits');
        }
        
        return $this->render('produit/show.html.twig', [
            'produit' => $produit,
            'produits' => $product
        ]);
    }
}
