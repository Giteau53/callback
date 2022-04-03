<?php

namespace App\Form;

use App\Classe\Search;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Entity\Callback;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('string',TextType::class,[
            'label' => false,
            'required' => false,
            'attr' => [
                'placeholder' => 'Votre recherche ...',
                'class' => 'form-control-sm'
            ]
            ])
            ->add('categories', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Category::class,
                'multiple' => true,
                'expanded' => true
            ])
            ->add('submit', SubmitType::class,[
                'label' => 'Filtrer',
                'attr' => [
                    'class' => 'btn-block btn-moustard rounded'
                ]
                ]);
}

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Callback::class,
            'method' => 'GET',
            'crsf_protection' => false,
        ]);
    }
}