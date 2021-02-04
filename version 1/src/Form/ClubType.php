<?php

namespace App\Form;

use App\Entity\Club;
use App\Entity\Jugadores;
use phpDocumentor\Reflection\Types\Nullable;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
            ->add('jugadores', EntityType::class, [
                'class' => Jugadores::class,
                'choice_label' => 'nombre',
                'expanded' => false,
                'multiple' => true,
                'required'   => false,
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
