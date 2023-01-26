<?php

namespace WsunBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class CursosType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $id= $options[0];
        $builder
        ->add('tipo',  TextType::class,array('label'=>'Tipo:'))//, array("attr"=>array("class"=>"col-lg-2 control-label")))
        ->add('nombreCurso' ,  TextType::class,array('label'=>'Nombre curso:'))//, array("attr"=>array("class"=>"form form-control")))
        ->add('institucion', TextType::class,array('label'=>'Instituciòn:'))
        ->add('fechaIngreso', DateType::class,array('label'=>'Fecha registro:'))
        ->add('fechaFin',  DateType::class,array('label'=>'Fecha registro:'))
        ->add('duracion',  TextType::class,array('label'=>'Duracion Curso:'))
        //->add('idEmpleado', array('label' => 'Field','empty_data' => 'Default value');
        //->add('idEmpleado', TextType::class, ['empty_data' => $id]);
        ->add('idEmpleado');
        //->add('tipo')->add('nombreCurso')->add('institucion')->add('fechaIngreso')->add('fechaFin')->add('duracion')->add('idEmpleado');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WsunBundle\Entity\Cursos','id'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'wsunbundle_cursos';
    }


}
