<?php

namespace App\Form;

use App\Entity\Callback;
use App\Entity\Creneau;
use App\Entity\Moment;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CallbackType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
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
        ->add('date', DateType::class,[
            'label' => 'Jour de rappel',
            'widget' => 'single_text',
            'by_reference' => true,
        ])

        

            ->add('moment', EntityType::class, [
                'mapped' => false,
                'class' => Moment::class,
                'choice_label' => 'name',
                'placeholder' => 'Choisissez votre moment',
                'label' => 'Moment',
                'required' => false
            ])

            ->add('creneau', ChoiceType::class, [
                'placeholder' => 'Choisissez votre créneau',
                'required' => false,
                
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

        $formModifier = function (FormInterface $form, Moment $moment= null) { 
           $heures = (null === $moment) ? [] : $moment->getCreneaux();

            $form->add('creneau', EntityType::class,  [
                'class' => Creneau::class,
                'choices' => $heures,
                'choice_label' => 'creneau',
                'placeholder' => 'Choisissez votre créneau',
                'attr' => ['class' => 'custom-select'],
                'label' => 'heures'
            ]);
        };

        $builder->get('moment')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
                $moment = $event->getForm()->getData();
                $formModifier($event->getForm()->getParent(), $moment);
               
            }
        );

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Callback::class,
        ]);
    }
}
