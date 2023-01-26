<?php

namespace WsunBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
class   RoldepagoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $id= $options[0];
        $builder
        ->add('fechaPag',  DateType::class,array('label'=>'fecha Pago:'))
        ->add('fecha',  DateType::class,array('label'=>'fecha:'))
        ->add('sueldoEmp' ,  TextType::class,array('label'=>'Sueldo del Empleado:'))
        ->add('fondosRes' ,  TextType::class,array('label'=>'Fondos de reserva:'))
        ->add('decimoTer' ,  TextType::class,array('label'=>'Decimo tercero:'))
        ->add('decimoCuar' ,  TextType::class,array('label'=>'Decimo cuarto:'))
        ->add('aporteIess',  TextType::class,array('label'=>'Aporte al IESS:'))
        ->add('quirografarioIess',  TextType::class,array('label'=>'Quirografario al IESS:'))
        ->add('anticipoTipoc', TextType::class,array('label'=>'Anticipo tipo C:'))
        ->add('retencionJud',  TextType::class,array('label'=>'Retencion judicial:'))
        ->add('prestamoHipo',  TextType::class,array('label'=>'Prestamo Hipotecario:'))
        ->add('otrosDes', TextType::class,array('label'=>'Otros descuentos:'))
        ->add('totalRecibir',  TextType::class,array('label'=>'Total a recibir:'))
        ->add('idEmpleado');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WsunBundle\Entity\Roldepago','id'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'wsunbundle_Roldepago';
    }
}