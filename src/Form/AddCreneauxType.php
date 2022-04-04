<?php

namespace App\Form;

use App\Entity\Callback;
use App\Entity\Creneau;
use App\Entity\Moment;
use App\Repository\CreneauRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddCreneauxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('moment' , EntityType::class, [
                'class' => Moment::class,
                
                
            ])
            ->add('creneau' , TextType::class, [
                'label' => "Entrez l'heure du nouveau créneau",
                'attr' => [
                    'placeholder' => 'ex: 00h',
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => "Enregistrer",
                'attr' => [
                    "class" => "w-100 btn btn-primary"
                ]
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
