<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Genre;
use App\Entity\Auteur;
use App\Entity\Editeur;
use App\Entity\Fournisseur;
use App\Entity\Produit;
use App\Entity\Carrier;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle("Le Coin Comique's");
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Genre', 'fas fa-scroll', Genre::class);
        yield MenuItem::linkToCrud('Auteur', 'fas fa-at', Auteur::class);
        yield MenuItem::linkToCrud('Editeur', 'fas fa-newspaper', Editeur::class);
        yield MenuItem::linkToCrud('Fournisseur', 'fas fa-business-time', Fournisseur::class);
        yield MenuItem::linkToCrud('Produit', 'fas fa-book', Produit::class);
        yield MenuItem::linkToCrud('Transporteur', 'fas fa-truck', Carrier::class);
    }
}
