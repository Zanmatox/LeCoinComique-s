<?php

namespace App\Form;

use App\Entity\Adresse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\TelType;

class AdresseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name', TextType::class, [
            'label' => 'Quel nom souhaitez-vous donner à votre adresse ?',
            'attr' => [
                'placeholder' => 'Nommez votre adresse'
            ]
        ])
        ->add('firstname', TextType::class, [
            'label' => 'Votre prénom',
            'attr' => [
                'placeholder' => 'Entrez votre prénom'
            ]
        ])
        ->add('lastname', TextType::class, [
            'label' => 'Votre nom ?',
            'attr' => [
                'placeholder' => 'Entrez votre nom'
            ]
        ])
        ->add('company', TextType::class, [
            'label' => 'Votre société',
            'required' => false,
            'attr' => [
                'placeholder' => '(facultatif) Entrez le nom de votre société'
            ]
        ])
        ->add('adresse', TextType::class, [
            'label' => 'Votre adresse',
            'attr' => [
                'placeholder' => 'Entrez votre adresse'
            ]
        ])
        ->add('postal', TextType::class, [
            'label' => 'Votre code postal',
            'attr' => [
                'placeholder' => 'Entrez votre code postal'
            ]
        ])
        ->add('city', TextType::class, [
            'label' => 'Ville',
            'attr' => [
                'placeholder' => 'Entrez votre ville'
            ]
        ])
        ->add('country', CountryType::class, [
            'label' => 'Pays',
            'attr' => [
                'placeholder' => 'Entrez votre pays'
            ]
        ])
        ->add('phone', TelType::class, [
            'label' => 'Votre numéro de téléphone',
            'attr' => [
                'placeholder' => 'Entrez votre numéro de téléphone'
            ]
        ])
        ->add('submit', SubmitType::class, [
            'label' => 'Valider',
            'attr' => [
                 'class' => 'btn-block btn-info'
            ]
        ])
    ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Adresse::class,
        ]);
    }
}
