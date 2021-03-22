<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\StringField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class ProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('ref_bd'),
            TextField::new('heros'),
            TextField::new('titre'),
            SlugField::new('slug')->setTargetFieldName('titre'),
            AssociationField::new('fournisseur'),
            AssociationField::new('auteur'),
            AssociationField::new('genre'),
            ImageField::new('illustration')
            ->setBasePath('uploads/')
            ->setUploadDir('public/uploads/')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false),
            TextareaField::new('resume'),
            BooleanField::new('isBest'),
            MoneyField::new('prix_public')->setCurrency('EUR'),
            MoneyField::new('prix_editeur')->setCurrency('EUR'),

        ];
    }
    
}
