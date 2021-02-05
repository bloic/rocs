<?php

namespace App\Form;

use App\Entity\Office;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OfficeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label'=>'Nom',
                'attr'=>[
                    'placeholder'=>'Dupont Marie'
                ],])
            ->add('status', TextType::class,[
                'label'=>'Fonction',
                'attr'=>[
                    'placeholder'=>'Président'
                ],])
            ->add('description', TextareaType::class)
            ->add('picture', TextType::class, [
                'label'=>'image',
                'attr'=>[
                    'placeholder'=>'https//wwww.exemple.com/image.jpg'
                ],
            ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Office::class,
        ]);
    }
}
