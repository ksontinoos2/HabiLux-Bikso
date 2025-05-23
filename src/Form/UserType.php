<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', null, [
                'required' => true,
            ])
            ->add('prenom', null, [
                'required' => true,
            ])
            ->add('email', EmailType::class, [
                'required' => true,
                'attr' => [
                    'placeholder' => 'exemple@domaine.com',
                ],
            ])
            
            ->add('tel', null, [
                'required' => true,
            ])
            ->add('adresse', null, [
                'required' => true,
            ])
            ->add('localisation', null, [
                'required' => true,
            ])
            ->add('cin')
            ->add('poste', ChoiceType::class, [
                'choices' => [
                    'Administrateur de biens' => 'Administrateur de biens',
                    'Agent immobilier' => 'Agent immobilier',
                    'Conseiller en immobilier' => 'Conseiller en immobilier',
                    'Mandataire immobilier' => 'Mandataire immobilier',
                    'Chasseur immobilier' => 'Chasseur immobilier',
                    'Responsable d’agence' => 'Responsable d’agence',
                    'Responsable de vente' => 'Responsable de vente',
                    'Expert immobilier' => 'Expert immobilier',
                ],
                'expanded' => false, // liste déroulante
                'multiple' => false, // ⛔ un seul choix possible
                'required' => false,
                'label' => 'Poste',
                'placeholder' => 'Sélectionner un poste',
                'attr' => ['class' => 'form-select'],
            ])
            
            
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Admin' => 'ROLE_ADMIN',
                    'Client' => 'ROLE_USER',
                ],
                'expanded' => false,
                'multiple' => true,
                'label' => 'Rôle',
                'required' => false,
                'placeholder' => 'Sélectionner un ou plusieurs rôles',
                'attr' => ['class' => 'form-select'],
            ])
            ->add('photoProfil', FileType::class, [
                'label' => 'Ajouter une image',
                'mapped' => false,
                'required' => false,
                'multiple' => false,
                'attr' => ['class' => 'form-control'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
