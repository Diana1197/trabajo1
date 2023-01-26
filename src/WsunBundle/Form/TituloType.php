<?php

namespace WsunBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
class   TituloType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $id= $options[0];
        $builder
        ->add('instucion',  TextType::class,array('label'=>'Instutucion:'))
        ->add('nombretitulo' ,  TextType::class,array('label'=>'Nombre curso:'))
        ->add('fechaaprobacion', DateType::class,array('label'=>'Fecha de Aprobaciòn:'))
        ->add('observacion' ,  TextType::class,array('label'=>'Observaciòn:'))
       
        ->add('idEmpleado');
       
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WsunBundle\Entity\Titulo','id'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'wsunbundle_titulo';
    }


}
