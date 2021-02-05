<?php

namespace App\Form;

use App\Entity\Club;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ClubType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('telefono',TextType::class,[
                'attr' => ['placeholder' => '___-___-___',
                            'class' => 'mask']
            ])
            ->add('borrado')
            ->add('jugadores', CollectionType::class,[
                'entry_type' => JugadoresType:: class,
                'entry_options'=> [
                    'label'=> false
                ],
                'by_reference'=>false,
                'allow_add'=> true,
                'allow_delete'=>true,
                'attr'=>[
                    'class'=>'jugadores-collection',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Club::class,
        ]);
    }
}
