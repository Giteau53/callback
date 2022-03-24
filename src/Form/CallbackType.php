<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CallbackType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname' , TextType::class,[
                'label' => 'Nom',
                'attr' => [
                    'class' => 'form-label '
                ],
                
            ])
            ->add('firstname', TextType::class,[
                'label' => 'Prénom',
            ])
            ->add('email', EmailType::class,[
                'label' => 'Email',
            ])
            ->add('phone', TelType::class,[
                'label' => 'Téléphone',
            ])
            ->add('time', ChoiceType::class,[
                'label' => 'Heure de rappel',
                'choices' => [
                    'Matin 9h - 11h',
                ]
            ])
            ->add('date', DateType::class,[
                'label' => 'Jour de rappel',
                'widget' => 'single_text',
            ])
            ->add('message', TextareaType::class,[
                'label' => 'Votre message',
            ])
            ->add('send', SubmitType::class,[
                'label' => 'Envoyer',
                'attr' => [
                    'class' => 'btn btn-primary'
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
