<?php

namespace WsunBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class EmpleadoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('cedulaEmp',  TextType::class,array('label'=>'Cédula:'))//, array("attr"=>array("class"=>"col-lg-2 control-label")))
        ->add('nombreEmp' ,  TextType::class,array('label'=>'Nombre Empleado:'))//, array("attr"=>array("class"=>"form form-control")))
        ->add('apellidoEmp', TextType::class,array('label'=>'Apellido Empleado:'))
        ->add('telefonoEmp', TextType::class,array('label'=>'Telefono Empleado:'))
        ->add('direccion', TextType::class,array('label'=>'Direccion Empleado:'))
        ->add('email',  TextType::class,array('label'=>'Email Empleado:'))
        ->add('cargoEmp', TextType::class,array('label'=>'Cargo Empleado:'))
        ->add('gradoEmp', TextType::class,array('label'=>'Grado Empleado:'))
        ->add('sueldo', TextType::class,array('label'=>'Sueldo Empleado:'))
        ->add('contacto', TextType::class,array('label'=>'Contacto Empleado:'));
        
        //->add('cedulaEmp')->add('nombreEmp')->add('apellidoEmp')->add('telefonoEmp')->add('direccion')->add('email')->add('cargoEmp')->add('gradoEmp')->add('sueldo')->add('contacto');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WsunBundle\Entity\Empleado'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'wsunbundle_empleado';
    }


}
