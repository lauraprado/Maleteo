<?php

namespace App\Form;


use App\Entity\OpinionMaleteo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DemoForm extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('comentario');
        $builder->add('autor');
        $builder->add('ciudad');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => OpinionMaleteo::class
            ]
        );
    }
}