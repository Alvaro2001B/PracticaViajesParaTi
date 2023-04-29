<?php

namespace App\Form;

use App\Entity\Proveedor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditProveedorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('mail')
            ->add('telephone')
            ->add('type',ChoiceType::class,array(
                'choices' => array('Hotel'=>'Hotel','Pista'=>'Pista','Complemento'=>'Complemento'),
                'required' => 'true'
            ))
            ->add('active')
            ->add('create_date', DateType::class,[
                'widget' => 'single_text',
                'disabled' => 'true'
            ])
            ->add('update_date', DateType::class,[
                'widget' => 'single_text',
                'disabled' => 'true'
            ])
            ->add('Editar', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Proveedor::class,
        ]);
    }
}
