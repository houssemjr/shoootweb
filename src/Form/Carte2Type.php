<?php

namespace App\Form;

use App\Entity\Cartes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class Carte2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('level')
            ->add('prix')
            ->add('idPremuim')
            ->add('imgcarte', FileType::class,[
                'label' => "insérer carte",
                'data_class'=> null,
                'mapped' => true,
                'required' => false

                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cartes::class,
        ]);
    }
}
