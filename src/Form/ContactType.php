<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname',TextType::class,[
                'label'=>'nom',
                'attr'=>[
                    'placeholder'=> 'Dupont'
                ],
            ])
            ->add('lastname',TextType::class,[
                'label'=>'Prénom',
                'attr'=>[
                    'placeholder'=>'michel'
                ],
            ])
            ->add('phone',TextType::class,[
                'attr'=>[
                  'placeholder'=>'06 22 88 69 33'
                ],
            ])
            ->add('email',EmailType::class,[
                'attr'=>[
                    'placeholder'=> 'example@rocs.fr'
                ],
            ])
            ->add('subject',TextType::class,[
                'label'=>'Sujet',
                'attr'=>[
                    'placeholder'=>'Partenariat'
                ],
            ])
            ->add('message',TextareaType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
